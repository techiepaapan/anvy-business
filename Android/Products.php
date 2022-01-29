<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$variable=$_GET['variable'];

$page=$_GET['current_page'];

$page=$page+1;

try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call webservice_getproducts('$page')");
        mysqli_next_result($connect);
        $query1=mysqli_query($connect,"select f.re_product_id,f.images from repurchase_product rp,firstcombo f where rp.re_product_id=f.re_product_id;");
        mysqli_next_result($connect);
        $query2=mysqli_query($connect,"select * from slider2 s,repurchase_product rp,category c where rp.re_product_id=s.pid and c.cat_id=rp.catid;");
        //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        $arrys=array();
        $arry=array();
        $arry1=array();
        $len=mysqli_num_rows($query);
        $len1=mysqli_num_rows($query1);
        $len2=mysqli_num_rows($query2);
        if($len>0||$len1>0||$len2>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
               // $path='http://192.168.1.52/Mass_venture/Madmin/uploads/';
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
            while($rows1=mysqli_fetch_array($query1))
            {
            	//$path='http://192.168.1.52/Mass_venture/Madmin/uploads/';
                $path='http://www.massventureindia.com/Madmin/uploads/';
            	$logo=$path.$rows1['images'];
            	$row_array1['product_id']=$rows1['re_product_id'];
            	$row_array1['image']=$logo;
            	array_push($arry,$row_array1);
            }
            while($rows1=mysqli_fetch_array($query2))
            {
            	//$path='http://192.168.1.52/Mass_venture/Madmin/uploads/';
            	$path='http://www.massventureindia.com/Madmin/uploads/';
            	$logo=$path.$rows1['image1'];
				
            	$row_array2['product_id']=$rows1['pid'];
            	$row_array2['name']=$rows1['product_name'];
            	$row_array2['rate']=$rows1['product_price'];
            	$row_array2['discount']=$rows1['product_discount'];
            	$row_array2['code']=$rows1['product_code'];
            	$row_array2['qty']=$rows1['product_qty'];
            	$row_array2['description']=$rows1['product_description'];
            	$row_array2['category']=$rows1['category_name'];
            	$row_array2['catid']=$rows1['cat_id'];
            	$row_array2['image']=$logo;
            	array_push($arry1,$row_array2);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys,'slider'=>$arry,'recommend'=>$arry1),JSON_UNESCAPED_SLASHES);
            
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


