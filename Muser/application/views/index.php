<?php 
include 'sessioncheck.php';
$id=$_SESSION['uid1'];
$pin=$_SESSION['pin1'];
$tree=0;
$query = $this->db->query("select tree from user_child where u_id='$id'");
foreach ($query->result() as $row)
{
	$tree=$row->tree;
}

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .tree-data-name
    {
    	cursor:pointer;
    }
    
    .ajax-loader {
  visibility: hidden;
  background-color: rgba(255,255,255,0.7);
  position: absolute;
  z-index: +100 !important;
  width:100%;
  height:90%;
  height: calc(100% - 100px);
}

.ajax-loader img {
  position: relative;
  top:30%;
  left:45%;
}
    </style>
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
			<li class="active"><a href="<?php echo base_url();?>welcome/home"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
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
			<li><a href="<?php echo base_url();?>welcome/support"><i class="fa  fa-question-circle" aria-hidden="true"></i> Support</a></li>
			<li><a href="<?php echo base_url();?>welcome/businessTools"><i class="fa  fa-wrench" aria-hidden="true"></i> Business Tools</a></li>
			<!--<li><a href="<?php echo base_url();?>welcome/activate"><i class="fa  fa-user-plus" aria-hidden="true"></i>  Activate User</a></li>-->
			
			<li><a href="<?php echo base_url();?>welcome/logout"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	
	<input type="hidden" id="id" value="<?php echo $id;?>"/>
	<input type="hidden" id="pin" value="<?php echo $pin;?>"/>
	<input type="hidden" id="tree" value="<?php echo $tree;?>"/>
	
	<?php 
	$this ->load -> database();
	$treel=$tree.'0';$treer=$tree.'1';$left=0;$right=0;
	$query = $this->db->query(" select (select count(ul.u_id) from user_child uc,user_login ul where uc.tree like '$treel%' and uc.u_id=ul.u_id and ul.activateuser=1) as lft,
			(select count(ul.u_id) from user_child uc,user_login ul where uc.tree like '$treer%'  and uc.u_id=ul.u_id and ul.activateuser=1) as rgt
			");
	
	foreach ($query->result() as $row)
	{
			$left=$row->lft;
			$right=$row->rgt;
	}
	$total=$left+$right;
	//echo $left." - ".$right;
	
	
	$query = $this->db->query("select * from user_wallet where u_id='$id'");
	$netrepurchase=0;$netincome=0;
	foreach ($query->result() as $row1)
	{
		$balance=$row1->balance;
		$netincome=$row1->netincome;
	}
	
	
	$query = $this->db->query("select bv_left,bv_right from user_child where u_id='$id'");
	$bvleft=0;$bvright=0;
	foreach ($query->result() as $row1)
	{
		$bvleft=$row1->bv_left;
		$bvright=$row1->bv_right;
	}


	$query = $this->db->query("select sum(bmatch) as totalbv from user_payin where u_id='$id' and  flag='1'");
	$totalbv=0;
	foreach ($query->result() as $row1)
	{
		$totalbv=$row1->totalbv;
	}
		
	if($totalbv=="" || $totalbv==null){
		$totalbv=0;
	}
?>


    <div class="col-md-10 ajax-loader">
   	<img style="height:8%;" src="<?php echo base_url();?>/images/Loading1.gif"/>
  	 </div>
  	 
	<div class="col-xs-12 col-sm-12 main-body">
		<div class="col-xs-12 col-sm-12 col-md-12 info-section">
		<div class="container">
		<div class="row">
			<div class="col-col-xs-3 col-sm-6 col-lg-3 info-active-user">
				<div>
					<h4>Active members</h4>
					<h3><?php echo $total;?></h3>
					<div class="lr-members">
						<div class="left-member">
							<p>Left</p>
							<h6><?php echo $left;?></h6>
						</div>
						<div class="right-member">
							<p>Right</p>
							<h6><?php echo $right;?></h6>
						</div>
					</div>
				 </div>   
			</div>
			<div class="col-col-xs-4 col-sm-6 col-lg-3 info-active-user1">
				<div>
					<h4>Wallet Balance</h4>
					<h3>INR <?php echo $balance;?></h3>
				 </div>  
			</div>
			<div class="col-col-xs-4 col-sm-6 col-lg-3 info-active-user2">
				<div>
					<h4>Net Income</h4>
					<h3>INR <?php echo $netincome;?></h3>
				 </div>  
			</div>
			<div class="col-col-xs-3 col-sm-6 col-lg-3 info-active-user info-active-user3">
				<div>
					<h4>BV Points</h4>
					<h3> <?php echo $totalbv;?></h3>
					<div class="lr-members">
						<div class="left-member">
							<p>Left</p>
							<h6><?php echo $bvleft;?></h6>
						</div>
						<div class="right-member">
							<p>Right</p>
							<h6><?php echo $bvright;?></h6>
						</div>
					</div>
				 </div>   
			</div>
		</div>
		</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 no-padding tree-diagram">
			<div class="container">
				<div>
										<div class="col-xs-12 col-sm-12 col-lg-6">
					<h2>Today's Joining</h2>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-lg-6" style="padding: 10px 0 0 0;">
						<form method="GET" action="<?php echo base_url();?>welcome/downloaduser" target="_blank">
						<input type="text" class="form-control input-center-new" id="datepicker" name="date" style="margin:5px 0;" placeholder="Previous (e.g.-yyyyy-mm-dd)"/>
						<input type="submit" class="btn btn-success" name="submit" value="GO" style="margin:5px 0;"/>
						</form>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 tree-diagram-start">
					<table class="table table-bordered" id="tbx"> 
					<thead> 
						<tr> 
							<th>No</th> 
							<th>Name</th> 
							<th>Username</th> 
							<th>Sponser ID</th> 
							<th>Sponser Name</th> 
							<th>Position</th> 
							<th>BV</th> 
							<th>Status</th> 
						</tr> 
					</thead> 
					<tbody id="walappend"> 

<?php


$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$curdate=$dat->format('Y-m-d');

mysqli_next_result($this->db->conn_id);
			$query = $this->db->query("SELECT ue.u_name,ul.username,ul.freeuser,ul.activated,
							(SELECT 
							CASE
							    WHEN uc1.tree like concat('$tree','0','%') THEN 'Left'
							    ELSE 'Right'
							END
							FROM user_child uc1 where uc1.u_id=uc.u_id) as position,
							(SELECT u_name FROM user_extradetails ue1 where ue1.u_id=ue.referral_id limit 1) as refname,
							(SELECT username FROM user_login ul1 where ul1.u_id=ue.referral_id limit 1) as refid,
					(select sum(pd.bv*upp.qty) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.u_id=ul.u_id and upp.upgraded='0') as tbv
							FROM user_extradetails ue,user_login ul,user_child uc 
							where  uc.tree like concat('$tree','%') and ue.u_joindate='$curdate' and uc.u_id=ue.u_id and ul.u_id=ue.u_id and ul.u_id!='$id' order by ul.u_id asc");

			mysqli_next_result($this->db->conn_id);
			$ix=0;
			foreach ($query->result() as $row1)
			{$ix++;
				$u_name=$row1->u_name;
				$username=$row1->username;
				$freeuser=$row1->freeuser;
				$position=$row1->position;
				$refid=$row1->refid;
				$refname=$row1->refname;
				$tbv=$row1->tbv;
				
				$activated=$row1->activated;
				
				if(strtoupper($position)=='RIGHT'){$col="#2977ff";}
				
				if($freeuser==1){$usertype="Free User";$col1="red";}
				else{
					if($activated==0){
						$usertype="Unpaid User";
						$col1="red";
					}
					else{
						$usertype="Paid User";
						$col1="green";
					}
					
				}
				
				?>
				<tr>
						<td><?php echo $ix;?></td> 
						<td><?php echo $u_name;?></td> 
						<td><?php echo $username;?></td> 
						<td><?php echo $refid;?></td> 
						<td><?php echo $refname;?></td> 
						<td style="color:<?php echo $col;?>"><?php echo $position;?></td> 
						<td><?php echo $tbv;?></td>
						<td style="color:<?php echo $col1;?>"><?php echo $usertype;?></td>
				</tr>
				<?php
				
			}
			?>

					</tbody> 
				</table>
					
						
					
					</div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-12 tree-diagram-start">
					<h2>Today Activated</h2>
					<table class="table table-bordered" id="tbx"> 
					<thead> 
						<tr> 
							<th>No</th> 
							<th>Name</th> 
							<th>Username</th> 
							<th>Sponser ID</th> 
							<th>Sponser Name</th> 
							<th>Position</th> 
							<th>BV</th> 
							<th>Status</th> 
						</tr> 
					</thead> 
					<tbody id="walappend1"> 

			<?php

			mysqli_next_result($this->db->conn_id);
			
			$sql="SELECT ue.u_name,ul.username,ul.freeuser,ul.activated,
							(SELECT 
							CASE
							    WHEN uc1.tree like concat('$tree','0','%') THEN 'Left'
							    ELSE 'Right'
							END
							FROM user_child uc1 where uc1.u_id=uc.u_id) as position,
							(SELECT u_name FROM user_extradetails ue1 where ue1.u_id=ue.referral_id limit 1) as refname,
							(SELECT username FROM user_login ul1 where ul1.u_id=ue.referral_id limit 1) as refid,
							(select sum(pd.bv*upp.qty) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.u_id=ul.u_id and upp.upgraded='0') as tbv
							FROM user_extradetails ue,user_login ul,user_child uc 
							where  uc.tree like concat('$tree','%') and uc.u_id=ue.u_id and ul.u_id=ue.u_id and ul.u_id!='$id' and ul.activated='1' and u_activatedate='$curdate' order by ul.u_id asc";

			$query = $this->db->query($sql);

			$ix=0;
			foreach ($query->result() as $row1)
			{$ix++;
				$u_name=$row1->u_name;
				$username=$row1->username;
				$freeuser=$row1->freeuser;
				$position=$row1->position;
				$refid=$row1->refid;
				$refname=$row1->refname;
				
				$activated=$row1->activated;
				$tbv=$row1->tbv;
				
				if(strtoupper($position)=='RIGHT'){$col="#2977ff";}
				
				if($freeuser==1){$usertype="Free User";$col1="red";}
				else{
					if($activated==0){
						$usertype="Unpaid User";
						$col1="red";
					}
					else{
						$usertype="Paid User";
						$col1="green";
					}
					
				}
				
				?>
				<tr>
						<td><?php echo $ix;?></td> 
						<td><?php echo $u_name;?></td> 
						<td><?php echo $username;?></td> 
						<td><?php echo $refid;?></td> 
						<td><?php echo $refname;?></td> 
						<td style="color:<?php echo $col;?>"><?php echo $position;?></td> 
						<td><?php echo $tbv;?></td> 
						<td style="color:<?php echo $col1;?>"><?php echo $usertype;?></td>
				</tr>
				<?php
				
			}
			?>

					</tbody> 
				</table>
					
						
					
					</div>
					
					
					
					
					
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-12 tree-diagram-start">
					<h2>Today Upgraded</h2>
					<table class="table table-bordered" id="tbx"> 
					<thead> 
						<tr> 
							<th>No</th> 
							<th>Name</th> 
							<th>Username</th> 
							<th>Sponser ID</th> 
							<th>Sponser Name</th> 
							<th>Position</th> 
							<th>BV</th> 
							<th>Paid</th> 
						</tr> 
					</thead> 
					<tbody id="walappend2"> 

			<?php

			$sql="SELECT ue.u_name,ul.username,
							(SELECT 
							CASE
							    WHEN uc1.tree like concat('$tree','0','%') THEN 'Left'
							    ELSE 'Right'
							END
							FROM user_child uc1 where uc1.u_id=uc.u_id) as position,
							(SELECT u_name FROM user_extradetails ue1 where ue1.u_id=ue.referral_id limit 1) as refname,
							(SELECT username FROM user_login ul1 where ul1.u_id=ue.referral_id limit 1) as refid,
							(select sum(pd.product_price) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.upgrade_id=upp1.upgrade_id group by upp.upgrade_id) as pay,
			 				(select sum(pd.bv) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.upgrade_id=upp1.upgrade_id group by upp.upgrade_id) as tbv
							FROM user_extradetails ue,user_login ul,user_child uc, user_product_prefer upp1 
							where  uc.tree like concat('$tree','%') and uc.u_id=ue.u_id and ul.u_id=ue.u_id and ul.u_id=upp1.u_id and ul.u_id!='$id' and
							upp1.upgraded='1' and upp1.paid='1' and upp1.upgrade_date='$curdate' group by upp1.upgrade_id ORDER BY upp1.user_product_id DESC";
			mysqli_next_result($this->db->conn_id);
			//echo $sql;
			$query2 = $this->db->query($sql);

			$ix=0;
			
			foreach ($query2->result() as $row2)
			{$ix++;
				$u_name=$row2->u_name;
				$username=$row2->username;
				$position=$row2->position;
				$refid=$row2->refid;
				$refname=$row2->refname;
				$tbv=$row2->tbv;
				$refname=$row2->refname;
				
				if(strtoupper($position)=='RIGHT'){$col="#2977ff";}
				
				$amounta=$row2->pay;
				 			if($amounta>=2700){
				 				$deliveryc=200;
				 			}
				 			else if($amounta>=1200 && $amounta<2700){
				 				$deliveryc=150;
				 			}
				 			else{
				 				$deliveryc=100;
				 			}
				 $tamount="Rs ".($amounta+$deliveryc);
					
				
				
				?>
				<tr>
						<td><?php echo $ix;?></td> 
						<td><?php echo $u_name;?></td> 
						<td><?php echo $username;?></td> 
						<td><?php echo $refid;?></td> 
						<td><?php echo $refname;?></td> 
						<td style="color:<?php echo $col;?>"><?php echo $position;?></td> 
						<td><?php echo $tbv;?></td> 
						<td><?php echo $tamount;?></td> 
				</tr>
				<?php
				
			}
			?>

					</tbody> 
				</table>
					
						
					
					</div>
					
					
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/alertify.min.js"></script>
        <script src="<?php echo base_url();?>js/Ajax/url.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/tooltipster.bundle.min.js"></script>
	  
	    <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
	<script>
		$('.tooltipstered').tooltipster({
			contentAsHTML: 'true',
		   animation: 'grow',
		   delay: 200,
		   theme: 'tooltipster-punk',
		   trigger: 'custom',
		    interactive: true,
			triggerOpen: {
				mouseenter: true,
				touchstart: true
			},
			triggerClose: {
				click: true,
				scroll: true,
				tap: true,
				mouseleave:true
			},
		   contentCloning: true,
		   
		});


		
    </script>
  </body>
</html>
