<!DOCTYPE HTML>
<html>
<head>
<title>Orders</title>
</head>
<body>
        <?php 
        include 'dbconnection.php';
        $res=json_decode($_REQUEST['pmid'],true);
        $i=1;
        foreach ($res as $row){

        	//echo json_encode($row);
        	//error_reporting(0);
        		 
        		$oid=$row['o'];
        		$tpe=$row['t'];
        		//echo $oid."-".$tpe."</br>";
        	
        		//$id=1;
        		//$pin=2345;
        		//echo "call re_print('$id','$pin','$pmid')";
        		$qry=mysqli_query($connect,"call sp_trackorder('$oid','$tpe')");
        		mysqli_next_result($connect);
        	
        		$arrys=array();
        		$pddes="";
        		$deliveryc=0;
        	//echo mysqli_num_rows($qry);
        		while($row1=mysqli_fetch_assoc($qry))
        		{
        			//echo json_encode($row1);
        			$tpe=$row1['type'];
        			if($tpe==1)
        			{
        				$pddes="";
        				$orid=$row1['po_id'];
        				$orderid='OD'.$row1['po_id'];
        				$date=$row1['prefer_date'];
        				$dates=implode("-", array_reverse(explode("-", $date)));
        				$amount=$row1['product_price'];
        				$pddes=$row1['product_name'];
        			}
        			else if($tpe==2)
        			{
        				$pddes="";
        				$orid=$row1['po_id'];
        				$orderid='REOD'.$row1['po_id'];
        				$date=$row1['order_date'];
        				$amount=$row1['re_price'];
        				$dates=implode("-", array_reverse(explode("-", $date)));
        				$qry1=mysqli_query($connect,"select *,rp.product_name from repurchase_order ro,repurchase_product rp,reorder_product rep where ro.repurchase_order_id=rep.order_id and ro.repurchase_order_id='$orid' and rp.re_product_id=rep.re_product_id;");
        				// mysqli_next_result($connect);
        				
        				
        				while($rows1=mysqli_fetch_assoc($qry1))
        				{
        					$deliveryc=$deliveryc+$rows1['delivery_charge'];
        					if($rows1['re_size']==null)
        					{
        						$sizedetails="";
        					}
        					else
        					{
        						$sizedetails="  Size:".$rows1['re_size'];
        					}
        					if($pddes=="")
        					{
        						$pddes=$rows1['product_name'].$sizedetails;
        					}
        					else
        					{
        						$pddes=$pddes.",  ".$rows1['product_name'].$sizedetails;
        					}
        						
        				}
        			}
        				
        			$fname=$row1['name'];
        			$mobile=$row1['mobile'];
        			$address=$row1['address'];
        			$city=$row1['city'];
        			$state=$row1['state'];
        			$pincode=$row1['pincode'];
        	
        			//echo $pddes;
        			//$s=$s.",".$pddes;
        			$amounta=$amount-$deliveryc;

?>
        <div style="width:100%;">
	
<p style="font-size:23px;"><b>Order Number : </b> <?php echo $orderid ?></p>
<p style="font-size:23px;"><b>Order Date :</b> <?php echo $dates; ?></p>
 
<p style="font-size:23px;"><b>Product Name :</b> <?php echo $pddes;?></p>
<p style="font-size:23px;"><b>Amount :</b> Rs. <?php echo number_format((float)$amounta, 2, '.', ''); ?></p>
<p style="font-size:23px;"><b>Delivery Charge :</b> Rs. <?php echo number_format((float)$deliveryc, 2, '.', ''); ?></p>
<p style="font-size:23px;"><b>Total :</b> Rs. <?php echo number_format((float)$amount, 2, '.', ''); ?></p>
<!-- <p style="font-size:23px;"><b>Delivery Charge :</b> Rs. <?php //echo $rows['delivery_charge']; ?></p> -->

<p style="text-align: left;font-weight:bold;border-bottom:1px solid;"><!-- Shipping/Customer Address--></p>

<div style="width:50%;float:left;font-size:18px; margin: 10px 0px;">
	
	<p style="margin: 10px 0px;">Customer Care: +919567609500</p>
	<p style="margin: 10px 0px;font-size:12px;">(Working Hours: 10:00 am - 05:00 pm)</p>
	<p style="margin: 10px 0px;">Corp Office : T.C. 28/908(3),
Kaithamukku, Thiruvananthapuram,
Kerala</p>
	<p style="margin: 10px 0px;">Customer Support : support@massventureindia.com</p>
	<p style="margin: 10px 0px;">For Complaints : complaints@massventureindia.com</p>
	

</div>



<div style="text-align: left;word-break: break-all;width:50%;font-size:20px;">
			<p style="margin: 10px 0px;padding-left:10px;"><?php echo $fname;?></p>
			<p style="margin: 10px 0px;padding-left:10px;"><?php echo $address;?></p>
			<p style="margin: 10px 0px;padding-left:10px;"><?php echo $city;?>,<?php echo $state;?></p>
			<p style="margin: 10px 0px;padding-left:10px;">Pin :<?php echo $pincode;?></p>
			<p style="margin: 10px 0px;padding-left:10px;">Phone :<?php echo $mobile;?></p>
</div>

</div>

<div style="height:100%;"></div>
 

<?php }}?>
</body>
</html>