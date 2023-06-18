<!--this page is responsible for login access, both student and admin section-->
<?php
include '../database/config.php';
$myusername = mysqli_real_escape_string($conn, $_POST['user']);
$mypassword = ($_POST['login']);

$sql = "SELECT * FROM tbl_users WHERE user_id = '$myusername' AND login = '$mypassword' OR email = '$myusername' AND login = '$mypassword' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    session_start();
	$_SESSION['login'] = true;
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['last_name'] = $row['last_name'];
	$_SESSION['gender'] = $row['gender'];
	$_SESSION['dob'] = $row['dob'];
	$_SESSION['address'] = $row['address'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['phone'] = $row['phone'];
	$_SESSION['ay'] = $row['ay'];
	$_SESSION['role'] = $row['role'];
	$_SESSION['myid'] = $row['user_id'];
	$_SESSION['myclass'] = $row['class'];
	$_SESSION['mysection'] = $row['section'];
	$_SESSION['myroll'] = $row['roll'];
	$_SESSION['myfees'] = $row['fees'];
	$accstat = $row['acc_stat'];	// active
	if ($accstat == 'Inactive') {	// disable
	 echo "<script>
	 alert('Your account has been Blocked by the School Administration. Contact School for more info.');
	 window.location.href='../?display=YOUR ACCOUNT HAS BEEN DISABLED';
	 </script>";
	}else{
		$location = strtolower($row['role']);
	header("location:../$location/");
	//Current Date Time for login
	$update="UPDATE tbl_users set last_login=now() where user_id= '$myusername'";
	$result1 = $conn->query($update);
	
	function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}

	if(isMobileDevice()){
		$update1="UPDATE tbl_users set login_device='Android' where user_id= '$myusername'";
		$result1 = $conn->query($update1);
    	
	}
	else {
    	$update1="UPDATE tbl_users set login_device='Desktop/Laptop' where user_id= '$myusername'";
		$result1 = $conn->query($update1);
	}
	
	}

    }
} else {	// wrong user id password
	echo "<script>
    alert('Wrong USER ID and Password.');
    window.location.href='../login.php?display=WRONG STUDENT ID AND PASSWORD';
    </script>";
}
$conn->close();

?>