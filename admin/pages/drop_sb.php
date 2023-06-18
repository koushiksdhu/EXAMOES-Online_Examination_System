<?php
// DELETE SUBJECT
include '../../database/config.php';
$sbid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_subjects WHERE subject_id='$sbid'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Subject Deleted Successfully.');
    window.location.href='../subject.php?DELETED SUCCESSFULLY';
    </script>";
} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../subject.php?Could Not Apply Settings';
    </script>";
}

$conn->close();
?>
