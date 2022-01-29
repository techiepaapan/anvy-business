<?php

error_reporting(0);
include 'dbconnection.php';

$device_id=$_GET['device_id'];
$variable=$_GET['variable'];

try
{
    if($variable=='m4a0s1s')
    {
        $query=mysqli_query($connect,"DELETE FROM token WHERE device_id='$device_id'");
        echo json_encode(array('status' => 200,'response_message'=>"Success"));
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

