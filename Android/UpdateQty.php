
<?php

error_reporting(0);
include 'dbconnection.php';

$data_back=json_decode(file_get_contents('php://input'));
$data_back=$data_back->{'key_val'};

for($i=0;$i<count($data_back);$i++)
{
$object=$data_back[$i];
$variable=$object->variable;

$user_id=$object->user_id;

$detail=$object->product_array;
}


try
{

	if($variable=="m4a0s1s")
	{
		$jsondata =$detail;
		$arr = json_decode($jsondata, true);
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$flag=0;
			foreach ($arr as $s=>$w)
			{
				$proid=$w['product_id'];
				$qty=$w['qty'];
						
				mysqli_next_result($connect);
				$querys=mysqli_query($connect,"call webservice_updateqty('$user_id','$proid','$qty','$date','$time')");
				//$querys="insert into reorder_product(order_id,re_product_id,re_unitprice,re_qty)values('$id','','')";
				//$res=$connect->query($querys);
				$flag=1;
				
			}
			if($flag==1)
			{
			    echo json_encode(array('status' => 200,'response_message'=>"Success"));
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
	//$qry2=mysqli_query($connect, "select ID from deliverynote ORDER BY ID DESC");
	
}
catch(Exception $ex)
{
		echo json_encode(array('status' => 400,'response_message'=>$ex->getMessage()));
}


?>






