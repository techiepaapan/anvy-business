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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/AddProduct.js?n=<?php rand(10,1000);?>"></script>
<style>

.ajax-loader {
  visibility: hidden;
  background-color: rgba(255,255,255,0.7);
  position: absolute;
  z-index: +100 !important;
  height: 100%;
margin-left: 18%;
width: 82%;
margin-top: 13%;
}

.ajax-loader img {
  position: relative;
  top:30%;
  left:50%;
}
</style>
</head>
<body>
<div class="col-md-10 ajax-loader">
					   	<img style="left:30%;" src="<?php echo base_url(); ?>images/processing.gif"/>
					 </div>
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
  	    <h3>ADD PRODUCT</h3>
  	    <div class="well1 white">
        <div class="form-floating">
     <!--   <form action="<?php //echo base_url();?>welcome/AddProAction" method="post" enctype="multipart/form-data">-->  
          <fieldset>
            <div class="form-group">
              <label class="control-label" for="productname">Product Name</label>
              <input type="text" class="form-control1" id="productname" name="productname" placeholder="Product Name">
            </div>
            <div class="form-group">
              <label class="control-label" for="productcode">Product Code</label>
              <input type="text" class="form-control1" id="productcode" name="productcode" placeholder="Product Code">
            </div>
			 <div class="form-group">
              <label class="control-label" for="productprice">Price</label>
              <input type="text" class="form-control1" id="productprice" value="4950.00" name="productprice" placeholder="Price">
            </div>
             <div class="form-group">
              <label class="control-label" for="product-decription">Discount</label>
              <input type="text" class="form-control1" id="discounted_price" placeholder="Discount" value="0">
            </div>
            
            <div class="form-group">
             <div class="col-xs-12 col-sm-12">
              <label class="control-label" for="product-decription">GST</label>
              </div>
              
               <div class="col-xs-4 col-sm-2 form-group">
             	 <input type="text" class="form-control1 gst" id="cgst" placeholder="CGST">
              </div>
               <div class="col-xs-4 col-sm-2 form-group">
              <input type="text" class="form-control1 gst" id="sgst" placeholder="SGST">
				</div>
               <div class=" col-xs-4 col-sm-2 form-group">
              <input type="text" class="form-control1 gst" id="igst" placeholder="IGST">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label" for="productbv">BV Points</label>
              <input type="text" class="form-control1" id="productbv" value="100" name="productbv" placeholder="BV Points">
            </div>
             <div class="form-group">
              <label class="control-label" for="product-decription">Quantity</label>
              <input type="text" class="form-control1" id="quantity" placeholder="Quantity">
            </div>
            <div class="form-group">
             <div class="col-xs-12 col-sm-12">
              <label class="control-label" for="product-decription">Size</label>
              </div>
              
               <div class="col-xs-4 col-sm-2 form-group">
             	 <input type="text" class="form-control1 szval" id="sz1" placeholder="Size">
              </div>
               <div class="col-xs-4 col-sm-2 form-group">
              <input type="text" class="form-control1 szval" id="sz2" placeholder="Size">
				</div>
               <div class=" col-xs-4 col-sm-2 form-group">
              <input type="text" class="form-control1 szval" id="sz3" placeholder="Size">
              </div>
               <div class="col-xs-4 col-sm-2 form-group">
              <input type="text" class="form-control1 szval" id="sz4" placeholder="Size">
              </div>
               <div class="col-xs-4 col-sm-2 form-group">
              <input type="text" class="form-control1 szval" id="sz5" placeholder="Size">
              </div>
               <div class="col-xs-4 col-sm-2 form-group">
              <input type="text" class="form-control1 szval" id="sz6" placeholder="Size">
              </div>
            </div>
            
            
			<div class="form-group">
              <label class="control-label" for="product-decription">Description</label>
              <textarea class="form-control1" id="product_decription" name="product_decription"  placeholder="Description"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label" for="productimage">Image</label>
             <input type="file" id="userfile" name="userfile" >
            </div>
            <div class="form-group" style="text-align: center;">
              <button type="submit" class="btn btn-primary" id="addpro_sub">Submit</button>
              
            </div>
          </fieldset>
        <!--  </form> --> 
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
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
</body>
</html>
