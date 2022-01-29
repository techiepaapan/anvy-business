<?php
//error_reporting(0);
try
{
	

	$connect= mysqli_connect('localhost','anvybusi_mass_venture123','x9w@221@a','anvybusi_mass_venture');//javamaze_sb  javasb  javamaze_test22
	if($connect){
		
		//echo "hi";
		
	}
	else {
	
	    echo json_encode(array('status' => 400,'responseMessage'=>'Unable To Connect'));
	    die();
	}
	
}
catch(Exception $e)
{
	
	echo json_encode(array('status' => 400,'responseMessage'=>$e->getMessage()));
}


?>
