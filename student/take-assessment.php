
<?php include 'includes/check_user.php';

if (isset($_GET['id'])) {   // fetch exam id from url
include '../database/config.php';	
$exam_id = mysqli_real_escape_string($conn, $_GET['id']);
$record_found = 0;
$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND class = '$myclass'"; // Class
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
	$subject = $row['subject'];
	$exam_name = $row['exam_name'];
	$deadline = $row['date'];
	$duration = $row['duration'];
	$passmark = $row['passmark'];
    $fmarks=$row['full_marks'];
	$reexam = $row['re_exam'];
	$status = $row['status'];
	$today_date = date('Y/m/d');    
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));  
	$dcv = date_format(date_create_from_format('m/d/Y', $deadline), 'Y/m/d');
	

	if ($status == "Inactive") {
	header("location:./");	
	}
    }
} else {
header("location:./");	
}
$quest = 0; // question
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'"; // fetch all the question 

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $quest++;   // store the question one after another into this var
    }
} else {

}


$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $record_found = 1;
	$score = $row['score'];
	$status = $row['status'];
	$take_date = $row['date'];
	$retake_date = $row['next_retake'];
    
    $subject = $row['subject'];
        
	$today_date = date('Y/m/d');    
	$retakeconv = date_format(date_create_from_format('m/d/Y', $retake_date), 'Y/m/d'); // convert the date format
    $tc = strtotime($today_date); // this returns time into seconds
	$rc = strtotime($retakeconv);  
	$dc = strtotime($dcv);
    $td = ($tc - $rc)/86400;    
	$dcc = ($tc - $dc)/86400;   
	
    }
} else {
    
}


$conn->close();
}else{

header("location:./");	
}

 ?>
<!DOCTYPE html>
<html>
    
<head>
        
        <title>Take Examinations</title>
        
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
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <!-- <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/> -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        

        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                   

                    <div class="topmenu-outer">
                        <div class="top-menu">
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
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                   
                    <ul class="menu accordion-menu">
                        <li><a href="Dashboard.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li><a href="profile.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-lock"></span><p>My Profile</p></a></li>

                        <li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list-alt"></span><p>My Examinations</p></a></li>
                        <li><a href="results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-credit-card"></span><p>Exam Results</p></a></li>

                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <!--<h3 style="text-align : center;"><b>ST. JOSEPH'S SCHOOL, DUMKA</b></h3>-->
            
                </div>
                <div id="main-wrapper">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                          
                                <div class="row">
                           <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Examination Details</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats">  
                                       <table class="table">
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <th scope="row"></th>
                                                   <td>Exam Name:</td>
                                                   <td><?php echo "$exam_name"; ?></td>
                                               </tr>
											     <tr>
                                                   <th scope="row"></th>
                                                   <td>Subject:</td>
                                                   <td><?php echo "$subject"; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row"></th>
                                                   <td>Exam Date:</td>
                                                   <td><?php echo "$deadline"; ?></td>
                                               </tr>
											   
											    <tr>
                                                   <th scope="row"></th>
                                                   <td>Duration:</td>
                                                   <td><?php echo "$duration"; ?> Minutes</td>
                                               </tr>
                                               <tr>
                                                   <th scope="row"></th>
                                                   <td>Fullmarks:</td>
                                                   <td><?php echo "$fmarks";?></td>
                                               </tr>
											   
											  
												   
											
											   
											   <tr>
                                                   <th scope="row"></th>
                                                   <td>Passmarks:</td>
                                                   <td><?php echo "$passmark"; ?></td>
                                               </tr>
											   
											   	<tr>
                                                   <th scope="row"></th>
                                                   <td>Questions:</td>
                                                   <td><?php echo "$quest"; ?></td>
                                               </tr>
                                              
                                              
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
   
                                </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Examination Guidelines</h3>
                                </div>
                                <div class="panel-body">
                                <?php
                                print'<div class="alert alert-danger" role="alert">
                                  <p> 1 .You must not REFRESH the page once you start your exam.</p>
                                  <p> 2. You must not change tab while giving examination. </p>
                                  <p> 3. Performing any of the above task will SUBMIT your exam automatically, AWARDING you with 0 (Zero) MARKS.</p>
                                  <p> 4. Exam will get auto submitted once the time is over.</p>
                                  <p> 5. You can also submit your exam before time by clicking on submit button.</p>
                                  <p style="text-align : center;"><b> IN CASE ANY PROBLEM OCCURS YOU MUST DIRECTLY CONTACT ADMIN.<b></p>
                                  <br>
                                  <p style="text-align : center;"><em> !!!! BEST OF LUCK FOR YOUR EXAMINATION !!!!<em></p>
                                    </div>';
                                ?>
                                </div>
                                </div>
                                </div>
						
                           
						
						<div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Examination</h3>
                                </div>
                                <div class="panel-body">
								<?php
								if ($record_found == "1") {
									
								if ($td >= 0){
									
								if ($dcc > 1){  // if the deadline of the exam is above 1, then it shows
								print '
								<div class="alert alert-warning" role="alert">
                                The exam is already expired.
                                </div>';
								}else{
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 1;    // if the student already took the exam, and waits for re-take the exam, then it holds 1
                                
								print '
                                 <div class="alert alert-success" role="alert">
                                  You Exam is Submitted.
                                    </div>

									'; /*?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php">Retake Assessment</a>
									
									<?php	*/
								}
                                
								}  // when td equals to minus then it shows
                                
                               /* print '
								<div class="alert alert-warning" role="alert">
                                You will be able to retake this exam on '.$retake_date.'
                                </div>';*/
                               
																
									
								}else{  // when there is no records found in assessment_records database of that student
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 0;
								print '
                                 <div class="alert alert-success" role="alert">You are ready to start for your exam.
                                    </div>

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php"><b>Start Examination</b></a>
									
									<?php
                  									
									
								}
								
								?>

									
                                </div>
                            </div>
                        </div>
						
						

                </div>
                
            </div>
        </main>

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
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
       
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="../assets/js/modern.js"></script>

		<script src="../assets/js/canvasjs.min.js"></script>
		 

        
    </body>


</html>