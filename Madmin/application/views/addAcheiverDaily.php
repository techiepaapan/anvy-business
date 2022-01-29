
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
<link href="<?php echo base_url();?>css/alertify.core.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/alertify.default.css" rel="stylesheet" type="text/css" /> 
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet" />

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/push.js?n=1"></script>
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
						<li class="m_2"><a href="#"><i class="fa fa-lock"></i> Logout</a></li>	
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
  	  		  <h3>ADD DAILY ACHIVERS</h3>
  	  		  	<button type="text" class="btn btn-primary" id="selimage" data-toggle="modal" data-target="#myModal">Add Achiver</button>
			              
  	    		<div class="well1 white">
        
         		 <div class="form-floating">
         		 <fieldset>
         			 <div class="col-sm-12 reset-level-one">
          			   	
          			   		<table class="table table-bordered">
								<thead>
								  <tr>
									
									<th>NO</th>
									<th>NAME</th>
									<th>INCOME</th>
									<th>IMAGE</th>
									<th>ACTIONS</th>
								  </tr>
								</thead>
								<tbody id="tdatas">
								
								</tbody>
			           	</table>

			           <!-- <div class="form-group">
			             	 <label class="control-label" for="scharge">Image</label>
			             	 &nbsp;&nbsp;&nbsp;
			             	<!-- <button type="text" class="btn btn-secondary" id="selimage" data-toggle="modal" data-target="#myModal">Select</button>
			              	<p id="image"><p> --> 
			              	
			              
			        
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
    
    
    
   
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ADD ACHIEVER</h4>
      </div>
     
      <div class="modal-body">
	    
	     
	     			<div class="col-sm-12 reset-level-one">
	     			<!-- <form action="<?php //echo base_url();?>welcome/achiveact" enctype="multipart/form-data" method="post">
	          			    -->  <div class="form-group">
	           				   <label class="control-label" for="scharge">Name</label>
	            				<input type="text" class="form-control1" name="ach_name" id="achvr">
	         			   </div>
				            <div class="form-group">
				              <label class="control-label"  for="scharge">Income</label>
				              <input type="number"  class="form-control1"  name="ach_comment" id="ach_comment"/>
				             
				            </div>
	          <!-- <div class="form-group">
	              <label class="control-label" for="scharge">Message</label>
	              <input type="text" class="form-control1" id="message" value="">
	            </div> -->  
	
				            <div class="form-group">
				             	 <label class="control-label" for="scharge">Image(180x180px)</label>
				             	 &nbsp;&nbsp;&nbsp;
				             	<!-- <button type="text" class="btn btn-secondary" id="selimage" data-toggle="modal" data-target="#myModal">Select</button>
				              	<p id="image"><p> --> 
				              	
								 <input type="file" name="image" id="image" class="form-control1">
				              
				              
				            </div>
				             <button type="submit" id="clk" class="btn btn-primary">Submit</button>
				      <!-- </form> --> 
	         	
	            		</div>
	    		 
				
			            
			            <div class="form-group printmsg">
			              
			            </div>
	         	 
					      
      </div>
     
		      <div class="modal-footer">
		        <button type="button" class="btn btn-close aclose" data-dismiss="modal">Close</button>
		     
		      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT ACHIVER</h4>
      </div>
     
      <div class="modal-body">
	    
	     
	     			<div class="col-sm-12 reset-level-one">
	     			<!-- <form action="<?php //echo base_url();?>welcome/achiveact" enctype="multipart/form-data" method="post">
	          			    -->  <div class="form-group">
	           				   <label class="control-label" for="scharge">Name</label>
	            				<input type="text" class="form-control1" name="ach_name1" id="ach_name1">
	         			   </div>
				            <div class="form-group">
				              <label class="control-label"  for="scharge">Income</label>
				              <input type="number"  class="form-control1"  name="ach_comment1" id="ach_comment1"/>
				             
				            </div>
	          <!-- <div class="form-group">
	              <label class="control-label" for="scharge">Message</label>
	              <input type="text" class="form-control1" id="message" value="">
	            </div> -->  
	
				            <div class="form-group">
				             	 <label class="control-label" for="scharge">Image(180x180px)</label>
				             	 &nbsp;&nbsp;&nbsp;
				             	<!-- <button type="text" class="btn btn-secondary" id="selimage" data-toggle="modal" data-target="#myModal">Select</button>
				              	<p id="image"><p> --> 
				              	
								 <input type="file" name="image1" id="image1" class="form-control1">
				              	<img src="" id="pik" style="height:180px; width:180px;"/>
				              
				            </div>
				             <button type="submit" id="clk1" class="btn btn-primary">Submit</button>
				      <!-- </form> --> 
	         	
	            		</div>
	    		 
				
			            
			            <div class="form-group printmsg">
			              
			            </div>
	         	 
					      
      </div>
     
		      <div class="modal-footer">
		        <button type="button" class="btn btn-close aclose" data-dismiss="modal">Close</button>
		     
		      </div>
    </div>
  </div>
</div>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
<script>
$( document ).ready(function()
{
    
		var base_url="<?php echo base_url();?>";
		
		$.getJSON(base_url+"welcome/loaddailyachiever",function(jsn)
		{	
			
			
			if(jsn.length>0)
			{	var n=0;
				for(var i=0;i<jsn.length;i++)
				{	var ID=jsn[i].id;
					n++;
					$("#tdatas").append('<tr><td>'+n+'</td><td>'+jsn[i].name+'</td><td>'+jsn[i].income+'</td><td><img style="width:150px; height:150px;" src="../../images/daily_acheivers/'+jsn[i].image+'"></td><td><br><button class="edit" data-toggle="modal" data-target="#myModal1"  value="'+jsn[i].id+'">   Edit  </button></br><br><button class="delete" value="'+jsn[i].id+'">delete</button</br></td></tr>')
				}
				
			}
		});	
		
		 $(document).on('click','.delete', function()
		{
			 var del_id=$(this).val();
			 //alert(del_id);
			 $.getJSON(base_url+"welcome/deletedatadaily?del_id="+del_id,function(jsn)
						{	
							 var mesg=jsn;
								if(mesg="success")
								{
									alert("Deleted successfully");
									//window.location.href=base+"welcome/addachiver";
									location.reload();
								}
								else
								{
									alert("error");
									//window.location.href=base;
								}
						});	
		});
		 $(document).on('click','.edit', function()
		 {
			 
			 var ach_id=$(this).val();
		   //  alert(val1);
			 $.getJSON(base_url+"welcome/loadtabledatadaily?ach_id="+ach_id,function(jsn)
						{	
							
							$('#ach_name1').val(jsn[0].name);
							$('#ach_comment1').val(jsn[0].income);
							//$('#image1').val(jsn[0].image);
							$("#pik").prop('src',"../../images/daily_acheivers/"+jsn[0].image);
						});	
				
					$("#clk1").click(function()	
						{	//alert(ach_id);
							var ach_name1=$("#ach_name1").val();
							var ach_comment1=$("#ach_comment1").val();
							
							//var formData = new FormData();
				
								var base="<?php echo base_url();?>";

								var file_data1 = $('#image1').prop('files')[0];
								    var form_data1 = new FormData();
								    form_data1.append('image1', file_data1);
								    form_data1.append('ach_name1', ach_name1);
								    form_data1.append('ach_comment1', ach_comment1);
								    form_data1.append('ach_id', ach_id);
								  
			                    
								$.ajax({
						             url:base+"welcome/achievedailyupdate",
						             type: "POST",
						             dataType: 'text', // what to expect back from the server
				                        cache: false,
				                        contentType: false,
				                        processData: false,
				                        data: form_data1,
				                       
						              success: function(json){
						                 // alert(JSON.stringify(json));
						                  var mesg=json;
											if(mesg="success")
											{
												alert("Edited successfully");
												location.reload();
											}
											else
											{
												alert("error");
												//window.location.href=base;
											}
						           }
						         });
						
						});
		     
		 });
		
		$("#clk").click(function()
				{
					var ach_name=$("#achvr").val();
					var ach_comment=$("#ach_comment").val();
					
					//var formData = new FormData();
		
						var base="<?php echo base_url();?>";

						var file_data = $('#image').prop('files')[0];
						    var form_data = new FormData();
						    form_data.append('image', file_data);
						    form_data.append('ach_name', ach_name);
						    form_data.append('ach_comment', ach_comment);
						    
	                    
						$.ajax({
				             url:base+"welcome/achievedailyact",
				             type: "POST",
				             dataType: 'text', // what to expect back from the server
		                        cache: false,
		                        contentType: false,
		                        processData: false,
		                        data: form_data,
		                       
				              success: function(json){
				                 // alert(JSON.stringify(json));
				                  var mesg=json;
									if(mesg="success")
									{
										alert("Added successfully");
										location.reload();
										//location.reload;
									}
									else
									{
										alert("error");
										//window.location.href=base;
									}
				           }
				         });
				
				});
	
		
});			
</script>

</body>
</html>
