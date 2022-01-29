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
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/AddReProduct.js?arp=<?php echo rand(100,1000);?>"></script>

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

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div> <input type="text" class="form-control1" placeholder="Product Size" style="width:50%;margin-left: 10%;margin-top: 4px;" name="field_name[]" value="">	<a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url()?>images/close-box-red24.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

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
        <!--  <form method="post" action="<?php //echo base_url();?>welcome/AddReProAction" enctype="multipart/form-data">-->
          <fieldset>
            <div class="form-group">
              <label class="control-label" for="productname">Product Name</label>
              <input type="text" class="form-control1" id="productname" name="productname" placeholder="Product Name">
            </div>
            <div class="form-group">
              <label class="control-label" for="productcode">Product Code</label>
              <input type="text" class="form-control1" id="productcode" name="p_code" placeholder="Product Code">
            </div> 
            <div class="form-group field_wrapper">
              <label class="control-label" for="productcode">Product Size</label>
              <input type="text" class="form-control1" placeholder="Product Size" style="width:50%;margin-left: 2%;" name="field_name[]" value="">	
              
              	<a class="add_button" href="javascript:void(0);" id="size" style="margin-left: 2%;"> <i class="fa fa-plus"></i> Add More</a>
              
              	
              		
            </div> 
         <!-- <div class="col-md-12" style="padding: 0;"><div class=" col-md-6"  id="productsize" style="border: 1px solid #e0e0e0;height: 38px;margin-left: 10%;"><span class="close" id="close" data-item="0">x</span></div></div>
              -->  
            <div class="form-group">
              <label class="control-label" for="productcat">Category</label>
              <Select  class="form-control1" name="p_cat" id="p_cat">
              <option>Select</option>
              
             <?php 
    			//error_reporting(0);
    				$this->load->database();
    				$qry=$this->db->query("select * from category where cat_stat=1;");
    				
    				
    				
    				foreach ($qry->result() as $row)
    				{
    					$catname=$row->category_name;
    					$catid=$row->cat_id;
    					
    				?>
                           <option value="<?php echo $catid;?>"><?php echo $catname;?></option> 
                   <?php }
                        ?>
              </Select>
            </div> 
			<div class="form-group">
              <label class="control-label" for="product-decription">Description</label>
              <textarea class="form-control1" id="product_decription" name="product_decription" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label" for="productprice">Price</label>
              <input type="text" class="form-control1" id="productprice"  name="productprice" placeholder="Price">
            </div>
            <div class="form-group">
              <label class="control-label" for="product-decription">Quantity</label>
              <input type="text" class="form-control1" id="quantity" name="quantity" placeholder="Quantity">
            </div>
            <div class="form-group">
              <label class="control-label" for="product-decription">Discount</label>
              <input type="text" class="form-control1" id="discounted_price" name="discounted_price" placeholder="Discount">
            </div>
			  
			            
             <div class="form-group">
              <label class="control-label" for="product-decription">Delivery Charge</label>
              <input type="text" class="form-control1" id="delivery_charge" name="delivery_charge" placeholder="Delivery Charge">
            </div>
			 <div class="form-group">
              <label class="control-label" for="product-decription">Commission</label>
              <input type="text" class="form-control1" id="commission" name="commission" placeholder="Commission">
            </div>
            
            <div class="form-group">
              <label class="control-label" for="productimage1">Image 1</label>
             <input type="file" id="userfile1" name="userfile1">
            </div>
            <div class="form-group">
              <label class="control-label" for="productimage2">Image 2</label>
             <input type="file" id="userfile2" name="userfile2">
            </div>
            <div class="form-group">
              <label class="control-label" for="productimage3">Image 3</label>
             <input type="file" id="userfile3" name="userfile3">
            </div>
            <div class="form-group">
              <label class="control-label" for="productimage4">Image 4</label>
             <input type="file" id="userfile4" name="userfile4">
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

