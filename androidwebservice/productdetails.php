<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$variable=$_REQUEST['variable'];
$id=$_REQUEST['product_id'];

try
{
    if($variable=='m4a0s1s')
    {
    	$productId=$id;
    	$rquery1 = mysqli_query($connect,"SELECT count(id) as cnt,sum(rating) as srate FROM product_rating where pid='$productId' and  flag=1");
    	mysqli_next_result($connect);
    	$flgx=1;
    	$wrating=0;$wreview=0;$srate=0;
    	
    	
    	while ($row=mysqli_fetch_array($rquery1))
    	{
    		$wreview=$row['cnt'];
    		$srate=$row['srate'];
    	
    		if($wreview==0 || $srate==null|| $srate==''){$wrating=0;$srate=0;}
    		else{$wrating=($srate/(5*$wreview))*100;}
    	}
    	
    	$avgrating=sprintf('%0.1f',($wrating*5/100));
    	$wrating=sprintf('%0.2f',$wrating);

    	$ratings=array('rating' => $avgrating,"ratingperc"=>$wrating,"total"=>$wreview);
    	
    	
        $query=mysqli_query($connect,"call webservice_getproductsdetails('$id')");
        mysqli_next_result($connect);
        $query1=mysqli_query($connect,"select * from repurchase_size where re_product_id='$id'");

        $arrys=array();
        $arry=array();
        $len=mysqli_num_rows($query);
        $len1=mysqli_num_rows($query1);
        
        
        while($rows1=mysqli_fetch_array($query1))
        {
        	$row_array1['name']=$rows1['size'];
        	$row_array1['sizeid']=$rows1['size_id'];
        	array_push($arry,$row_array1);
        }
        
        
        if($len>0||$len1>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
                $row_array['product_id']=$rows['re_product_id'];
                $row_array['name']=$rows['product_name'];
                $row_array['description']=$rows['product_description'];
                $row_array['rate']=$rows['product_price'];
                $row_array['discount']=$rows['product_discount'];
                $row_array['code']=$rows['product_code'];
                $row_array['qty']=$rows['product_qty'];
                $row_array['category']=$rows['category_name'];
                $row_array['catid']=$rows['cat_id'];
                $row_array['delivery_charge']=$rows['delivery_charge'];
                $commission=$rows['commission'];
                if($commission=='0'){$addon="yes";}else{$addon="no";}
                $row_array['addon']=$addon;
                $row_array['commission']=$commission;
                $row_array['image1']=$rows['image1'];
                $row_array['image2']=$rows['image2'];
                $row_array['image3']=$rows['image3'];
                $row_array['image4']=$rows['image4'];
                $row_array['size']=$arry;
                $row_array['ratings']=$ratings;
                
                
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


