<!--Password Update-->
<?php
include '../includes/check_user.php'; 
include '../../database/config.php';

$new_password = ($_POST['pass1']);  

$sql = "UPDATE tbl_users SET login='$new_password' WHERE user_id='$myid'"; 
if ($conn->query($sql) === TRUE) {
   echo "<script>
   alert('Password has been changed.');
   window.location.href='../profile.php?display=PASSWORD HAS BEEN CHANGED';
   </script>";

} else {
   echo "<script>
   alert('Something went wrong.');
   window.location.href='../profile.php?display=SOMETHING WENT WRONG';
   </script>";
}

$conn->close();
?>
