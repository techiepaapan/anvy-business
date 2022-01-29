<?php 
$entryPass=false;
if(isset($_GET['activate'])){
    $entryPass=true;
}
else if(isset($_GET['id'])){
    $entryPass=true;
}
if($entryPass==false){
    echo "Invalid Call";
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
    <title>Bill</title>

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
  
	<body style="font-family: serif; font-size: 11.5px !important;">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding outer-box">
	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
    	
    	<?php 
    	$uid = $_SESSION['uid1'];
    	$date="";
    	$name="";
    	$address="";
    	$city="";
    	$state="";
    	$pincode="";
    	$country="";
    	$mobile="";
    	if(isset($_GET['id'])){
    	    $id=$_GET['id'];
    	    $query = $this->db->query("select *,upp.upgrade_date as date from user_product_prefer upp, product_details pd, order_comm_detail ocd
                            where upp.upgraded='1' and pd.product_id=upp.product_id and upp.paid='1' and upp.paid='1' and ocd.po_id=upp.user_product_id and ocd.type='1'
                             and upp.u_id='$uid' and upp.upgrade_id='$id'");
    	}
    	else{
    	    $query = $this->db->query("select *,ue.u_activatedate as date from user_product_prefer upp,
                             product_details pd, user_login ul, user_extradetails ue, order_comm_detail ocd
                            where ul.activated=1 and upp.upgraded=0 and upp.u_id=ul.u_id and ue.u_id=ul.u_id and ocd.po_id=upp.user_product_id and ocd.type='1'
                            and pd.product_id=upp.product_id and upp.u_id='$uid'");
    	    
    	}
    	foreach ($query->result() as $row)
    	{
    	    $date=$row->date;
    	    $name=$row->name;
    	    $address=$row->address;
    	    $city=$row->city;
    	    $state=$row->state;
    	    $pincode=$row->pincode;
    	    $mobile=$row->mobile;
    	}
    	?>
    	
    	
    	<table style="width:100%;">

    		<tr>
    			<td style="width:100px;"><img src="../images/logo.png"/></td>
    			<td><h4>Anvy Business Services<br>(OPC) Pvt Ltd</h4></td>
    			<td style="text-align:right;">
    				<h2 style="color: #2bb9e7;">INVOICE</h2>
    				<p>Date: <?php echo date('m-d-Y');?></p>
    				<p><?php
        				if($date!=""){
        				    echo "Inv. Date: ".trim( implode('-', array_reverse(explode('-', $date))));
        				}
        				?></p>
        			
    			</td>
    		</tr>
    		</table>
    		<br>
    		<table style="width:100%;">
    		<tr>
    			<td style="border-top:1px solid #00c1ea;"></td>
    			<td style="border-top:1px solid #00c1ea;"></td>
    		</tr>
    		<tr>
    			<td style="text-align: left;width: 50%;">
    					Anvy Business Services(OPC) Pvt Ltd,<br>
        				First Floor,TC 28/908(3),<br>
                    	Kaithamukku, Vanchiyoor.P.O.,<br>
                    	Trivandrum,Kerala-695024<br>
                        Phone:+919567530184
    			</td>
    			<td style="text-align:right;;width: 50%;">
            			<span style="color:#2bb9e7; font-size: 12px !important;">Bill To:</span><br>
                    	<?php echo $name;?>,<br>
                    	<?php echo $address;?>,<br>
                    	<?php echo $city.",".$state."-".$pincode;?><br>
                        Phone:<?php echo $mobile;?>
    			</td>
    		</tr>
     		<tr>
    			<td style="border-bottom:1px solid #00c1ea;"></td>
    			<td style="border-bottom:1px solid #00c1ea;"></td>
    		</tr>
    	</table>
			<table class="table"> 
				<thead> 
					<tr> 
						<th style="width:6%; text-align:center;" rowspan="2">No</th> 
						<th style="width:26%; text-align: left;" rowspan="2">Product</th> 
						<th style="width:8%; text-align: center;" rowspan="2">Size</th> 
						<th style="width:8%; text-align: right;" rowspan="2">Qty</th> 
						<th style="width:12%; text-align: right;" rowspan="2">Unit Price</th> 
						<th style="width:7%; text-align: right;" rowspan="2">BV</th>
						<th style="text-align:center;" colspan="3">Tax(inclusive)</th>
						<th style="width:12%; text-align: right;" rowspan="2">Total</th> 
					</tr> 
					<tr>
						<th style="width:10%;text-align: right">CGST</th>
						<th style="width:10%;text-align: right">SGST</th>
						<th style="width:10%;text-align: right">IGST</th>
					</tr>
				</thead> 
				<tbody> 
				
<?php

            $ix=0;$total=0;$tax=0;
			foreach ($query->result() as $row1)
			{    
			    $ix++;
    			$product_code=$row1->product_code;
    			$product_name=$row1->product_name;
    			$product_price=$row1->product_price;
    			$cgstp=$row1->cgst;
    			$cgst=$cgstp*$product_price/100;
    			$sgstp=$row1->sgst;
    			$sgst=$sgstp*$product_price/100;
    			$igstp=$row1->igst;
    			$igst=$igstp*$product_price/100;
    			$qty=$row1->qty;
    			$size=$row1->size;
    			$bv=$row1->bv;
    			$curtotal = $product_price*$qty;
    			$total+=$curtotal;
    			$tax+=$cgst+$sgst+$igst;
    			$curtotal = sprintf('%0.2f', $curtotal);
				?>
				<tr>
						<td style="text-align: center;background: #e6e6e6;"><?php echo $ix;?></td> 
						<td style="text-align: left;"><?php echo $product_code.'<br/><span style="font-height:12px;:">'.$product_name.'</span>';?></td>
						<td style="text-align: center;background: #e6e6e6;"><?php echo $size;?></td> 
						<td style="text-align: right;"><?php echo $qty;?></td> 
						<td style="text-align: right;background: #e6e6e6;"><?php echo $product_price;?></td> 
						<td style="text-align: right;"><?php echo $bv;?></td> 
						<td style="text-align: right;background: #e6e6e6;"><?php if($cgstp==0){echo "-";}else{echo sprintf('%0.2f', $cgst);}?></td> 
						<td style="text-align: right;"><?php if($sgstp==0){echo "-";}else{echo sprintf('%0.2f', $sgst);}?></td> 
						<td style="text-align: right;background: #e6e6e6;"><?php if($igstp==0){echo "-";}else{echo sprintf('%0.2f', $igst);}?></td> 
						<td style="text-align: right;"><?php echo $curtotal;?></td>
				</tr>
				<?php
				
			}
			
			if($total>=2700){
			    $deliveryc=200;
			}
			else if($total>=1200 && $curtotal<2700){
			    $deliveryc=150;
			}
			else{
			    $deliveryc=100;
			}
			?>
    			<tr>
    				<th style="border-top:1px solid #00c1ea;border-bottom:1px solid #00c1ea;text-align:right;" colspan="8">TOTAL</th>
        			<th style="border-top:1px solid #00c1ea;border-bottom:1px solid #00c1ea;text-align:right;" colspan="2"><?php echo "Rs. ".sprintf('%0.2f', $total);?></th>
    			</tr>
			
				<tr>
    				<th style="" colspan="10"></th>
    			</tr>
    			<tr>
    				<th style="" colspan="10"></th>
    			</tr>
				<tr>
    				<th style="text-align:right;" colspan="8">Total Tax</th>
        			<th style="text-align:right;" colspan="2"><?php echo "Rs. ".sprintf('%0.2f', $tax);?></th>
    			</tr>
    			<tr>
    				<th style="text-align:right;" colspan="8">Delivery Charge</th>
        			<th style="text-align:right;" colspan="2"><?php echo "Rs. ".sprintf('%0.2f', $deliveryc);?></th>
    			</tr>
    			<tr>
    				<th style="text-align:right;" colspan="8">Grand Total</th>
        			<th style="text-align:right;" colspan="2"><?php echo "Rs. ".sprintf('%0.2f', $total+$deliveryc+$tax);?></th>
    			</tr>
    			<tr>
    				<th style="" colspan="10"></th>
    			</tr>
				<tr>
    				<th style="border-bottom:1px solid #00c1ea;text-align:right;" colspan="10"></th>
    			</tr>
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