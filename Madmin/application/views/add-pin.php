<?php 
include 'sessioncheck.php';
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

<!-- jQuery -->

<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/Add_pin.js?n=<?php echo rand(100,1000);?>"></script>
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
						<li class="m_2"><a href="<?php echo base_url();?>welcome/logout"><i class="fa fa-lock"></i> Logout</a></li>	
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
  	    <h3>ADD PIN</h3>
  	    <div class="well1 white">
			
			<div class="input-group sel_pin" style="width:100%;">
		<input  class="form-control1 input-search" placeholder="" type="text" id="option_select" style="width:20%;">

					<button class="btn btn-success" type="button" id="genpin">GENERATE NEW PIN</button>

				<select class="form-control1 input-search" placeholder="" type="text" id="sel_pin" style="margin-left:1%;width:15%;">
				<option value="1">Cash Pin</option>
				<option value="0">Free Pin</option>
				</select>
				
				<select class="form-control1 input-search" placeholder="" type="text" id="sel_bv" style="margin-left:1%;width:15%;">
				
				<?php 
				include 'dbconnection.php';
				
				$qry=mysqli_query($connect,"select distinct bv from product_details");
				if(mysqli_num_rows($qry)>0)
				{
					
					while($row=mysqli_fetch_assoc($qry))
					{
						$bv=$row['bv'];
					
				?>
				
				<option><?php echo $bv;?></option>
				<?php 
					}
				}
				?>
				</select>
			</div>
			<div class="input-group" id="newpin">
			
				<!--<input  class="form-control1 input-search" placeholder="Add Pin" type="text" id="add_pin">-->
				
			</div>
			<div class="register-button" style="float:none;" id="appendadd">
					<!--<button class="btn btn-info  warning_2"  type="button" id="addpin_sub">ADD</button>-->
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






 <button type="button" style="display:none;" class="btn btn-primary snd" data-toggle="modal" data-target="#myModal">ADD</button>
   
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">SEND PIN via SMS</h4>
      </div>
     
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
			<label for="productname" class="col-sm-2 control-label">Phone</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="phone" name="phone" placeholder="Phone">
			</div>
		  </div>

		  
		</div>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-close editclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendp">Send</button>
      </div>
    </div>
  </div>
</div>
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet"/>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>

</body>
</html>
