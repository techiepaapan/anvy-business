<?php 
include 'sessioncheck.php';
$id=$_SESSION['uid1'];
$pin=$_SESSION['pin1'];
$tree=0;


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
    
    <style>
.supnot{
background: #ff2b2b;
color: #fff;
border-radius: 4px;
padding: 0px 3px;
float: right;
font-weight: 600;
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
			<li class="active"><a href="<?php echo base_url();?>welcome/support"><i class="fa  fa-question-circle" aria-hidden="true"></i> Support</a></li>
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
	

	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
        <div class="row">
        	<h2>Support</h2>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 ">
               <input type="button" id="srch" class="btn btn-danger  pull-right" value="Create Ticket" data-toggle="modal" data-target="#myModal"> 
            </div>
		
        <div class="col-xs-12 col-sm-12 forms">
			<div class="table-responsive">
			<table class="table table-bordered" id="tbx"> 
				<thead> 
					<tr> 
						<th>Sl.No</th> 
						<th>Subject</th> 
						<th>Number</th> 
						<th>Created on</th> 
						<th>Last Response</th> 
						<th></th>
					</tr> 
				</thead> 
				<tbody id="walappend">
				
					<?php 
	$this ->load -> database();
	$query = $this->db->query("select *,(select concat(date,' ',time) from support_chat sc where sc.sid=s.sid order by sc.scid desc limit 1) as response_date
					from support s where s.u_id='$id'");
	
	$i=0;
	foreach ($query->result() as $row)
	{$i++;
			$response_date=$row->response_date;
			$sid=$row->sid;
			$ticket=$row->ticket;
			$subject=$row->subject;
			$sdate=$row->sdate;
			$stime=$row->stime;
			$u_id=$row->u_id;
			
			?>
			
					<tr>
						<td style="padding: 15px 10px !important;"><?php echo $i;?><span class="supnot" id="notify<?php echo $sid;?>"></span></td>
						<td id="sub<?php echo $sid;?>"><?php echo $subject;?></td>
						<td><?php echo $ticket;?></td>
						<td><?php echo $sdate." ".$stime;?></td>
						<td><?php echo $response_date;?></td>
						<td class="text-center"> <button class="btn btn-info btn-support" value="<?php echo $sid;?>">View</button></td>
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
	<div class="chatbox">
		<div class="chatbox_header">
			<button type="button" class="close_chat" ><span aria-hidden="true">×</span></button>
			<h4 class="chat_title"></h4>
		</div>
		<div class="chatbox_content" id="chatbox_content">
			<!-- <div class="chat_msg frm_cnt">
				<h5>User</h5>
				<h4>14.06.2018</h4>
				<p>gfsd dfdsg dgfdsgfdysfg sdfgdysf sgfdsgfysdgfhdvs dsfdsfshadv sgfys</p>
			</div>
			<div class="chat_msg by_cnt">
				<h5>Admin</h5>
				<h4>14.06.2018</h4>
				<p>gfsd dfdsg dgfdsgfdysfg sdfgdysf sgfdsgfysdgfhdvs dsfdsfshadv sgfys</p>
			</div>-->
		</div>
		<div class="chatbox_footer">
			<input type="text" class="chat_here">
			<button type="button" class="chat_button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			<input type="hidden" id="chatid" value=""/>
		</div>
	</div>
    <div class="col-xs-12 col-sm-12 footer no-padding">
    	<div class="container">
       	 Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a>
        </div>
    </div>
	</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Ticket</h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
			<label for="subject">Subject</label>
			<input type="text" class="form-control" id="tsubject" placeholder="Subject">
		  </div>
		  <div class="form-group">
			<label for="message">Message</label>
			<textarea class="form-control" id="tmessage" placeholder="Message" rows="5"></textarea>
		  </div>
		 </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="ticketsubmit">Send</button>
      </div>
    </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/alertify.min.js"></script>
    <script src="<?php echo base_url();?>js/Ajax/url.js"></script>
    <script src="<?php echo base_url();?>js/Ajax/support.js?n=1"></script>

  </body>
</html>
