<?php

error_reporting(0);
include 'dbconnection.php';

$data_back=json_decode(file_get_contents('php://input'));
$data_back=$data_back->{'key_val'};

for($i=0;$i<count($data_back);$i++)
{
$object=$data_back[$i];
$variable=$object->variable;
$mobile=$object->mobile;
$address=$object->address;
$pin=$object->pin;
$name=$object->name;
$city=$object->city;
$state=$object->state;
$country=$object->country;
$user_id=$object->user_id;
$total=$object->total;
$detail=$object->product_array;
}


try
{

	if($variable=="m4a0s1s")
	{
	$jsondata =$detail;
	$arr = json_decode($jsondata, true);
	
	mysqli_next_result($connect);
	
	$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
	$date=$dat->format('Y-m-d');
	$time=$dat->format('H:i:s');
	//$query="insert into deliverynote(RefNo,DDate,SupID,SupRef,VPID,Trip,ProjID,DelType,LoadTime,driver_id,destination)values('$reference_no','$date','$supplier','$sup_ref','$vehicle_id','$trip','$projectId','$delType','$loadTime','$driverId','$destination')";
	$query=mysqli_query($connect,"call webservice_buyreproducts('$user_id','$name','$mobile','$address','$city','$state','$country','$pin','$date','$time','$total')");
	
		if($rows=mysqli_fetch_array($query))
		{
		    $reid=$rows['repoid'];
			if($reid!="")
			{
				$flag=0;
				foreach ($arr as $s=>$w)
				{
				$proid=$w['product_id'];
				$qty=$w['qty'];
				$size=$w['size'];
				mysqli_next_result($connect);
				$querys=mysqli_query($connect,"call webservice_insertproducts('$reid','$proid','$qty','$user_id','$size')");			
				if($rows1=mysqli_fetch_array($querys))
				{
		            $res=$rows1['res'];
		            if($res==1)
		            {
		            	$flag=$flag+1;
		            }
		            	
		         }
				
				}
				mysqli_next_result($connect);
				$querys=mysqli_query($connect,"call webservice_buyupdatedeliverycharge('$reid')");
				if($flag>=1)
				{
				    echo json_encode(array('status' => 200,'response_message'=>"Success"));
				}
				else
				{
					echo json_encode(array('status' => 400,'response_message'=>"Failed"));
				}
			}
		}
		else
		{
			echo json_encode(array('status' => 400,'response_message'=>"Failed"));
		}
	
	}
	
	else
	{
		echo json_encode(array('status' => 400,'response_message'=>"Failed"));
	}

}
catch(Exception $ex)
{
		echo json_encode(array('status' => 400,'response_message'=>$ex->getMessage()));
}


?>






