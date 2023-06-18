<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
$exam_id = $_POST['examid'];    // this id comes from edit-exam.php page
$exam = ucwords(mysqli_real_escape_string($conn, $_POST['exam']));
$duration = mysqli_real_escape_string($conn, $_POST['duration']);
$passmark = mysqli_real_escape_string($conn, $_POST['passmark']);
$f_marks = mysqli_real_escape_string($conn, $_POST['fmarks']);
$attempts = mysqli_real_escape_string($conn, $_POST['attempts']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$class = mysqli_real_escape_string($conn, $_POST['class']);

$sql = "SELECT * FROM tbl_examinations WHERE exam_name = '$exam' AND subject = '$subject' AND class = '$class' AND exam_id != '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
echo "<script>
    alert('$exam' + ' already exist.');
    window.location.href='../classexamination.php?DUPLICATE RECORD FOUND';
    </script>";
    }
} else {

$sql = "UPDATE tbl_examinations SET class = '$class', subject = '$subject', exam_name = '$exam', date = '$date', duration = '$duration', passmark = '$passmark',full_marks='$f_marks', re_exam = '$attempts' WHERE exam_id='$exam_id'";

if ($conn->query($sql) === TRUE) {
echo "<script>
    alert('$exam' + ' is Successfully Updated.');
    window.location.href='../examinations.php?cn='+'$class';
    </script>";
} else {
echo "<script>
    alert('Something went wrong.');
    window.location.href='../edit-exam.php?Could Not Apply Settings!!&eid=$exam_id';
    </script>";
}


}
$conn->close();
?>
