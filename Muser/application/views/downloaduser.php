<?php 

$date=$_REQUEST['date'];
$date=strip_tags($date);

function validateDate($date, $format = 'Y-m-d')
{
	$d = DateTime::createFromFormat($format, $date);
	// The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
	return $d && $d->format($format) === $date;
}

if(validateDate($date,'Y-m-d')==false){
	echo "Invalid Date";
}
else{
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User List</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
   <style>
   th,td
   {
   	padding:3px;
   }
   </style>
  </head>
  <body>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding outer-box">
	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
    	
    	<h2 style="text-align:center;color:red;"><b>Anvy Business Services</b></h2>
    	
    	<h3 style="text-align:center;color: #414141;">User List</h3>
    	
    	
    	Joined: <?php 
    	
    	$ndate=trim( implode('-', array_reverse(explode('-', $date))));
    	echo $ndate;
    	?>
    	
    	
			<table border="1" class="table"> 
				<thead> 
					<tr> 
						<th style="width:8%;">No</th> 
						<th style="width:25%;">Name</th> 
						<th style="width:20%;">Username</th> 
						<th style="width:20%;">Sponser ID</th> 
						<th style="width:20%;">Sponser Name</th> 
						<th style="width:10%;">Position</th> 
						<th style="width:10%;text-align:right;">BV</th>
						<th style="width:15%;">Status</th> 
					</tr> 
				</thead> 
				<tbody> 
				
<?php

$id=$_SESSION['uid1'];
$pin=$_SESSION['pin1'];
$tree=0;
$query = $this->db->query("select tree from user_child where u_id='$id'");
foreach ($query->result() as $row)
{
	$tree=$row->tree;
}
$curdate=$this->db->escape($date);


			$query = $this->db->query("SELECT ue.u_name,ul.username,ul.freeuser,ul.activated,
							(SELECT 
							CASE
							    WHEN uc1.tree like concat('$tree','0','%') THEN 'Left'
							    ELSE 'Right'
							END
							FROM user_child uc1 where uc1.u_id=uc.u_id) as position ,
							(select sum(pd.bv*upp.qty) from user_product_prefer upp,product_details pd where upp.product_id=pd.product_id and upp.u_id=ul.u_id and upp.paid='1') as tbv,
							(SELECT u_name FROM user_extradetails ue1 where ue1.u_id=ue.referral_id limit 1) as refname,
							(SELECT username FROM user_login ul1 where ul1.u_id=ue.referral_id limit 1) as refid 
							FROM user_extradetails ue,user_login ul,user_child uc 
							where  uc.tree like concat('$tree','%') and ue.u_joindate=$curdate and uc.u_id=ue.u_id and ul.u_id=ue.u_id and ul.u_id!='$id' order by ul.u_id asc");

			$ix=0;
			foreach ($query->result() as $row1)
			{$ix++;
				$u_name=$row1->u_name;
				$username=$row1->username;
				$freeuser=$row1->freeuser;
				$position=$row1->position;
				$tbv=$row1->tbv;
				$activated=$row1->activated;
				$refid=$row1->refid;
				$refname=$row1->refname;
				
				if(strtoupper($position)=='RIGHT'){$col="#2977ff";}
				
				if($freeuser==1){$usertype="Free User";$col1="red";}
				else{
					if($activated==0){
						$usertype="Unpaid User";
						$col1="red";
					}
					else{
						$usertype="Paid User";
						$col1="green";
					}
					
				}
				
				
				?>
				<tr>
						<td><?php echo $ix;?></td> 
						<td><?php echo $u_name;?></td> 
						<td><?php echo $username;?></td> 
						<td><?php echo $refid;?></td> 
						<td><?php echo $refname;?></td> 
						<td style="color:<?php echo $col;?>"><?php echo $position;?></td> 
						<td style="text-align:right;"><?php echo $tbv;?></td> 
						<td style="color:<?php echo $col1;?>"><?php echo $usertype;?></td>
				</tr>
				<?php
				
			}
			?>
			
			
				</tbody> 
			</table>
			
			
			
			
			
			
				<p><hr style="color:blue;"></p>
			
			<span style="color:red;">Activated: <?php echo $ndate;?></span>
				<table border="1" class="table" style="margin-top:10px;"> 
				<thead> 
					<tr> 
						<th style="width:8%;">No</th> 
						<th style="width:25%;">Name</th> 
						<th style="width:20%;">Username</th> 
						<th style="width:20%;">Sponser ID</th> 
						<th style="width:20%;">Sponser Name</th> 
						<th style="width:10%;">Position</th> 
						<th style="width:10%;text-align:right;">BV</th>
						<th style="width:15%;">Status</th> 
					</tr> 
				</thead> 
				<tbody> 
				
<?php



mysqli_next_result($this->db->conn_id);
			$query = $this->db->query("SELECT ue.u_name,ul.username,ul.freeuser,ul.activated,
							(SELECT 
							CASE
							    WHEN uc1.tree like concat('$tree','0','%') THEN 'Left'
							    ELSE 'Right'
							END
							FROM user_child uc1 where uc1.u_id=uc.u_id) as position ,
							(select sum(pd.bv*upp.qty) from user_product_prefer upp,product_details pd where upp.product_id=pd.product_id and upp.u_id=ul.u_id and upp.paid='1') as tbv,
							(SELECT u_name FROM user_extradetails ue1 where ue1.u_id=ue.referral_id limit 1) as refname,
							(SELECT username FROM user_login ul1 where ul1.u_id=ue.referral_id limit 1) as refid 
							FROM user_extradetails ue,user_login ul,user_child uc 
							where  uc.tree like concat('$tree','%') and uc.u_id=ue.u_id and ul.u_id=ue.u_id and ul.u_id!='$id' and ul.activated='1' and ue.u_activatedate=$curdate order by ul.u_id asc");

			$ix=0;
			foreach ($query->result() as $row1)
			{$ix++;
				$u_name=$row1->u_name;
				$username=$row1->username;
				$freeuser=$row1->freeuser;
				$position=$row1->position;
				$tbv=$row1->tbv;
				$activated=$row1->activated;
				$refid=$row1->refid;
				$refname=$row1->refname;
				
				if(strtoupper($position)=='RIGHT'){$col="#2977ff";}
				
				if($freeuser==1){$usertype="Free User";$col1="red";}
				else{
					if($activated==0){
						$usertype="Unpaid User";
						$col1="red";
					}
					else{
						$usertype="Paid User";
						$col1="green";
					}
					
				}
				
				
				?>
				<tr>
						<td><?php echo $ix;?></td> 
						<td><?php echo $u_name;?></td> 
						<td><?php echo $username;?></td>
						<td><?php echo $refid;?></td> 
						<td><?php echo $refname;?></td>  
						<td style="color:<?php echo $col;?>"><?php echo $position;?></td> 
						<td style="text-align:right;"><?php echo $tbv;?></td> 
						<td style="color:<?php echo $col1;?>"><?php echo $usertype;?></td>
				</tr>
				<?php
				
			}
			?>
			
			
				</tbody> 
			</table>
			
			
			
			
			<p><hr style="color:blue;"></p>
			
			<span style="color: green;">Upgraded: <?php echo $ndate;?></span>
				<table border="1" class="table" style="margin-top:10px;"> 
				<thead> 
					<tr> 
						<th style="width:8%;">No</th> 
						<th style="width:25%;">Name</th> 
						<th style="width:20%;">Username</th> 
						<th style="width:20%;">Sponser ID</th> 
						<th style="width:20%;">Sponser Name</th> 
						<th style="width:10%;">Position</th> 
						<th style="width:10%;text-align:right;">BV</th>
						<th style="width:15%;text-align:right;">Paid</th> 
					</tr> 
				</thead> 
				<tbody> 
				
<?php



			$sql="SELECT ue.u_name,ul.username,
							(SELECT 
							CASE
							    WHEN uc1.tree like concat('$tree','0','%') THEN 'Left'
							    ELSE 'Right'
							END
							FROM user_child uc1 where uc1.u_id=uc.u_id) as position,
							(SELECT u_name FROM user_extradetails ue1 where ue1.u_id=ue.referral_id limit 1) as refname,
							(SELECT username FROM user_login ul1 where ul1.u_id=ue.referral_id limit 1) as refid,
							(select sum(pd.product_price) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.upgrade_id=upp1.upgrade_id group by upp.upgrade_id) as pay,
			 				(select sum(pd.bv) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.upgrade_id=upp1.upgrade_id group by upp.upgrade_id) as tbv
							FROM user_extradetails ue,user_login ul,user_child uc, user_product_prefer upp1 
							where  uc.tree like concat('$tree','%') and uc.u_id=ue.u_id and ul.u_id=ue.u_id and ul.u_id=upp1.u_id and ul.u_id!='$id' and
							upp1.upgraded='1' and upp1.paid='1' and upp1.upgrade_date=$curdate group by upp1.upgrade_id ORDER BY upp1.user_product_id DESC";
			mysqli_next_result($this->db->conn_id);
			//echo $sql;
			$query2 = $this->db->query($sql);

			$ix=0;
			
			foreach ($query2->result() as $row2)
			{$ix++;
				$u_name=$row2->u_name;
				$username=$row2->username;
				$position=$row2->position;
				$refid=$row2->refid;
				$refname=$row2->refname;
				$tbv=$row2->tbv;
				$refname=$row2->refname;
				
				if(strtoupper($position)=='RIGHT'){$col="#2977ff";}
				
				$amounta=$row2->pay;
				 			if($amounta>=2700){
				 				$deliveryc=200;
				 			}
				 			else if($amounta>=1200 && $amounta<2700){
				 				$deliveryc=150;
				 			}
				 			else{
				 				$deliveryc=100;
				 			}
				 $tamount="Rs ".($amounta+$deliveryc);
					
				
				
				?>
				<tr>
						<td><?php echo $ix;?></td> 
						<td><?php echo $u_name;?></td> 
						<td><?php echo $username;?></td> 
						<td><?php echo $refid;?></td> 
						<td><?php echo $refname;?></td> 
						<td style="color:<?php echo $col;?>"><?php echo $position;?></td> 
						<td style="text-align:right;"><?php echo $tbv;?></td> 
						<td style="text-align:right;"><?php echo $tamount;?></td> 
				</tr>
				<?php
				
			}
			?>
			
			
				</tbody> 
			</table>
			
			
		 </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    
  </body>
</html>

<?php 
}
?>