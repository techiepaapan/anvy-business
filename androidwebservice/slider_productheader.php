<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$variable=$_REQUEST['variable'];

try
{
    if($variable=='m4a0s1s')
    {

        $query1=mysqli_query($connect,"select f.re_product_id,f.images from repurchase_product rp,firstcombo f where rp.re_product_id=f.re_product_id;");
        mysqli_next_result($connect);
        $arry=array();
        $len=mysqli_num_rows($query1);
        if($len>0)
        {
            while($rows1=mysqli_fetch_array($query1))
            {
            	$row_array1['product_id']=$rows1['re_product_id'];
            	$row_array1['image']=$rows1['images'];
            	array_push($arry,$row_array1);
            }

            echo json_encode(array('status' => 200,'response_message'=>"Success",'slider'=>$arry),JSON_UNESCAPED_SLASHES);
            
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'response_message'=>"No Slider"));
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


