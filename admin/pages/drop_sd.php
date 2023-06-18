<?php
// DELETE STUDENT
include '../../database/config.php';
$sdid = mysqli_real_escape_string($conn, $_GET['id']);  

$sql = "DELETE FROM tbl_users WHERE user_id='$sdid'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Student Deleted Successfully.');
    window.location.href='../students.php?DELETED SUCCESSFULLY';
    </script>";
} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../students.php?Could Not Apply Settings';
    </script>";
}

$conn->close();
?>
