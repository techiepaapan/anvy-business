<?php

error_reporting(0);
include 'dbconnection.php';

$user_id=$_GET['user_id'];
$proid=$_GET['product_id'];
$variable= $_GET["variable"]; 
  
 
try
{
    //$array=array();
    if($variable=='m4a0s1s')
    {
       
        $query=mysqli_query($connect,"call webservice_removecartproducts('$user_id','$proid')");
        if($rows=mysqli_fetch_array($query))
        {
        	$res=$rows['res'];
        	
        	if($res==1)
        	{
        		echo json_encode(array('status' => 200,'response_message'=>"Success"),JSON_UNESCAPED_SLASHES);
        	}
        	else if($res==0)
        	{
        		echo json_encode(array('status' => 400,'response_message'=>"Product Doesn't Exists In the Cart"),JSON_UNESCAPED_SLASHES);
        	}
        	else 
        	{
        		
        		echo json_encode(array('status' => 400,'response_message'=>"Failed"),JSON_UNESCAPED_SLASHES);
        	}
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


