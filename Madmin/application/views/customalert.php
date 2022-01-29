<?php 
include 'sessioncheck.php';
include 'dbconnection.php';
$qry=mysqli_query($connect,"select re_product_id,product_name from repurchase_product order by re_product_id desc");

//mysqli_next_results($connect);

$qry2=mysqli_query($connect,"select * from custom_alert order by id desc limit 1");

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
  	    <h3>CUSTOM ALERT</h3>
    	    <div class="well1 white">
        
         <div class="form-floating">
         
         	<div class="act_in_section">
				<?php 
				$title="";$description="";$productid="";$link="";$flag=0;$aclnk1="";$aclnk2="";$aclnk0="";
				$disp1="none";$disp2="none";
				 if(mysqli_num_rows($qry2)>0)
					{
						
						while($row1=mysqli_fetch_assoc($qry2))
						{
							$id=$row1['id'];
							$title=$row1['title'];
							$description=$row1['description'];
							$productid=$row1['pid'];
							$link=$row1['link'];
							$image=$row1['image'];
							$flag=$row1['flag'];
							
							if($productid!=""){
								$aclnk1='checked="checked"';
								$lnkaccess='style="display:none;"';
								$lnkaccess1='style="display:block;"';
							}
							else if($link!=""){
								$aclnk2='checked="checked"';
								$lnkaccess='style="display:block;"';
								$lnkaccess1='style="display:none;"';
							}
							else{
								$aclnk0='checked="checked"';
								$lnkaccess='style="display:none;"';
								$lnkaccess1='style="display:none;"';
							}

						}
						
						if($flag==0){
							$disp1="block";
						}
						else{
							$disp2="block";
						}
						

						?>
						<button type="button" class="btn btn-info active_user" value="<?php echo $id;?>" value1="1" style="display:<?php echo $disp1;?>;">Activate</button>
						<button type="button" class="btn btn-danger inactive_user" value="<?php echo $id;?>"  value1="0" style="display:<?php echo $disp2;?>;">Deactivate</button>
						<?php
						
					}
				?>
			  </div>
			  
			  
          <fieldset>
          <div class="col-sm-12 reset-level-one">
            <div class="form-group">
              <label class="control-label" for="scharge">Title</label>
              <input type="text" class="form-control1" id="title" value="<?php echo $title;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Message</label>
              <input type="text" class="form-control1" id="message" value="<?php echo $description;?>">
            </div>
            
             <div class="form-group">
              <label class="control-label" for="scharge" style="color: #0003ff;font-weight: 600;">Select Link/Product</label>
            </div>
            
            
             <div class="form-group">
              <label class="control-label" for="scharge">
              <input type="radio" name="lnk" class="lnk" value="0" <?php echo $aclnk0;?>> No Link</label>
            </div>
            
             <div class="form-group">
              <label class="control-label" for="scharge">
              <input type="radio" name="lnk" class="lnk" value="1" <?php echo $aclnk2;?>> Link</label>
              <input type="text" class="form-control1" id="link" value="<?php echo $link;?>" <?php echo $lnkaccess;?>>
            </div>
            
             <div class="form-group">
              <label class="control-label" for="scharge">
              	<input type="radio" name="lnk" class="lnk" value="2" <?php echo $aclnk1;?>> Product</label>
              <select class="form-control1" id="product" <?php echo $lnkaccess1;?>>
	              <option value="">Select</option>
	              <?php 
	              if(mysqli_num_rows($qry)>0)
					{
						while($row=mysqli_fetch_assoc($qry))
						{
							$pid=$row['re_product_id'];
							$product_name=$row['product_name'];
							
							if($productid==$pid){
							echo '<option value="'.$pid.'" selected>'.$product_name.'</option>';
							}
							else{
								echo '<option value="'.$pid.'">'.$product_name.'</option>';
							}
						}
					}
					?>
              </select>
            </div>
            			
            
            <?php 
              		if($image!=""){
              			$imgval=base_url().'uploads/'.$image;
              			$acimg1='checked="checked"';
              			$imgdix='style="display:block;"';
              		}
              		else{
              			$imgval="";
              			$acimg0='checked="checked"';
              			$imgdix='style="display:none;"';
              		}
              	?>
              	

            <div class="form-group">
              <label class="control-label" for="scharge" style="color: #0003ff;font-weight: 600;">Select Image</label>
            </div>
            
            
            <div class="form-group">
             	  <input type="radio" name="chkimg" class="chkimg"  value1="0" <?php echo $acimg0;?>> No Image
             	   &nbsp;&nbsp;&nbsp;
             	 <input type="radio" name="chkimg" class="chkimg chkimg1" value="<?php echo $imgval;?>" value1="1" <?php echo $acimg1;?>> Image <span style="color:red;">(320 x 260px)</span></label>
             	 &nbsp;&nbsp;&nbsp;
             	 <!-- <button type="text" class="btn btn-secondary" id="selimage" data-toggle="modal" data-target="#myModal">Select</button> -->
             	<div id="imgdix" <?php echo $imgdix;?>>
             	  <input type="file" name="file" class="form-control1" id="file" accept="image/*">
              	<p id="image">
              		<?php 
              		echo '<div class="col-sm-3" style="margin-top: 10px;">
						<div class="image-box" style="border: 0px;">
	                  		<img style="cursor:pointer;" class="selectimage" src="'.$imgval.'">
	                     </div>';
              		?>
              	<p>
              	</div>

              
            </div>
            </div>
			
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sub">Submit</button>
              <p style="color: #459cff;">( Note - Custom Alert requires atleast one value. )</p>
            </div>
            
            <div class="form-group printmsg">
              
            </div>
          </fieldset>
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
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">SELECT IMAGE</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
		  <input type="hidden" id="pid">
			<div class="col-sm-10">
			  <input type="file" class="form-control1" id="">
			</div>
		  </div>
		   
		   
		  
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="subimg">Submit</button>
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
    	  
    	  var base_url=getUrl();

    	  $(document).on("click",".active_user",function()
    	    	    {
    	      	    	var id=$(this).attr("value");
    	      	    	var val=$(this).attr("value1");
    	      	    	activation(id,val);
    	    	    });
    	  $(document).on("click",".inactive_user",function()
    	    {
      	    	var id=$(this).attr("value");
      	    	var val=$(this).attr("value1");
      	    	activation(id,val);
    	    });




    	    $("#file").change(function()
    	    	    {
    	    	    	Browseimage(this);
    	    	    });



      	  $(document).on("click",".chkimg",function()
          		{
          		  var val=$(this).attr("value1");
          		  if(val==0)
          		  {
          			  $("#imgdix").css("display","none");
          			  $("#file").val("");
						var imgval=$(".chkimg1").val();
          			  if(imgval!=""){
          				$(".selectimage").attr("src",imgval);
          			  }
          			  else{
          				$(".selectimage").attr("src","");
          			  }
          		  }
          		  else{
          			  $("#imgdix").css("display","block");
          		  }
          		});


      	  $(document).on("click",".lnk",function()
            		{
      					var val=$(".lnk:checked").val();
            		  if(val==1)
            		  {
          					$("#product").val("");
          					$("#product").css("display","none");
          					$("#link").css("display","block");
            		  }
            		  else if(val==2){
            			 	 $("#link").val("");
            			 	 $("#link").css("display","none");
            			 	$("#product").css("display","block");
            		  }
            		  else{
            			  	$("#link").val("");
        					$("#product").val("");
        					$("#product").css("display","none");
          					$("#link").css("display","none");
            		  }
            		});

    	    
    	    
    	  $("#sub").click(function()
    	  {
				var title=$("#title").val();
				var message=$("#message").val();
				    		  
				var val=($("#file").val()).toLowerCase();
				var chkimg1=$(".chkimg1").val();
				
				
				var lnkflg=$(".lnk:checked").val();
				var imgflg=$(".chkimg:checked").attr("value1");

				if(lnkflg==null){lnkflg=0;}
				if(imgflg==null){imgflg=0;}

				var lnk=$("#link").val();
				var product=$("#product").val();

	     	   if(lnkflg==0){lnk="";product="";}

	     	   var image="";

	     	   if(imgflg==1){
		     	   if(val!="")
			     	  {image=val;}
		     	   else if(chkimg1!="")
		     	 		 {image=chkimg1;}
		     	   else{image="";}
	     	   }
	     	   

	    	  	if(title=="" && message=="" && lnk=="" && product=="" && image=="")
	    	  	{
	    	  		 alertify.error("Enter Atleast Value");  	
	    	  	}
	    	  	else if(lnkflg>0 && lnk=="" && product==""){
		    	  	if(lnkflg==1 && lnk=="")
		    	  	{
		    	  		alertify.error("Enter Link");
		    	  	}
		    	  	else if(lnkflg==2 && product=="")
		    	  	{
		    	  		alertify.error("Select Product");
		    	  	}
		    	  	
	    	  	}
	    	  	else if(imgflg==1 && image=="")
	    	  	{
	    	  		alertify.error("Select Image");
	    	  	}
	    	  	else
	    	  	{
		    	  	var imaging=0;
		    	  	if(imgflg==1 && val!=""){imaging=1;}
		    	  	else if(imgflg==1 && chkimg1!=""){imaging=2;}
		    	  	else{imaging=0;}
		    	  	
	    	  		      var file_data = $('#file').prop('files')[0];
	    	  			  var form_data = new FormData();

	    	  				form_data.append('title', title);
	    	  				form_data.append('message', message);
	    	  				form_data.append('lnk', lnk);
	    	  				form_data.append('product', product);
	    	  				form_data.append('imaging', imaging);
	    	  				
	    	  			  	form_data.append('file', file_data);
	    	  			 // alert(base_url+"welcome/AddProAction?productname="+productname+""+product_decription++productprice);
	    	  			
	    	             document.getElementById("sub").disabled = true;
	    	             $.ajax({
		    	  				url: base_url+"welcome/uploadCA", // point to server-side controller method
		    	  				dataType: 'json', // what to expect back from the server
		    	  				cache: false,
		    	  				contentType: false,
		    	  				processData: false,
		    	  				data:form_data,
		    	  				 type: 'post',
		    	  			     success: function (json) {
		    	  			    	 if(json.w==1)
		    	  	    				{
		    	                            document.getElementById("sub").disabled = false;
		    	  							alertify.success(json.result);			
		    	  							setTimeout(function() {location.reload();}, 1500);
		    	  	    				}
		    	  	    				else
		    	  	    				{
		    	                            document.getElementById("sub").disabled = false;
		    	  	    					alertify.error(json.result);
		    	  	    				}
		    	  					 }
	    	  				 });
	    	  		}

    	  		
    	  	});


  	    function Browseimage(input) {
	    	//alert("kk");
	    	$('.image-box').html("");
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	               // $('#pic').attr('src', e.target.result);
	            	$('.image-box').append('<img class="selectimage" src="'+ e.target.result+'">');
	            }

	            reader.readAsDataURL(input.files[0]);
	        }
	    }



	    function activation(id,val){
	    	//alert(base_url+"welcome/changeCAStatus?id="+id+"&val="+val);
		    $.getJSON(base_url+"welcome/changeCAStatus",{"id":id,"val":val},function(jsn)
			      	  		{
					      	  	if(jsn[0].result==1)
				  				{
										if(val==0)
										{
											$(".active_user").css("display","block");
											$(".inactive_user").css("display","none");
										}
										else{
											$(".active_user").css("display","none");
											$(".inactive_user").css("display","block");
										}
				  				}
			      	  		});
	    }
    	  	
    	});

      </script>
</body>
</html>
