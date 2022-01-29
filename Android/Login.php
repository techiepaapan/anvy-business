<?php

error_reporting(0);
include 'dbconnection.php';

$username=$_GET['username'];
$password=$_GET['password'];
$variable=$_GET['variable'];

/*  $username='abc';
 $password='123456';
 $variable='t0o0a7';  */

try
{
    //$array=array();
    if($variable=='m4a0s1s')
    {
        $arrys=array();
        $query=mysqli_query($connect,"call webservice_userLogin('$username','$password')");
        
        //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        if($rows=mysqli_fetch_array($query))
        {
        	$flg=$rows['flag'];
               $repoid=$rows['repoid'];
            if($flg==0)
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
            	$row_array['referral_id']=$rows['refname'];
            	$row_array['flag']=$rows['flag'];
                $row_array['user_name']=$rows['username'];
                if($repoid!=null)
            	{
            		$row_array['dname']=$rows['name'];
            		$row_array['dstate']=$rows['state'];
            		$row_array['dcity']=$rows['city'];
            		$row_array['dcountry']=$rows['country'];
            		$row_array['daddress']=$rows['address'];
            		$row_array['dpin']=$rows['pincode'];
            		$row_array['dmobile']=$rows['mobile'];
            	}
                else
                {
                        $row_array['dname']='';
            		$row_array['dstate']='';
            		$row_array['dcity']='';
            		$row_array['dcountry']='';
            		$row_array['daddress']='';
            		$row_array['dpin']='';
            		$row_array['dmobile']='';
                }

            }
            else 
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
            	$row_array['flag']=$rows['flag'];
            	if($repoid!=null)
            	{
            		$row_array['dname']=$rows['name'];
            		$row_array['dstate']=$rows['state'];
            		$row_array['dcity']=$rows['city'];
            		$row_array['dcountry']=$rows['country'];
            		$row_array['daddress']=$rows['address'];
            		$row_array['dpin']=$rows['pincode'];
            		$row_array['dmobile']=$rows['mobile'];
            	}
                else
                {
                        $row_array['dname']='';
            		$row_array['dstate']='';
            		$row_array['dcity']='';
            		$row_array['dcountry']='';
            		$row_array['daddress']='';
            		$row_array['dpin']='';
            		$row_array['dmobile']='';
                }
            }
            array_push($arrys,$row_array);
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
        }
        else
        {
            $status=400;
            echo json_encode(array('status' =>$status,'response_message'=>"Invalid Username or Password"));
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

