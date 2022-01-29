<?php 
include 'sessioncheck.php';


//echo $id."<br>".$pin;
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/tooltipster.bundle.min.css" />
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>css/tree.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
			<li class="dropdown">
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
			<li ><a href="<?php echo base_url();?>welcome/support"><i class="fa  fa-question-circle" aria-hidden="true"></i> Support</a></li>
			<li class="active"><a href="<?php echo base_url();?>welcome/businessTools"><i class="fa  fa-wrench" aria-hidden="true"></i> Business Tools</a></li>
			<!--<li><a href="<?php echo base_url();?>welcome/activate"><i class="fa  fa-user-plus" aria-hidden="true"></i>  Activate User</a></li>-->
			
			<li><a href="<?php echo base_url();?>welcome/logout"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	

	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
        <div class="row">
        	<h2>Business Tools</h2>
        </div>
      
		
        <div class="col-xs-12 col-sm-12 forms">
			<div class="table-responsive">
			<table class="table table-bordered" id="tbx"> 
					
					<?php
					$query = $this->db->query("select * from business_tools");
					foreach ($query->result() as $row)
					{
						$subject=$row->subject;
						$tool=$row->tool;
						
						?>
						<tr>
							<td><?php  echo $subject;?></td>
							<td class="text-center">
								<a href="<?php echo base_url();?>uploads/tools/<?php echo $tool;?>?n=1" target="_blank" download>
								<button type="button" class="btn btn-primary">
									<i class="fa fa-download" aria-hidden="true"></i>
								</button>
								</a>
							</td>
						</tr>
						<?php
					}

					?>
					
				<!--tr>
					<td>Bill</td>
							<td class="text-center">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#billModal">
									<i class="fa fa-download" aria-hidden="true"></i>
								</button>
							</td>
						</tr-->
			</table>
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
	
	
	    <!-- Modal -->
<div id="billModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Purchase</h4>
      </div>
      <div class="modal-body">
        	<div class="table-responsive">
			<table class="table table-bordered"> 
				<thead>
					<tr>
						<th>Type</th>
						<th>BV</th>
						<th>PDF</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$useract = false;
					$uid = $_SESSION['uid1'];
					$query = $this->db->query("select sum(upp.qty*pd.bv) as pbv from user_product_prefer upp, product_details pd, user_login ul 
                            where ul.activated=1 and upp.upgraded=0 and upp.u_id=ul.u_id 
                            and pd.product_id=upp.product_id and upp.u_id='$uid' group by upp.u_id limit 1");
					foreach ($query->result() as $row)
					{
					    $useract =true;
					    $pbv=$row->pbv;
					    ?>
					    <tr>
    					    <td>Activated</td>
    					    <td><?php echo $pbv;?></td>
    					    <td>
    					    	<a href="<?php echo base_url();?>welcome/userBill?activate=true" target="_blank">
    								<button type="button" class="btn btn-primary">
    									<i class="fa fa-download" aria-hidden="true"></i>
    								</button>
    								</a>
    					    </td>
					    </tr>
					    <?php
					}
					
					if($useract){
					$query1 = $this->db->query("select sum(upp.qty*pd.bv) as pbv,upp.upgrade_id from user_product_prefer upp, product_details pd
                            where upp.upgraded='1' and pd.product_id=upp.product_id and upp.paid='1' and upp.u_id='$uid' group by upp.upgrade_id");
					foreach ($query1->result() as $row1)
					{
					    $pbv1=$row1->pbv;
					    $upgrade_id=$row1->upgrade_id;
					    ?>
					    <tr>
    					    <td>Upgraded</td>
    					    <td><?php echo $pbv1;?></td>
    					    <td>
    					    	<a href="<?php echo base_url();?>welcome/userBill?id=<?php echo $upgrade_id;?>" target="_blank">
    								<button type="button" class="btn btn-primary">
    									<i class="fa fa-download" aria-hidden="true"></i>
    								</button>
    								</a>
    					    </td>
					    </tr>
					    <?php
					}
					}
					?>
				</tbody>
			</table>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
   
  </body>
</html>
