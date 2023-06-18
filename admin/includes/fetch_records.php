<?php
// Box present in the dashboard

include '../database/config.php';
// variables for box
$acad = 0;
$students = 0;
$examination = 0;
$subjects = 0;
$classes = 0;
$questions = 0;
$teachers=0;
$accountant=0;


$sql = "SELECT * FROM tbl_acad";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $acad++;    // counts the no of class.
    }
} else {

}

$sql = "SELECT * FROM tbl_users WHERE role = 'student'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $students++;
    }
} else {

}


$sql = "SELECT * FROM tbl_examinations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $examination++;
    }
} else {

}

$sql = "SELECT * FROM tbl_subjects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $subjects++;
    }
} else {

}

$sql = "SELECT * FROM tbl_classes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $classes++;
    }
} else {

}


$sql = "SELECT * FROM tbl_questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $questions++;
    }
} else {

}

$sql = "SELECT * FROM tbl_teacher WHERE role = 'teacher'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $teachers++;
    }
} else {

}
$sql = "SELECT * FROM tbl_teacher WHERE role = 'accountant'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $accountant++;
    }
} else {

}

$conn->close();
?>