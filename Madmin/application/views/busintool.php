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
  	    <h3>BUSINESS TOOLS</h3>
  	    <div class="well1 white">
		<div class="input-group new_input_group" id="pin-editt">
			<div class="frm-date">
				Subject: 
				<input type="text" class="form-control input-md" id="subject" placeholder="Subject">
			</div>
			<div class="frm-date">
				Select File:
				 <input type="file" class="form-control input-md"  name="file" id="file">
			</div>
			<div class="search">
				<button class="btn btn-lg btn-success1 btn-block" id="tool_submit" type="submit">Submit</button>
			</div>
		</div>

        <div class="bs-example4" data-example-id="simple-responsive-table">
    
			<div class="table-responsive" id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					
					<th>SL No.</th>
					<th>Subject</th>
					<th>Open</th>
					<th>Delete</th>
				  </tr>
				</thead>
				<tbody id="editappend">

 
				<?php 
				include 'dbconnection.php';
				
				$qry=mysqli_query($connect,"SELECT * FROM business_tools order by id desc");
				if(mysqli_num_rows($qry)>0)
				{
					$i=0;
					while($row=mysqli_fetch_assoc($qry))
					{$i++;
						$id=$row['id'];
						$subject=$row['subject'];
						$tool=$row['tool'];
					
				?>
				
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $subject;?></td>
					<td>
						 <a href="../../Muser/uploads/tools/<?php echo $tool?>"  target="_blank" download>
						 	<button type="button" class="btn btn-primary"  value="<?php echo $id;?>">
							<i class="fa fa-download" aria-hidden="true"></i>
							</button>
						</a>
					</td>
					<td>
						<button type="button" class="btn btn-danger delbt" title="delete" value="<?php echo $id;?>" value2="<?php echo $tool;?>">
						  <i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</td>
					
				  </tr>
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
        <h4 class="modal-title" id="myModalLabel">EDIT PIN</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
		  <div class="form-group">
		  <input type="hidden" id="pid">
			<label for="pin" class="col-sm-2 control-label">PIN</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="edspin">
			</div>
		  </div>
		   
		   
		  
		  
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edtpin_sub">Edit</button>
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

    	  
    	  $(document).on("click",".delbt",function()
    	    {
      	    	var id=$(this).attr("value");
      	    	var tool=$(this).attr("value2");
				alertify.confirm("Delete This Business Tool?",function(e){

					if(e){
			      	  	$.getJSON(base_url+"welcome/deleteBTool",{"id":id,"tool":tool},function(jsn)
				      	  		{
						      	  	if(jsn.result==1)
					  				{
											alertify.success('Business Tool Deleted');			
											setTimeout(function() {location.reload();}, 1500);
					  				}
					  				else
					  				{
					  					alertify.error("Error! Could not delete file");
					  				}
				      	  		});
					}
				});

    	    });
    	  $("#tool_submit").click(function()
    	  {
    	      var subject=$("#subject").val();
    	      var val=($("#file").val()).toLowerCase();
    	     //alert(p_code);
    	  	if(subject=="")
    	  	{
    	  		 alertify.error("Enter Subject");  	
    	  	}
    	  	else if(val=="")
    	  	{
    	  		alertify.error("Select File To Upload");  	
    	  	}
    	  	else
    	  	{
    	  		      var file_data = $('#file').prop('files')[0];
    	  			  var form_data = new FormData();
    	  			    
    	  				form_data.append('subject', subject);
    	  			  form_data.append('file', file_data);
    	  			 // alert(base_url+"welcome/AddProAction?productname="+productname+""+product_decription++productprice);
    	  			
    	             document.getElementById("tool_submit").disabled = true;
    	             $.ajax({
	    	  				url: base_url+"welcome/uploadBTool", // point to server-side controller method
	    	  				dataType: 'json', // what to expect back from the server
	    	  				cache: false,
	    	  				contentType: false,
	    	  				processData: false,
	    	  				data:form_data,
	    	  				 type: 'post',
	    	  			     success: function (json) {
	    	  			    	 if(json.w==1)
	    	  	    				{
	    	                            document.getElementById("tool_submit").disabled = false;
	    	  							alertify.success(json.result);			
	    	  							setTimeout(function() {location.reload();}, 1500);
	    	  	    				}
	    	  	    				else
	    	  	    				{
	    	                            document.getElementById("tool_submit").disabled = false;
	    	  	    					alertify.error(json.result);
	    	  	    				}
	    	  					 }
    	  				 });
    	  		}

    	  		
    	  	});
    	});

      </script>
</body>
</html>
