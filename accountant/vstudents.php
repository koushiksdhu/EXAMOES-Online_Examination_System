<?php 
include 'includes/check_user.php'; 
if (isset($_GET['cn'])) {
include '../database/config.php';
$class = $_GET['cn'];
    
 $sql = "SELECT * FROM tbl_users WHERE role = 'student' AND class='$class'";
    $class = mysqli_real_escape_string($conn, $_GET['class']);
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $class = $row['class'];
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
        
       <title>Students List - Class: <?php echo "$class"; ?></title>
        
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
                        <li class="active"><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Students</p></a></li>


                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3><b>Students List - Class: </b><td><b><?php echo "$class"; ?></b></td></h3>



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
			
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Students</a></li>
										
												
						

                                            </ul>
                                    
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                           <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM tbl_users WHERE role = 'student' AND class='$class'";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Class</th>
                                                <th>Section</th>
                                                <th>Roll No.</th>
                                                <th>Student ID</th>
                                                <th>Fee</th> 
                                                <th>Fee Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Roll No.</th>
                                                <th>Student ID</th>
                                                <th>Fee</th> 
                                                <th>Fee Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {
											   
                                          print '
										       <tr>
                                                <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                                                <td>'.$row['class'].'</td>
                                                <td>'.$row['section'].'</td>
                                                <td>'.$row['roll'].'</td>
                                                <td>'.$row['user_id'].'</td>
                                                <td><button type="button" class="btn btn-success" aria-expanded="false"><a'; ?> <?php print ' href="pages/paid.php?sd='.$row['user_id'].'">Paid</a></button>
                                                
                                                
                                                <button type="button" class="btn btn-danger" aria-expanded="false"><a'; ?> <?php print ' href="pages/unpaid.php?sd='.$row['user_id'].'">Unpaid</a></button></td>

                                                <td>'.$row['fees'].'</td>
                                                
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        <em> No Students Found. </em>
                                    </div>';
    
                                           }
                                           $conn->close();
										   
										   ?>


                 

                                    </div>
                                                       
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                         <form action="pages/add_student.php" method="POST">
										<div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter first name" name="fname" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter last name" name="lname" required autocomplete="off">
                                        </div>
										<div class="form-group">
										  <label for="exampleInputEmail1">Male</label>
                                            <input type="radio"  name="gender" value="Male" required>
                                            <label for="exampleInputEmail1">Female</label>
                                            <input type="radio" name="gender" value="Female" required>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Email Address</label>
                                            <input type="email" class="form-control" placeholder="Enter email address" name="email" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text" class="form-control" placeholder="Enter phone" name="phone" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Select Academic Year</label>
                                            <select class="form-control" name="ay" required>
											<option value="" selected disabled>-- Select A.Y. -</option>
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
                                            <label for="exampleInputEmail1">Select Class</label>
                                            <select class="form-control" name="class" required>
											<option value="" selected disabled>-- Select Class-</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT name FROM tbl_classes";
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
                                            <label for="exampleInputEmail1">Select Section</label>
                                            <select class="form-control" name="section" required>
											<option value="" selected disabled>-- Select Section-</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT section FROM tbl_section";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            print '<option value="'.$row['section'].'">'.$row['section'].'</option>';
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
									<div class="form-group">
                                    <label >Date of Birth</label>
                                    <input type="text" class="form-control date-picker" name="dob" required autocomplete="off" placeholder="Select date of birth">
                                    </div>
									
									<div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea style="resize: none;" rows="4" class="form-control" placeholder="Enter address" name="address" required autocomplete="off"></textarea>
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