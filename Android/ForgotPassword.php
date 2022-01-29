<?php

error_reporting(0);
include 'dbconnection.php';

$username=$_GET['username'];
$phone=$_GET['phone'];

$variable=$_GET['variable'];


try
{
    if($variable=='m4a0s1s')
    {
        $otp=date('si');
        $query=mysqli_query($connect,"call webservice_forgotpass('$username','$phone','$otp')");
        $len=mysqli_num_rows($query);
        if($rows=mysqli_fetch_array($query))
        {
            $res=$rows['res'];
            $msg=$rows['msg'];
            
            if($msg=="UserName")
            {
            	echo json_encode(array('status' => 400,'responseMessage'=>"Invalid Username"),JSON_UNESCAPED_SLASHES);
            }
            else if($msg=="Mobile")
            {
            	echo json_encode(array('status' => 400,'responseMessage'=>"Not a Registered Phone Number"),JSON_UNESCAPED_SLASHES);
            	 
            }
            else if($msg=="Success")
            {           
            	
            	        $number=$rows['mobile'];
            	        $id=$rows['uid'];
						$message="Hiii ";
						$message.="Your One Time Password is ".$rows['otps']."";
						$message=urlencode($message);
				$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$number&msg=$message&port=TA";
					
						file_get_contents($fullapiurl);
						echo json_encode(array('status' => 200,'responseMessage'=>"Success",'user_id'=>$id));
            }
           
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'responseMessage'=>"Failed"));
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


