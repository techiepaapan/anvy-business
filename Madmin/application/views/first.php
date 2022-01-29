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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<style>
input[type="file"].newimg {
    width:90px;
}
</style>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/SliderImg.js"></script>
</head>
<body>
<?php 
include 'dbconnection.php';
$qry2=mysqli_query($connect,"select count(f.firstcombo_id) as nreg from repurchase_product rp,firstcombo f where rp.re_product_id=f.re_product_id");
$i=1;
//echo "row=".mysqli_num_rows($qry);
$nreg=0;
if(mysqli_num_rows($qry2)>0)
{
	if($row2=mysqli_fetch_assoc($qry2))
	{
		$nreg=$row2['nreg'];
		if($nreg>=5)
		{
			$dis="display:none;";
		}
		else 
		{
			$dis="display:block;";
		}
	}
}


?>
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
  	    <h3>APP SLIDER 1</h3>
  	    <div class="well1 white">
		<div class="input-group" >
			<button type="button" class="btn btn-danger editpro" data-target="#add_new" style="<?php echo $dis?>" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
		</div>
        <div class="bs-example4" >
  
			<div class="table-responsive" >
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th style="width:300px;">Image</th>
					<th>Product</th>
					<th>Edit</th>
					
				  </tr>
				</thead>
				<tbody id="proappend">
				<!--  -->
				</tbody>
		</table>
		</div>
		  </div> 
      </div>
    </div>
    <div class="copy_layout">
      <p>Copyright &copy; 2018 Mass Venture. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
   </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="add_new">
  <div class="modal-dialog" role="document" style="width: 75%;">
  <!--    <form method="post" action="<?php //echo base_url();?>welcome/AddSliderimg" enctype="multipart/form-data">
   -->        
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ADD</h4>
      </div>
     
      <div class="modal-body">
       
       <div class="">
		 <table class="table table-bordered">
		 <thead>
		 <tr>
		 	<th>Image</th>
		 	<th>Browse</th>
		 	<th style="width: 50%;">Product</th>
		 	</tr>
		 </thead>
		 <tbody>
		 <tr>
		 
		 	<td><div class="image-box" id="imgboxs"><img src="<?php echo base_url();?>images/default.jpg"></div></td>
		 	<td>Size: 320 x 260px<br/> <input type="file"  name="file1" class="newimg" id="file1"></td>
		 	<td><input type="text" name="productname" id="srch" list="prolist" style="width: 100%;">
		 	<datalist id="prolist"></datalist></td>
	 	</tr>
		 </tbody>
 		 </table>
		 </div>

      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-close editclose" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add_slider">Add</button>
      </div>
    
    </div>
 <!--   </form> --> 
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="edit_new">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT</h4>
      </div>
     
      <div class="modal-body">
       
       <div class="">
		 <table class="table table-bordered">
		 <thead>
		 <tr>
		 	<th>Image</th>
		 	<th>Browse</th>
		 
		 	</tr>
		 </thead>
		 <tbody>
		 <tr>
		 	<td><div class="image-box" id="imgbox2"><img src="<?php echo base_url();?>images/default.jpg"></div></td>
		 	<td>Size: 320 x 260px<br/> <input type="file" id="file2" name="file2" class="newimg"></td>
		 	
	 	</tr>
		 </tbody>
 		 </table>
		 </div>

      </div>
     <input type="hidden" id="pid" value="0">
      <div class="modal-footer">
        <button type="button" class="btn btn-close editclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edtsli">Save</button>
      </div>
    
    </div>
  </div>
</div>
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>

</body>
</html>
