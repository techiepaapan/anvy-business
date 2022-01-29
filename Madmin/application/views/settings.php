<?php 

$levelid=1;
if(isset($_REQUEST['level'])){
	if($_REQUEST['level']==2){
		$levelid=2;
	}
}

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
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/AddSettings.js?n=<?php echo rand(100,1000);?>"></script>
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
  	    <h3>SETTINGS</h3>
  	    <div class="well1 white">
        <div class="form-floating">
          <fieldset>
            <div class="form-group">
              <label class="control-label" for="scharge">Service Charge</label>
              <input type="text" class="form-control1" id="scharge">
            </div>
			 <div class="form-group" style="display:none;">
              <label class="control-label" for="bvpoint">BV points for a single purchase</label>
              <input type="text" class="form-control1" id="bvpoint" >
            </div>
			<div class="form-group" style="display:none;">
              <label class="control-label" for="amount">Amount for 1 BV point</label>
              <input type="text" class="form-control1" id="amount" >
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="setting_sub">Submit</button>
              
            </div>
          </fieldset>
        </div>
        
        <?php
        include 'dbconnection.php';
        $qry=mysqli_query($connect,"select * from repurchase_paylevels where id='$levelid'");
    		$i=1;
    		//echo "row=".mysqli_num_rows($qry);
    		
    		$l1=0;
    		$l2=0;
    		$l3=0;
    		$l4=0;
    		$l5=0;
    		$l6=0;
    		$l7=0;
    		$l8=0;
    		$l9=0;
    		$l10=0;
			 while($row1=mysqli_fetch_assoc($qry))
				{
					
			 
				 	$l1=$row1['l1'];
					$l2=$row1['l2'];
				 	$l3=$row1['l3'];
					$l4=$row1['l4'];
				 	$l5=$row1['l5'];
				 	$l6=$row1['l6'];
				 	$l7=$row1['l7'];
				 	$l8=$row1['l8'];
				 	$l9=$row1['l9'];
				 	$l10=$row1['l10'];
				 	
				} 	
			?>	
        <br/>
			
			<?php 
       $oldrbl="";
       $newrbl="";
       if($levelid==1)
       {$oldrbl="btn-danger";}
       
       else if($levelid==2)
       {$newrbl="btn-danger";}
       ?>
        <h4>REPURCHASE BONUS LEVELS</h4>
         <div class="form-floating">
          <fieldset>
			<div class="col-sm-12 reset-level-one">
            <div class="form-group">
              	<a href="<?php echo base_url();?>welcome/settings"><button class="btn <?php echo $oldrbl;?>">Old</button></a>
              	<a href="<?php echo base_url();?>welcome/settings?level=2"><button class="btn <?php echo $newrbl;?>">New</button></a>
              	<input type="hidden" id="levelid" value="<?php echo $levelid;?>"/>
            </div>
            </div>
          <div class="col-sm-6 reset-level-one">
            <div class="form-group">
              <label class="control-label" for="scharge">Level 1</label>
              <input type="text" class="form-control1" id="l1" value="<?php echo $l1;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Level 2</label>
              <input type="text" class="form-control1" id="l2" value="<?php echo $l2;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Level 3</label>
              <input type="text" class="form-control1" id="l3" value="<?php echo $l3;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Level 4</label>
              <input type="text" class="form-control1" id="l4" value="<?php echo $l4;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Level 5</label>
              <input type="text" class="form-control1" id="l5" value="<?php echo $l5;?>">
            </div>
            </div>
             <div class="col-sm-6 reset-level-two">
            <div class="form-group">
              <label class="control-label" for="scharge">Level 6</label>
              <input type="text" class="form-control1" id="l6" value="<?php echo $l6;?>" >
            </div>
            
            <div class="form-group">
              <label class="control-label" for="scharge">Level 7</label>
              <input type="text" class="form-control1" id="l7" value="<?php echo $l7;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Level 8</label>
              <input type="text" class="form-control1" id="l8" value="<?php echo $l8;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Level 9</label>
              <input type="text" class="form-control1" id="l9" value="<?php echo $l9;?>">
            </div>
            <div class="form-group">
              <label class="control-label" for="scharge">Level 10</label>
              <input type="text" class="form-control1" id="l10" value="<?php echo $l10;?>">
            </div>
			</div>
			
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sub">Submit</button>
              
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
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
</body>
</html>
