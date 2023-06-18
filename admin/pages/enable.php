<?php
include '../../database/config.php';


$class = mysqli_real_escape_string($conn, $_GET['cn']);
$student_id = $_GET['sd'];
$student_id = mysqli_real_escape_string($conn, $_GET['sd']);



$sql = "UPDATE tbl_users SET acc_stat='Active' WHERE user_id='$student_id'";
if ($conn->query($sql) === TRUE) {
    $sql = "SELECT class from tbl_users WHERE user_id='$student_id'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $class =$row['class'];}
    }else {
    }
    echo "<script>
    window.location.href='../blockstd.php?cn='+'$class';
    </script>";
    
    } else {
        echo "<script>
    alert('Something went wrong.');
    window.location.href='../blockstd.php?cn='+'$class';
    </script>";
    }
    
    $conn->close();
?>
