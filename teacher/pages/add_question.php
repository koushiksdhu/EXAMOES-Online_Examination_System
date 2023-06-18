<!--Examination > Action > Add Question -->
<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$examid = mysqli_real_escape_string($conn, $_POST['exam_id']);
$question_id = 'QS-'.get_rand_numbers(6).'';    // create question id of each questions
$question = mysqli_real_escape_string($conn, $_POST['question']);
$qmarks = mysqli_real_escape_string($conn, $_POST['qmarks']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);

if (isset($_GET['type'])) { // it checks whether the type variable is empty or not
    // if not empty then
$question_type = $_GET['type'];	
if ($question_type == "mc") {	// if the type matched then 
$opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
$opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
$opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
$opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);


$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
// fetches the existing questions
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // if the same question found then this error will occur
    while($row = $result->fetch_assoc()) {
 echo "<script>
    alert('Question already exist.');
    window.location.href='../add-questions.php?DUPLICATE QUESTION FOUND!!&eid=$examid';
    </script>";
    }
} else {
// insert new question
$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question,Qmarks, option1, option2, option3, option4, answer)
VALUES ('$question_id', '$examid', 'MC', '$question','$qmarks', '$opt1', '$opt2', '$opt3', '$opt4', '$answer')";

if ($conn->query($sql) === TRUE) {  // if the query executed successfully, then 
    echo "<script>
    alert('Question added successfully.');
    window.location.href='../add-questions.php?QUESTION ADDED SUCCESSFULLY!!&eid=$examid';
    </script>";	
} else {
 echo "<script>
    alert('Could Not Add Question.');
    window.location.href='../add-questions.php?COULD NOT ADD QUESTION!!&eid=$examid';
    </script>";	
}

}

// not execute
}else if($question_type == "fib") {
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
echo "<script>
    alert('Question already exist.');
    window.location.href='../add-questions.php?DUPLICATE QUESTION FOUND!!&eid=$examid';
    </script>";
    }
} else {

$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, answer)
VALUES ('$question_id', '$examid', 'FB', '$question', '$answer')";

if ($conn->query($sql) === TRUE) { 
  echo "<script>
    alert('Question added successfully.');
    window.location.href='../add-questions.php?QUESTION ADDED SUCCESSFULLY!!&eid=$examid';
    </script>";	
} else {
 echo "<script>
    alert('Could Not Add Question.');
    window.location.href='../add-questions.php?COULD NOT ADD QUESTION!!&eid=$examid';
    </script>";	
}


}
// not execute

}else{
	
}
	
}else{
	
header("location:../");	
	
}


?>