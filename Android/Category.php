<?php

error_reporting(0);
include 'dbconnection.php';

$variable= $_GET["variable"]; 
  
 
try
{
    //$array=array();
    if($variable=='m4a0s1s')
    {
       
        $query=mysqli_query($connect,"select * from category where cat_stat=1;");
        $arrys=array();
        $len=mysqli_num_rows($query);
        if($len>0)
        {
            while($rows=mysqli_fetch_array($query))
            {
                
                $row_array['category']=$rows['category_name'];
                $row_array['catid']=$rows['cat_id'];
                array_push($arrys,$row_array);
            }
            echo json_encode(array('status' => 200,'response_message'=>"Success",'details'=>$arrys),JSON_UNESCAPED_SLASHES);
            
        }
        
        else 
        {
            echo json_encode(array('status' => 400,'response_message'=>"No Category Exists"));
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


