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
<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker.css" />
<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker.css" />
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
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/OldOrder.js?n=<?php echo rand(10,1000);?>"></script>
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
  	    <h3>Old Orders</h3>
  	    <div class="well1 white">
		<div class="payment_amnt">
			
		</div>
        <div class="bs-example4 arr" data-example-id="simple-responsive-table">
			<div class="old-order-date">
				<div class="old-order-sub">
					From:
					<input type="text" id="from" class="date-picker form-control input-md" placeholder="From">
				</div>
				<div class="old-order-sub">
					To:
					<input type="text" id="to" class="date-picker form-control input-md" placeholder="To">
				</div>
				<div class="old-order-sub">
					Status:
					<select id="stat" class="form-control">
						<option>All</option>
						<option value="Shipping">Shipping</option>
						<option value="Delivered">Delivered</option>
						<option value="Cancelled">Cancelled</option>
					</select>
				</div>
				<div class="old-order-sub old-order-but">
					<button type="button" id="oldorsrch" class="btn btn-primary">Search</button>
				</div>
			</div>
			<div class="tabl_header_payout" id="pyout-btn">
				
				
				 	<button class="btn btn-info action" value="Delivered">Delivered</button>
                
                
                 	<button class="btn btn-danger action" value="Cancelled">Cancel Order</button>
<button class="btn btn-success print" style="padding: 6px 12px;">Print</button>
                
			</div>
			<div class="table-responsive tfix"  id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				 <tr>
					<th><input type="checkbox" class="chk_all_state" onClick="toggle(this)" id="all"> <span>Select All</span></th>
					<th>Order Id</th>
					<th>Name</th>
					<th>Product Code</th>
					<th>Address</th>
					<th>Order Date</th>
					<th>Username</th>
					<th>Status</th>
				  </tr>
				</thead>
				<tbody id="orderpalce">
			
				 
				</tbody>
			  </table>
			</div><!-- /.table-responsive -->
				<div class="tabl_header_payout"  id="pyout-btn1">
				
				 
				 	<button class="btn btn-info action" value="Delivered">Delivered</button>
               
                
                 	<button class="btn btn-danger action" value="Cancelled">Cancel Order</button>
                <button class="btn btn-success print" style="padding: 6px 12px;">Print</button>
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
