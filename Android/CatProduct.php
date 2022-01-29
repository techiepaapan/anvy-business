<?php

error_reporting(0);
include 'dbconnection.php';

$variable=$_GET['variable'];
$page=$_GET['current_page'];
$catid=$_GET['catid'];
$page=$page+1;

try
{
    if($variable=='m4a0s1s')
    {
        $query=mysqli_query($connect,"call webservice_getcatproducts('$page','$catid')");
        
        //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        $arrys=array();
        $len=mysqli_num_rows($query);
        if($len>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
                $path='http://www.massventureindia.com/Madmin/uploads/';
                
                $logo=$path.$rows['image1'];
                $row_array['product_id']=$rows['re_product_id'];
                $row_array['name']=$rows['product_name'];
                $row_array['image']=$logo;
                $row_array['rate']=$rows['product_price'];
                $row_array['discount']=$rows['product_discount'];
                $row_array['code']=$rows['product_code'];
                $row_array['qty']=$rows['product_qty'];
                $row_array['description']=$rows['product_description'];
                $row_array['category']=$rows['category_name'];
                $row_array['catid']=$rows['cat_id'];
               // $data=array('name'=>$rows['u_name']);
                array_push($arrys,$row_array);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
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


