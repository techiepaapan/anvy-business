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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/support.js?n=1"></script>
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
						<li class="m_2"><a href="<?php echo base_url();?>welcome/changepassword"><i class="fa fa-user"></i> Change Password</a></li>
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
  	    <h3>SUPPORT</h3>
  	    <div class="well1 white">
		<!--  <div class="input-group new_input_group" id="pin-editt">
			<div class="frm-date">
				From: 
				<input type="text" class="date-picker form-control input-md" id="from-date" placeholder="From">
			</div>
			<div class="frm-date">
				To:
				 <input type="text" class="date-picker form-control input-md" id="to-date" placeholder="To">
			</div>
			<div class="search">
				<button class="btn btn-lg btn-success1 btn-block" id="pin_srch" type="submit">Search</button>
			</div>
		</div>-->

        <div class="bs-example4" data-example-id="simple-responsive-table">
    
			<div class="table-responsive" id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					
					<th>Sl.No</th>
					<th>User Id</th>
					<th>Subject</th>
					<th>Number</th>
					<th>Created on</th>
					<th>Last Response</th>
					<th></th>
				  </tr>
				</thead>
				<tbody id="walappend">
				<!-- <tr>
						<td>1</td>
						<td>1</td>
						<td>Enquiry about tree structure</td>
						<td>REF110033</td>
						<td>14.05.2018 12.30 PM</td>
						<td>14.06.2018 10.30 PM</td>
						<td class="text-center"> <input type="button" class="btn btn-danger btn-support" value="View"></td>
					</tr>
					<tr>
						<td>1</td>
						<td>1</td>
						<td>Enquiry about tree structure</td>
						<td>REF110033</td>
						<td>14.05.2018 12.30 PM</td>
						<td>14.06.2018 10.30 PM</td>
						<td class="text-center"> <input type="button" class="btn btn-danger btn-support" value="View"></td>
					</tr>-->
					
					
										<?php 
	$this ->load -> database();
	$query = $this->db->query("select *,
			(select ul.username from user_login ul where ul.u_id=s.u_id) as username,
			(select concat(date,' ',time) from support_chat sc where sc.sid=s.sid order by sc.scid desc limit 1) as response_date
					from support s");
	
	$i=0;
	foreach ($query->result() as $row)
	{$i++;
			$response_date=$row->response_date;
			$username=$row->username;
			$sid=$row->sid;
			$ticket=$row->ticket;
			$subject=$row->subject;
			$sdate=$row->sdate;
			$stime=$row->stime;
			$u_id=$row->u_id;
			
			?>
			
					<tr>
						<td style="padding: 15px 10px !important;"><?php echo $i;?><span class="supnot" id="notify<?php echo $sid;?>"></span></td>
						<td><?php echo $username;?></td>
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
			</div><!-- /.table-responsive -->
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
			</div>
			<div class="chat_msg frm_cnt">
				<h5>User</h5>
				<h4>14.06.2018</h4>
				<p>gfsd dfdsg dgfdsgfdysfg sdfgdysf sgfdsgfysdgfhdvs dsfdsfshadv sgfys</p>
			</div>
			<div class="chat_msg by_cnt">
				<h5>Admin</h5>
				<h4>14.06.2018</h4>
				<p>gfsd dfdsg dgfdsgfdysfg sdfgdysf sgfdsgfysdgfhdvs dsfdsfshadv sgfys</p>
			</div>
			<div class="chat_msg frm_cnt">
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

</div>
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet"/>
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
      $(document).ready(function()
	{
		$(".btn-support").click(function()
		{
			$('.chatbox').show();
		});
		$(".close_chat").click(function()
		{
			$('.chatbox').hide();
		});
	});
      </script>
</body>
</html>
