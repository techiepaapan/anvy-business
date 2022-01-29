<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$variable=$_REQUEST['variable'];

try
{
    if($variable=='m4a0s1s')
    {

        $query2=mysqli_query($connect,"select *,(SELECT avg(pr.rating) FROM product_rating pr where pr.pid=rp.re_product_id and pr.flag=1) as rating
        		from slider2 s,repurchase_product rp,category c where rp.re_product_id=s.pid and c.cat_id=rp.catid;");
        $arry1=array();

        $len=mysqli_num_rows($query2);
        if($len>0)
        {

            while($rows1=mysqli_fetch_array($query2))
            {
            	$row_array2['product_id']=$rows1['pid'];
            	$row_array2['name']=$rows1['product_name'];
            	$row_array2['rate']=$rows1['product_price'];
            	$row_array2['discount']=$rows1['product_discount'];
            	if($rows1['rating']==null || $rows1['rating']==''){$rating=0;}
            	else{$rating=sprintf('%0.1f',$rows1['rating']);}
            	$row_array2['rating']=$rating;
            	$row_array2['image']=$rows1['image1'];
            	array_push($arry1,$row_array2);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'recommend'=>$arry1),JSON_UNESCAPED_SLASHES);
            
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'response_message'=>"No Recommended Product"));
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


