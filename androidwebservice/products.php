<?php
header('Content-Type: application/json');
error_reporting(0);

include 'dbconnection.php';

$variable=$_REQUEST['variable'];

$page=$_REQUEST['current_page'];

$page=$page+1;

try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call webservice_getproducts('$page')");
        mysqli_next_result($connect);
        $arrys=array();
        $len=mysqli_num_rows($query);
        if($len>0)
        {
        	$total=0;
            while($rows=mysqli_fetch_array($query))
            {
            	$allrow=array();
            	$total=$rows['total'];
                $row_array['product_id']=$rows['re_product_id'];
                $row_array['name']=$rows['product_name'];
                $row_array['rate']=$rows['product_price'];
                $row_array['discount']=$rows['product_discount'];
                $row_array['qty']=$rows['product_qty'];
                $row_array['image']=$rows['image1'];
                if($rows['rating']==null || $rows['rating']==''){$rating=0;}
                else{$rating=sprintf('%0.1f',$rows['rating']);}
                $row_array['rating']=$rating;
                $commission=$rows['commission'];
                if($commission=='0'){$addon="yes";}else{$addon="no";}
                $row_array['addon']=$addon;
       
                array_push($arrys,$row_array);
            }
            
            
            echo json_encode(array('status' => 200,'response_message'=>"Success","totalproductcount"=>$total,'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'response_message'=>"No Product Exists"));
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


