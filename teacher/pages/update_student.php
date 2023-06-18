<?php
$student_id = $_POST['student_id'];	
include '../../database/config.php';

$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$ay = mysqli_real_escape_string($conn, $_POST['ay']);
$class = mysqli_real_escape_string($conn, $_POST['class']);
$section = mysqli_real_escape_string($conn, $_POST['section']);
$roll = mysqli_real_escape_string($conn, $_POST['roll']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

//	basically this query checks whether the existing data is same or not.
$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND user_id !='$student_id' OR phone = '$phone' AND user_id !='$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];	
	$sph = $row['phone'];
	if ($sem == $email) {		// if the email is same
	 echo "<script>
    alert('Student with Email ID ('+ '$sem' + ') already exist.');
    window.location.href='../edit-student.php?Duplicate Email ID Found!!&sid=$student_id';
    </script>";
	}else{
	
	if ($sph == $phone) {	// duplicate phone no found
	 echo "<script>
    alert('Student with Phone Number ('+ '$sph' + ') already exist.');
    window.location.href='../edit-student.php?Duplicate Phone Number Found!!!&sid=$student_id';
    </script>";	
	}else{
		
	}
	
	}
	
    }
} else {
	// this query update the new data from edit-student.php page
$sql = "UPDATE tbl_users SET first_name = '$fname', last_name = '$lname', gender = '$gender', dob = '$dob', address = '$address', email = '$email', phone = '$phone', ay = '$ay', class = '$class', section = '$section', roll = '$roll' WHERE user_id='$student_id'";

if ($conn->query($sql) === TRUE) {
  /*header("location:../edit-student.php?STUDENT UPDATED!!!&sid=$student_id");*/
  echo "<script>
    alert('Student updated successfully. STUDENT ID: '+'$student_id');
    window.location.href='../vstudents.php?cn='+'$class';
    </script>";
} else {
  echo "<script>
    alert('Could not update student.');
    window.location.href='../edit-student.php?Could Not Apply Settings!!!&sid=$student_id';
    </script>";
}


}

$conn->close();
?>