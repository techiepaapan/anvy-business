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
<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/Payout.js?n=<?php echo rand(10,1000);?>"></script>

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
  	    <h3>PAY OUT</h3>
  	    <div class="well1 white">
		<div class="payment_amnt">
			<button style="margin-left: 3%;background-color:green;border-color:green;" type="button" class="btn btn-success" id="repbonus">Pay Repurchase Bonus</button>
		</div>
        <div class="bs-example4 arr" data-example-id="simple-responsive-table">
			<div class="tabl_header_payout">
				<div class="check_all">
					<input type="checkbox" class="chk_all_state" id="all"> <span>All</span>
				</div>
				<div class="payout_ttl">
					Total Payment Amount: <span id="payoutcsh">INR 0.00</span>
				</div>
			</div>
			<div class="table-responsive" id="tbbl-editt">
			  <table class="table table-bordered tfix">
				<thead>
				  <tr>
					<th> </th>
					<th>Sl No.</th>
					<th>ID</th>
					<th>Name</th>
					<th>Place</th>
					<th>Account no.</th>
					<th>Amount</th>
					<th>Deduction</th>
					<th>Net Amount</th>
				  </tr>
				</thead>
				<tbody id="payotappend">
				 <!--<tr>
					<td><input type="checkbox" class="checked_state_all"></td>
					<td>1</td>
					<th>Name dgdrg</th>
					<th>Binary Income</th>
					<th>12/10/2017 10.00.00</th>
					<th>1200</th>
				  </tr>
				 <tr>
					<td><input type="checkbox" class="checked_state_all"></td>
					<td>1</td>
					<th>Name dgdrg</th>
					<th>Binary Income</th>
					<th>12/10/2017 10.00.00</th>
					<th>1200</th>
				  </tr>
				  <tr>
					<td><input type="checkbox" class="checked_state_all"></td>
					<td>1</td>
					<th>Name dgdrg</th>
					<th>Binary Income</th>
					<th>12/10/2017 10.00.00</th>
					<th>1200</th>
				  </tr>--> 
				 
				</tbody>
			  </table>
			</div><!-- /.table-responsive -->
			<div class="register-button1" style="margin-top: 23px;">
				<button type="button" class="btn btn-success warning_2" id="print">Submit</button>
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
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">AMOUNT DETAILS</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <table class="table table-bordered tfix">
				<thead>
				  <tr>
					<th style="width:10%;padding: 6px !important;">Sl No.</th>
					<th style="width:30%;padding: 6px !important;">Details</th>
					<th style="width:15%;padding: 6px !important;">Date</th>
					<th style="width:15%;padding: 6px !important;">Time</th>
					<th style="width:30%;padding: 6px !important;text-align:right;">Amount(INR)</th>
				  </tr>
				</thead>
				<tbody id="paydetails">
				</tbody>
				</table>
	  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





	
	<div class="modal" id="printModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close printClose" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PRINT</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
			<div class="col-sm-12">
			 	<center><button class="btn btn-danger" style="width:200px;" id="printPDF">PDF</button></center>
			</div>
		  </div>
		  
		   <div class="form-group">
			<div class="col-sm-12">
			 	<center><button class="btn btn-info" style="width:200px;" id="printEXCEL">EXCEL</button></center>
			</div>
		  </div>
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close printClose">Close</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT PRODUCT</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
			<label for="productname" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="productname">
			</div>
		  </div>
		   <div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
			  <textarea class="form-control1" id="description"></textarea>
			</div>
		  </div>
		   <div class="form-group">
			<label for="price" class="col-sm-2 control-label">Price</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="price">
			</div>
		  </div>
		   <div class="form-group">
			<label for="price" class="col-sm-2 control-label">Image</label>
			<div class="col-sm-10">
			 <div class="image-box">
				<img src="images/pic4.jpg">
			 </div>
			  <input type="file" >
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
