<?php 
include 'includes/check_user.php'; 
?>
<!DOCTYPE html>
<html>
   
<head>
        
        <title>Manage Subjects</title>
        
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
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
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
                                

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo "$myfname"; ?><i class="fa fa-angle-down"></i></span>
										
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                                        
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
                        <li class="active"><a href="subject.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-file"></span><p>Subjects</p></a></li>
                        <li><a href="accountant.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Accountant</p></a></li>
                        <li><a href="teacher.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Teachers</p></a></li>
                        <li><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Students</p></a></li>
                        <li><a href="classexamination.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list-alt"></span><p>Examinations</p></a></li>
                        <li><a href="classresults.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-credit-card"></span><p>Exam Results</p></a></li>
                        <li><a href="notice.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-comment"></span><p>Notice</p></a></li>
                        <li><a href="blockclassstd.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-eye-close"></span><p>Block Student</p></a></li>
                        

                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Manage Subjects</h3>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div role="tabpanel">
                                   
                                            <ul class="nav nav-tabs" role="tablist">
			
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Subjects</a></li>
                                                <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Add Subjects</a></li>										
												
						

                                            </ul>
                                    
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                           <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM tbl_subjects";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												
												                                            
                                                
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												
												                                        
                                                
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {
											  
                                          print '
										       <tr>
                                                <td>'.$row['name'].'</td>
												
                                                                                      
												
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default" aria-expanded="false"><a'; ?> <?php print ' href="pages/drop_sb.php?id='.$row['subject_id'].'">Delete</a></button>
                                               
                                            </div></td>
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        <em>No Subjects Found.</em>
                                    </div>';
    
                                           }
                                           $conn->close();
										   
										   ?>


                 

                                    </div>
                                                       
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                         <form action="pages/add_subject.php" method="POST">

										<div class="form-group">
                                            <label for="exampleInputEmail1">Select Academic Year</label>
                                            <select class="form-control" name="ay" required>
											<option value="" selected disabled>-- Select A.Y. --</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT name FROM tbl_acad";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputEmail1">Subject Name</label>
                                            <input type="text" class="form-control" placeholder="Enter subject name" name="subject" required autocomplete="off">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>  
  
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
                
            </div>
            <!--<div class="oes">Designed and Developed by Koushik Sadhu &amp; Nishikant Mandal.</div>-->
        </main>

        

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
		

    </body>

</html>