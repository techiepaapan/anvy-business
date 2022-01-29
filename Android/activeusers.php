<?php

error_reporting(0);
include 'dbconnection.php';

$variable=$_GET['variable'];

$id=$_GET['user_id'];

$tp=1;

try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call sp_viewusers_m('$id','$tp')");
        mysqli_next_result($connect); //$query=mysql_query("select * from soft_user where soft_user_username='$username' and soft_user_password='$password'");
        $arrys=array();
        $len=mysqli_num_rows($query);
        if($len>0||$len1>0||$len2>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
                $row_array['name']=$rows['u_name'];
                $row_array['username']=$rows['username'];
                $row_array['phone']=$rows['u_mobile'];
                array_push($arrys,$row_array);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'response_message'=>"No Users Available"));
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


