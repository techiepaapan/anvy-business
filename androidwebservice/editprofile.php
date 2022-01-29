<?php

error_reporting(0);
include 'dbconnection.php';
$data_back_whole = json_decode(file_get_contents('php://input'));
$data_back=$data_back_whole->{"key_val"}; 
$variable=$data_back[0]->variable;
try
{
    if($variable=='m4a0s1s')
    {
           $father=$data_back[0]->father;
            $name=$data_back[0]->name;
            $gender=$data_back[0]->gender;
            $dob=$data_back[0]->dob;
            $email=$data_back[0]->email;
            $mobile=$data_back[0]->mobile;
            $address=$data_back[0]->address;
            $pin=$data_back[0]->pin;
            $country=$data_back[0]->country;
            $city=$data_back[0]->city;
            $state=$data_back[0]->state;
            $user_id=$data_back[0]->user_id;
            $account=$data_back[0]->account;
            $branch=$data_back[0]->branch;
            $bank=$data_back[0]->bank;
            $ifsc=$data_back[0]->ifsc;
            $pan=$data_back[0]->pan;
            $nominee=$data_back[0]->nominee;
            $relation=$data_back[0]->relation; 
            $age=$data_back[0]->age; 
        
        $query=mysqli_query($connect,"call webservice_userEditPro('$user_id','$name','$father','$gender','$dob','$email','$mobile','$address','$pin','$country','$city','$state','$account','$branch','$bank','$ifsc','$pan','$nominee','$relation','$age')");
        
        if($rows=mysqli_fetch_array($query))
        {
            $msg=$rows['msg'];
            if($msg=="Email"||$msg=="Mobile")
            {
                echo json_encode(array('status' => 400,'response_message'=>$msg." Already Exists"));
            }
            else if($msg=="Success") 
            {
                echo json_encode(array('status' => 200,'response_message'=>"Success"));
            }
        }
        else
        {
            $status=400;
            echo json_encode(array('status' =>$status,'response_message'=>"Failed"));
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



