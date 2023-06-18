<!--EXAMINATION PAGE-->
<?php 
date_default_timezone_set('Africa/Dar_es_salaam');
include 'includes/check_user.php'; 

include '../includes/uniques.php';  // create random unique numbers
if (isset($_SESSION['current_examid'])) {   // exam_id from the take_assessment page
include '../database/config.php';
$exam_id = $_SESSION['current_examid'];	
$retake_status = $_SESSION['student_retake'];   

if ($retake_status == "1") {    // if there is 1 then the student already took the exam before.
$sql = "DELETE FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";

if ($conn->query($sql) === TRUE) {

} else {

}	
}


$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND class = '$myclass' AND status = 'Active'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name =$row['exam_name'];
	$subject = $row['subject'];
	$deadline = $row['date'];
	$duration = $row['duration'];
	$passmark = $row['passmark'];
    $f_marks=$row['full_marks'];
	$reexam = $row['re_exam'];
	$myclass = $row['class'];
	$status = $row['status'];
	$today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
	
	$today_date = date('m/d/Y');
    }
} else {
header("location:./");	
}
}else{
header("location:./");	
}



$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";   // this id comes from check_user page
// Koushik Updated
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // if the student already took the exam, then it redirects the take_assessment page
    while($row = $result->fetch_assoc()) {
    header("location:./take-assessment.php?id=$exam_id");
    
    }
} else {    // if not, then it creates a new record(student) in the assessment_record 
$myname = "$myfname $mylname";
$recid = 'RS'.get_rand_numbers(14).'';  // creates a record id of the student

$sql = "INSERT INTO tbl_assessment_records (record_id, student_id, student_name, class, section, roll, exam_name, exam_id, subject ,score, status, next_retake, date, fstatus)
VALUES ('$recid', '$myid', '$myname','$myclass', '$mysection', '$myroll', '$exam_name', '$exam_id','$subject', '0', 'FAIL', '$next_retake', '$today_date', '$myfees')";   // default values

if ($conn->query($sql) === TRUE) {

} else {

}

}

?>
<!DOCTYPE html>
<html>
    
<head>
        
    
        <title>Examination</title>
        
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!--Internet requires-->
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        

        
    </head>
	<body class="page-header-fixed page-horizontal-bar" >
        <div class="overlay"></div>
        
        

        <main class="page-content content-wrap container">
            <div class="navbar">
                <!--<div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>-->
                    <div class="logo-box">  <!--this is for the quiz-time-->
                        <a class="logo-text"><span><div id="quiz-time-left"></div></span></a>
                    </div>

                    <div class="topmenu-outer">
                        <div class="top-menu">
						 <ul class="nav navbar-nav navbar-left">


                            </ul>
                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="logout.php" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                    </a>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="horizontal-bar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        
                    </div>
                    <ul class="menu accordion-menu">
                        <li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li><a href="examinations.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list-alt"></span><p>Examinations</p></a></li>
                        <li><a href="results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-credit-card"></span><p>Exam Results</p></a></li>

                    </ul>
                </div>
            </div>-->
            <div class="page-inner">
                <div class="page-title">
                    <h3><?php echo "$exam_name" ?> Examination</h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                   
                                <div class="panel panel-white">
                                    <div class="panel-body">

                                        <div class="tabs-below" role="tabpanel">
                                        <div class="tab-content">
                                         <h1 style="text-align:center;"><b>EXAMOES</b></h1>
                                         <h2 style="text-align:center;"><?php echo "$exam_name" ?></h2>
                                         <h5  style="text-align:left;">Full Marks: <?php echo"$f_marks"?>  </h5>  
                                         <h5  style="text-align:left;">Duration: <?php echo "$duration"?> Minutes</h5>
                                         <h5  style="text-align:left;">Subject: <?php echo "$subject"?></h5>
                                         <div class= "nav nav-tabs"></div>
                                         <div class= "nav nav-tabs"></div>
                                         <h4 style="text-align:center;"><b><em>General Instructions</em></b></h4>
                                         <p style="font-size:15px;"><em> 1 .You must not REFRESH the page once you start your exam.</em></p>
                                        <p style="font-size:15px;"> <em>2. You must not change tab while giving examination. </em></p>
                                        <p style="font-size:15px;"> <em>3. Performing any of the above task will SUBMIT your exam automatically, AWARDING you with 0 (Zero) MARKS.</em></p>
                                        <p style="font-size:15px;"> <em>4. Exam will get auto submitted once the time is over.</em></p>
                                        <p style="font-size:15px;"> <em>5. You can also submit your exam before time by clicking on submit button.</em></p>
                                        <p style="text-align : center;"><b> IN CASE ANY PROBLEM OCCURS YOU MUST DIRECTLY CONTACT ADMIN.<b></p>
                                        <div class= "nav nav-tabs"></div>
                                         <div class= "nav nav-tabs"></div>
                                         <div class= "nav nav-tabs"></div>
                                         <div class= "nav nav-tabs"></div>
                                         </div>


                                       <form action="pages/submit_assessment.php" method="POST" onsubmit="setFormSubmitting()" name="quiz" id="quiz_form" >
                                            <div class="tab-content">
											<?php 
											include '../database/config.php';
                                            $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id' ORDER BY rand()";
                                            // fetch questions corresponding to exam_id
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            $qno = 1;
                                            while($row = $result->fetch_assoc()) {
												$qsid = $row['question_id'];
												$qs = $row['question'];
												$type = $row['type'];
                                                $qmarks=$row['Qmarks'];
												$op1 = $row['option1'];
												$op2 = $row['option2'];
												$op3 = $row['option3'];
												$op4 = $row['option4'];
												$ans = $row['answer'];
												$enan = $row[$ans];
                                            if ($type == "FB") {    // this part will not execute, only MC will execute
											if ($qno == "1") {
											print '
											<div role="tabpanel" class="tab-content" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="an'.$qno.'"  class="form-control" placeholder="Enter your answer" autocomplete="off">
                                             <input type="hidden" name="qst'.$qno.'" value="'.base64_encode($qs).'">
											 <input type="hidden" name="ran'.$qno.'" value="'.base64_encode($ans).'">
                                             </div>
											';	
											}else{
											print '
											<div role="tabpanel" class="tab-content" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="an'.$qno.'"  class="form-control" placeholder="Enter your answer" autocomplete="off">
					                         <input type="hidden" name="qst'.$qno.'" value="'.base64_encode($qs).'">
											 <input type="hidden" name="ran'.$qno.'" value="'.base64_encode($ans).'">
                                             </div>
											';		
											}

											$qno = $qno + 1;	
											}else{  // here the type is MC, this will execute
											
											if ($qno == "1") {  // if the question number is 1, then execute this

											print '
											<div role="tabpanel" class="tab-content" id="tab'.$qno.'">
                                            <p class ="block" style= "font-size: 17px;"><b>Q.'.$qno.'.</b> '.$qs.'</p>
                                            <p style="text-align:right;z">[<b> Marks '.$qmarks.'</b>]</p>
                                            <br>
											 <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op1.'"> '.$op1.'<span class="checkmark"></span></p></label>
                                             <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op2.'"> '.$op2.'<span class="checkmark"></span></p></label>
                                             <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op3.'"> '.$op3.'<span class="checkmark"></span></p></label>
                                             <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op4.'"> '.$op4.'<span class="checkmark"></span></p></label>
											 <input type="hidden" name="qst'.$qno.'" value="'.base64_encode($qs).'">
											 <input type="hidden" name="ran'.$qno.'" value="'.base64_encode($enan).'">
                                             <br>
                                             <div class= "nav nav-tabs"></div>
                                             </div>
											';	
											}else{  // if the question number is different. 
											print '
											<div role="tabpanel" class="tab-content" id="tab'.$qno.'">
                                            <p class ="block" style= "font-size: 17px;"><b>Q.'.$qno.'.</b> '.$qs.'</p>
                                            <p style="text-align:right;z">[<b> Marks '.$qmarks.'</b>]</p>
                                            <br>
											 <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op1.'"> '.$op1.'<span class="checkmark"></span></p></label>
                                             <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op2.'"> '.$op2.'<span class="checkmark"></span></p></label>
                                             <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op3.'"> '.$op3.'<span class="checkmark"></span></p></label>
                                             <label class="container"><input type="radio" name="an'.$qno.'"  value="'.$op4.'"> '.$op4.'<span class="checkmark"></span></p></label>
											 <input type="hidden" name="qst'.$qno.'" value="'.base64_encode($qs).'">
											 <input type="hidden" name="ran'.$qno.'" value="'.base64_encode($enan).'">
                                             <br>
                                             <div class= "nav nav-tabs"></div>
                                             </div>
											';		
											}

											$qno = $qno + 1;	  

											
											}

                                            }
                                            } else {
 
                                            }
											
											?>

                                            </div>

                                            <style>
                                            /* The container */
.container {
	display: block;
	position: relative;
	padding-left: 0;
	margin-bottom: 0;
	cursor: pointer;
	font-size: 16px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
  }
  
  /* Hide the browser's default radio button */
  .container input {
	position: absolute;
	opacity: 0;
	cursor: pointer;
  }
  
  /* Create a custom radio button */
  .checkmark {
	position: absolute;
	top: 0;
	left: 0;
	background-color: #eee;
	border-radius: 50%;
    border: 0px;
    width: 0px;
    height: 0px;
  }
  
  /* On mouse-over, add a grey background color */
  .container:hover input ~ .checkmark {
	background-color: #2196F3c;
  }
  
  /* When the radio button is checked, add a blue background */
  .container input:checked ~ 
  .checkmark {
	background-color: #2196F3;
  }
  
  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
	content: "";
	position: absolute;
	display: none;
  }
  
  /* Show the indicator (dot/circle) when checked */
  .container input:checked ~ .checkmark:after {
	display: block;
  }
  
  /* Style the indicator (dot/circle) */
  .container .checkmark:after {
	   top: 0;
	  left: 0;
	  width: 0;
	  height: 0;
	  border-radius: 50%;
	  background: white;
  }
  </style>
                 
											
                                            <ul class="nav nav-tabs" role="tablist">
											<?php 
											include '../database/config.php';
                                            $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
                                            // fetch all the questions
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            $qno = 1;
											$total_questions = 0;
                                            while($row = $result->fetch_assoc()) {
											$total_questions++; 
											/*if ($qno == "1") {
											print '<li role="presentation" class="active"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">'.$qno.'</a></li>';	
											}else{
											print '<li role="presentation"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">'.$qno.'</a></li>';		
											}*/

											$qno = $qno + 1;
                                            }
                                            } else {
 
                                            }
											
											?>
                                            <input type="hidden" name="tq" value="<?php echo "$total_questions"; ?>">   <!--How many questions are attempt-->
											<input type="hidden" name="eid" value="<?php echo "$exam_id"; ?>"> <!--Exam ID of the current examination-->
											<input type="hidden" name="pm" value="<?php echo "$passmark"; ?>">  <!--Passmark of the current exam-->
                                            <input type="hidden" name="qm" value="<?php echo "$qmarks"; ?>"> 
											<input type="hidden" name="ri" value="<?php echo "$recid"; ?>"> <!--Record ID of the Current Exam, Based on this the score will be stored into the database-->
											
                                            </ul>
											

                                        </div>
                                        
                                        <br><input onclick="return confirm('Are you sure you want to Submit your Exam  ?')" class="btn btn-success" type="submit" value="Submit Exam">
                                        <button type="submit"  class="btn btn-success" >Submit Exam</button>
                                            
											</form>
                                           
<!-- Css: Disable Text Selection- NKM-->
<style type="text/css">
 .block{
    -webkit-user-select: none;
    -moz-user-select: none;
    -moz-user-select: none;
    -user-select: none;
}
</style>
                </div>
                
            </div>

        </main>
		
?>
        <div class="cd-overlay"></div>
	

        <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        
        
				
<!--Select disable code for preventing cut copy paste and selecting questions------nishi kant mandal-->

<script type ="text/javascript">
$document.ready(function(){
    $('block').bind('cut copy paste', function(e){
        e.preventDefault();
    })
    $('block').on("contextmenu",function(e){
        return false;
    })
})
</script>
<!--TIMER-->
<script type="text/javascript">
var max_time = <?php echo "$duration" ?>;
var c_seconds  = 0;
var total_seconds =60*max_time;
max_time = parseInt(total_seconds/60);
c_seconds = parseInt(total_seconds%60);
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + 'Min';
function init(){
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + ' Min';
setTimeout("CheckTime()",999);
}
function CheckTime(){
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + ' Min' ;
if(total_seconds <=0){
setTimeout('document.quiz.submit()',1);
    
    } else
    {
total_seconds = total_seconds -1;
max_time = parseInt(total_seconds/60);
c_seconds = parseInt(total_seconds%60);
setTimeout("CheckTime()",999);
}

}
init();
</script>

<!-- Refresh code KS-->
<script>
var formSubmitting = false;
var setFormSubmitting = function() { formSubmitting = true; setTimeout = true; };

window.onload = function() {
    window.addEventListener("beforeunload", function (e) {
        if (formSubmitting) {
            return undefined;
        }

        var confirmationMessage = 'If you Refresh the Page Your Exam will be Auto-Submitted'
                                + ',Awarding you with Zero Marks';

        (e || window.event).returnValue = confirmationMessage; //Gecko + IE
        return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
    });
};
</script> <!--Refresh code ends here-->

<!--Tab Change KS-->
<script>
var a=0;
document.addEventListener("visibilitychange", function() {
      document.title = document.hidden ? a++ : "online exam";
      if(!document.hidden){
      if(a<=2){
      alert("You have moved "+ a +" times from the Exam window. You are not allowed to do this.");
      }
      else if(a==3){
      alert("We are watching you! You have moved "+ a +" times from the Exam window. You are not allowed to do this.\nThis is the Final Warning for you.");
      }
      else if(a==4)
      {
        alert("You are moving away from the browser too many times. Your Exam has been Submitted.");
        setTimeout('document.quiz.submit()',4);
      }
      else{}
    }
      else{}

});
</script><!--Tab change code ends here-->
    </body>
</html>


