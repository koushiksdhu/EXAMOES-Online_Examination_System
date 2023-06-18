<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
$ay_id = 'AY'.get_rand_numbers(4).'';
$ay_name = ucwords(mysqli_real_escape_string($conn, $_POST['ay']));
$date_registered = date('d-m-Y');

$sql = "SELECT * FROM tbl_acad WHERE name = '$ay_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<script>
    alert('Academic Year '+ '$ay_name' + ' already exist.');
    window.location.href='../acad.php?display=COULD NOT ADD ACADEMIC YEAR';
    </script>";
    }
} else {

$sql = "INSERT INTO tbl_acad (ay_id, name, date_registered)
VALUES ('$ay_id', '$ay_name', '$date_registered')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Academic Year '+ '$ay_name' + ' is successfully added.');
    window.location.href='../acad.php?display=ACADEMIC YEAR ADDED SUCCESSFULLY';
    </script>";


} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../acad.php?display=COULD NOT ADD ACADEMIC YEAR';
    </script>";
}


}
$conn->close();
?>


