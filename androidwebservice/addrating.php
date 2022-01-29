<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';


$data_back_whole = json_decode(file_get_contents('php://input'));
$data_back=$data_back_whole->{"data"}; 
$variable=$data_back[0]->variable;
try
{
    //$array=array();
    if($variable=='m4a0s1s')
    {
           $user_id=$data_back[0]->user_id;
           $pid=$data_back[0]->pid;
            $rating=$data_back[0]->rating;
            $heading=$data_back[0]->heading;
            $review=$data_back[0]->review;

            $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
            $date=$dat->format('Y-m-d');
            $time=$dat->format('H:i:s');
            
        $query=mysqli_query($connect,"call webservice_addrating('$user_id','$pid','$rating','$heading','$review','$date','$time')");
        
        if($rows=mysqli_fetch_array($query))
        {
            $msg=$rows['res'];
            if($msg==1)
            {
            	echo json_encode(array('status' => 200,'response_message'=>"Review Submitted"));
                
            }
            else
            {
            	echo json_encode(array('status' => 400,'response_message'=>"Failed To Submit Review"));
            }
        }
        else
        {
            echo json_encode(array('status' =>400,'response_message'=>"Failed"));
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



