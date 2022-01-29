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
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/NewOrder.js?n=<?php echo rand(10,1000);?>"></script>
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
                <a class="navbar-brand" href="<?php echo base_url();?>">Modern</a>
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
  	    <h3>New Order</h3>
  	    <div class="well1 white">
		<div class="payment_amnt">
			
		</div>
        <div class="bs-example4 arr" data-example-id="simple-responsive-table">
		<div class="pdt-outer">
			<div class="product-search">
			<span>Product</span>

			<select id="p_srch">
				<option value="All">All Products</option>
				
			</select>
			</div>
		</div>
			
			<div class="table-responsive tfix"  id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th><input type="checkbox" class="chk_all_state" id="all"> <span>Select All</span></th>
					<th>Order Id</th>
					<th>Name</th>
					<th>Product Code</th>
					<th>Address</th>
					<th>Order Date</th>
					<th>Username</th>
				  </tr>
				</thead>
				<tbody id="orderpalce">
				<!--  <tr>
					<td><input type="checkbox" class="check_state"></td>
					<td>1</td>
					<th>Name dgdrg</th>
					<th>Binary Income</th>
					<th>12/10/2017 10.00.00</th>
					<th>1200</th>
					<th>1200</th>
				  </tr>
				<tr>
					<td><input type="checkbox" class="checked_state_all"></td>
					<td>1</td>
					<th>Name dgdrg</th>
					<th>Binary Income</th>
					<th>12/10/2017 10.00.00</th>
					<th>1200</th>
					<th>1200</th>
				  </tr>
				  <tr>
					<td><input type="checkbox" class="checked_state_all"></td>
					<td>1</td>
					<th>Name dgdrg</th>
					<th>Binary Income</th>
					<th>12/10/2017 10.00.00</th>
					<th>1200</th>
					<th>1200</th>
				  </tr>  --> 
				 
				</tbody>
			  </table>
			</div><!-- /.table-responsive -->
			<div class="register-button1">
				<button type="button" class="btn btn-success warning_2" id="process_clk">Process</button>
			  </div>
		  </div> 
      </div>
    </div>
    <div class="copy_layout">
      <p>Copyright &copy; 2018 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
   </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->

<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>

<script type="text/javascript">
$(document).ready(function() 
		{
	
$(document).on('click', '#all', function () {
	
	 //$('#print').addClass("disabled");
	    if ($(this).hasClass('allChecked')) {
	        $('input[type="checkbox"]', '.tfix').prop('checked', false);
	    } else {
	        $('input[type="checkbox"]', '.tfix').prop('checked', true);
	    }
	    $(this).toggleClass('allChecked');
	    
	  });
	  
		});
</script>
</body>
</html>
