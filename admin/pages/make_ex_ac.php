<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_examinations SET status='Active' WHERE exam_id='$exid'";


if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Exam is Activated.');
    window.location.href='../classexamination.php';
    </script>";
} else {
    echo "<script>
    alert('Some thing went wrong.');
    window.location.href='../classexamination.php';
    </script>";
}

$conn->close();
?>
