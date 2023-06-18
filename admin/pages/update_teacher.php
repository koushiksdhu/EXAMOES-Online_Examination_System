<?php
$teacher_id = $_POST['teacher_id'];	// this id is fetched from teacher.php page
include '../../database/config.php';
//	fetched from teacher.php page & stored into variable.
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

//	basically this query checks whether the existing data is same or not.
$sql = "SELECT * FROM tbl_teacher WHERE email = '$email' AND teacher_id !='$teacher_id' OR phone = '$phone' AND teacher_id !='$teacher_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $tem = $row['email'];	
	$tph = $row['phone'];
	if ($tem == $email) {		// if the email is same
	 echo "<script>
	 alert('Teacher with Email ID ('+ '$tem' + ') already exist.');
	 window.location.href='../edit-teacher.php?Duplicate Email ID Found!!&tid=$teacher_id';
	 </script>";	
	}else{
	
	if ($tph == $phone) {	// duplicate phone no found
	 echo "<script>
    alert('Teacher with Phone Number ('+ '$tph' + ') already exist.');
    window.location.href='../edit-teacher.php?Duplicate Phone Number Found!!!&tid=$teacher_id';
    </script>";		
	}else{
		
	}
	
	}
	
    }
} else {
	// this query update the new data from edit-teacher.php page
$sql = "UPDATE tbl_teacher SET first_name = '$fname', last_name = '$lname', gender = '$gender', dob = '$dob', address = '$address', email = '$email', phone = '$phone' WHERE teacher_id='$teacher_id'";

if ($conn->query($sql) === TRUE) {
  echo "<script>
    alert('Teacher updated successfully. TEACHER ID: '+'$teacher_id');
    window.location.href='../teacher.php?Added Successfully';
    </script>";
} else {
  echo "<script>
    alert('Could not add teacher.');
    window.location.href='../edit-teacher.php?Could Not Apply Settings&tid=$teacher_id';
    </script>";
}


}

$conn->close();
?>