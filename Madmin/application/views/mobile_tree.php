<?php 
include 'sessioncheck.php';
$cid=$_SESSION['uid'];
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
<link href="<?php echo base_url();?>css/jquery-ui.css" rel="stylesheet">  
<link href="<?php echo base_url();?>css/alertify.core.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/alertify.default.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker.css" />
<!-- jQuery -->
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/mobileuser.js?n=<?php echo(rand(10,100));?>"></script>
</head>
<body>
<input type="hidden" id="editid" value="<?php echo $cid;?>"/>
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
						<li class="m_2"><a href="<?php echo base_url();?>welcome/edituser"><i class="fa fa-user"></i>Change Password</a></li>
						<li class="m_2"><a href="<?php echo base_url();?>welcome/logout"><i class="fa fa-lock"></i>Logout</a></li>	
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
  	    <h3>MOBILE USERS</h3>
  	    <div class="well1 white" id="padding-styling">

		
			
			
        <div class="bs-example4 editing_user_section" data-example-id="simple-responsive-table" style="margin-top: 0px;">
    		<div class="col-md-8 unames" style="margin-bottom: 1%;padding-left: 0px;">
				 <input type="text" id="usersrch" placeholder="Name / User ID / Phone" list="a_usr_details" class="form-control" style="width:75%;float:left;" >
				 <span class="input-group-btn"style="width:25%;">
					
					<button class="btn btn-success" type="button" id="use_srch" style="padding: 6.5px 12px;">Search</button>
				</span>
				 <datalist id="a_usr_details">
				 
				 </datalist>
				 
				
			</div>
			<div class="col-md-4 unames" style="margin-bottom: 1%;padding-left: 0px;">
				 <a href="<?php echo base_url();?>welcome/printmuser?t=1" target="_blank"><button class="btn btn-warning" type="button" style="padding: 6.5px 12px;float:right;">VCF</button></a>
				  <a href="<?php echo base_url();?>welcome/printmuser?t=2" target="_blank"><button class="btn btn-info" type="button" style="padding: 6.5px 12px;float:right;margin-right:10px;">EXCEL</button></a>
			</div>
			
			
			
			<div class="form-floating">
			   <div class="full-width">
				 <h4><p style="width: 20%;float: left;" id="mid">Anvy Business</p>
				  <a style="padding-left:1%;"><button id="up" id1="1" style="color: green;"><img style="cursor:pointer;height: 24px;position: relative;top: -3px;" src="<?php echo base_url();?>images/top-arrow.png">Click Here To Go Up</button></a>
				
				 </h4>
				
				 <div class="full-width pdng-right">
					<div class="table-responsive" id="tbbl-editt" style="border: 0px;">
						  <table class="table table-bordered" style="margin-bottom: 5px;border: 0px;">
						  	<thead style="color: #696969 !important;">
						  		<tr>
									<th style="padding: 3px !important;width: 40%;color: #696969;">User ID : <span id="cuid"></span></th>
									<th style="padding: 3px !important;width: 40%;color: #696969;">Password : <span id="cpwd"></span></th>
									<th style="padding: 3px !important;width: 20%;color: #696969;">
										<center><button class="btn btn-info getUserIdForEdit" data-toggle="modal" data-target="#myModal">EDIT</button></center>
									</th>
								</tr>
								<tr>
									<th style="padding: 3px !important;width: 40%;color: #696969;">Phone &nbsp;: <span id="cphone"></span></th>
									
									<th style="padding: 3px !important;width: 40%;color: #696969;">Referred &nbsp;&nbsp;: <span id="cref"></span></th>
									
									<th style="padding: 3px !important;width: 20%;color: #696969;">
										<center><button class="btn btn-danger sendregsms">SEND REG SMS</button></center>
									</th>
							  </tr>
						  	</thead>
							</table>
					</div>
			  </div>
			  
			  			 
				 <div class="full-width pdng-right">
					<div class="table-responsive" id="tbbl-editt" style="border: 0px;">
						  <table class="table table-bordered" style="margin-bottom: 5px;border: 0px;">
						  	<thead style="color: #696969 !important;">
						  		<tr>
								<th style="padding: 3px !important; width: 10%;color: #696969;">Sl No.</th>
								<th style="padding: 3px !important;width: 25%;color: #696969;">User ID</th>
								<th style="padding: 3px !important;width: 25%;color: #696969;">Password</th>
								<th style="padding: 3px !important;width: 25%;color: #696969;">Name</th>
								<th style="padding: 3px !important;width: 25%;color: #696969;">Phone</th>
								<th style="padding: 3px !important;width: 15%;color: #696969;">Referred</th>
							  </tr>
						  	</thead>
						  	
						  	
							<tbody id="loadviewuser">

							</tbody>
							</table>
					</div>
			  </div>

		  </div>
		  </div> 
      </div>
    </div>
    <div class="copy_layout">
      <p>Copyright &copy; 2018  Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
	      </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT User</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
			<label for="pin" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="editname">
			</div>
		  </div>
		   <div class="form-group">
			<label for="pin" class="col-sm-2 control-label" style="color:red;">User ID*</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="edituid">
			  <input type="text" class="form-control1" id="editthisid" style="display:none;" value="">
			</div>
			<div class="col-sm-12" style="color: #8d8d8d;font-size: 11px;text-align: right;">
			  Caution: This will also change Referral Id
			</div>
		  </div>
		   <div class="form-group">
			<label for="pin" class="col-sm-2 control-label">Password<span style="color:red;">*</span></label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="editpwd">
			</div>
		  </div>
		   <div class="form-group">
			<label for="pin" class="col-sm-2 control-label">Phone<span style="color:red;">*</span></label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="editph">
			</div>
		  </div>
		   <div class="form-group">
			<label for="pin" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="editem">
			</div>
		  </div>
		   
		   
		  
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close aclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edituserval">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
   <script>
      	$(".date-picker").datepicker();

		$(".date-picker").on("change", function () 
		{
			var id = $(this).attr("id");
			var val = $("label[for='" + id + "']").text();
			$("#msg").text(val + " changed");
			$(".datepicker").hide();
		});
      
      </script>
</body>
</html>
