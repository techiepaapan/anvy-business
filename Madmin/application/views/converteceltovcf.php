<?php 
include 'sessioncheck.php';
include 'dbconnection.php';

?>

<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<title></title>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?php echo base_url();?>css/lines.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet"> 
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<!--<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.js"></script> -->
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="<?php echo base_url();?>js/d3.v3.js"></script>
<script src="<?php echo base_url();?>js/rickshaw.js"></script>
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
                <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo.png"> <span class="logo-new">ANVY BUSINESS</span></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="<?php echo base_url();?>images/1.png"><span >ADMIN</span></a>
	        		<ul class="dropdown-menu">	
						<li class="m_2"><a href="<?php echo base_url();?>welcome/changepassword"><i class="fa fa-user"></i>Change Password</a></li>
						<li class="m_2"><a href="<?php echo base_url();?>welcome/login"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
			<?php include 'menu.php';?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
        <div class="graphs">
     	
		<div class="col-xs-12 col-sm-12 col-md-12 product-head">
			<div class="container">
				<h2>CONVERT EXCEL TO VCF</h2>
			</div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cart">
			<div class="container">
				<form method="post" action="<?php echo base_url();?>welcome/doexporttovcf" enctype="multipart/form-data">
				
				<div clss="col-xs-12 col-sm-12 col-md-12 col-lg-12 cart">
				Demo Excel Format:
				<table class="table table-bordered" style="margin-bottom: 5px;border: 0px;">
					<tbody>
						<tr>
							<td>Name</td>
							<td>Mobile</td>
							<td>Email</td>
						</tr>
						<tr>
							<td>yahkoob ap</td>
							<td>9847347809</td>
							<td>yahkoobap@gmail.com</td>
						</tr>
						<tr>
							<td>yahkoob ap</td>
							<td>9847347809</td>
							<td>yahkoobap@gmail.com</td>
						</tr>
					</tbody>
				</table>
				
				<p style="color: #ff3535;font-size: 12px;margin: 10px;">First field(heading) is necessary.</p>
				</div>
				<div clss="col-xs-12 col-sm-12 col-md-12 col-lg-12 cart">
					<input type="file" name="userfile" id="userfile">
				</div>
				<div clss="col-xs-12 col-sm-12 col-md-12 col-lg-12 cart" style="margin-top:10px;">
					<input type="submit" name="submit" value="Submit">
				</div>
				
				
				</form>
				
				
			</div>
		</div>
		
		
	  <div class="span_11" style="display:none;">
		<div class="col-md-6 col_4">
		  <div class="map_container"><div id="vmap" style="width: 100%; height: 400px;"></div></div>
		  <!----Calender -------->
			<link rel="stylesheet" href="<?php echo base_url();?>css/clndr.css" type="text/css" />
			<script src="<?php echo base_url();?>js/underscore-min.js" type="text/javascript"></script>
			<script src= "<?php echo base_url();?>js/moment-2.2.1.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>js/clndr.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>js/site.js" type="text/javascript"></script>
			<!----End Calender -------->
		</div>

       <div class="clearfix"> </div>
    </div>
 
		<div class="copy">
            <p>Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
</body>
</html>
