<?php

error_reporting(0);
include 'dbconnection.php';
   
/*$username=$_GET['username'];
$password=$_GET['password'];
$variable=$_GET['variable'];
$pin=$_GET['pin'];
$mobile=$_GET['mobile'];
$address=$_GET['address '];

$email=$_GET['email'];
$referral_id=$_GET['referral_id']; 
$name=$_GET['name'];
$father=$_GET['father'];
$gender=$_GET['gender'];
$dob=$_GET['dob']; */



$data_back_whole = json_decode(file_get_contents('php://input'));



$data_back=$data_back_whole->{"key_val"};
$variable=$data_back[0]->variable;

try
{
    //$array=array();
    if($variable=='m4a0s1s')
    {
       
            $mobile=$data_back[0]->mobile;
            $address=$data_back[0]->address;
            $pin=$data_back[0]->pin;
            $email=$data_back[0]->email;
            $password=$data_back[0]->password;
            $username=$data_back[0]->username;
            $father=$data_back[0]->father;
            $name=$data_back[0]->name;
            $gender=$data_back[0]->gender;
            $dob=$data_back[0]->dob;
            $referral_id=$data_back[0]->referral_id; 
        $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
        $date=$dat->format('Y-m-d');
        $time=$dat->format('H:i:s');  

if (strpos($username, '#') == true) {
$username= str_replace("#",'',$username);
}

if (strpos($password, '#') == true) {
$password = str_replace("#",'',$password);
}

		
$username=preg_replace( "/\r|\n/", "", $username );
if(preg_match('/\s/',$username)>0){
    echo json_encode(array('status' => 400,'response_message'=>"Username contains spaces"));
}
else if (strncmp(strtolower($username), "mvb", 3) === 0){
    echo json_encode(array('status' => 400,'response_message'=>"Username cannot start with MVB"));
}
else{
            // echo $mobile." ".$address." ".$username." ".$password." ".$referral_id." ".$pin." ".$email;
        $query=mysqli_query($connect,"call webservice_userReg('$username','$password','$referral_id','$name','$father','$gender','$dob','$email','$mobile','$address','$pin','$date','$time')");
        
        if($rows=mysqli_fetch_array($query))
        {
            
         
            $msg=$rows['msg'];
          
            if($msg=="Email"||$msg=="Mobile"||$msg=="Username")
            {
                echo json_encode(array('status' => 400,'response_message'=>$msg." Already Exists"));
            }
            
            else if($msg=="Referal")
            {
                echo json_encode(array('status' => 400,'response_message'=>"Invalid Referal Id"));
            }
            else 
            {


$mobileNo=$mobile;
            	$uname=$username;
            	$pwd=$password;
            	$msg="Thank%20you%20for%20joining%20Mass%20Venture%20family.%20Your%20User%20Name:".$uname."%20%20Password:".$pwd."%20%20%20Please%20keep%20it%20for%20further%20references.";
            	$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mobileNo&msg=$msg&port=TA";
            	file_get_contents($fullapiurl);
                echo json_encode(array('status' => 200,'response_message'=>"Success"));
            }
            
            
        }
        
        
        else
        {
            
            $status=400;
            echo json_encode(array('status' =>$status,'response_message'=>"Failed"));
        }
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


