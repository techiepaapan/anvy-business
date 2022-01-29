<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';
$variable=$_GET['variable'];
$arrys=array();

try
{
    if($variable=='m4a0s1s')
    {
        $query=mysqli_query($connect,"select * from custom_alert where flag='1' order by id desc limit 1");
        
        if($rows=mysqli_fetch_array($query))
        {
		$row_array['id']=$rows['id'];
        	$row_array['title']=$rows['title'];
        	$row_array['description']=$rows['description'];
        	$row_array['link']=$rows['link'];
        	$row_array['pid']=$rows['pid'];
			$row_array['customalerttype']=$rows['customalerttype'];
        	
        	if($rows['image']!=''){
        		$row_array['image']=$rows['image'];
        	}
        	else{
        		$row_array['image']="";
        	}
        	array_push($arrys,$row_array);

            echo json_encode(array('status' => 200,'response_message'=>"Success","details"=>$arrys));

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

