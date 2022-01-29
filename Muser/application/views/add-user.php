<?php 
include 'sessioncheck.php';
$t=$_SESSION['t'];
$id=$_SESSION['uid1'];
$pin=$_SESSION['pin1'];

$strlength=strlen($t);
$psn=substr($t,($strlength-1));
$tree=substr($t,0,-1);
if($psn==0){$position="Left";}else{$position="Right";}
//echo $t." - ".$tree."->".$position;
$this ->load -> database();
$uidcnt=0;
$queryx = $this->db->query("select count(u_id) as uidcnt from user_child where tree='$t';");
foreach ($queryx->result() as $rowx)
{
	$uidcnt=$rowx->uidcnt;
}


$query = $this->db->query("select ul.username,ue.u_name from user_child uc,user_login ul, user_extradetails ue where ul.u_id=uc.u_id and ul.u_id=ue.u_id and uc.tree='$tree';");
$parentid="";
$parent_name="";
foreach ($query->result() as $row)
{
	$parentid=$row->username;
	$parent_name=$row->u_name;
	//echo $tree." -> ".$parentid;
}

$query = $this->db->query("select username from user_login where u_id='$id';");
$referalid="";
foreach ($query->result() as $row)
{
	$referalid=$row->username;
	//echo $tree." -> ".$parentid;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/alertify.default.css" />
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker.css" />
	<style>
	.clear_third>div:nth-of-type(6n+1)
	{
	clear:left;
	}
	</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  
	   <?php  if($uidcnt>0){?>
  	<script>
  	alert("User already exists in this position");
	window.location.href="<?php echo base_url();?>welcome/teamView";
  	</script>
  	<?php
  }
  
  ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding outer-box">
	<nav class="navbar navbar-default">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  		  <a class="navbar-brand" href="<?php echo base_url();?>">
		  <img src="<?php echo base_url();?>/images/logo.png">
		  ANVY BUSINESS</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		 <ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url();?>welcome/home"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"> </i> Profile</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/profile"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
				<li><a href="<?php echo base_url();?>welcome/changepassword"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</a></li>
			  </ul>
			</li>
			<li class="dropdown active">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-handshake-o" aria-hidden="true"></i> My Business</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/teamView"><i class="fa fa-users" aria-hidden="true"></i> Team View</a></li>
				<li><a href="<?php echo base_url();?>welcome/directMembers"><i class="fa fa-user" aria-hidden="true"></i> Direct Members</a></li>
				<li><a href="<?php echo base_url();?>welcome/downlineList"><i class="fa fa-sitemap" aria-hidden="true"></i> Downline List</a></li>
				<li><a href="<?php echo base_url();?>welcome/upgradeuser"><i class="fa fa-sitemap" aria-hidden="true"></i> Upgrade</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-check-square-o " aria-hidden="true"></i> Accounts</a>
			  <ul class="dropdown-menu">
				<!--<li><a href="<?php echo base_url();?>welcome/ewallet"><i class="fa fa-credit-card" aria-hidden="true"></i> Ewallet</a></li>-->
				<li><a href="<?php echo base_url();?>welcome/directSalesIncentive"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Direct Sales Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/teamSalesIncentive"><i class="fa fa-users" aria-hidden="true"></i> Team Sales Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/leadersSuccessIncentive"><i class="fa fa-user" aria-hidden="true"></i> Leaders Success Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/myIncome"><i class="fa fa-credit-card" aria-hidden="true"></i> My Income</a></li>
			  </ul>
			</li>
			<li><a href="<?php echo base_url();?>welcome/support"><i class="fa  fa-question-circle" aria-hidden="true"></i> Support</a></li>
			<li><a href="<?php echo base_url();?>welcome/businessTools"><i class="fa  fa-wrench" aria-hidden="true"></i> Business Tools</a></li>
			<!--<li><a href="<?php echo base_url();?>welcome/activate"><i class="fa  fa-user-plus" aria-hidden="true"></i>  Activate User</a></li>-->
			
			<li><a href="<?php echo base_url();?>welcome/logout"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
        <div class="row">
        	<h2>ADD USER</h2>
        </div>
        <div class="col-xs-12 col-sm-12 forms user no-padding">
		<div class="col-xs-12 col-sm-12 sponser">
		<h5 class="sub-form-head">Sponsor Details</h5>
		 <div class="form-horizontal">
			<div class="col-xs-6 col-sm-4">
				 <div class="form-group">
				<label for="referal_id" class="col-sm-4 control-label">Sponsor Id<span style="color: red;font-size: 16px;">*</span></label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="referal_id" value="<?php echo $parentid;?>"/>
				</div>
				<div class="col-sm-12" >
					<input type="text" class="form-control" readonly="readonly" id="referal_id_user" style="background: #c4f3ff4d;border: none;text-align: right;"/>
				</div>
			  </div>
			</div>
			<div class="col-xs-6 col-sm-4">
			 <div class="form-group">
				<label for="parent_id" class="col-sm-4 control-label">Placement Id<span style="color: red;font-size: 16px;">*</span></label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="parent_id" readonly="readonly" value="<?php echo $parentid;?>"/>
				</div>
				 <div class="col-sm-12" >
					<input type="text" class="form-control" readonly="readonly" style="background: #c4f3ff4d;border: none;text-align: right;" value="<?php echo strtoupper($parent_name);?>"/>
				</div>
			  </div>
			</div>
			<div class="col-xs-6 col-sm-4">
			 <div class="form-group">
				<label for="position" class="col-sm-4 control-label">Position<span style="color: red;font-size: 16px;">*</span></label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="pos" readonly="readonly" value="<?php echo $position;?>"/>
				</div>
			  </div>
			</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 no-padding  frm-nxt-section">
		<div class="col-xs-12 col-sm-6 col-md-6 pdng-right">
			 <div class="form-horizontal">
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
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 pdng-left">
			 <div class="form-horizontal">
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
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-12 no-padding  frm-nxt-section">
		<div class="col-xs-12 col-sm-6 col-md-6 pdng-right">
			 <div class="form-horizontal">
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
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 pdng-left">
			 <div class="form-horizontal">
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
					
			</div>
		</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 no-padding  frm-nxt-section">
		<div class="col-xs-12 col-sm-6 col-md-6 pdng-right">
			 <div class="form-horizontal">
				<h5 class="sub-form-head">Product Details</h5>	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="p_code">Product <span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
					  
						<div class="col-xs-12 col-sm-12" style="margin-top: 5px;">
		 					<button type="button" class="btn btn-danger snd" data-toggle="modal" data-target="#myModal">Select</button>
						 	<p>Total Price: Rs <span class="ptp">0</span></p>
						 	<p>Total BV: <span class="pbv">0</span></p>
						 <p>Delivery Charge: Rs <span class="pdc">0</span></p>
						 </div>
					  </div>
					</div>
			  </div>
		</div>
		</div>
		<div class="col-xs-12 col-sm-12">
              <button type="submit" class="btn btn-primary" id="submitt">Submit</button>
            </div>
            <div class="col-xs-12 col-sm-12">
              <p id="processMsg" style="color:red;display:none;">Processing...</p>
            </div>
        </div>
        </div>
       
    </div>
    <div class="col-xs-12 col-sm-12 footer no-padding">
    	<div class="container">
       	 Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a>
        </div>
    </div>
	</div>
	
	
	
	
	
 
   
   <div class="modal " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:100%;margin: 10px auto;">
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PRODUCTS</h4>
      </div>
     
      <div class="modal-body">
		  <div class="col-xs-12 col-sm-12 clear_third" style="height:320px;white-space: nowrap;overflow:auto">
			
				<!--div class="col-xs-12 col-sm-2" style="padding:3px;display: block;">
				 <div class="col-xs-12 col-sm-12" style="border:1px solid #5f5f5f;padding: 5px;">
					 <div class="col-xs-12 col-sm-12">
					 	<img style="width: 100%;" src="../images/no_image.jpg">
					 </div>
					 <div class="col-xs-12 col-sm-12" style="padding: 0;">
					 	<p style="margin:0;overflow:hidden;" title="Free User">Free User</p>
					 	<p style="margin:0;overflow:hidden;">Rs 0.00</p>
					 	<p style="overflow:hidden;">BV: 0</p>
					 	<p style="margin:0;"><button class="btn prdbtnsel1" style="width:100%;" value="">Select</button></p>
					 </div>
					 </div>
				 </div-->
				 
				 
			
			<?php 
			$this->load->database();
			$query = $this->db->query("select * from product_details  where active='1' order by bv desc;");
			$parentid="";
			foreach ($query->result() as $row)
			{
				$sizearr=explode(",",$row->pro_size);
				$szlist="";
				$szset='<select class="szclass" id="sz'.$row->product_id.'">';
				//echo count($sizearr);
				if(count($sizearr)==0){
					$szlist='<option value="">Free Size</option>';
				}
				else{
					if($sizearr[0]==''){
						$szlist='<option value="">Free Size</option>';
					}
					else{
					for($i=0;$i<count($sizearr);++$i){
						$szlist.='<option>'.$sizearr[$i].'</option>';
					}
					}
				}
							
				$szset.=$szlist.'</select>';
				
				$qtyset='<select  class="qtclass" id="qt'.$row->product_id.'">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
						</select>';
				
				 ?>
				 <div class="col-xs-12 col-sm-2" style="padding:3px;display: block;">
				 <div class="col-xs-12 col-sm-12" style="border:1px solid #5f5f5f;padding: 5px;">
					 <div class="col-xs-12 col-sm-12">
					 	<img style="width: 100%;" src="../../Madmin/uploads/<?php echo $row->image;?>">
					 </div>
					 <div class="col-xs-12 col-sm-12" style="padding: 0;">
					 	<p style="margin:0;overflow:hidden;" title="<?php echo $row->product_code; ?>"><?php echo $row->product_code; ?></p>
					 	<p style="margin:0;overflow:hidden;">Rs <?php echo $row->product_price; ?></p>
					 	<p style="margin:0;overflow:hidden;">BV: <?php echo $row->bv; ?></p>
					 	<p style="margin:0;overflow:hidden;">Qty: <?php echo $qtyset; ?></p>
					 	<p style="margin:0;overflow:hidden;">Size: <?php echo $szset; ?></p>
					 	<p style="margin:0;"><button class="btn prdbtnsel" style="width:100%;" value="<?php echo $row->product_id;?>">Select</button></p>
					 </div>
					 </div>
				 </div>
				 <?php
				
			}
			?>
		</div>
		
		 <div class="col-xs-12 col-sm-12" style="margin-top: 5px;">
		 	
		 	<p style="margin: 0;">Total Price: Rs <span class="ptp">0</span></p>
		 	<p style="margin: 0;">Total BV: <span class="pbv">0</span></p>
			 <p style="margin: 0;">Delivery Charge: Rs <span class="pdc">0</span></p>
		 
		 </div>
		
		
		

      </div>
     
      <div class="modal-footer">
       <div class="col-xs-12 col-sm-12" style="margin-top: 5px;">
		   <button type="button" class="btn btn-danger" id="remprod">Clear</button>
        <button type="button" class="btn btn-primary editclose" data-dismiss="modal">Proceed</button>
        
        </div>
      </div>
    </div>
  </div>
</div>


   
   <div class="modal" id="mySuccessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:285px;margin-top: 100px;">
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close closure" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel">CONGRATULATIONS!!!</h4></center>
      </div>
     
      <div class="modal-body">
	      <div class="col-xs-12 col-sm-12 clear_third">
	      	<center><img src="<?php echo base_url();?>images/logo.png"/></center>
	      </div>
		  <div class="col-xs-12 col-sm-12 clear_third" style="padding: 0; margin-top:10px;">
			<center><p>Thank you for adding new member in</p>
				<p>Anvy Business Family</p>
			  <p>User ID: <span id="newUserID"></span></p></center>
		</div>
      </div>
     
      <div class="modal-footer">
       <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
		<button type="button" class="btn btn-primary closure1" id="downloadstuff" style="float:left;padding: 5px 5px;">Download</button>
        <button type="button" class="btn btn-default closure" style="float: right;">Close</button>
        
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>js/alertify.js"></script>
	<script src="<?php echo base_url();?>js/crs.js"></script>
	<script src="<?php echo base_url();?>js/select2.min.js"></script>
	<script src="<?php echo base_url();?>js/Ajax/url.js"></script>
	<script src="<?php echo base_url();?>js/Ajax/AddUser.js?n=<?php echo rand(10,1000);?>"></script>

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
	  
	  		<script>
			$(document).ready(function()
			{
				var baseurl="<?php echo base_url();?>";
				getSponserName($("#referal_id").val());
				$("#referal_id").keyup(function(){
					var value = $(this).val();
					getSponserName(value);
				});
				function getSponserName(value){
					$.getJSON(baseurl+"welcome/getSponserName_limit?value="+value,function(jsn)
					{
						$("#referal_id_user").val("");
						if(jsn.length>0){
							$("#referal_id_user").val((jsn[0].u_name).toUpperCase());
						}
					});
				}
			});

		</script>
  </body>
</html>
