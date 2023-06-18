<?php
include '../../database/config.php';
$qsid = mysqli_real_escape_string($conn, $_GET['id']);
$exid = mysqli_real_escape_string($conn, $_GET['eid']);

$sql = "DELETE FROM tbl_questions WHERE question_id='$qsid'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Question Deleted Successfully.');
    window.location.href='../view-questions.php?display=Question Has Been Deleted&eid=$exid';
    </script>";
} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../view-questions.php?display=Something went Wrong&eid=$exid';
    </script>";
}

$conn->close();
?>
