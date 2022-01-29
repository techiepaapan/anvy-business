<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.min.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
      <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Modern</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"><span >ADMIN</span></a>
	        		<ul class="dropdown-menu">	
						<li class="m_2"><a href="#"><i class="fa fa-user"></i> Change Password</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw nav_icon"></i>User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add-user.html">Add User</a>
                                </li>
								<li>
                                    <a href="edit-user.html">Edit User</a>
                                </li>
								<li>
                                    <a href="activate-user.html">Activate User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-key fa-fw nav_icon"></i>PIN<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                   <a href="add-pin.html">Add Pin</a>
                                </li>
								<li>
                                    <a href="edit-pin.html">Edit Pin</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-credit-card fa-fw nav_icon"></i>Pay Out<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="binary.html">Binary </a>
                                </li>
								<li>
                                    <a href="referal.html">Referal</a>
                                </li>
								<li>
                                    <a href="indirect-referal.html">Indirect Referal</a>
                                </li>
								<li>
                                    <a href="repurchaceIncome.html">Re-purchase Income</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw nav_icon"></i>Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add-product.html">Add Product </a>
                                </li>
								<li>
                                    <a href="edit-product.html">Edit Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cogs fa-fw nav_icon"></i>Settings</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Change Password</h3>
  	    <div class="well1 white">
        <form class="form-floating">
          <fieldset>
            <div class="form-group cpass">
              <label class="control-label" for="current_password">Current Password</label>
              <input type="password" class="form-control1" id="current_password">
            </div>
			 <div class="form-group npass">
              <label class="control-label" for="new_password">New Password</label>
              <input type="password" class="form-control1" id="new_password">
            </div>
			<div class="form-group cfmpass">
              <label class="control-label" for="confirm_password">Confirm Password</label>
              <input type="password" class="form-control1" id="confirm_password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="submitt">Submit</button>
              
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="copy_layout">
      <p>Copyright &copy; 2017 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">Adhoc</a> </p>
   </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
