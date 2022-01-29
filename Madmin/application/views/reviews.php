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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>

<style>
.selectimage
{
	width:200% !important;
}

/*---------- star rating ----------*/
.ratings {
  position: relative;
  vertical-align: middle;
  display: inline-block;
  color: #818181;
  overflow: hidden;
}

.full-stars{
  position: absolute;
  left: 0;
  top: 0;
  white-space: nowrap;
  overflow: hidden;
  color: #fde16d;
}

.empty-stars:before,
.full-stars:before {
  content: "\2605\2605\2605\2605\2605";
  font-size: 14pt;
}

.empty-stars:before {
  -webkit-text-stroke: 1px #848484;
}

.full-stars:before {
  -webkit-text-stroke: 1px orange;
}

/* Webkit-text-stroke is not supported on firefox or IE */
/* Firefox */
@-moz-document url-prefix() {
  .full-stars{
    color: #ECBE24;
  }
}
/* IE */
<!--[if IE]>
  .full-stars{
    color: #ECBE24;
  }
<![endif]-->
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
  	    <h3>REVIEWS & RATINGS</h3>
    	    <div class="well1 white">
        <div class="act_in_section">
       	 <button class="btn btn-info addreview" data-toggle="modal" data-target="#myModal">ADD</button>
        </div>
 			<table class="table table-bordered">
				<thead>
				  <tr>
				  <th>No</th>
					<th>Name</th>
					<th style="width: 25%;">Product</th>
					<th>Rating</th>
					<th>Heading</th>
					<th style="width: 25%;">Review</th>
					<th>Date</th>
					<th style="width: 12%;">Action</th>
				  </tr>
				</thead>
				
				<tbody id="proappend">
				
				
					       <?php
		
	   //$productId
		$query = mysqli_query($connect,"SELECT *,
				(select p.product_name from repurchase_product p where p.re_product_id=pr.pid) as proname,
				(select ue.u_name from user_extradetails ue where ue.u_id=pr.u_id) as name
				FROM product_rating pr where pr.flag=0 order by pr.date desc");
		
		$qry=mysqli_query($connect,"select re_product_id as pid ,product_name as nm from repurchase_product order by product_name asc");
		
		
		if(mysqli_num_rows($query)>0){
			$i=1;
			while($row1=mysqli_fetch_assoc($query))
			{
			$rname=$row1['name'];
			$rproname=$row1['proname'];
			$rrating=$row1['rating'];
			$rheading=$row1['heading'];
			$rreview=$row1['review'];
			$rdate=$row1['date'];
			$rtime=$row1['time'];
			$id=$row1['id'];
			$rt=($rrating/5)*100;
			?>
			
			 <tr id="row<?php echo $id?>">
			 <td><?php echo $i;?></td>
					<td><?php echo $rname;?></td>
					<td><?php echo $rproname;?></td>
					<td><div class="ratings"><div class="empty-stars"></div><div class="full-stars" style="width:<?php echo $rt;?>%"></div></div></td>
					<td><?php echo $rheading;?></td>
					<td><?php echo $rreview;?></td>
					<td><?php echo date("d F Y",strtotime($rdate))." ".$rtime;?></td>
					<td>
						<button type="button" class="btn btn-primary approve" style="padding: 1px 5px;" id="app<?php echo $id;?>">
						 <i class="fa fa-check" aria-hidden="true"></i>
						</button>
						<button type="button" class="btn btn-danger delete" style="padding: 1px 5px;" id="del<?php echo $id?>">
						  <i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</td>
					
				  </tr>
			
			<?php 
			$i++;
		}
		}
		
		
	
	?>

				 
				 
				</tbody>
			  </table>
        
        
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
	<!-- Modal -->
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ADD REVIEW</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
        
			<div class="form-group">
				<label for="pin" class="col-sm-2 control-label">User</label>
				<div class="col-sm-10">
				  <input type="text" id="usersrch" id="uid" placeholder="User" list="a_usr_details" class="form-control1">
				 <datalist id="a_usr_details">
				 
				 </datalist>
				</div>
			  </div>
			 <div class="form-group">
				<label for="pin" class="col-sm-2 control-label">Product</label>
				<div class="col-sm-10">
				  <select class="form-control1" id="product">
	              <option value="">Select</option>
	              <?php 
	              if(mysqli_num_rows($qry)>0)
					{
						while($row=mysqli_fetch_assoc($qry))
						{
							$pid=$row['pid'];
							$product_name=$row['nm'];
							echo '<option value="'.$pid.'">'.$product_name.'</option>';
						}
					}
					?>
              </select>
				</div>
			  </div>
			 <div class="form-group">
				<label for="pin" class="col-sm-2 control-label">Rating</label>
				<div class="col-sm-10">
				  <select class="form-control1" id="rating">
				  	<option>5</option>
				  	<option>4</option>
				  	<option>3</option>
				  	<option>2</option>
				  	<option>1</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label for="pin" class="col-sm-2 control-label">Heading</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control1" id="heading">
				</div>
			  </div>
			  <div class="form-group">
				<label for="pin" class="col-sm-2 control-label">Review</label>
				<div class="col-sm-10">
				  <textarea type="text" class="form-control1" id="review"></textarea>
				</div>
			  </div>
		   
		  
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close aclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="subrv">Submit</button>
      </div>
    </div>
  </div>
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
      
      </script>
      
      <script>
      $(document).ready(function()
    			{
    		
    						var url=getUrl();
    						var base_url=getUrl();
    						
    						$(document).on("click",".approve",function(js)
    						{
    							$('#message').text("");
    							var id=$(this).attr('id');
    							//alert(id);
    							Approved(url,id);
    						});
    						
    						$(document).on("click",".delete",function(js)
    						{
    							$('#message').text("");
    							var id=$(this).attr('id');
    							//alert(id);
    							Deleted(url,id);
    						});

    						$("#usersrch").keyup(function(e)
    								{ 	
    									 UserSuggestion(base_url,e);
    								});

							
    						$("#subrv").click(function()
    	    				{
    							var value2send="";
	    						var shownVal= document.getElementById("usersrch").value;
	    						if(shownVal!="")
	    						{
	    							value2send=document.querySelector("#a_usr_details option[value='"+shownVal+"']").dataset.value;
	    							
	    						}
	    						//alert(value2send);

	    						var product=$("#product").val();
	    						var rating=$("#rating").val();
	    						var heading=$("#heading").val();
	    						var review=$("#review").val();

	    						if(value2send=='')
	    						{
		    						alertify.error("Please Enter User");
	    						}

	    						else if(product=='')
	    						{
		    						alertify.error("Please select a product");
	    						}
	    						else if(rating=='')
	    						{
		    						alertify.error("Please select a rrating");
	    						}
	    						else if(heading=='')
	    						{
		    						alertify.error("Please heading");
	    						}
	    						else{

	    						$.getJSON(url+"welcome/addrating",{"id":value2send,"product":product,"rating":rating,"heading":heading,"review":review},function(jsn)
	    					    		{
	    					    			if(jsn[0].res==1)
	    					    			{
	    					    				alertify.success("Review Approved");
	    					    				$(".aclose").click();
	    					    				
	    					    			}
	    					    			else
	    					    			{
	    					    				alertify.error(jsn[0].msg);
	    					    				
	    					    			}
	    					    			
	    					    		});
	    						}
    	    				});
    						
    			});


      
    	function Deleted(url,id)
    	{
    		
    		var clid=id.slice(3);
    		
    		$.getJSON(url+"welcome/deleterve",{"id":clid},function(jsn)
    		{
    			var msg=jsn;
    			if(msg=="success")
    			{
    				alertify.success("Review Deleted");
    				$("#row"+clid).remove();
    				
    			}
    			else
    			{
    				alertify.error("Something went wrong!!!");
    				
    			}
    			
    		});

    	}


    	function Approved(url,id)
    	{
    		var clid=id.slice(3);
    		//alert(clid);
    		
    		$.getJSON(url+"welcome/approverve",{"id":clid},function(jsn)
    		{
    			var msg=jsn;
    			if(msg=="success")
    			{
    				
    				alertify.success("Review Approved");
    				$("#row"+clid).remove();
    				//alert(msg);
    				
    			}
    			else
    			{
    				$('#message').css('color','red');
    				//alert(msg);
    				$('#message').text("Error Occured");
    				
    			}
    		});
    	}


    	function UserSuggestion(base_url,e)
    	{
    		var text=$("#usersrch").val();
    		//alert(text);
    		if ((e.which == 38)||(e.which == 40)) {
    		}
    		else if(e.which == 13)
    		{
    			var searchproduct=$("#usersrch").val();
    			var delayMillis = 100; //1 second
    			setTimeout(function() {
    				$("#usersrch").val(searchproduct);
    				//searchproduct=$("#srch").val();
    				
    			}, delayMillis);
    			//arr(searchproduct);
    		}
    		else if(text=="")
    		{
    			 $("#a_usr_details").html("");
    			 //LoadProducts(base_url);
    		}
    		else
    		{		
    				 $("#a_usr_details").html("");	    		
    				 $.getJSON(base_url+"welcome/usersuggest_m1/",{"term":text}, function(json)
    				 {			
    					 $("#a_usr_details").html("");	
    					 //alert(JSON.stringify(json));
    							for(var i=0;i<json.length;i++)
    							{
    								$("#a_usr_details").append('<option data-value="'+json[i].u_id+'" value="'+json[i].u_name+','+json[i].u_city+','+json[i].u_mobile+'"></option>');

    							}				       				      
    				}); 
    		}

    	}

      </script>
</body>
</html>
