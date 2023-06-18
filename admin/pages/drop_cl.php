<?php
include '../../database/config.php';
$clid = mysqli_real_escape_string($conn, $_GET['id']);  

$sql = "DELETE FROM tbl_classes WHERE class_id='$clid'";


if ($conn->query($sql) == TRUE) {
    echo "<script>
    alert('Class Deleted Successfully.');
    window.location.href='../classes.php?DELETED SUCCESSFULLY';
    </script>";
} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../classes.php?Something Went Wrong';
    </script>";
}

$conn->close();
?>
