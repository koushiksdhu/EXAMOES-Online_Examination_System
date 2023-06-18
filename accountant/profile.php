<?php include 'includes/check_user.php';
?>
<!DOCTYPE html>
<html>
    
<head>
        
        <title>Accountant Profile</title>
        
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
                        <li><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Students</p></a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3><td><b><?php echo "$myfname"; ?></b></td>'s  profile</h3>
                    
                </div>
                <div id="main-wrapper">
                      <div class="row">
                        <div class="col-md-12">
						<div class="row">
                           
							
							
									
                             </div></div></div>
                        
                </div>
                <div id="main-wrapper">
                      <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-5">

                                <div class="panel panel-white">
                                    
									<table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1.</th>
                                                <td>Accountant ID</td>
                                                <td><b><?php echo "$mytid"; ?></b></td>
                                             
                                            </tr>
                                            <tr>
                                                <th scope="row">2.</th>
                                                <td> Name</td>
                                                <td><b><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></b></td>
                                                
                                            </tr>
                                            
											<tr>
                                                <th scope="row">3.</th>
                                                <td>Gender</td>
                                                <td><b><?php echo "$mygender"; ?></b></td>
                                               
                                            </tr>
											<tr>
                                                <th scope="row">4.</th>
                                                <td>Date of birth</td>
                                                <td><b><?php echo "$mydob"; ?></b></td>
                                               
                                            </tr>
											<tr>
                                                <th scope="row">5.</th>
                                                <td>Address</td>
                                                <td colspan="2"><b><?php echo "$myaddress"; ?></b></td>
                                          
                                               
                                            </tr>
											<tr>
                                                <th scope="row">6.</th>
                                                <td>Email Address</td>
                                                <td><b><?php echo "$myemail"; ?></b></td>
                                               
                                            </tr>
											<tr>
                                                <th scope="row">7.</th>
                                                <td>Phone Number</td>
                                                <td><b><?php echo "$myphone"; ?></b></td>
                                               
                                            </tr>
											
                                        </tbody>
                                    </table>
                                </div>  
  
                            </div>
							
							 
							 
							 	<div class="col-md-7">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									<h3>Update login password</h3>
			                    <form action="pages/new_pw.php" method="POST">
								<div class="form-group">
                                <label for="exampleInputEmail1">Enter new password</label>
                                <input type="password" id="password" class="form-control" name="pass3" required placeholder="Enter new password">
                                </div>
								
								<div class="form-group">
                                <label for="exampleInputEmail1">Confirm new password</label>
                                <input type="password" id="confirm_password" class="form-control" name="pass4" required placeholder="Confirm new password">
                                </div>
								<button type="submit" class="btn btn-primary">Change Password</button>
								<script>
	                                        var password = document.getElementById("password")
                                           , confirm_password = document.getElementById("confirm_password");

                                           function validatePassword(){
                                            if(password.value != confirm_password.value) {
                                           confirm_password.setCustomValidity("Passwords Don't Match");
                                           } else {
                                           confirm_password.setCustomValidity('');
                                            }
                                               }

                                            password.onchange = validatePassword;
                                            confirm_password.onkeyup = validatePassword;
                                 </script>
								</form>
									
                             </div></div></div>
							
							
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