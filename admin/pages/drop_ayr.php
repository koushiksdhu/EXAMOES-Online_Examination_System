<?php
include '../../database/config.php';
$ayrid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_acad WHERE ay_id='$ayrid'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Academic Year Deleted Successfully.');
    window.location.href='../acad.php?display=AY DELETED';
    </script>";
    ;
} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../acad.php?display=COULD NOT APPLY SETTINGS';
    </script>";
}

$conn->close();
?>
