<?php 
include 'sessioncheck.php';
include 'dbconnection.php';

//echo "call re_print('$id','$pin','$pmid')";
$curdate=date('Y-m-d');
//echo $curdate;
$qry=mysqli_query($connect,"select count from new_user where date='$curdate'");
$i=1;
//echo "row=".mysqli_num_rows($qry);
$newuser=0;
if(mysqli_num_rows($qry)>0)
{
while($row=mysqli_fetch_assoc($qry))
{
	$newuser=$row['count'];
}
}


$qry1=mysqli_query($connect,"select (select count(repurchase_order_id) from repurchase_order where order_status='Ordered') as rp,
		(select count(user_product_id) from user_product_prefer where status='Ordered') as p");
$i=1;
//echo "row=".mysqli_num_rows($qry);
$norder=0;
if(mysqli_num_rows($qry1)>0)
{
	while($row1=mysqli_fetch_assoc($qry1))
	{
		$norder=$norder+$row1['rp'];
		$n1=$row1['rp'];
		$norder=$norder+$row1['p'];
		$n2=$row1['p'];
	}
}

$qry2=mysqli_query($connect,"select count(u_id) as nreg from user_extradetails where u_joindate='$curdate'");
$i=1;
//echo "row=".mysqli_num_rows($qry);
$nreg=0;
if(mysqli_num_rows($qry2)>0)
{
	while($row2=mysqli_fetch_assoc($qry2))
	{
		$nreg=$row2['nreg'];
	}
}

$qry3=mysqli_query($connect,"select count(u_id) as mreg from user_login where type_flg='M'");
$i=1;
//echo "row=".mysqli_num_rows($qry);
$mreg=0;
if(mysqli_num_rows($qry3)>0)
{
	while($row2=mysqli_fetch_assoc($qry3))
	{
		$mreg=$row2['mreg'];
	}
}

$qry2=mysqli_query($connect,"select * from user_child where u_id='1'");
$i=1;
//echo "row=".mysqli_num_rows($qry);
$bvl=0;$bvr=0;
if(mysqli_num_rows($qry2)>0)
{
	while($row2=mysqli_fetch_assoc($qry2))
	{
		$bvl=$row2['bv_left'];
		$bvr=$row2['bv_right'];
	}
}
?>

<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<title></title>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?php echo base_url();?>css/lines.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet"> 
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<!--<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.js"></script> -->
<!----webfonts--->
<link href='<?php echo base_url();?>css/style-new.css' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="<?php echo base_url();?>js/d3.v3.js"></script>
<script src="<?php echo base_url();?>js/rickshaw.js"></script>
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
						<li class="m_2"><a href="<?php echo base_url();?>welcome/login"><i class="fa fa-lock"></i> Logout</a></li>	
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
        <div class="graphs">
     	
      <div class="col_1">
          <div class="col-xs-12 col-sm-6 col-md-8">
		    <div class="col_3">
        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-thumbs-up icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $norder;?></strong></h5>
                      <span>New Orders</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $newuser;?></strong></h5>
                      <span>Total Visitors</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $nreg;?></strong></h5>
                      <span>New Users</span>
                    </div>
                </div>
        	</div>
	  <div class="col-md-6 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-mobile user2 icon-rounded" style="font-size:30px;background: #51983b;"></i>
                    <div class="stats">
                      <h5><strong><?php echo $mreg;?></strong></h5>
                      <span>Mobile Users</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box">
                    <div class="stats" style="width: 49%;float: left;">
                      <h5><strong><?php echo $bvl;?></strong></h5>
                      <span>BV LEFT</span>
                    </div>
                    <div class="stats" style="width: 49%;float: left;">
                      <h5><strong><?php echo $bvr;?></strong></h5>
                      <span>BV RIGHT</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
		    </div>
		    <div class="col-xs-12 col-sm-6 col-md-4 span_7">	
		      <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
		    </div>
		
		   <!--  <div class="col-md-4 span_8">
		       <div class="activity_box">
		        <div class="scrollbar" id="style-2">
                   <div class="activity-row">
	                 <div class="col-xs-1"><i class="fa fa-thumbs-up text-info icon_13"> </i>  </div>
	                 <div class="col-xs-3 activity-img"><img src='images/5.png' class="img-responsive" alt=""/></div>
	                 <div class="col-xs-8 activity-desc">
	                 	<h5><a href="#">Lorem Ipsum</a> liked <a href="#">random</a></h5>
	                    <p>Lorem Ipsum is simply dummy</p>
	                    <h6>8:03</h6>
	                 </div>
	                 <div class="clearfix"> </div>
                    </div>
	  			    <div class="activity-row">
	                 <div class="col-xs-1"><i class="fa fa-comment text-info"></i> </div>
	                 <div class="col-xs-3 activity-img"><img src='images/3.png' class="img-responsive" alt=""/></div>
	                 <div class="col-xs-8 activity-desc">
	                 	<h5><a href="#">simply random</a> liked <a href="#">passages</a></h5>
	                    <p>Lorem Ipsum is simply dummy</p>
	                    <h6>8:03</h6>
	                 </div>
	                 <div class="clearfix"> </div>
                    </div>
                    <div class="activity-row">
	                 <div class="col-xs-1"><i class="fa fa-check text-info icon_11"></i></div>
	                 <div class="col-xs-3 activity-img"><img src='images/1.png' class="img-responsive" alt=""/></div>
	                 <div class="col-xs-8 activity-desc">
	                 	<h5><a href="#">standard chunk</a> liked <a href="#">model</a></h5>
	                    <p>Lorem Ipsum is simply dummy</p>
	                    <h6>8:03</h6>
	                 </div>
	                 <div class="clearfix"> </div>
                    </div>
                    <div class="activity-row1">
	                 <div class="col-xs-1"><i class="fa fa-user text-info icon_12"></i></div>
	                 <div class="col-xs-3 activity-img"><img src='images/4.png' class="img-responsive" alt=""/></div>
	                 <div class="col-xs-8 activity-desc">
	                 	<h5><a href="#">perspiciatis</a> liked <a href="#">donating</a></h5>
	                    <p>Lorem Ipsum is simply dummy</p>
	                    <h6>8:03</h6>
	                 </div>
	                 <div class="clearfix"> </div>
                     </div>
	  		        </div>
		          </div>
		    </div> 
			<div class="col-md-4 stats-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Browser Stats</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li>Google Chrome<div class="text-success pull-right">12%<i class="fa fa-level-up"></i></div></li>
                        <li>Firefox<div class="text-success pull-right">15%<i class="fa fa-level-up"></i></div></li>
                        <li>Internet Explorer<div class="text-success pull-right">18%<i class="fa fa-level-up"></i></div></li>
                        <li>Safari<div class="text-danger pull-right">17%<i class="fa fa-level-down"></i></div></li>
                        <li>Opera<div class="text-danger pull-right">10%<i class="fa fa-level-down"></i></div></li>
                        <li>Mobile &amp; tablet<div class="text-success pull-right">14%<i class="fa fa-level-up"></i></div></li>
                        <li class="last">Others<div class="text-success pull-right">5%<i class="fa fa-level-up"></i></div></li> 
                    </ul>
                </div>
            </div>-->
            <div class="clearfix"> </div>
		  
		    <div class="col-md-12" style="margin-bottom: 1%;padding-left: 0px;">
				 <center><a href="<?php echo base_url();?>welcome/converteceltovcf" target="_blank"><button class="btn btn-warning" type="button" style="padding: 6.5px 12px;">EXCEL TO VCF</button></a></center>
			</div>
                  <?php //  echo $n1." - ".$n2;?>
	  </div>
	  <div class="span_11" style="display:none;">
		<div class="col-md-6 col_4">
		  <div class="map_container"><div id="vmap" style="width: 100%; height: 400px;"></div></div>
		  <!----Calender -------->
			<link rel="stylesheet" href="<?php echo base_url();?>css/clndr.css" type="text/css" />
			<script src="<?php echo base_url();?>js/underscore-min.js" type="text/javascript"></script>
			<script src= "<?php echo base_url();?>js/moment-2.2.1.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>js/clndr.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>js/site.js" type="text/javascript"></script>
			<!----End Calender -------->
		</div>

       <div class="clearfix"> </div>
    </div>
 
		<div class="copy">
            <p>Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt.Ltd</a> </p>
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
</body>
</html>
