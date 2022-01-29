<?php

error_reporting(0);
include 'dbconnection.php';

$device_id=$_GET['device_id'];
$token=$_GET['token'];
$variable=$_GET['variable'];

$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$date=$dat->format('Y-m-d');
$time=$dat->format('H:i:s');

try
{
    if($variable=='m4a0s1s')
    {
        $query=mysqli_query($connect,"call webservice_token('$device_id','$token','$date','$time')");
        
        if($rows=mysqli_fetch_array($query))
        {
        	$res=$rows['res'];
            if($res==1)
            {
            	echo json_encode(array('status' => 200,'response_message'=>"Success"));
            }
            else 
            {
            	echo json_encode(array('status' => 200,'response_message'=>"Success"));
            }
        }
        else
        {
            echo json_encode(array('status' =>400,'response_message'=>"Failed"));
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

