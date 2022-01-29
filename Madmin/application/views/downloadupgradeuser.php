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
	
	include "dbconnection.php";
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
    	
    	
    	<?php 
    	
    	$ndate=trim( implode('-', array_reverse(explode('-', $date))));
    	?>
    	
    	
			
			<span style="color:red;">Upgraded: <?php echo $ndate;?></span>
				<table border="1" class="table" style="margin-top:10px;"> 
				<thead>
				  <tr>
				  <th style="width:7%;">Sl No</th>
					<th>Name</th>
					<th>UserID</th>
					<th>Referred By</th>
					<th>Parent ID</th>
					<th>Mobile</th>
					<th>BV</th>
					<th>Paid</th>
				  </tr>
				</thead>
				<tbody id="loadviewuser">
				 <?php 
				 

				 $sql="SELECT *,
				 (select ul1.username from user_extradetails ue1,user_login ul1 where ue1.u_id=ue.referral_id and ul1.u_id=ue1.u_id limit 1) as ref,
			 (select ul2.username from user_extradetails ue2,user_login ul2 where ue2.u_id=ue.parent_id and ul2.u_id=ue2.u_id limit 1) as prnt,
			 (select sum(pd.product_price) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.upgrade_id=upp1.upgrade_id group by upp.upgrade_id) as pay,
			 (select sum(pd.bv) from user_product_prefer upp,product_details pd where pd.product_id=upp.product_id and upp.upgrade_id=upp1.upgrade_id group by upp.upgrade_id) as tbv
				 FROM user_login ul,user_extradetails ue,user_product_prefer upp1
				 where ul.u_id=ue.u_id and ul.u_id=upp1.u_id and ul.type_flg='W' and upp1.upgraded='1' and upp1.paid='1' and upgrade_date='$date' group by upp1.upgrade_id ORDER BY upp1.user_product_id DESC";
		 
				 $qry=mysqli_query($connect,$sql);
				 
				 
				 $i=0;
				// echo "row=".mysqli_num_rows($qry);
				 $newuser=0;
				 if(mysqli_num_rows($qry)>0)
				 {
				 	while($row=mysqli_fetch_assoc($qry))
				 	{
						$i++;
				 		$freeuser=$row['freeuser'];
				 		if($freeuser==1){
				 			$userType="Free User";
				 		}
				 		else{
				 			$amounta=$row['pay'];
				 			if($amounta>=2700){
				 				$deliveryc=200;
				 			}
				 			else if($amounta>=1200 && $amounta<2700){
				 				$deliveryc=150;
				 			}
				 			else{
				 				$deliveryc=100;
				 			}
				 			$userType="Rs ".($amounta+$deliveryc);
				 		}
				 		?>
				 		<tr>
						 <td><?php echo $i?></td>
				 		<td><?php echo $row['u_name'];?></td>
				 		<td><?php echo $row['username'];?></td>
				 		<td><?php echo $row['ref'];?></td>
				 		<td><?php echo $row['prnt'];?></td>
				 		<td><?php echo $row['u_mobile'];?></td>
						<td><?php echo $row['tbv'];?></td>
				 		<td><?php echo $userType;?></td>
				 		<?php
				 	}
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