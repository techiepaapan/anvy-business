<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$variable=$_REQUEST['variable'];
$user_id=$_REQUEST['user_id'];


try
{
    if($variable=='m4a0s1s')
    {
    	
	     $query=mysqli_query($connect,"select count(rp.re_product_id) as count from repurchase_product rp,repurchase_cart rc
	where rc.u_id='$user_id' and rc.re_product_id=rp.re_product_id and rp.commission>0;");
	       while($rows=mysqli_fetch_array($query))
	            {
	            	 $count=$rows['count'];
	            }
	     if($count>0){
	     	echo json_encode(array('status' => 200,'response_message'=>"Success"));
	     }
	     else{
	     	echo json_encode(array('status' => 400,'response_message'=>"Add Normal Products"));
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


