<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$variable=$_REQUEST['variable'];

$page=$_REQUEST['current_page'];

$id=$_REQUEST['id'];

try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call webservice_orderproducts_new('$id','$page')");
        
        //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        $arrys=array();
        $len=mysqli_num_rows($query);
        if($len>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
            	
            	$row_array['total']=$rows['total'];
            	$row_array['image']=$rows['image1'];
                $row_array['product_id']=$rows['re_product_id'];
                $row_array['qty']=$rows['re_qty'];
                $row_array['price']=$rows['re_unitprice'];
                $row_array['status']=$rows['order_status'];
                $row_array['product']=$rows['product_name'];
                $row_array['code']=$rows['product_code'];
                $row_array['date']=$rows['order_date'];
                $row_array['time']=$rows['order_time'];
                
                $row_array['name']=$rows['name'];
                $row_array['address']=$rows['address'];
                $row_array['city']=$rows['city'];
                $row_array['state']=$rows['state'];
                $row_array['country']=$rows['country'];
                $row_array['pin']=$rows['pincode'];
                $row_array['mobile']=$rows['mobile'];
                $row_array['sizename']=$rows['re_size'];
                $row_array['sizeid']=$rows['sizeid'];
                $row_array['order']=$rows['repurchase_order_id'];
                $row_array['delivery_charge']=$rows['delivery_charge'];
                array_push($arrys,$row_array);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'response_message'=>"Failed"));
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


