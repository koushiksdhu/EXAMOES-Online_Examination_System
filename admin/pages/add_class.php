<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';   // Auto generate class ID
$class_id = 'CL'.get_rand_numbers(6).'';  //random number
$class_name =   ucwords(mysqli_real_escape_string($conn, $_POST['class'])); 

$ay_name = ucwords(mysqli_real_escape_string($conn, $_POST['ay']));
$date_registered = date('d-m-Y');

$sql = "SELECT * FROM tbl_classes WHERE name = '$class_name' AND ay = '$ay_name'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<script>
    alert('Class '+ '$class_name' + ' already exist.');
    window.location.href='../classes.php?display=COULD NOT ADD CLASS';
    </script>";
    }
} else {

$sql = "INSERT INTO tbl_classes (class_id, name, ay, date_registered)
VALUES ('$class_id', '$class_name', '$ay_name', '$date_registered')";

if ($conn->query($sql) == TRUE) {
    echo "<script>
    alert('Class '+ '$class_name' + ' is Successfully added.');
    window.location.href='../classes.php?Class was Added Successfully';
    </script>";
} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../classes.php?Could Not Add Class';
    </script>";
    
}


}
$conn->close();
?>


