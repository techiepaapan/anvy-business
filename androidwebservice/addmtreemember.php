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
        $query=mysqli_query($connect,"call webservice_checkmtreestatus('$user_id')");
        mysqli_next_result($connect);
        $arrys=array();
        if(mysqli_num_rows($query)>0){
            if (mysqli_num_rows($query)>1) {
                echo json_encode(array('status' => 400,'response_message'=>"User Error"));
            }
            else{
                while($rows=mysqli_fetch_array($query))
                {
                    $balance=$rows['balance'];
                    $ordertotal=$rows['ordertotal'];
                    $mtree=$rows['mtree'];
                    if($ordertotal==null || $ordertotal==''){$ordertotal=0;}
                    if($balance==null || $balance==''){$balance=0;}
                    $balance=sprintf("%0.2f", $balance);
                    $ordertotal=sprintf("%0.2f", $ordertotal);
                    if($mtree==1){
                        $status=400;
                        $msg="Already a member";
                    }
                    else if($balance>=140 && $ordertotal>=700){
                        $status=400;
                        $msg="Error!!! Could not add member";
                        $query1=mysqli_query($connect,"call webservice_addmtreemember('$user_id')");
                        mysqli_next_result($connect);
                        if (mysqli_num_rows($query)>0){
                                while ($rows1=mysqli_fetch_array($query1)) {
                                $res=$rows1['res'];
                                if($res==1){
                                    $status=200;
                                $msg="Success";
                                }
                            }
                         }

                       

                    }
                    else{
                        $status=400;
                        $msg="Not Eligible";
                    }
                    
                    echo json_encode(array('status' => $status,'response_message'=>$msg));
                    
                }
            }

        
        }
        else{
            echo json_encode(array('status' => 400,'response_message'=>"User Unavailable"));
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


