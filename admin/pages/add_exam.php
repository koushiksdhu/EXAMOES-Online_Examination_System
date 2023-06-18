<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
$exam_id = 'EX'.get_rand_numbers(6).'';
$exam = ucwords(mysqli_real_escape_string($conn, $_POST['exam']));
$duration = mysqli_real_escape_string($conn, $_POST['duration']);
$passmark = mysqli_real_escape_string($conn, $_POST['passmark']);
$f_marks = mysqli_real_escape_string($conn, $_POST['fmarks']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$class = mysqli_real_escape_string($conn, $_POST['class']);

$sql = "SELECT * FROM tbl_examinations WHERE exam_name = '$exam' AND subject = '$subject' AND class = '$class'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
echo "<script>
    alert('$exam' + ' already exist.');
    window.location.href='../classexamination.php?DUPLICATE RECORD FOUND';
    </script>";
    }
} else {

$sql = "INSERT INTO tbl_examinations (exam_id, class, subject, exam_name, date, duration, passmark,full_marks, re_exam)
VALUES ('$exam_id', '$class', '$subject', '$exam', '$date', '$duration', '$passmark','$f_marks', '$attempts')";

if ($conn->query($sql) === TRUE) {
echo "<script>
    alert('$exam' + ' is Successfully added.');
    window.location.href='../examinations.php?cn='+'$class';
    </script>";
} else {
echo "<script>
    alert('Something went wrong.');
    window.location.href='../examinations.php?cn='+'$class';
    </script>";
}


}
$conn->close();
?>
