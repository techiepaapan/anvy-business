<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';


$variable=$_REQUEST['variable'];
$user_id=$_REQUEST['user_id'];
$page=$_REQUEST['current_page'];

if($page==null ||$page==''){
	$page=0;
}
try
{
	if($variable=='m4a0s1s')
	{
		$mtreearry=array();
		$balance=0;
		$netmtreeincome=0;
		$total=0;
		$rquery = mysqli_query($connect,"select balance,netmtreeincome from user_wallet where u_id='$user_id'");
		while ($row=mysqli_fetch_array($rquery))
		{
			$balance=$row['balance'];
			$netmtreeincome=$row['netmtreeincome'];
		}
		$balance=sprintf("%0.2f", $balance);
		$netmtreeincome=sprintf("%0.2f", $netmtreeincome);
		$rquery1 = mysqli_query($connect,"call webservice_getmtreeuser('$user_id','$page')");
			while ($row=mysqli_fetch_array($rquery1))
			{
				$total=$row['total'];
				$row_array1['level']=$row['user_level'];
				$date=$row['date'];
				$date=trim(implode('-', array_reverse(explode('-', $date))));
				$row_array1['date']=$date;
				$row_array1['level1user']=$row['l1u'];
				$row_array1['level2user']=$row['l2u'];
				$row_array1['level1money']=$row['l1m'];
				$row_array1['level2money']=$row['l2m'];
				if($row['flag']==1){
					$status="Completed";
				}
				else if($row['flag']==2){
					$status="Pending";
				}
				else{
					$status="Running";
				}
				$row_array1['flag']=$row['flag'];
				$row_array1['status']=$status;
				array_push($mtreearry,$row_array1);
			}
			echo json_encode(array('status' => 200,'response_message'=>"Success",'total_count'=>$total,
							'balance'=>$balance,'netmtreeincome'=>$netmtreeincome,
							'details'=>$mtreearry),JSON_UNESCAPED_SLASHES);

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