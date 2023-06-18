<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';	// this will generate random numbers
$student_id = 'OES'.get_rand_numbers(5);	// this is going to be reg id
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$ay = mysqli_real_escape_string($conn, $_POST['ay']);
$class = mysqli_real_escape_string($conn, $_POST['class']);
$section = mysqli_real_escape_string($conn, $_POST['section']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);


$sql = "SELECT * FROM tbl_users WHERE email = '$email' OR phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {	// checks same or not
	 echo "<script>
    alert('Student with Email ID ('+ '$sem' + ') already exist.');
    window.location.href='../students.php?Duplicate Email ID Found';
    </script>";
	}else{
	
	if ($sph == $phone) {	// checks same or not
	 echo "<script>
    alert('Student with Phone Number ('+ '$sph' + ') already exist.');
    window.location.href='../students.php?Duplicate Phone Number Found';
    </script>";		
	}else{
		
	}
	
	}
	
    }
} else {
//	insert the new value
$sql = "INSERT INTO tbl_users (user_id, first_name, last_name, gender, dob, address, email, phone, ay, class, section)
VALUES ('$student_id', '$fname', '$lname', '$gender', '$dob', '$address', '$email', '$phone', '$ay', '$class', '$section')";

if ($conn->query($sql) === TRUE) {
  echo "<script>
    alert('Student added successfully. STUDENT ID: '+'$student_id');
    window.location.href='../vstudents.php?cn='+'$class';
    </script>";
} else {
  echo "<script>
    alert('Could not add student.');
    window.location.href='../students.php?Could Not Register Student';
    </script>";
}


}

$conn->close();
?>