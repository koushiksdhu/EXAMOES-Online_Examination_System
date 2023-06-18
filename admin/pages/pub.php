<?php
include '../../database/config.php';


/*$exid = mysqli_real_escape_string($conn, $_GET['id']);*/
$class = $_GET['cn'];
$class = mysqli_real_escape_string($conn, $_GET['cn']);


$sql = "UPDATE tbl_assessment_records SET rstatus='Result Published' WHERE class='$class'";


if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Class '+'$class'+' Results Published.');
    window.location.href='../classresults.php?display=Result Published';
    </script>";

} else {
    echo "<script>
    alert('Something went wrong.');
    window.location.href='../classresults.php?display=Something Went Wrong';
    </script>";
}

$conn->close();
?>
