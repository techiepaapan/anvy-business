
<?php 
include 'sessioncheck.php';
include 'dbconnection.php';

$qry=mysqli_query($connect,"select re_product_id,product_name from repurchase_product order by re_product_id desc");
?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet"> 
<link href="<?php echo base_url();?>css/alertify.core.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/alertify.default.css" rel="stylesheet" type="text/css" /> 
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/push.js?n=1"></script>
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
						<li class="m_2"><a href="#"><i class="fa fa-lock"></i> Logout</a></li>	
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
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>PUSH NOTIFICATION</h3>
  	    <div class="well1 white">
        
         <div class="form-floating">
          <fieldset>
          <div class="col-sm-12 reset-level-one">
            <div class="form-group">
              <label class="control-label" for="scharge">Product</label>
              <select class="form-control1" id="product">
	              <option value="">Select</option>
	              <?php 
	              if(mysqli_num_rows($qry)>0)
					{
						while($row=mysqli_fetch_assoc($qry))
						{
							$pid=$row['re_product_id'];
							$product_name=$row['product_name'];
							
							echo '<option value="'.$pid.'">'.$product_name.'</option>';
						}
					}
					?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Title</label>
              <input type="text" class="form-control1" id="title" value="ANVY BUSINESS">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Message</label>
              <input type="text" class="form-control1" id="message" value="">
            </div>

            <div class="form-group">
             	 <label class="control-label" for="scharge">Image</label>
             	 &nbsp;&nbsp;&nbsp;
             	 <button type="text" class="btn btn-secondary" id="selimage" data-toggle="modal" data-target="#myModal">Select</button>
              	<p id="image"><p>

              
              
            </div>
            </div>
			
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sub">Submit</button>
              
            </div>
            
            <div class="form-group printmsg">
              
            </div>
          </fieldset>
        </div>
        
        
      </div>
    </div>
    <div class="copy_layout">
      <p>Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
   </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    
    
    
   
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">SELECT IMAGE</h4>
      </div>
     
      <div class="modal-body">
        <div class="form-horizontal" id="imgappend">

		  
		</div>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-close aclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger selectimage" value="">NO IMAGE</button>
      </div>
    </div>
  </div>
</div>
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
</body>
</html>
