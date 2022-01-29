<?php
error_reporting(0);
include 'dbconnection.php';

$id=$_GET['id'];
$variable=$_GET['variable'];

try
{
    if($variable=='m4a0s1s')
    {
        $arrys=array();
        $query=mysqli_query($connect,"call webservice_profile('$id')");
        
        if($rows=mysqli_fetch_array($query))
        {
        	$res=$rows['res'];
            if($res==1)
            {
            	$row_array['user_id']=$rows['u_id'];
            	$row_array['name']=$rows['u_name'];
            	$row_array['father']=$rows['u_father'];
            	$row_array['gender']=$rows['u_gender'];
            	$row_array['dob']=$rows['u_dob'];
            	$row_array['address']=$rows['u_address'];
            	$row_array['mobile']=$rows['u_mobile'];
            	$row_array['pin']=$rows['u_pincode'];
            	$row_array['email']=$rows['u_email'];
            	$row_array['user_name']=$rows['username'];
            	$row_array['country']=$rows['u_country'];
            	$row_array['state']=$rows['u_state'];
            	$row_array['city']=$rows['u_city'];
            	$row_array['pan']=$rows['u_pancard'];
            	$row_array['ifsc']=$rows['u_ifsc'];
            	$row_array['bank']=$rows['u_bankname'];
            	$row_array['branch']=$rows['u_branch'];
            	$row_array['account']=$rows['u_accountno'];
            	$row_array['nominee']=$rows['u_nominee_name'];
            	$row_array['relation']=$rows['u_nom_relation'];
            	$row_array['age']=$rows['u_nominee_age'];
            	$row_array['referral_id']=$rows['refname'];
            	array_push($arrys,$row_array);
            	echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            	
            }
            else{
            	echo json_encode(array('status' =>400,'response_message'=>"User not available"));
            }
        }
        else
        {
            echo json_encode(array('status' =>400,'response_message'=>"Failed"));
        }
    }
    
    else
    {
        
        echo json_encode(array('status' => 400,'responseMessage'=>"Failed"));
    }
}
catch(Exception $ex)
{
    echo json_encode(array('status' => 400,'responseMessage'=>$ex->getMessage()));
}

?>

