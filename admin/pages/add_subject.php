<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
$subject_id = 'SB-'.get_rand_numbers(6).'';
$subject_name =   ucwords(mysqli_real_escape_string($conn, $_POST['subject']));
$ay_name = ucwords(mysqli_real_escape_string($conn, $_POST['ay']));
$class_name = ucwords(mysqli_real_escape_string($conn, $_POST['class']));
$date_registered = date('d-m-Y');

$sql = "SELECT * FROM tbl_subjects WHERE name = '$subject_name' AND ay = '$ay_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    echo "<script>
    alert('Subject: '+ '$subject_name' + ' already exist.');
    window.location.href='../subject.php?DUPLICATE RECORD FOUND!!';
    </script>";
    }
} else {

$sql = "INSERT INTO tbl_subjects (subject_id, name, ay, class, date_registered)
VALUES ('$subject_id', '$subject_name', '$ay_name', '----', '$date_registered')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Subject: '+ '$subject_name' + '  added successfully.');
    window.location.href='../subject.php?Subject is Added Successfully!!';
    </script>";
} else {
    echo "<script>
    alert('Could Not Add Subject.');
    window.location.href='../subject.php?Could Not Add Subject!!';
    </script>";
}


}
$conn->close();
?>


