<?php 
include 'includes/check_user.php';

if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = $_GET['eid'];
$sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name = $row['exam_name'];
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
        
        <title><?php echo "$exam_name" ?> Results</title>
        
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
        <link href="../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
		<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <!-- <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/> -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
		

        <link href="../assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
        <!--DataTable--> 
        <link href="../assets/Datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/Datatable/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!--DataTable CSS Closes here-->
        
		

        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-right">
                               

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo "$myfname"; ?><i class="fa fa-angle-down"></i></span>
										
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
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
                        <li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li><a href="acad.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-tasks"></span><p>Academic Year</p></a></li>
                        <li><a href="classes.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-th-list"></span><p>Class</p></a></li>
                        <li><a href="subject.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-file"></span><p>Subjects</p></a></li>
                        <li><a href="accountant.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Accountant</p></a></li>
                        <li><a href="teacher.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Teachers</p></a></li>
                        <li><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Students</p></a></li>
                        <li><a href="classexamination.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list-alt"></span><p>Examinations</p></a></li>
                        <li class="active"><a href="classresults.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-credit-card"></span><p>Exam Results</p></a></li>
                        <li><a href="notice.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-comment"></span><p>Notice</p></a></li>
                        <li><a href="blockclassstd.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-eye-close"></span><p>Block Student</p></a></li>

                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3><?php echo "$exam_name" ?> Results</h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                                        <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id' order by student_name";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Exam Name</th>
                                                <th>Exam Date</th>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Roll No.</th>
                                                <th>Subject</th>
                                                <th>Marks</th>
                                                <th>Re-Exam</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Exam Name</th>
                                                <th>Exam Date</th>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Roll No.</th>
                                                <th>Subject</th>
                                                <th>Marks</th>
                                                <th>Re-Exam</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {
                                          print '
										       <tr>
                                                <td>'.$row['exam_name'].'</td>
                                                <td>'.$row['date'].'</td>
                                                <td>'.$row['student_id'].'</td>
                                                <td>'.$row['student_name'].'</td>
                                                <td>'.$row['class'].'</td>
                                                <td>'.$row['section'].'</td>
                                                <td>'.$row['roll'].'</td>
                                                <td>'.$row['subject'].'</td>
                                                <td><b>'.$row['score'].'</b></td>
                                                
                                                
												

                                            <td><button type="button" class="btn btn-success" aria-expanded="false"><a';?> onclick = "return confirm('Reactivate exam for <?php echo $row['student_name']; ?> ?')" <?php print ' href="pages/re-activate.php?rid='.$row['record_id'].'&eid='.$exam_id.'">Re-Exam</a></button></td> 
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        No Results Found.
                                    </div>';
    
                                           }
                                           $conn->close();
										   
										   ?>


                 

                                    </div>
                                    </div>
                                </div>  
  
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
                
            </div>
          <!--  <div class="oes">Designed and Developed by Koushik Sadhu &amp; Nishikant Mandal.</div>-->
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
        <script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
		<script src="../assets/plugins/select2/js/select2.min.js"></script>
        <script src="../assets/plugins/summernote-master/summernote.min.js"></script>
        <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="../assets/js/pages/form-elements.js"></script>
	    
        <!-- DataTable Javascript -->
        
        <script src="../assets/Datatable/jquery-3.5.1.js"></script>
        <script src="../assets/Datatable/jquery.dataTables.min.js"></script>
        <script src="../assets/Datatable/dataTables.buttons.min.js"></script>
        <script src="../assets/Datatable/jszip.min.js"></script>
        <script src="../assets/Datatable/pdfmake.min.js"></script>
        <script src="../assets/Datatable/vfs_fonts.js"></script>
        <script src="../assets/Datatable/buttons.html5.min.js"></script>
        <script src="../assets/Datatable/buttons.print.min.js"></script>

        <!-- DataTable Javascript Closes Here -->
        <script>
        $(document).ready(function() {
            $('#example').DataTable( {
            dom: 'Bfrtip',
                buttons: [
                         'csv', 'excel', 'pdf', 'print'
                         ]
                                    } );
                           } );
                                    </script>	
    </body>

</html>