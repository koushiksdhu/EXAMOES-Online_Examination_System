<?php

include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);


$sql = "DELETE FROM tbl_examinations WHERE exam_id='$exid'";

if ($conn->query($sql) === TRUE) {

$sql = "DELETE FROM tbl_questions WHERE exam_id='$exid'";
if ($conn->query($sql) === TRUE) {
} else {
}
echo "<script>
alert('Examination Deleted Successfully.');
window.location.href='../classexamination.php';
</script>";

} else {
    echo "<script>
alert('Something went wrong.');
window.location.href='../classexamination.php';
</script>";
}

$conn->close();
?>
