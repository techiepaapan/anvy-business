<?php 
include 'sessioncheck.php';
$id=$_SESSION['uid1'];
$pin=$_SESSION['pin1'];
$tree=0;
$query = $this->db->query("select tree from user_child where u_id='$id'");
foreach ($query->result() as $row)
{
	$tree=$row->tree;
}

//echo $id."<br>".$pin;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/alertify.default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/tooltipster.bundle.min.css" />
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>css/tree.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

    .tree-data-name
    {
    	cursor:pointer;
    	background-color: #b6b6b6;
    }
    
    .ajax-loader {
  visibility: hidden;
  background-color: rgba(255,255,255,0.7);
  position: absolute;
  z-index: +100 !important;
  width:100%;
  height:90%;
  height: calc(100% - 100px);
}

.ajax-loader img {
  position: relative;
  top:30%;
  left:45%;
}


    </style>
  </head>
  <body>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding outer-box">
	<nav class="navbar navbar-default">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  		  <a class="navbar-brand" href="<?php echo base_url();?>">
		  <img src="<?php echo base_url();?>/images/logo.png">
		  ANVY BUSINESS</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		 <ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url();?>welcome/home"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"> </i> Profile</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/profile"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
				<li><a href="<?php echo base_url();?>welcome/changepassword"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</a></li>
			  </ul>
			</li>
			<li class="dropdown active">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-handshake-o" aria-hidden="true"></i> My Business</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/teamView"><i class="fa fa-users" aria-hidden="true"></i> Team View</a></li>
				<li><a href="<?php echo base_url();?>welcome/directMembers"><i class="fa fa-user" aria-hidden="true"></i> Direct Members</a></li>
				<li><a href="<?php echo base_url();?>welcome/downlineList"><i class="fa fa-sitemap" aria-hidden="true"></i> Downline List</a></li>
<li><a href="<?php echo base_url();?>welcome/upgradeuser"><i class="fa fa-sitemap" aria-hidden="true"></i> Upgrade</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-check-square-o " aria-hidden="true"></i> Accounts</a>
			  <ul class="dropdown-menu">
				<!--<li><a href="<?php echo base_url();?>welcome/ewallet"><i class="fa fa-credit-card" aria-hidden="true"></i> Ewallet</a></li>-->
				<li><a href="<?php echo base_url();?>welcome/directSalesIncentive"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Direct Sales Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/teamSalesIncentive"><i class="fa fa-users" aria-hidden="true"></i> Team Sales Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/leadersSuccessIncentive"><i class="fa fa-user" aria-hidden="true"></i> Leaders Success Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/myIncome"><i class="fa fa-credit-card" aria-hidden="true"></i> My Income</a></li>
			  </ul>
			</li>
			<li><a href="<?php echo base_url();?>welcome/support"><i class="fa  fa-question-circle" aria-hidden="true"></i> Support</a></li>
			<li><a href="<?php echo base_url();?>welcome/businessTools"><i class="fa  fa-wrench" aria-hidden="true"></i> Business Tools</a></li>
			<!--<li><a href="<?php echo base_url();?>welcome/activate"><i class="fa  fa-user-plus" aria-hidden="true"></i>  Activate User</a></li>-->
			
			<li><a href="<?php echo base_url();?>welcome/logout"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	
	<input type="hidden" id="id" value="<?php echo $id;?>"/>
	<input type="hidden" id="pin" value="<?php echo $pin;?>"/>
	<input type="hidden" id="tree" value="<?php echo $tree;?>"/>
	
	<?php 
	$this ->load -> database();
	$treel=$tree.'0';$treer=$tree.'1';$left=0;$right=0;
	$query = $this->db->query(" select (select count(ul.u_id) from user_child uc,user_login ul where uc.tree like '$treel%' and uc.u_id=ul.u_id and ul.activateuser=1) as lft,
			(select count(ul.u_id) from user_child uc,user_login ul where uc.tree like '$treer%'  and uc.u_id=ul.u_id and ul.activateuser=1) as rgt
			");
	
	foreach ($query->result() as $row)
	{
			$left=$row->lft;
			$right=$row->rgt;
	}
	$total=$left+$right;
	//echo $left." - ".$right;
	
	
	$query = $this->db->query("select * from user_wallet where u_id='$id'");
	$netrepurchase=0;$netincome=0;
	foreach ($query->result() as $row1)
	{
		$balance=$row1->balance;
		$netincome=$row1->netincome;
	}
?>


    <div class="col-md-10 ajax-loader">
   	<img style="height:8%;" src="<?php echo base_url();?>/images/Loading1.gif"/>
  	 </div>
  	 
	<div class="col-xs-12 col-sm-12 main-body">
		
		<div class="col-xs-12 col-sm-12 col-md-12 no-padding tree-diagram">
			<div class="container">
			
				<div>
					<h2>Genealogy View</h2>
					<div class="clearfix" style="padding:15px;">
						<div class="col-xs-12 col-sm-12 col-md-12 new-padding text-center">
						<input class=" form-control input-center-new" placeholder="User Id" type="text" id="srchid">
						<input id="srch" class="btn btn-info btn-cntr" value="Search" type="button">
					</div>
            </div>
					<div class="col-xs-12 col-sm-12 col-md-12 tree-diagram-start">
					
					
						<table class="tree-table" cellspacing="0" cellpadding="0" border="0">
							<tr>
								<td class="top-nav-tree"><a><button id="up" id1="" style="margin-bottom: 10px;color: green;"><img style="cursor:pointer;" src="<?php echo base_url();?>images/top-arrow.png">Click Here To Go Up</button></a></td>
							</tr>
							<tr>
								<td>
									<div class="tree-data">
										<img id="rankimg2" src="<?php echo base_url();?>images/tree-person.png" class="tooltipstered rankimg" data-tooltip-content="#tooltip_content1"><br><a  class="tree-data-name" id="t2" id1="">FREE</a>	
										<div class="tooltip_templates">
											<span id="tooltip_content1">
												<table class="tooltip-table table table-bordered  table-condensed">
																			<tr class="colored-head">
																				<td colspan="3" class="text-center">Details</td>
																			</tr>
																			<tr>
																				<td class="text-center">Name</td>
																				<td colspan="2" class="text-center" id="name2"></td>
																			</tr>
																			<tr>
																				<td class="text-center">Date of Joining</td>
																				<td colspan="2" class="text-center" id="date2"></td>
																			</tr>
																			<tr>
																				<td colspan="3" class="text-center">Total Processed BV</td>
																			</tr>
																			<tr>
																				<td colspan="3" class="text-center" id="pbv2"></td>
																			</tr>
																			<tr class="colored-head">
																				<td>BV Points</td>
																				<td>Left</td>
																				<td>Right</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td id="l2"></td>
																				<td id="r2"></td>
																			</tr>
																		</table>
											</span>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td> <div class="vertical-line"></div></td>
							</tr>
							<tr>
								<td> <div class="horizontal-line"></div></td>
							</tr>
							
							
							
							
							
							
							<tr>
							<!-- ********************************   LEFT  TREE  ***************************************************** -->						
								<td>
									<table class="tree-table tree-level-1" cellspacing="0" cellpadding="0" border="0">
										<tr>
											<td> <div class="vertical-line"></div></td>
											<td> <div class="vertical-line"></div></td>	
										</tr>
										<tr>
											<td>
												<table class="tree-table tree-level-2" cellspacing="0" cellpadding="0" border="0">
													<tr>
														<td>
															<div class="tree-data">
																<img  id="rankimg0" src="<?php echo base_url();?>images/tree-person.png" class="tooltipstered rankimg" data-tooltip-content="#tooltip_content2" ><br><a class="tree-data-name" id="t0" id1="">FREE</a>	
																<div class="tooltip_templates">
																	<span id="tooltip_content2">
																			<table class="tooltip-table table table-bordered  table-condensed">
																					<tr class="colored-head">
																						<td colspan="3" class="text-center">Details</td>
																					</tr>
																					<tr>
																						<td class="text-center">Name</td>
																						<td colspan="2" class="text-center" id="name0"></td>
																					</tr>
																					<tr>
																						<td class="text-center">Date of Joining</td>
																						<td colspan="2" class="text-center" id="date0"></td>
																					</tr>
																					<tr>
																						<td colspan="3" class="text-center">Total Processed BV</td>
																					</tr>
																					<tr>
																						<td colspan="3" class="text-center" id="pbv0"></td>
																					</tr>
																					<tr class="colored-head">
																						<td>BV Points</td>
																						<td>Left</td>
																						<td>Right</td>
																					</tr>
																					<tr>
																						<td>Total</td>
																						<td id="l0"></td>
																						<td id="r0"></td>
																					</tr>
																				</table>
																		<!-- <table class="tooltip-table table table-bordered  table-condensed">
																			<tr class="colored-head">
																				<td colspan="3" class="text-center">Details</td>
																			</tr>
																			<tr>
																				<td class="text-center">Name</td>
																				<td colspan="2" class="text-center">Ananthu Krishna</td>
																			</tr>
																			<tr>
																				<td class="text-center">Date of Joining</td>
																				<td colspan="2" class="text-center">02.05.1994 12.00.00</td>
																			</tr>
																			<tr class="colored-head">
																				<td>BV Points</td>
																				<td>Left</td>
																				<td>Right</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>1000</td>
																				<td>1000</td>
																			</tr>
																			<tr>
																				<td>Matching</td>
																				<td>1000</td>
																				<td>1000</td>
																			</tr>
																			<tr>
																				<td>Current Carry Forward</td>
																				<td>1000</td>
																				<td>1000</td>
																			</tr>
																		</table>-->
																	</span>
																</div>
															
															</div>
														</td>
													</tr>
													<tr>
														<td> <div class="vertical-line"></div></td>	
													</tr>
													<tr>
														<td>
															<div class="horizontal-line"></div>
														</td>
													</tr>
													<tr>
														<td>
															<table class="tree-table tree-level-3" cellspacing="0" cellpadding="0" border="0">
																<tr>
																	<td> <div class="vertical-line"></div></td>
																	<td> <div class="vertical-line"></div></td>	
																</tr>
																<tr>
																	<td>
																		<div class="tree-data">
																			<img  id="rankimg00" src="<?php echo base_url();?>images/tree-person.png" class="tooltipstered rankimg" data-tooltip-content="#tooltip_content4" ><br><a class="tree-data-name" id="t00" id1="">FREE</a>	
																		<div class="tooltip_templates">
																			<span id="tooltip_content4">
																						<table class="tooltip-table table table-bordered  table-condensed">
																				<tr class="colored-head">
																					<td colspan="3" class="text-center">Details</td>
																				</tr>
																				<tr>
																					<td class="text-center">Name</td>
																					<td colspan="2" class="text-center" id="name00"></td>
																				</tr>
																				<tr>
																					<td class="text-center">Date of Joining</td>
																					<td colspan="2" class="text-center" id="date00"></td>
																				</tr>
																					<tr>
																						<td colspan="3" class="text-center">Total Processed BV</td>
																					</tr>
																					<tr>
																						<td colspan="3" class="text-center" id="pbv00"></td>
																					</tr>
																				<tr class="colored-head">
																					<td>BV Points</td>
																					<td>Left</td>
																					<td>Right</td>
																				</tr>
																				<tr>
																					<td>Total</td>
																					<td id="l00"></td>
																					<td id="r00"></td>
																				</tr>
																			</table>
																			</span>
																		</div>
																		</div>
																	</td>
																	<td>
																		<div class="tree-data">
																			<img  id="rankimg01" src="<?php echo base_url();?>images/tree-person.png" class="tooltipstered rankimg" data-tooltip-content="#tooltip_content2a"><br><a class="tree-data-name" id="t01" id1="">FREE</a>	
																			<div class="tooltip_templates">
																	<span id="tooltip_content2a">
																		<table class="tooltip-table table table-bordered  table-condensed">
																			<tr class="colored-head">
																				<td colspan="3" class="text-center">Details</td>
																			</tr>
																			<tr>
																				<td class="text-center">Name</td>
																				<td colspan="2" class="text-center" id="name01"></td>
																			</tr>
																			<tr>
																				<td class="text-center">Date of Joining</td>
																				<td colspan="2" class="text-center" id="date01"></td>
																			</tr>
																			<tr>
																				<td colspan="3" class="text-center">Total Processed BV</td>
																			</tr>
																			<tr>
																				<td colspan="3" class="text-center" id="pbv01"></td>
																			</tr>
																			<tr class="colored-head">
																				<td>BV Points</td>
																				<td>Left</td>
																				<td>Right</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td id="l01"></td>
																				<td id="r01"></td>
																			</tr>
																		</table>
																	</span>
																</div>
																		</div>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
											
											
											
											
											
											
											
											<!--**********************************************  RIGHT TREE  ******************************************************* -->
											<td>
												<table class="tree-table tree-level-2" cellspacing="0" cellpadding="0" border="0">
													<tr>
														<td>
															<div class="tree-data">
																<img  id="rankimg1" src="<?php echo base_url();?>images/tree-person.png" class="tooltipstered rankimg" data-tooltip-content="#tooltip_content3"><br><a class="tree-data-name" id="t1" id1="">FREE</a>	
																<div class="tooltip_templates">
																	<span id="tooltip_content3">
																		<table class="tooltip-table table table-bordered  table-condensed">
																			<tr class="colored-head">
																				<td colspan="3" class="text-center">Details</td>
																			</tr>
																			<tr>
																				<td class="text-center">Name</td>
																				<td colspan="2" class="text-center" id="name1"></td>
																			</tr>
																			<tr>
																				<td class="text-center">Date of Joining</td>
																				<td colspan="2" class="text-center" id="date1"></td>
																			</tr>
																			<tr>
																				<td colspan="3" class="text-center">Total Processed BV</td>
																			</tr>
																			<tr>
																				<td colspan="3" class="text-center" id="pbv1"></td>
																			</tr>
																			<tr class="colored-head">
																				<td>BV Points</td>
																				<td>Left</td>
																				<td>Right</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td id="l1"></td>
																				<td id="r1"></td>
																			</tr>
																		</table>
																	</span>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td> <div class="vertical-line"></div></td>	
													</tr>
													<tr>
														<td>
															<div class="horizontal-line"></div>
														</td>
													</tr>
													<tr>
														<td>
															<table class="tree-table tree-level-3" cellspacing="0" cellpadding="0" border="0">
																<tr>
																	<td> <div class="vertical-line"></div></td>
																	<td> <div class="vertical-line"></div></td>	
																</tr>
																<tr>
																	<td>
																		<div class="tree-data">
																			<img  id="rankimg10" src="<?php echo base_url();?>images/tree-person.png" class="tooltipstered rankimg" data-tooltip-content="#tooltip_content5"><br><a  class="tree-data-name" id="t10" id1="">FREE</a>	
																			<div class="tooltip_templates">
																				<span id="tooltip_content5">
																								<table class="tooltip-table table table-bordered  table-condensed">
																					<tr class="colored-head">
																						<td colspan="3" class="text-center">Details</td>
																					</tr>
																					<tr>
																						<td class="text-center">Name</td>
																						<td colspan="2" class="text-center" id="name10"></td>
																					</tr>
																					<tr>
																						<td class="text-center">Date of Joining</td>
																						<td colspan="2" class="text-center" id="date10"></td>
																					</tr>
																					<tr>
																						<td colspan="3" class="text-center">Total Processed BV</td>
																					</tr>
																					<tr>
																						<td colspan="3" class="text-center" id="pbv10"></td>
																					</tr>
																					<tr class="colored-head">
																						<td>BV Points</td>
																						<td>Left</td>
																						<td>Right</td>
																					</tr>
																					<tr>
																						<td>Total</td>
																						<td id="l10"></td>
																						<td id="r10"></td>
																					</tr>
																					</table>
																				</span>
																			</div>
																		
																		</div>
																	</td>
																	<td>
																		<div class="tree-data">
																			<img  id="rankimg11" src="<?php echo base_url();?>images/tree-person.png" class="tooltipstered rankimg" data-tooltip-content="#tooltip_content6"><br><a href="#" class="tree-data-name" id="t11" id1="">FREE</a>	
																			<div class="tooltip_templates">
																				<span id="tooltip_content6">
																							<table class="tooltip-table table table-bordered  table-condensed">
																					<tr class="colored-head">
																						<td colspan="3" class="text-center">Details</td>
																					</tr>
																					<tr>
																						<td class="text-center">Name</td>
																						<td colspan="2" class="text-center" id="name11"></td>
																					</tr>
																					<tr>
																						<td class="text-center">Date of Joining</td>
																						<td colspan="2" class="text-center" id="date11"></td>
																					</tr>
																					<tr>
																						<td colspan="3" class="text-center">Total Processed BV</td>
																					</tr>
																					<tr>
																						<td colspan="3" class="text-center" id="pbv11"></td>
																					</tr>
																					<tr class="colored-head">
																						<td>BV Points</td>
																						<td>Left</td>
																						<td>Right</td>
																					</tr>
																					<tr>
																						<td>Total</td>
																						<td id="l11"></td>
																						<td id="r11"></td>
																					</tr>
																				</table>
																				</span>
																			</div>
																		</div>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					
					</div>
				</div>
				
			</div>
        </div>
    </div>
    
    <!-- <table class="tooltip-table table table-bordered  table-condensed">
																			<tr class="colored-head">
																				<td colspan="3" class="text-center">Details</td>
																			</tr>
																			<tr>
																				<td class="text-center">Name</td>
																				<td colspan="2" class="text-center">Ananthu Krishna</td>
																			</tr>
																			<tr>
																				<td class="text-center">Date of Joining</td>
																				<td colspan="2" class="text-center">02.05.1994 12.00.00</td>
																			</tr>
																			<tr class="colored-head">
																				<td>BV Points</td>
																				<td>Left</td>
																				<td>Right</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>1000</td>
																				<td>1000</td>
																			</tr>
																			<tr>
																				<td>Matching</td>
																				<td>1000</td>
																				<td>1000</td>
																			</tr>
																			<tr>
																				<td>Current Carry Forward</td>
																				<td>1000</td>
																				<td>1000</td>
																			</tr>
																		</table>-->
    <div class="col-xs-12 col-sm-12 footer no-padding">
    	<div class="container">
       	 Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a>
        </div>
    </div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/alertify.min.js"></script>
        <script src="<?php echo base_url();?>js/Ajax/url.js"></script>
    <script src="<?php echo base_url();?>js/Ajax/teamview.js?n=<?php echo rand(10,1000);?>"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/tooltipster.bundle.min.js"></script>
	<script>
		$('.tooltipstered').tooltipster({
			contentAsHTML: 'true',
		   animation: 'grow',
		   delay: 200,
		   theme: 'tooltipster-punk',
		   trigger: 'custom',
		    interactive: true,
			triggerOpen: {
				mouseenter: true,
				touchstart: true
			},
			triggerClose: {
				click: true,
				scroll: true,
				tap: true,
				mouseleave:true
			},
		   contentCloning: true,
		   
		});


		
    </script>
  </body>
</html>