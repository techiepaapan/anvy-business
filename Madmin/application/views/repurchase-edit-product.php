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
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/EditReProduct.js?t=<?php echo rand(100,1000);?>"></script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div> <div class="col-sm-2"></div><input type="text" class="form-control1" placeholder="Product Size" style="width:50%;margin-top: 10px;" name="field_name[]" value="">	<a href="javascript:void(0);" class="remove_button" title="Remove field" id=""><img src="<?php echo base_url()?>images/close-box-red24.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
  
});
</script>
	
	
	
<style>
.table td, .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 5px !important;
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
  	    <h3>EDIT PRODUCT</h3>
  	    <div class="well1 white">
		<div class="input-group" id="edt-pdt">
			<input name="search" class="form-control1 input-search" id="srch" list="prolist" placeholder="Search..." type="text">
			<datalist id="prolist">
			
			</datalist>
		<span class="input-group-btn">
				<button class="btn btn-success" type="button" id="itemsrch"><i class="fa fa-search"></i></button>
			</span> 
		</div>
        <div class="bs-example4" data-example-id="simple-responsive-table" style="padding:0;">
    
			<div class="table-responsive"  id="tbbl-editt">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th>Name</th>
					<th>Product Code</th>
					<th>Description</th>
					<th>Price(INR)</th>
					<th>Del. Charge(INR)</th>
                    <th>Quantity</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody id="proappend">
				<!--   <tr>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>Table cell</td>
                    <td>Table cell</td>
					<td>Table cell</td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						  <i class="fa fa-pencil" aria-hidden="true"></i>

						</button>
						<button type="button" class="btn btn-danger">
						  <i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</td>
					
				  </tr>
				  <tr>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>Table cell</td>
                    <td>Table cell</td>
					<td>Table cell</td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						  <i class="fa fa-pencil" aria-hidden="true"></i>

						</button>
						<button type="button" class="btn btn-danger">
						  <i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</td>
					
				  </tr>
				  <tr>
					<td>Table cell</td>
					<td>Table cell</td>
					<td>Table cell</td>
                    <td>Table cell</td>
					<td>Table cell</td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						  <i class="fa fa-pencil" aria-hidden="true"></i>

						</button>
						<button type="button" class="btn btn-danger">
						  <i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</td>
					
				  </tr>--> 
				 
				</tbody>
			  </table>
			</div><!-- /.table-responsive -->
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
			<label for="productname" class="col-sm-2 control-label">Product Name</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="editproductname" name="productname">
			</div>
		  </div>
		  <div class="form-group">
			<label for="editproductcode" class="col-sm-2 control-label">Product Code</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="editproductcode" name="productcode">
			</div>
		  </div>
                  <div class="form-group">
              <label  class="col-sm-2 control-label">Category</label>
              <div class="col-sm-10">
              <Select  class="form-control1"  name="pcat" id="pcat">
              <option>Select</option>
               <?php
               $this->load->database();
               $qry=$this->db->query("select * from category;");
               
               
               
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
            </div> 
		  
		   <div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
			  <textarea class="form-control1" id="editdescription" name="product_decription"></textarea>
			</div>
		  </div>
		  <input type="hidden" id="pid" name="productid">
		   <div class="form-group">
			<label for="price" class="col-sm-2 control-label">Price</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="editprice" name="productprice">
			</div>
		  </div>
		  
		  <div class="form-group ">
              <label class="col-sm-2 control-label" for="productcode">Product Size</label>
             <!--<input type="text" class="form-control1" name="p_code" placeholder="Product Size" style="width:50%;
margin-left: 2%;">	
              
              	<a  id="size" style="margin-left: 2%;"> <i class="fa fa-plus"></i> Add More</a>  --> 
              
           <!--    <input type="text" class="form-control1" placeholder="Product Size" style="width:50%;margin-left: 2%;" name="field_name[]" value="">	
              --> 
              <a class="add_button" href="javascript:void(0);" id="size" style="margin-left: 2%;"> <i class="fa fa-plus"></i> Add More</a>
              	
              		
            </div> 
           <div class="col-md-12 field_wrapper" style="padding: 0;top: -20px;"></div>
           <!-- <div class="col-md-12" style="padding: 0;"><div class=" col-md-6"  id="productsize" style="border: 1px solid #e0e0e0;height: 35px;margin-left: 17%;
margin-bottom: 11px;"><span class="close" id="close" data-item="0">x</span></div></div> --> 
            
            
            
		  
		  
		  
		   <div class="form-group">
			<label for="quantity" class="col-sm-2 control-label">Quantity</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="edtquantity">
			</div>
		  </div>
           <div class="form-group">
			<label for="discounted_price" class="col-sm-2 control-label">Discount</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="edtdiscounted">
			</div>
		  </div>
			
		<div class="form-group">
			<label for="discounted_price" class="col-sm-2 control-label">Delivery Charge</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="edtdc">
			</div>
		  </div>
		<div class="form-group">
			<label for="commission" class="col-sm-2 control-label">Commission</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control1" id="edtcomm">
			</div>
		  </div>
		   <div class="form-group">
			<label for="price" class="col-sm-2 control-label">Image1</label>
                <div class="col-sm-10">
                     <div class="image-box" id="imgbox1">
                       <!--  <img src="images/pic4.jpg"> -->
                     </div>
                  <input type="file" id="file1" >
                </div>
		  </div>
		  
          <div class="form-group">
			<label for="price" class="col-sm-2 control-label">Image2</label>
                <div class="col-sm-10">
                     <div class="image-box" id="imgbox2">
                        <!--  <img src="images/pic4.jpg"> -->
                     </div>
                  <input type="file" id="file2">
                </div>
		  </div>
          <div class="form-group">
			<label for="price" class="col-sm-2 control-label">Image3</label>
                <div class="col-sm-10">
                     <div class="image-box" id="imgbox3">
                       <!--  <img src="images/pic4.jpg"> -->
                     </div>
                  <input type="file" id="file3" >
                </div>
		  </div>
		  <div class="form-group">
			<label for="price" class="col-sm-2 control-label">Image4</label>
                <div class="col-sm-10">
                     <div class="image-box" id="imgbox4">
                       <!--  <img src="images/pic4.jpg"> -->
                     </div>
                  <input type="file" id="file4" >
                </div>
		  </div>
		  
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close editclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit_prosub">Save</button>
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
