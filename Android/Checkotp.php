<?php

error_reporting(0);
include 'dbconnection.php';

$otp=$_GET['otp'];
$pass=$_GET['password'];
$userid=$_GET['user_id'];
$variable=$_GET['variable'];


try
{
    if($variable=='m4a0s1s')
    {
        $query=mysqli_query($connect,"call webservice_checkotp('$otp','$pass','$userid')");
        
        if($rows=mysqli_fetch_array($query))
        {
            
            $msg=$rows['msg'];
            
            if($msg==1)
            {
            	echo json_encode(array('status' => 200,'responseMessage'=>"Success"),JSON_UNESCAPED_SLASHES);
            }
            else 
            {
            	echo json_encode(array('status' => 400,'responseMessage'=>"Invalid Otp Try Again"),JSON_UNESCAPED_SLASHES);
            	 
            }
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'responseMessage'=>"Failed"));
        }
    }
    
    else
    {
        
        echo json_encode(array('status' => 400,'responseMessage'=>"Failed"));
    }
}
catch(Exception $ex)
{
    echo json_encode(array('status' => 400,'responseMessage'=>$ex->getMessage()));
}

?>


