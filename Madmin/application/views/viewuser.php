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
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/ViewUser.js?n=<?php echo rand(10,1000);?>"></script>

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
  	    <div class="well1 white">
		<div class="input-group new_input_group" id="userr-search">
			
			<div class="col-md-4 unames">
			<div class="frm-date">
				 <input type="text" id="usersrch" placeholder="Name" list="a_usr_details" class="form-control">
				 <datalist id="a_usr_details">
				 
				 </datalist>
			</div>
			</div>
			
			<div class="col-md-1 unames">
				<span>OR</span>
			</div>

			
			
			<div class="col-md-3 unames">
			
				<div class="frm-date" >
				<input type="text"  id="userid" class="form-control" placeholder="User ID">
					 
				</div>
			</div>
			
						
			<div class="col-md-4 unames">
				<center><button class="btn btn-lg btn-success1 btn-block" type="submit" id="use_srch" style="float:left;">Search</button>
				<a href="<?php echo base_url();?>index.php/welcome/converttoexcel">
					<button class="btn btn-lg btn-danger btn-block" type="button" id="use_srch" style="float:right;width:100px;padding: 3px 4px;margin-top: 0px;">EXCEL</button></center>
				</a>
			</div>
			
		</div>
        <div class="bs-example4 editing_user_section" data-example-id="simple-responsive-table" style="padding: 0em;">
    
			 <div class="form-floating">
		
			  </div>
			 
			  
			  
			  <div class="bs-example4 bs-example78" data-example-id="simple-responsive-table">
    
			<div class="table-responsive" id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th>Name</th>
					<th>UserID</th>
					<th>Password</th>
					<th>Referred By</th>
					<th>Parent ID</th>
					<th>Father Name</th>
					<th>Address</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody id="loadviewuser">
				 <!--  <tr>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>
						<button type="button" class="btn btn-info active_user" style="float:left;">Active</button>
						<button type="button" class="btn btn-danger inactive_user">Inactive</button>
						
					</td>
					
				  </tr> -->
				 
				 
				</tbody>
			  </table>
			</div><!-- /.table-responsive -->
		  </div> 
			  
			  
			  
			  
			  
			  
			  
			  
			  
		  </div>
		  </div> 
		  <div class="copy_layout">
      <p>Copyright &copy; 2018  Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
	      </div>
      </div>
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
        <h4 class="modal-title" id="myModalLabel">EDIT PIN</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
			<label for="pin" class="col-sm-2 control-label">PIN</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="pin">
			</div>
		  </div>
		   
		   
		  
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
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
