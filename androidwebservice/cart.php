<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';


 $data_back_whole = json_decode(file_get_contents('php://input'));
$data_back=$data_back_whole->{"key_val"};
$variable=$data_back[0]->variable;  
 
try
{
    if($variable=='m4a0s1s')
    {
         $product_id=$data_back[0]->product_id;
        $user_id=$data_back[0]->user_id;
        $size_id=$data_back[0]->size;
        $qty=$data_back[0]->qty;   
        $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
        $date=$dat->format('Y-m-d');
        $time=$dat->format('H:i:s'); 
        $query=mysqli_query($connect,"call webservice_cartproducts('$product_id','$qty','$user_id','$date','$time','$size_id')");
        
        if($query==TRUE)
        {
            echo json_encode(array('status' => 200,'response_message'=>"Success"));  
        }
        else
        {
            $status=400;
            echo json_encode(array('status' =>$status,'response_message'=>"Failed"));
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


