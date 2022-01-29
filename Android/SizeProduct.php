<?php

error_reporting(0);
include 'dbconnection.php';

$variable=$_GET['variable'];
$id=$_GET['product_id'];

try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call webservice_getproductssize('$id')");
        
        //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        $arrys=array();
        $len=mysqli_num_rows($query);
        if($len>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
                $path='http://www.massventureindia.com/Madmin/uploads/';
                $logo1=$path.$rows['image1'];
                $logo2=$path.$rows['image2'];
                $logo3=$path.$rows['image3'];
                $logo4=$path.$rows['image4'];
                
                $row_array['image1']=$logo1;
                $row_array['image2']=$logo2;
                $row_array['image3']=$logo3;
                $row_array['image4']=$logo4;
                
                // $data=array('name'=>$rows['u_name']);
                array_push($arrys,$row_array);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
        }
        
        else
        {
            echo json_encode(array('status' => 400,'response_message'=>"Product Not Exists"));
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


