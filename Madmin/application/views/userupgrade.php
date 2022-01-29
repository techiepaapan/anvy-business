<?php 
include 'sessioncheck.php';
include 'dbconnection.php';

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

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
  	    <h3>USER UPGRADE</h3>
  	    
  	    <div class="well1 white" style="padding: 0.5em;">

        <div class="bs-example4 editing_user_section" data-example-id="simple-responsive-table" style="padding: 0em;">
    
			  
			  
			  <div class="bs-example4 bs-example78" data-example-id="simple-responsive-table" style="padding: 3px;"> 
    
    		<div class="col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 0 0 0;">
				<form method="GET" action="<?php echo base_url();?>welcome/downloadupgradeuser" target="_blank">
				<div class="col-xs-12 col-sm-6">
					<input type="text" class="form-control input-center-new" id="datepicker" name="date" style="margin:5px 0;" placeholder="Upgraded (e.g.-yyyyy-mm-dd)"/>
				</div>
				<div class="col-xs-12 col-sm-6">
					<button type="submit" class="btn btn-info" name="submit">GO</button>
				</div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 0 0 0;">
			<div class="table-responsive" id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th>Name</th>
					<th>UserID</th>
					<th>Referred By</th>
					<th>Parent ID</th>
					<th>Mobile</th>
					<th>Date</th>
					<th>Pay</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody id="loadviewuser">
				 <?php 

				$sql="SELECT *,
						(select ul1.username from user_extradetails ue1,user_login ul1 where ue1.u_id=ue.referral_id and ul1.u_id=ue1.u_id limit 1) as ref,
					(select ul2.username from user_extradetails ue2,user_login ul2 where ue2.u_id=ue.parent_id and ul2.u_id=ue2.u_id limit 1) as prnt,
					(select sum(pd.product_price) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.upgrade_id=upp1.upgrade_id group by upp.upgrade_id) as pay
						FROM user_login ul,user_extradetails ue,user_product_prefer upp1
						where ul.u_id=ue.u_id and ul.u_id=upp1.u_id and ul.type_flg='W' and upp1.upgraded='1' and upp1.paid='0' group by upp1.upgrade_id ORDER BY upp1.user_product_id DESC";
				
				 $qry=mysqli_query($connect,$sql);
				 $i=1;
				 //echo "row=".mysqli_num_rows($qry);
				 $newuser=0;
				 if(mysqli_num_rows($qry)>0)
				 {
				 	while($row=mysqli_fetch_assoc($qry))
				 	{

				 			$amounta=$row['pay'];
				 			if($amounta>=2700){
				 				$deliveryc=200;
				 			}
				 			else if($amounta>=1200 && $amounta<2700){
				 				$deliveryc=150;
				 			}
				 			else{
				 				$deliveryc=100;
				 			}
				 			$userType="Rs.".($amounta+$deliveryc);
				 		
				 		?>
				 		<tr>
				 		<td><?php echo $row['u_name'];?></td>
				 		<td><?php echo $row['username'];?></td>
				 		<td><?php echo $row['ref'];?></td>
				 		<td><?php echo $row['prnt'];?></td>
				 		<td><?php echo $row['u_mobile'];?></td>
						<td><?php echo trim( implode('-', array_reverse(explode('-', $row['prefer_date']))));?></td>
				 		<td><?php echo $userType;?></td>
				 		<td>
						 	<?php
							 if($row['activated']==0){
								echo"Activate First";
							 }
							 else{
							 ?>
				 			<button class="btn btn-primary actusr" value="<?php echo $row['upgrade_id'];?>">Upgarde</button>
							 <?php }?>
						 </td>
				 		<?php
				 	}
				 }
				 
				 ?>
				 
				 
				</tbody>
			  </table>
			</div><!-- /.table-responsive -->
			</div>
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

	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

	    <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
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
      var base_url=getUrl();
		$(document).on("click",".actusr",function(){
			var val=$(this).val();
			alertify.confirm("Upgrade User",function(e){
				if(e){
					$(".actusr").prop('disabled', true);
					$.ajax({
					    type: "POST",
					    url: base_url+"welcome/upgradeBinaryUser",
					    dataType: "json",
					    data:{"product":val},
					    success: function(jsn) 
					    {
						    if(jsn[0].res==1){
							    alert("User Upgraded");
							    location.reload();
						    }
						    else{
						    	alert("Error");
								$(".actusr").prop('disabled', false);
						    }
					    }
					    });
					}
			});
		});

      </script>
</body>
</html>
