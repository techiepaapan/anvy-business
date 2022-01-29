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
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/AddUser.js"></script>
<link href="<?php echo base_url();?>/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?php 
$this->load->database();
$query=$this->db->query("select * from user_login;"); 
//echo $query->num_rows();
if($query->num_rows()==0)
{
$disp="none";
$fu=1;
}
else{$disp="block";
$fu=0;
}
?>
<input type="hidden" id="fu" value="<?php echo $fu;?>"/>
<input type="hidden" value="admin" id="added"/>
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
			<h3>ADD USER</h3>
			<div class="well1 white">
			<form class="form-floating">
			<div id="hiddiv" style="display:<?php echo $disp;?>">
			  <div class="full-width ful-margin">
				<h5 class="sub-form-head">Sponsor Details</h5>	
				 <div class="half-width pdng-right">
					<div class="form-group">
					  <label class="control-label col-sm-4" for="referral_id">Sponsor Id<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="referral_id" placeholder="Sponsor Id">
					  </div>
					</div>
				</div>
				 <div class="half-width pdng-left">
				
					<div class="form-group rrrid">
						<button type="button" class="btn btn-success btn-verify" id="refreal_sub">Verify</button>
						 <span id="refname"></span>
						  <span id="refdate"></span>
					  </div>
				</div>
				
			  </div>
			  <div class="full-width ful-margin">
				 <div class="half-width pdng-right">
					<div class="form-group">
					  <label class="control-label col-sm-4" for="parent_id">Placement Id<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control parent-id-search" id="parent_id" placeholder="Placement Id">
						 <button type="button" class="btn-get-parent" id="psrch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
					  </div>
					</div>
				</div>
				
			  </div>
			   <div class="full-width">
				  <div class="half-width pdng-right">
				    <div class="form-group">
						<label class="control-label col-sm-4" for="position">Position<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
					
							<input type="text" class="form-control" id="pos" placeholder
							="Position">
						</div>
						 
					  </div>
				  </div>
			  </div>
			</div>	  	 
			   <div class="full-width">
				 <div class="half-width pdng-right">
				 <h5 class="sub-form-head">Personal Details</h5>	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="fname">Name<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="fname" placeholder="Name">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="frname">Father's Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="frname" placeholder="Father's Name">
					  </div>
					</div>
					<div class="form-group">
						<label for="radio" class="col-sm-4 control-label">Gender<span style="color: red;font-size: 16px;">*</span></label>
						<div class="col-sm-8">
							<div class="radio-inline"><label><input type="radio" name="gen" value="Male"> Male</label></div>
							<div class="radio-inline"><label><input  type="radio" name="gen" value="Female"> Female</label></div>
						</div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="dob">Date of Birth</label>
					  <div class="col-sm-8 no-padding">
						
						<input type="text" class="date-picker form-control input-md" id="dob"  placeholder="dd/mm/yyyy">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="mail">Email</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="mail" placeholder="email">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="mobile">Mobile<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="mobile" placeholder="Mobile">
					  </div>
					</div>
				</div>
				 <div class="half-width pdng-left">
					 <h5 class="sub-form-head">Communication Details</h5>	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="address">Address</label>
					  <div class="col-sm-8 no-padding">
						<textarea class="form-control" id="address" placeholder="Address"></textarea>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="city">City<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="city" placeholder="City">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="country" >Country<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<select class="form-control crs-country" id="country" data-region-id="state">
						</select>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="state">State<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<select class="form-control" id="state">
						</select>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="apin">PIN code</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="apin" placeholder="PIN Code">
					  </div>
					</div>
				</div>
			  </div>
			  <div class="full-width">
				 <div class="half-width pdng-right">
				 <h5 class="sub-form-head">Bank Details</h5>	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="bank_name">Bank Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="bank_name" placeholder="Bank Name">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="branch_name">Branch Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="branch_name" placeholder="Branch Name">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="acnt_no">Account Number</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="acnt_no" placeholder="Account Number">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="ifsc">IFSC Code</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="ifsc" placeholder="IFSC Code">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="pan">PAN Card</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="pan" placeholder="PAN">
					  </div>
					</div>
				</div>
				 <div class="half-width pdng-left">
					 <h5 class="sub-form-head">Nominee Details</h5>	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="nominee_name">Nominee Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="nominee_name" placeholder="Nominee Name">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="relation">Relation</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="relation" placeholder="Relation">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="age">Age</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="age" placeholder="Age" >
					  </div>
					</div>
					<h5 class="sub-form-head">Login Details</h5>	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="username">Username<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control userr" id="username" placeholder="Username">
                         <button type="button" class="btn btn-primary btn-check" id="checkuseid">Check</button>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="password">Password<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="password" class="form-control" id="password" placeholder="******">
					  </div>
					</div>
				</div>
				
			  </div>
			   <div class="full-width">
				 <div class="half-width pdng-right">
				 <h5 class="sub-form-head">Product Details</h5>	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="p_code">Product Code<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<select class="form-control" id="p_code">
						<option value="">Select</option>
						<option value="free">No Product(Free User)</option>
						</select>
					  </div>
					</div>
				</div>
				</div>
			  <div class="register-button">
				<button type="button" class="btn btn-success warning_2" id="user_reg">Submit</button>
			  </div>
		  </form>
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
    <!-- Modal -->
<div class="modal fade colored-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Parent Details</h4>
      </div>
      <div class="modal-body parent">
        	<div class="form-group">
			  <label class="control-label col-sm-4" for="m_parent_name">Parent Name</label>
			  <div class="col-sm-8 no-padding">
				<input type="text" class="form-control" id="m_parent_name" >
			  </div>
			</div>
        	<div class="row">
        	<div class="col-xs-12 col-sm-12">
        		<div class="col-xs-12 col-sm-6 modall-left lft">
        			<div>
        				<h4>Left</h4>
        				<h6 id="lftchd"></h6>
        				
        			</div>
        		</div>
        		<!-- empty -->
        		<div class="col-xs-12 col-sm-6 modall-left rgt">
        			<div>
        				<h4>Right</h4>
        				<h6 id="rgtchd"></h6>
        			</div>
        		</div>
        		</div>
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
<script src="<?php echo base_url();?>js/crs.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>/js/select2.min.js"></script>
  
      	<script type="text/javascript">
 			 $('#country').select2();
 			 $('#state').select2();
		</script>
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
