<!--Examination > Action > Add Question -->
<?php
include '../../database/config.php';
include '../../includes/uniques.php';

$notice = mysqli_real_escape_string($conn, $_POST['notice']);

$sql = "SELECT * FROM tbl_notice ";
// fetches the existing questions
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // if the same question found then this error will occur
    while($row = $result->fetch_assoc()) {
 echo "<script>
    alert('Delete the previous notice to add new.');
    window.location.href='../notice.php?NOTICE ALREADY ADDED';
    </script>";
    }
} else {
// if not the same, then insert the new question, along with the options and answer
$sql = "INSERT INTO tbl_notice (notice) values ('$notice')";

if ($conn->query($sql) === TRUE) {  // if the query executed successfully, then 
    echo "<script>
    alert('Notice added Successfully.');
    window.location.href='../notice.php?NOTICE ADDED SUCCESSFULLY';
    </script>";


} else {
 echo "<script>
    alert('Could not add notice.');
    window.location.href='../notice.php?COULD NOT ADD NOTICE!!';
    </script>";

}

}



?>