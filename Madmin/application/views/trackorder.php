<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="" />
	<meta name="description" content="" />
	
	<title>Anvy Business</title>
	<link rel="icon" href="<?php echo base_url()?>Assets/packing/images/logoheader.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.css" />
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/main.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style1.css"/>
	
	

	
	
	
	<style>

 @page {

  size: 4.8in 11in;    /* 'em' 'ex' and % are not allowed; length values are width height */

  margin:2%; /* <any of the usual CSS values for margins> (% of page-box width for LR, of height for TB) */

  margin-header: 12cm; /* <any of the usual CSS values for margins> */

  margin-footer: 2mm; /* <any of the usual CSS values for margins> */

  marks: /*crop | cross | none*/

  header: html_myHTMLHeaderOdd;

  footer: html_myHTMLFooterOdd;

 
} 



@page { size: auto;  }

@media print
{
	.change
	{
		/* width:auto!important; */
		font-size:11px !important;
	}
	img
{
	max-width:100%;

	max-height:100%;
	

}	
	
	 
	
}

table {
    border-collapse: collapse;
}
</style>   

 
</head>

<body>

   <?php 
   $fix=json_decode($fix,true);
   ?>
	
    <!--  <div class="col-md-10 margin" style="clear: both;padding-top:34px !important;min-height:450px;">-->
    <div class="col-md-10 margin" style="clear: both;padding-top:8px !important;">
    	

			
			
    <p style="text-align: center;font-size: 22px;color: #607D8B;margin-top:15px;"><b>Anvy Business</b></p>
    			
   				
		   	<address style="text-align: center;font-size: 10px;" >
            				
            	  <strong>First Floor,TC 28/908(3)</strong><br>
            	<strong>Kaithamukku, Vanchiyoor.P.O.,</strong><br>
            	<strong>Trivandrum,Kerala-695024</strong><br>
                Phone:+919567530184<br>
            	<br>	
  							
  			</address>
  			<hr style="border:1px dotted; color:#000;position: relative;margin-top:0;">
    		
    	<p Style='text-align:center;font-size:19px;margin-top:0;font-family:Times New Roman;'><u>TRACK ORDER</u></p>
    			
    	<!--  <div class="col-xs-12" style="float:left;width:100%;margin-bottom:1%">
		             	 <div class="col-xs-6 col-sm-6" style="width:50%;float: left;">
		             		 <p style="text-align:left;margin:0;"> Date:<?php //echo $dates?></p>
		             		 
		             	</div>
						<div class="col-xs-6 col-sm-6" style="float:right;width:50%">
							<p style="text-align:right;margin:0;"> Time:<?php //echo $time?></p>
	            		</div>
						
           </div>-->
        <!--    <div class="col-xs-12" >
		             	 
						<div class="col-xs-6 " style="float:left;margin-top:0;">
							<p style="text-align:left">Time:<?php //echo $time?></p>
	            		</div>
	            		 	
           		</div> -->
           		
 
    <div class="col-md-12 margin" style="margin-top:0%">
    
    		<table class="table change"  style="width:100%;">
    			<thead>
    			<tr>
    				<th class="text-center" style="height:33px;text-align:center;border-bottom:2px solid;font-size: 22px;">OrderId</th>
    				<th class="text-center" style="height:33px;text-align:center;border-bottom:2px solid;font-size: 22px;">Order Date</th>
    				<th class="text-center" style="height:33px;text-align:center;border-bottom:2px solid;font-size: 22px;">Orders</th>
    				<th class="text-center" style="height:33px;text-align:center;border-bottom:2px solid;font-size: 22px;">Total Amount</th>
    				
    				<th class="text-center" style="height:33px;text-align:center;border-bottom:2px solid;font-size: 22px;">Address Details</th>
    				<th class="text-center" style="height:33px;text-align:center;border-bottom:2px solid;font-size: 22px;">Signature</th>
    				
    				
    				
    			</tr>
    			</thead>
    			<tbody>
    	    	<?php 
    	    	
    			//error_reporting(0);
    			include 'dbconnection.php';
    		//$pmid=$_REQUEST['pmid'];
    		//echo "PMID= ".$pmid;
    		foreach($fix as $row)
    		{
    			
    			$oid=$row['o'];
    			$tpe=$row['t'];
    			//echo $oid."-".$tpe."</br>";
    		
    		//$id=1;
    		//$pin=2345;
    		//echo "call re_print('$id','$pin','$pmid')";

    		
    		$arrys=array();
    		$pddes="";$orderid="";
			 
					
					//$tpe=$row1['type'];
					if($tpe==1)
					{
						$pddes="";$orderid="";$amount=0;
						
						$myArray = explode(',', $oid);
						foreach($myArray as $my_Array){
						$oid1=$my_Array;
						$qry=mysqli_query($connect,"call sp_trackorder('$oid1','$tpe')");
						mysqli_next_result($connect);

                        while ($row1=mysqli_fetch_assoc($qry)) {
                           
                        	if($row1['size']==""){$row1['size']="Free";}
                            $date=$row1['prefer_date'];
                            $dates=implode("-", array_reverse(explode("-", $date)));
							$amount+=$row1['qty']*$row1['product_price'];
							//echo $row1['product_name']." ->".$row1['product_price']."-".$amount."<br/>";
                            if ($pddes=="") {
                                $pddes=$row1['product_name'].", Qty:".$row1['qty'].", Size:".$row1['size'];
                            } else {
                                $pddes=$pddes."<br>".$row1['product_name'].", Qty:".$row1['qty'].", Size:".$row1['size'];
							}
							
							if ($orderid=="") {
                                $orderid='OD'.$row1['po_id'];
                            } else {
                                $orderid=$orderid.",  ".'OD'.$row1['po_id'];
							}

                            $fname=$row1['name'];
                            $mobile=$row1['mobile'];
                            $address=$row1['address'];
                            $city=$row1['city'];
                            $state=$row1['state'];
                            $pincode=$row1['pincode'];
						}

					}
					if($amount>=2700){
						$amount+=200;
					}
					else if($amount>=1200 && $amount<2700){
						$amount+=150;
					}
					else{
						$amount+=100;
					}
					}
					else if($tpe==2)
					{
						$pddes="";
						$qry=mysqli_query($connect,"call sp_trackorder('$oid','$tpe')");
						mysqli_next_result($connect);
						while($row1=mysqli_fetch_assoc($qry))
						{
						$orid=$row1['po_id'];
						$orderid='REOD'.$row1['po_id'];
                        $date=$row1['order_date'];
						$amount=$row1['re_price'];
				 	    $dates=implode("-", array_reverse(explode("-", $date)));
				 	    $qry1=mysqli_query($connect,"select *,rp.product_name from repurchase_order ro,repurchase_product rp,reorder_product rep where ro.repurchase_order_id=rep.order_id and ro.repurchase_order_id='$orid' and rp.re_product_id=rep.re_product_id;");
				 	   // mysqli_next_result($connect);
				 	    while($rows1=mysqli_fetch_assoc($qry1))
				 	    {
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
						 
				 	$fname=$row1['name'];
				 	$mobile=$row1['mobile'];
				 	$address=$row1['address'];
				 	$city=$row1['city'];
				 	$state=$row1['state'];
					 $pincode=$row1['pincode'];
					}
				}
					
				 	
				 	//echo $pddes;
				 	//$s=$s.",".$pddes;
				 	
				 	
			?>	
			
    			
    			<tr style="padding-top:20px;">
		<td style="text-align: center;border-bottom:1px dashed;width: 100px;font-size:20px;line-height:30px;"><?php echo $orderid;?></td>
		<td style="text-align: center;border-bottom:1px dashed;width: 100px;font-size:20px;line-height:30px;"><?php echo $dates;?></td>
		<td style="text-align: center;word-break: break-all; width: 200px;border-bottom:1px dashed;padding:10px;font-size:20px;line-height:30px;">
			<p><?php echo $pddes;?></p>

		</td>
		<td style="text-align: center;border-bottom:1px dashed;font-size:16px;width: 100px;font-size:20px;line-height:30px;">Rs.<?php echo number_format((float)$amount, 2, '.', '');?></td>
	
		<td style="text-align: center;word-wrap: break-word; width: 300px;border-bottom:1px dashed;font-size:20px;line-height:30px;padding:10px">
			<p><?php echo $fname;?></p>
			<p><?php echo $address;?></p>
			<p><?php echo $city;?>,<?php echo $state;?></p>
			<p>Pin :<?php echo $pincode;?></p>
			<p>Phone :<?php echo $mobile;?></p>
			
		</td>
		<td style="text-align: center;word-wrap: break-word; width: 200px;border-bottom:1px dashed;font-size:20px;line-height:30px;padding:10px">
		</td>
             
	</tr>
	   <?php
				  }?>
    			</tbody>
    			
    		
    		</table>
  		
  		
  			<!--  <table class="change" style="width:100%;margin-right:10px; ">
    			
    			<tbody>
    			
    			 
    			
    			<tr>
    				<td style="font-size:16px"><b>CONSOLIDATE:-</b></td>
    			</tr>
    			
    			<tr>
    				
    				<td class="text-left" style="height:26px;font-size:15px;">Total Paid Amount :</td>
    				<td class="text-center" style="height:26px;font-size:17px;font-weight:bold"><?php //echo "INR ".$amt ?></td>
    				
    			</tr>
    			
    			</tbody>
    			 
    		
    		</table> -->
  		
    </div>

</div>

 


</body>
</html>