<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="" />
	<meta name="description" content="" />
	
	<title>ANVY BUSINESS</title>
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

   
	
    <!--  <div class="col-md-10 margin" style="clear: both;padding-top:34px !important;min-height:450px;">-->
    <div class="col-md-10 margin" style="clear: both;padding-top:8px !important;">
    	
    	
			<?php 
    			//error_reporting(0);
    				$this->load->database();
    				$pmid=$_REQUEST['pmid'];
    				
    				$qry=$this->db->query("select * from payout_master where payout_master_id='$pmid';");
    			
    				foreach ($qry->result() as $row)
    				{
    					$date=$row->p_m_date;
					 	$dates=implode("-", array_reverse(explode("-", $date)));
					 	$time=$row->p_m_time;
    				}
    					
    				?>
			
			
    <p style="text-align: center;font-size: 22px;color: #607D8B;margin-top:15px;"><b>Anvy Business</b></p>
    			
   				
		   	<address style="text-align: center;font-size: 10px;" >
            			
								 
            	  <strong>First Floor,TC 28/908(3)</strong><br>
            	<strong>Kaithamukku, Vanchiyoor.P.O.,</strong><br>
            	<strong>Trivandrum,695024</strong><br>
                Mob:+919567609500<br>
            	<br>	
  							
  			</address>
  			<hr style="border:1px dotted; color:#000;position: relative;margin-top:0;">
    		
    	<p Style='text-align:center;font-size:19px;margin-top:0;font-family:Times New Roman;'><u>PAYMENT RECEIPT</u></p>
    			
    	 <div class="col-xs-12" style="float:left;width:100%;margin-bottom:1%">
		             	 <div class="col-xs-6 col-sm-6" style="width:50%;float: left;">
		             		 <p style="text-align:left;margin:0;"> Date:<?php echo $dates?></p>
		             		 
		             	</div>
						<div class="col-xs-6 col-sm-6" style="float:right;width:50%">
							<p style="text-align:right;margin:0;"> Time:<?php echo $time?></p>
	            		</div>
						
           </div>
        <!--    <div class="col-xs-12" >
		             	 
						<div class="col-xs-6 " style="float:left;margin-top:0;">
							<p style="text-align:left">Time:<?php //echo $time?></p>
	            		</div>
	            		 	
           		</div> -->
           		
 
    <div class="col-md-12 margin" style="margin-top:0%">
    
    		<table class="table change" border="1" style="width:100%;">
    			<thead>
    			<tr>
    				<th class="text-center" style="height:33px;text-align:center;width:5%;">No</th>
    				<th class="text-center" style="height:33px;text-align:center;width:15%;">Name</th>
    				<th class="text-center" style="height:33px;text-align:center;width:15%;">User ID</th>
    				<th class="text-center" style="height:33px;text-align:center;width:20%;">Bank Details</th>
    				<th class="text-center" style="height:33px;text-align:center;width:10%;">Mobile</th>
    				<th class="text-center" style="width:12%;">Amount</th>
    				 <th class="text-center" style="height:33px;text-align:center;width:12%;">Deduction</th>
    				 <th class="text-center" style="width:12%;">Net Amount</th>
    			</tr>
    			</thead>
    			<tbody>
    	<?php 
    			//error_reporting(0);
    			include 'dbconnection.php';
    		$pmid=$_REQUEST['pmid'];
    		
    		$id=1;
    		$pin=2345;
    		//echo "call re_print('$id','$pin','$pmid')";
    		$qry=mysqli_query($connect,"call re_print('$id','$pin','$pmid')");
    		$i=1;
    		//echo "row=".mysqli_num_rows($qry);
    		
    		$tamt=0;$tsc=0;
			 while($row1=mysqli_fetch_assoc($qry))
				{
					
			 
				 	$fname=$row1['u_name'];
				 	$username=$row1['username'];
					$father=$row1['u_father'];
				 	$mobile=$row1['u_mobile'];
					$charge=$row1['service_charge'];
					$freecut=$row1['freecut'];
				 	$amount=$row1['amount'];
				 	$name=$row1['u_bankname'];
				 	$account=$row1['u_accountno'];
				 	$ifsc=$row1['u_ifsc'];
				 	$date=$row1['p_m_date'];
				 	$dates=implode("-", array_reverse(explode("-", $date)));
				 	$amt=$row1['p_m_amount'];
				 	$number=$row1['number'];
				 	$time=$row1['p_m_time'];
				 	
				 	
				 	$at=$amount+$charge+$freecut;
				 	$tamt=$tamt+$amount;
				 	$tsc=$tsc+$charge+$freecut;
			?>	
    			<tr>
    				<td class="text-center" style="height:33px;padding:4px!important"><?php echo $i;?></td>
    				<td class=" change" style="height:33px;padding:4px!important"><?php echo $fname;?></td>
    				<td class=" change" style="height:33px;padding:4px!important"><?php echo $username;?></td>
    				<td class="text-center" style="height:33px;padding:4px!important"><?php echo $name.",".$account.",".$ifsc ?></td>
    				<td class="text-center" style="height:33px;padding:4px!important"><?php echo $mobile;?></td>
  
    				
    				<td class="text-center" style="height:33px;padding:4px!important;text-align:right;"><?php echo "Rs ".number_format((float)$at, 2, '.', '');?></td>
    				<td class="text-center" style="height:33px;padding:4px!important;text-align:right;"><?php echo "Rs ".number_format((float)($charge+$freecut), 2, '.', '');?></td>
    				<td class="text-center" style="height:33px;padding:4px!important;text-align:right;"><?php echo "Rs ".number_format((float)$amount, 2, '.', '');?></td>
    			</tr>
    	<?php
				$i++; 
				
				}
		?>
    			</tbody>
    			<tfoot>
    			<tr>
    				
    				<td colspan="6"  style="height:26px;font-size:15px;text-align:right;padding-right:10px;">Total :</td>
    				<td class="text-center" style="height:26px;font-size:11px;font-weight:bold;text-align:right;"><?php echo "Rs ".number_format((float)$tsc, 2, '.', ''); ?>&nbsp;</td>
    				<td class="text-center" style="height:26px;font-size:11px;font-weight:bold;text-align:right;"><?php echo "Rs ".number_format((float)$tamt, 2, '.', ''); ?>&nbsp;</td>
    				
    			</tr>
    			</tfoot>
    			 
    		
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