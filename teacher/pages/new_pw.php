<!--Password Update-->
<?php
include '../includes/check_user.php';   // teacher details
include '../../database/config.php';

$new_password = ($_POST['pass3']);  // this password comes from the profile.php page

$sql = "UPDATE tbl_teacher SET login='$new_password' WHERE teacher_id='$mytid'";
// store it into the database 
if ($conn->query($sql) === TRUE) {
   echo "<script>
    alert('Password has been changed.');
    window.location.href='../profile.php?display=PASSWORD HAS BEEN CHANGED';
    </script>";
   // if the query execute successfully then this msg will occur in the url
} else {
   echo "<script>
    alert('Something went wrong.');
    window.location.href='../profile.php?rp=SOMETHING WENT WRONG';
    </script>";
}

$conn->close();
?>
