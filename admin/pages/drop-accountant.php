<?php
// ACCOUNTANT DELETE
include '../../database/config.php';
$tdid = mysqli_real_escape_string($conn, $_GET['id']);  // (ID changed by KOUSHIK)

$sql = "DELETE FROM tbl_teacher WHERE teacher_id='$tdid'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Accountant Deleted Successfully.');
    window.location.href='../accountant.php?DELETED SUCCESSFULLY';
    </script>";
} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../accountant.php?Could Not Apply Settings';
    </script>";
}


$conn->close();
?>
