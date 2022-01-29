<?php

error_reporting(0);
include 'dbconnection.php';

$user_id=$_GET['user_id'];

$variable=$_GET['variable'];


try
{
    if($variable=='m4a0s1s')
    {
        
        $query=mysqli_query($connect,"call webservice_dashboard('$user_id')");
        
        
        $len=mysqli_num_rows($query);
        if($len>0)
        {
        	
            while($rows=mysqli_fetch_array($query))
            {
                $tot1=$rows['tot'];
                $income=$rows['income'];
                $bonus=$rows['bonus'];
                $bal=$rows['bal'];
               /* $id=$rows['uid'];
                array_push($l1,$id);
                $row_array['name']=$rows['uname'];
                $row_array['mobile']=$rows['mobile'];
                $row_array['user_id']=$rows['uid'];*/
                
            }
            echo json_encode(array('status' => 200,'responseMessage'=>"Success",'income'=>$income,'bonus'=>$bonus,'wallet'=>$bal,'level1'=>$tot1,'level2'=>0,'level3'=>0,'level4'=>0,'level5'=>0,'level6'=>0,'level7'=>0,'level8'=>0,'level9'=>0,'level10'=>0),JSON_UNESCAPED_SLASHES);
            
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


