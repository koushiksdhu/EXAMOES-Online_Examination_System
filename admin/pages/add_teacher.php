<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';	
$teacher_id = 'TCHR'.get_rand_numbers(4);	// TEACHER ID
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);


$sql = "SELECT * FROM tbl_teacher WHERE email = '$email' OR phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $tem = $row['email'];
	$tph = $row['phone'];
	if ($tem == $email) {	// checks same or not
	 echo "<script>
	 alert('Teacher with Email ID ('+ '$tem' + ') already exist.');
	 window.location.href='../teacher.php?Duplicate Email ID Found';
	 </script>";	
	}else{
	
	if ($tph == $phone) {	// checks same or not
	 echo "<script>
    alert('Teacher with Phone Number ('+ '$tph' + ') already exist.');
    window.location.href='../teacher.php?Duplicate Phone Number Found';
    </script>";	
	}else{
		
	}
	
	}
	
    }
} else {
//	insert the new value
$sql = "INSERT INTO tbl_teacher (teacher_id, first_name, last_name, gender, dob, address, email, phone)
VALUES ('$teacher_id', '$fname', '$lname', '$gender', '$dob', '$address', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
  echo "<script>
    alert('Teacher added successfully. TEACHER ID: '+'$teacher_id');
    window.location.href='../teacher.php?Added Successfully';
    </script>";
} else {
  echo "<script>
    alert('Could not add teacher.');
    window.location.href='../teacher.php?Could Not Register Teacher';
    </script>";
}


}

$conn->close();
?>