<!DOCTYPE HTML>
<html>
<head>
<title>Orders</title>

<style>
body{
	font-size: 12px;
}

#productlist
{
	border-collapse: collapse;
 }
#productlist th
{
	text-align:left;
}
#productlist th, #productlist th
{
	padding:3px;
}
</style>
</head>
<body>
        <?php 
        include 'dbconnection.php';
        $res=json_decode($_REQUEST['pmid'],true);
        $i=1;$ic1=1;
        foreach ($res as $row){

        	if($ic1>1){
        		$heighting='<hr>';
        	}
        	else{
        		$heighting='';
        	}
        	$ic1++;
        	//echo json_encode($row);
        	//error_reporting(0);
        		 
        		$oid=$row['o'];
        		$tpe=$row['t'];
        		//echo $oid."-".$tpe."</br>";
        	
        		//$id=1;
        		//$pin=2345;
				//echo "call re_print('$id','$pin','$pmid')";
				

        	
        		$arrys=array();
        		$pddes="";
        		$deliveryc=0;
        	//echo mysqli_num_rows($qry);
				if($tpe==1)
        		{
					$pddes="";$orderid="";$amounta=0;
						
						$myArray = explode(',', $oid);
						foreach($myArray as $my_Array){
						$oid1=$my_Array;
					$qry=mysqli_query($connect,"call sp_trackorder('$oid1','$tpe')");
					mysqli_next_result($connect);
        			while($row1=mysqli_fetch_assoc($qry))
        			{
        				$orid=$row1['po_id'];
        				$date=$row1['prefer_date'];
        				$dates=implode("-", array_reverse(explode("-", $date)));
        				$amounta+=$row1['qty']*$row1['product_price'];
        				if($amounta==null)
        				{
        					$amounta=0;
						}
						
						if ($orderid=="") {
							$orderid='OD'.$row1['po_id'];
						} else {
							$orderid=$orderid.",  ".'OD'.$row1['po_id'];
						}

        					$re_qty=$row1['qty'];
        				
        					if($row1['size']==""){$row1['size']="Free";}
        				$ic=1;$sizedetails=$row1['size'];
        				$itemtotal=$amounta;
        				$re_unitprice=$row1['product_price'];
        				$pddes=$pddes."<tr><td>".$ic."</td><td>".$row1['product_name'].
        					"</td><td>".$sizedetails."</td><td style='text-align:right;'>Rs ".sprintf('%0.2f',$re_unitprice).
        				"</td><td style='text-align:right;'>".$re_qty."</td><td style='text-align:right;'>Rs ".sprintf('%0.2f',$re_unitprice*$re_qty)."</td></tr>";
        				
        				$fname=$row1['name'];
	        			$mobile=$row1['mobile'];
	        			$address=$row1['address'];
	        			$city=$row1['city'];
	        			$state=$row1['state'];
	        			$pincode=$row1['pincode'];
	        	
						}
					}
					if($amounta>=2700){
						$deliveryc=200;
					}
					else if($amounta>=1200 && $amounta<2700){
						$deliveryc=150;
					}
					else{
						$deliveryc=100;
					}
					$amount=$amounta+$deliveryc;
				}
        		else if($tpe==2)
        			{
						$qry=mysqli_query($connect,"call sp_trackorder('$oid','$tpe')");
						mysqli_next_result($connect);
						while($row1=mysqli_fetch_assoc($qry))
        				{
        				$pddes="";
        				$orid=$row1['po_id'];
        				$orderid='REOD'.$row1['po_id'];
        				$date=$row1['order_date'];
        				$amount=$row1['re_price'];
        				$dates=implode("-", array_reverse(explode("-", $date)));
        				$qry1=mysqli_query($connect,"select *,rp.product_name from repurchase_order ro,repurchase_product rp,reorder_product rep where ro.repurchase_order_id=rep.order_id and ro.repurchase_order_id='$orid' and rp.re_product_id=rep.re_product_id;");
        				// mysqli_next_result($connect);
        				
        				$ic=0;
        				while($rows1=mysqli_fetch_assoc($qry1))
        				{	
        					$ic++;
        					$deliveryc=$deliveryc+$rows1['delivery_charge'];
        					if($rows1['re_size']==null)
        					{
        						$sizedetails="";
        					}
        					else
        					{
        						$sizedetails=$rows1['re_size'];
        					}
        					$re_unitprice=$rows1['re_unitprice'];
        					if($re_unitprice==null)
        					{
        						$re_unitprice=0;
        					}
        					$re_qty=$rows1['re_qty'];
        					if($re_qty==null)
        					{
        						$re_qty=0;
        					}
        					
        					$itemtotal=$re_qty*$re_unitprice;
        					$pddes=$pddes."<tr><td>".$ic."</td><td>".$rows1['product_name'].
        							"</td><td>".$sizedetails."</td><td style='text-align:right;'>Rs ".sprintf('%0.2f',$re_unitprice).
        						"</td><td style='text-align:right;'>".$re_qty."</td><td style='text-align:right;'>Rs ".sprintf('%0.2f',$itemtotal)."</td></tr>";
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
					}
        			}
        				
        			

        			echo $heighting;
        			?>

<div style="width:100%;page-break-inside: avoid;">
		<div style="width:100%;text-align: left;padding:3px;page-break-inside: avoid;">
					<b>Tax Invoice/Bill of Supply/Cash Memo</b><br/>
					Invoice: <?php echo $orderid ?><br/>
					Invoice Date: <?php echo $dates; ?>
		</div>
		<div style="width:100%;border:1px solid;padding:3px;">
				
				<table style="width:100%;">
					<tr>
						<td style="width:50%;">
							<b>To:</b><br/>
							<?php echo $fname;?><br/>
							<?php echo $address;?><?php echo $city;?>,<?php echo $state;?><br/>
							Pin :<?php echo $pincode;?>&nbsp;&nbsp;Phone :<?php echo $mobile;?>
						</td>
						<td style="width:50%;">
							<b>Sold By:</b><br/>
							Anvy Business Services(OPC) Pvt Ltd<br/>
							Corp Office : T.C. 28/908(3),<br/>
							Kaithamukku, Thiruvananthapuram, Kerala-695024
						</td>
					</tr>
				</table>
		</div>
		<div style="width:100%;border:1px solid;padding:3px;page-break-inside: avoid;">
				<table border="1" style="width:100%;margin:5px 0px;" id="productlist">
					<tbody>
						<tr>
							<td>S.No.</td>
							<td>Product</td>
							<td>Size</td>
							<td style='text-align:right;'>Unit Price</td>
							<td style='text-align:right;'>Qty</td>
							<td style='text-align:right;'>Total</td>
						</tr>
						<?php echo $pddes;?>
						<tr>
						<td colspan="5"><b>Amount</b></td>
						<td style='text-align:right;'>Rs <?php echo sprintf('%0.2f',$amounta);?></td>
						</tr>
						<tr>
						<td colspan="5"><b>Delivery Charge</b></td>
						<td style='text-align:right;'>Rs <?php echo sprintf('%0.2f',$deliveryc);?></td>
						</tr>
						<tr>
						<td colspan="5"><b>Total Amount</b></td>
						<td style='text-align:right;'><b>Rs <?php echo sprintf('%0.2f',$amount);?></b></td>
						</tr>
					</tbody>
				</table>
				
				
				
		</div>
		<div style="width:100%;border:1px solid;padding:3px;page-break-inside: avoid;">
				<table  style="width:100%;">
				<tbody>
					<tr><td>Customer Care: +919567530184</td></tr>
					<tr><td>Customer Support : support@anvybusiness.com</td></tr>
					<tr><td>For Complaints : complaints@anvybusiness.com</td></tr>
					</tbody>
				</table>
		</div>
			
</div>


<?php }?>
</body>
</html>