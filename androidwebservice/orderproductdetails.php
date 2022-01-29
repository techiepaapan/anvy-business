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
        $query=mysqli_query($connect,"call webservice_orderproducts_newid('$id','$page')");
        
        //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        $arrys=array();
        $len=mysqli_num_rows($query);
        $totalorder=0;
        if($len>0)
        {
        	while($rows=mysqli_fetch_array($query))
        	{
        		$totalorder=$rows['total'];
        		$row_array['order']=$rows['repurchase_order_id'];
        		$repurchase_order_id=$rows['repurchase_order_id'];
        		$row_array['date']=$rows['order_date'];
        		$row_array['time']=$rows['order_time'];
        		$row_array['status']=$rows['order_status'];
        		$row_array['totalitems']=$rows['totalitems'];
        		
        		$row_array2=array();
        		$row_array2['name']=$rows['name'];
        		$row_array2['address']=$rows['address'];
        		$row_array2['city']=$rows['city'];
        		$row_array2['state']=$rows['state'];
        		$row_array2['country']=$rows['country'];
        		$row_array2['pin']=$rows['pincode'];
        		$row_array2['mobile']=$rows['mobile'];
        		
        		$shippingaddress=array();
        		$arrys1=array();
        		mysqli_next_result($connect);
	        	$query1=mysqli_query($connect,"select *,
				(select rs.size_id from repurchase_size rs where rep.re_size=rs.size_id and rs.re_product_id=rep.re_product_id limit 1) as sizeid 
				from repurchase_order ro,repurchase_product rp,order_comm_detail oc,reorder_product rep 
				where ro.repurchase_order_id='$repurchase_order_id' and rp.re_product_id=rep.re_product_id and oc.po_id=ro.repurchase_order_id and ro.repurchase_order_id=rep.order_id  and oc.type='2' order by  ro.repurchase_order_id desc;");
	        	
	            while($rows1=mysqli_fetch_array($query1))
	            {
	                $row_array1['product_id']=$rows1['re_product_id'];
	                $row_array1['product']=$rows1['product_name'];
	                $row_array1['code']=$rows1['product_code'];
	                $row_array1['qty']=$rows1['re_qty'];
	                $row_array1['price']=$rows1['re_unitprice'];
	                $row_array1['sizename']=$rows1['re_size'];
	                $row_array1['sizeid']=$rows1['sizeid'];
	                $row_array1['delivery_charge']=$rows1['delivery_charge'];
					$commission=$rows1['commission'];
	                if($commission=='0'){$addon="yes";}else{$addon="no";}
	                $row_array1['addon']=$addon;
	                $row_array1['image']=$rows1['image1'];
	                array_push($arrys1,$row_array1);
	            }
	            $row_array['items']=$arrys1;
	            array_push($shippingaddress,$row_array2);
	            $row_array['shippingaddress']=$shippingaddress;
	            array_push($arrys,$row_array);
           
        	}
        	echo json_encode(array('status' => 200,'response_message'=>"Success","totalorder"=>$totalorder,'details'=>$arrys),JSON_UNESCAPED_SLASHES);
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


