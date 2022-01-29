<?php
header('Content-Type: application/json');
error_reporting(0);
include 'dbconnection.php';

$variable= $_REQUEST["variable"]; 
$user_id= $_REQUEST["user_id"];
try
{
    if($variable=='m4a0s1s')
    {
        $query=mysqli_query($connect,"select count(repurchase_cart_id) as totalcartnumber from repurchase_cart where u_id='$user_id';");
        $arrys=array();
        $totalcartnumber=0;
       while($rows=mysqli_fetch_array($query))
            {
            	$totalcartnumber=$rows['totalcartnumber'];
            }
        echo json_encode(array('status' => 200,'response_message'=>"Success",'totalcartnumber'=>$totalcartnumber),JSON_UNESCAPED_SLASHES);
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


