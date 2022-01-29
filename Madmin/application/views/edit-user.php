<?php 
include 'sessioncheck.php';
$cid=$_REQUEST['uid'];
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
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/EditUser.js?n=<?php echo rand(100,1000);?>"></script>
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
  	    <h3>EDIT USER</h3>
  	    <div class="well1 white" id="padding-styling">
		<!-- <div class="input-group new_input_group">
			
			<div class="frm-date">
				 User Name: <input type="text" id="usersrch" list="a_usr_details" class="form-control">
				 <datalist id="a_usr_details">
				 
				 </datalist>
			</div>
			<div class="search">
				<button class="btn btn-lg btn-success1 btn-block" type="submit" id="use_srch">Search</button>
			</div>
		</div> -->
        <div class="bs-example4 editing_user_section" data-example-id="simple-responsive-table">
    
			<div class="form-floating">
			  <div class="act_in_section">
			  
			  	<button type="button" class="btn-get-parent" data-toggle="modal" data-target="#myModal1" style="float:left;">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> STATUS
				</button>
				
				  <button class="btn btn-danger resendsms" style="margin-left:10px;">Send Reg. SMS</button>
				
				<button type="button" class="btn btn-info active_user">Activate</button>
				<button type="button" class="btn btn-danger inactive_user">Deactivate</button>
			  </div>
			  

			  <div class="full-width">
				<input type="hidden" id="uid"/>
				<!--  <div class="half-width pdng-right">
					<div class="form-group">
					  <label class="control-label col-sm-4" for="referral_id">Referral Id</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="referral_id" >
					  </div>
					</div>
				</div>
				 <div class="half-width pdng-left">
				
					<div class="form-group">
						<label for="parent_id" class="col-sm-4 control-label">Parent Id</label>
						<div class="col-sm-8 no-padding">
							<input type="text" class="form-control" id="parent_id" >
						</div>
					</div>
				</div>
				 -->
			  </div>
			   <div class="full-width">
				 <div class="half-width pdng-right">
					<div class="form-group">
					  <label class="control-label col-sm-4" for="fname">First Name<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="fname">
					  </div>
					</div>
					
					<div class="form-group">	
					<label class="control-label col-sm-4" for="address">Referred By</label>
					  <div class="col-sm-8 no-padding">
						
						<input type="text" class="form-control" id="referredbyid" placeholder="Referred By" readonly="readonly">
						 <button type="button" class="btn-get-parent chngref" id="psrch" data-toggle="modal" data-target="#myModal">
						 	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						 </button>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="frname">Father's Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="frname">
					  </div>
					</div>
					<div class="form-group">
						<label for="gender" class="col-sm-4 control-label">Gender<span style="color: red;font-size: 16px;">*</span></label>
						<div class="col-sm-8 no-padding">
							<input type="text" class="form-control" id="gender">
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
						<input type="text" class="form-control" id="mail" >
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="mobile">Mobile<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="mobile">
					  </div>
					</div>
				</div>
				 <div class="half-width pdng-left">

				 <div class="form-group">
					  <label class="control-label col-sm-4" for="address">User ID<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="username" readonly="readonly">
					  </div>
					</div>
				

				<div class="form-group">	
					<label class="control-label col-sm-4" for="address">Password</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="upass" readonly="readonly">
					  </div>
					</div>
					
				<div class="form-group">	
					<label class="control-label col-sm-4" for="address">Parent ID</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="parentid" readonly="readonly">
					  </div>
					</div>

					<div class="form-group">
					  <label class="control-label col-sm-4" for="address">Address</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="address">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="city">City<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="city">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="country" >Country<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="country">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="state">State<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="state">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="apin">PIN code</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="apin" >
					  </div>
					</div>
					<!-- <div class="form-group">
					  <label class="control-label col-sm-4" for="p_code">Product Code<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="p_code" >
					  </div>
					</div> -->
				</div>
			  </div>
			  <div class="full-width">
				 <div class="half-width pdng-right">
				 	
					<div class="form-group">
					  <label class="control-label col-sm-4" for="bank_name">Bank Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="bank_name" >
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="branch_name">Branch Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="branch_name" >
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="acnt_no">Account Number</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="acnt_no">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="ifsc">IFSC Code</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="ifsc">
					  </div>
					</div>

					<div class="form-group">
					  <label class="control-label col-sm-4" for="ifsc">MAX BV REDEEM/DAY<span style="color: red;font-size: 16px;">*</span></label>
					  <div class="col-sm-8 no-padding">
					  
					                  		
							<?php 
							
								$this ->load -> database();
								$maxbv=0;$totalmoney=4950;$freewalletmoney=0;
								$query=$this->db->query("select maxbv,freewallet from user_child where u_id='$cid';");
								foreach ($query->result() as $row)
								{
										$maxbv=$row->maxbv;	
										$freewalletmoney=$row->freewallet;
								}			
							?>	
						<input type="text" class="form-control" id="maxbv" value="<?php echo $maxbv;?>"/>
					  </div>
					</div>
					
				</div>
				 <div class="half-width pdng-left">
					 <div class="form-group">
					  <label class="control-label col-sm-4" for="pan">PAN Card</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="pan">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="nominee_name">Nominee Name</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="nominee_name">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="relation">Relation</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="relation" >
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-4" for="age">Age</label>
					  <div class="col-sm-8 no-padding">
						<input type="text" class="form-control" id="age" >
					  </div>
					</div>
					
					
      
					
				</div>
				
			  </div>
			  <div class="register-button">
				<button type="button" class="btn btn-success warning_2" id="editclidk">Save</button>
			  </div>
		  </div>
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
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT REFERRAL</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
			<label for="pin" class="col-sm-2 control-label">Current</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="cref">
			</div>
		  </div>
		  
		  
		  	<div class="form-group">
			<label for="pin" class="col-sm-2 control-label">New</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="nref">
			</div>
		  </div>
		   
		   
		  
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close aclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saveref">Save</button>
      </div>
    </div>
  </div>
</div>





	<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT STATUS</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
			<label for="pin" class="col-sm-2 control-label">TYPE</label>
			<div class="col-sm-10">
			
								                  		
				<?php 
				
				include 'dbconnection.php';
				$qry=mysqli_query($connect,"select freeuser FROM user_login where u_id='$cid';");
				$freeuser=0;
				if(mysqli_num_rows($qry)>0)
				{
					while($row=mysqli_fetch_assoc($qry))
					{
						$freeuser=$row['freeuser'];
					}
				}
				
				if($freeuser>0)
				{
					echo '<input type="text" class="form-control1" value="FREE USER" readonly>';
					
				}
				else{
					echo '<input type="text" class="form-control1" value="PAID USER" readonly>';
				}
					
				?>	
							
			  
			</div>
		  </div>
		  
		  <?php if($freeuser>0)
				{?>
				
					  
		  	<div class="form-group">
			<label for="pin" class="col-sm-2 control-label">Deducted</label>
			<div class="col-sm-10">

				<?php 
						
					echo '<input type="text" class="form-control1" value="'.($totalmoney-$freewalletmoney).'" readonly>';
				?>
					
			</div>
		  </div>
		  
		  
		  	<div class="form-group">
			<label for="pin" class="col-sm-2 control-label">Product</label>
			<div class="col-sm-10">
				<select class="form-control" id="p_code">
			  		<option value="">Select</option>
				<?php 
						$this ->load -> database();
						$qry=mysqli_query($connect,"select bv,product_id,product_code from product_details order by bv desc;");
						$parentid="";
						if(mysqli_num_rows($qry)>0)
						{
							while($row=mysqli_fetch_assoc($qry))
							{
							?><option value="<?php echo $row['product_id'];?>" value2="<?php echo $row['bv'];?>"><?php echo $row['bv']."BV - ".$row['product_code'];?></option><?php
							//echo $tree." -> ".$parentid;
							}
						}
						?>
						</select>
			</div>
		  </div>
		  

		  <?php }?>
		   
		   
		  
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close aclose" data-dismiss="modal">Close</button>
       <?php  if($freeuser>0)
				{?>
        <button type="button" class="btn btn-primary editstatus" value="<?php echo $cid;?>">Edit</button>
        <?php }?>
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
