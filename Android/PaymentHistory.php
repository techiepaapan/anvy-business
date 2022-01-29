<?php

error_reporting(0);
include 'dbconnection.php';

$variable=$_GET['variable'];

$id=$_GET['user_id'];
$from=$_GET['from'];
$to=$_GET['to'];

try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call webservice_paymenthistory('$id','$from','$to')");
        mysqli_next_result($connect);
        $query1=mysqli_query($connect,"call webservice_payouthistory('$id','$from','$to')");
       
        $arrys=array();
        $len=mysqli_num_rows($query);
        $len1=mysqli_num_rows($query1);
        if($len>0||$len1>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
               
                $row_array['date']=$rows['payin_date'];
                $row_array['type']='Credit';
                $row_array['amount']=$rows['pay_amount'];
                $row_array['service_charge']=0;
                array_push($arrys,$row_array);
            } 
            while($rows1=mysqli_fetch_array($query1))
            {
            	$row_array['date']=$rows1['payout_date'];     
            	$row_array['type']='Debit';
            	$row_array['amount']=$rows1['amount'];
            	$row_array['service_charge']=$rows1['service_charge'];
            	array_push($arrys,$row_array);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'response_message'=>"No Payments in this Duration"));
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


