<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$user_id=$_GET['user_id'];
$variable= $_GET["variable"]; 
  
 
try
{
    //$array=array();
    if($variable=='m4a0s1s')
    {
       
        $query=mysqli_query($connect,"call webservice_cartviewproducts('$user_id')");
        $arrys=array();
        $len=mysqli_num_rows($query);
        $nonaddoncount=0;
        $add_only='yes';
        
        if($len>0)
        {
        	while($rows=mysqli_fetch_array($query))
        	{
        		$path='http://www.massventureindia.com/Madmin/uploads/';
        
        		$logo=$path.$rows['image1'];
        		$logo1=$path.$rows['image2'];
        		$logo2=$path.$rows['image3'];
        		$logo3=$path.$rows['image4'];
        		
        		$row_array['product_id']=$rows['re_product_id'];
        		$row_array['name']=$rows['product_name'];
        		$row_array['image1']=$logo;
        		$row_array['image2']=$logo1;
        		$row_array['image3']=$logo2;
        		$row_array['image4']=$logo3;
        		$row_array['rate']=$rows['product_price'];
        		$row_array['discount']=$rows['product_discount'];
        		$row_array['code']=$rows['product_code'];
        		$row_array['qty']=$rows['product_qty'];
        		$row_array['cartqty']=$rows['re_qty'];
        		$row_array['delivery_charge']=$rows['delivery_charge'];
        		
        		
        		if($rows['sizename']==null)
        		{
        			$rows['sizename']="";
        		}
        		if(($rows['size_id']==null)||($rows['size_id']==0))
        		{
        			$rows['size_id']="";
        		}
        		$row_array['sizename']=$rows['sizename'];
        		$row_array['sizeid']=$rows['size_id'];
        		$row_array['description']=$rows['product_description'];
        		$commission=$rows['commission'];
        		if($commission=='0'){$addon="yes";}else{$addon="no";$nonaddoncount++;}
        		$row_array['addon']=$addon;
        		// $data=array('name'=>$rows['u_name']);	
        		array_push($arrys,$row_array);
        	}
        	if($nonaddoncount>0){$add_only="no";}else{$add_only="yes";}
        	echo json_encode(array('status' => 200,'response_message'=>"Success",'addon_only'=>$add_only,'details'=>$arrys),JSON_UNESCAPED_SLASHES);
        
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


