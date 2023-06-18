<?php
include '../../database/config.php';


$sql = "DELETE FROM tbl_notice";

if ($conn->query($sql) === TRUE) {
    echo "<script>
alert('Notice Deleted Successfully.');
window.location.href='../notice.php?display=AY DELETED';
</script>";
} else {
    echo "<script>
alert('Something went wrong.');
window.location.href='../notice.php?display=COULD NOT APPLY SETTINGS';
</script>";
}

$conn->close();
?>
