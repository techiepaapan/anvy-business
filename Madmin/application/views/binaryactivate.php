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
  	    <h3>BINARY ACTIVATION</h3>
  	    
  	    <div class="well1 white" style="padding: 0.5em;">

        <div class="bs-example4 editing_user_section" data-example-id="simple-responsive-table" style="padding: 0em;">
    
			  
			  
			  <div class="bs-example4 bs-example78" data-example-id="simple-responsive-table" style="padding: 3px;"> 
    
    		<div class="col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 0 0 0;">
				<form method="GET" action="<?php echo base_url();?>welcome/downloaduser" target="_blank">
				<div class="col-xs-12 col-sm-6">
					<input type="text" class="form-control input-center-new" id="datepicker" name="date" style="margin:5px 0;" placeholder="Activated (e.g.-yyyyy-mm-dd)"/>
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
					<th>Joined</th>
					<th>Type</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody id="loadviewuser">
				 <?php 
				 
				 $qry=mysqli_query($connect,"SELECT *,
				 		(select ul1.username from user_extradetails ue1,user_login ul1 where ue1.u_id=ue.referral_id and ul1.u_id=ue1.u_id limit 1) as ref,
						(select ul2.username from user_extradetails ue2,user_login ul2 where ue2.u_id=ue.parent_id and ul2.u_id=ue2.u_id limit 1) as prnt,
						(select sum(upp.qty*pd.product_price) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.u_id=ul.u_id and upp.upgraded='0' group by upp.u_id) as pay
				 		FROM user_login ul,user_extradetails ue 
				 		where ul.u_id=ue.u_id and ul.type_flg='W' and ul.activated='0' ORDER BY ul.u_id DESC");
				 $i=1;
				 //echo "row=".mysqli_num_rows($qry);
				 $newuser=0;
				 if(mysqli_num_rows($qry)>0)
				 {
				 	while($row=mysqli_fetch_assoc($qry))
				 	{
				 		$freeuser=$row['freeuser'];
				 		if($freeuser==1){
				 			$userType="Free User";
				 		}
				 		else{
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
				 			$userType="Unpaid User<br>(Rs.".($amounta+$deliveryc).")";
				 		}
				 		?>
				 		<tr>
				 		<td><?php echo $row['u_name'];?></td>
				 		<td><?php echo $row['username'];?></td>
				 		<td><?php echo $row['ref'];?></td>
				 		<td><?php echo $row['prnt'];?></td>
				 		<td><?php echo $row['u_mobile'];?></td>
						<td><?php echo trim( implode('-', array_reverse(explode('-', $row['u_joindate']))));?></td>
				 		<td><?php echo $userType;?></td>
				 		<td>
				 			<button class="btn btn-primary actusr" value="<?php echo $row['u_id'];?>">Activate</button>
				 			<?php if($freeuser==0){?>
				 			<button class="btn btn-danger edtusr" data-toggle="modal" data-target="#myModal" value="<?php echo $row['u_id'];?>">Edit</button>
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
      <p>Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
	      </div>
      </div>
    </div>
    
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
	<!-- Modal -->
	
	<?php
	mysqli_next_result($connect);
	$selop='<option value="">Select</option>';
	$qry1=mysqli_query($connect,"SELECT product_id,product_code,bv from product_details");
				 if(mysqli_num_rows($qry1)>0)
				 {
				 	while($row1=mysqli_fetch_assoc($qry1))
				 	{
				 		$product_id=$row1['product_id'];
				 		$product_code=$row1['product_code'];
				 		$bv=$row1['bv'];
				 		$selop.='<option value="'.$product_id.'">'.$product_code.'-'.$bv.'BV</option>';
				 	}
				 }
	?>

		
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="closeA" data-dismiss="modal" style="display:none;"></button>
        <h4 class="modal-title" id="myModalLabel">EDIT PRODUCT</h4>
		  <p style="font-size: 14px;color:red;">Free User: Delete products and submit</p>
      </div>
      <div class="modal-body">

			<div class="col-sm-12">
			  <select style="width:100%;" id="selop">
			  
			  <?php echo $selop;?>
			  </select>
			</div>
			<div class="col-sm-12">
			<div class="table-responsive" id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th>Name</th>
					<th>Qty</th>
					<th>Size</th>
					<th>BV</th>
					<th>Price</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody id="loadproduct">
					
				</tbody>
				</table>
		  	</div>
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-close">Close</button>
        <button type="button" class="btn btn-primary" id="nsubmit">Submit</button>
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
      var nid="";
		$(document).on("click",".actusr",function(){
			var val=$(this).val();
			alertify.confirm("Activate User",function(e){
				if(e){
					$(".actusr").prop('disabled', true);
					$.ajax({
					    type: "POST",
					    url: base_url+"welcome/activateBinaryUser",
					    dataType: "json",
					    data:{"user":val},
					    success: function(jsn) 
					    {
						    if(jsn[0].res==1){
							    alert("User Activated");
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
		$(document).on("click",".edtusr",function(){
			nid="";
			var val=$(this).val();
			$("#selop").val("");
			$("#loadproduct").html("");
					$.ajax({
					    type: "POST",
					    url: base_url+"welcome/getbinaryactprod",
					    dataType: "json",
					    data:{"user":val},
					    success: function(jsn) 
					    {
					    	$("#loadproduct").html("");
						    if(jsn.length>0){
						    	nid=val;
							    for(var i=0;i<jsn.length;++i){
								    var product_code=jsn[i].product_code;
								    var product_price=jsn[i].product_price;
								    var bv=jsn[i].bv;
									var qtopt="";
								    for(var j=1;j<=10;++j){
									    if(jsn[i].qty==j){
								    	qtopt+='<option selected>'+j+'</option>';
									    }
									    else{
									    	qtopt+='<option>'+j+'</option>';
									    }
								    }

								    var size=jsn[0].pro_size;
									size=size.split(",");

									var flag=false;
									for(var j=0;j<size.length;++j){
										if(size[j]!=""){
											if(jsn[i].size==size[j]){flag=true;}
										}
									}

									var szopt="";
									for(var j=0;j<size.length;++j){
										
										if(size[j]!=""){
											if(flag==false){
												szopt+='<option>'+jsn[i].size+'</option>';
											}
											 if(jsn[i].size==size[j]){
												 		szopt+='<option selected>'+size[j]+'</option>';
												    }
												    else{
												    	szopt+='<option>'+size[j]+'</option>';
												    }
										}

										
									}

									if(szopt==""){
										szopt='<option value="">Free</option>';
									}
									
								    
						    		$("#loadproduct").append('<tr>'+
											'<td><input type="hidden" name="nprod" value="'+jsn[i].product_id+'">'+product_code+'</td>'+
											'<td><select name="qtname">'+qtopt+'</select></td>'+
											'<td><select name="szname">'+szopt+'</select></td>'+
											'<td>'+bv+'</td>'+
											'<td>'+product_price+'</td>'+
											'<td><button class="delprod" value="'+jsn[i].product_id+'">Delete</button></td>'+
								    		'</tr>');
							    }
						    }
					    }
					    });
		});

		$(document).on("click",".delprod",function(){
			$(this).closest("tr").remove();
		});

		$(document).on("change","#selop",function(){
			var pid=$(this).val();
			var nprod=document.getElementsByName('nprod');
			flag=0;
			$("#selop").val("");
			for(var x=0;x<nprod.length;++x)
			{
				if(pid==nprod[x].value){
				flag=1;
				}

			}

			if(flag==1){
				alertify.error("Product Already Exists");
			}
			else{
					$.ajax({
					    type: "POST",
					    url: base_url+"welcome/getproduct",
					    dataType: "json",
					    data:{"pid":pid},
					    success: function(jsn) 
					    {
					    	  for(var i=0;i<jsn.length;++i){
								    var product_code=jsn[i].product_code;
								    var product_price=jsn[i].product_price;
								    var bv=jsn[i].bv;
									var qtopt="";
								    for(var j=1;j<=10;++j){
									    	qtopt+='<option>'+j+'</option>';
								    }

								    var size=jsn[0].pro_size;
									size=size.split(",");

									var flag=false;
									for(var j=0;j<size.length;++j){
										if(size[j]!=""){
											if(jsn[i].size==size[j]){flag=true;}
										}
									}

									var szopt="";
									for(var j=0;j<size.length;++j){
										if(size[j]!=""){
												szopt+='<option>'+size[j]+'</option>';
											}
										}

									if(szopt==""){
										szopt='<option value="">Free</option>';
									}
									
								    
						    		$("#loadproduct").append('<tr>'+
											'<td><input type="hidden" name="nprod" value="'+jsn[i].product_id+'">'+product_code+'</td>'+
											'<td><select name="qtname">'+qtopt+'</select></td>'+
											'<td><select name="szname">'+szopt+'</select></td>'+
											'<td>'+bv+'</td>'+
											'<td>'+product_price+'</td>'+
											'<td><button class="delprod" value="'+jsn[i].product_id+'" value="'+jsn[i].product_id+'">Delete</button></td>'+
								    		'</tr>');
							    }
					    }
					});
			}
		});

		$(document).on("click","#nsubmit",function(){
			var nprod=document.getElementsByName('nprod');
			var qtname=document.getElementsByName('qtname');
			var szname=document.getElementsByName('szname');
			var flag=0;
			var nprodarr=[];

			if(nprod.length==0){
					alertify.confirm("Change the user to Free User", function(e){
					if(e){
						$.ajax({
						    type: "POST",
						    url: base_url+"welcome/changeToFreeUser",
						    dataType: "json",
						    data:{"user":nid},
						    success: function(jsn) 
						    {
							if(jsn[0].result == 1){
							alert("User changed to Free");
							location.reload();
							} else{alert("Something went wrong");};
						    }
						});
					} else{alertify.error("Please Select a product");}
					});
				}
			else{
				for(var x=0;x<nprod.length;++x)
				{
					var obj={};
					obj['pid']=nprod[x].value;
					obj['qty']=qtname[x].value;
					obj['size']=szname[x].value;
					nprodarr.push(obj);
					if(nprod[x].value==""){flag=1;}
				}
				//nid
				if(flag==1){
					alertify.error("Product Error");
				}
				else{
					
					$("#nsubmit").prop('disabled', true);
					$.ajax({
					    type: "POST",
					    url: base_url+"welcome/edituserproduct",
					    dataType: "json",
					    data:{"uid":nid,"product":JSON.stringify(nprodarr)},
					    success: function(jsn) 
					    {
							if(jsn[0].res==1){
								alert("User's Product Edited");
								location.reload();
							}
							else{
								alertify.error(jsn[0].msg);
								$("#nsubmit").prop('disabled', false);
							}
					    }
					});
				}
			}
		});
		
      </script>
</body>
</html>
