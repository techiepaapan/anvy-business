<?php
//error_reporting(0);
try
{
	

	$connect= mysqli_connect('localhost','anvybusi_mass_venture123','x9w@221@a','anvybusi_mass_venture');
        //$connect= mysqli_connect('localhost','root','','mass_venture');//javamaze_sb  javasb  javamaze_test22
	if($connect){
		
		//echo "hi";
		
	}
	else {
	
		connectionError();
	}
	
}
catch(Exception $e)
{
	
	echo json_encode(array('status' => 400,'responseMessage'=>$e->getMessage()));
}


function connectionError()
{	
	echo json_encode(array('status' => 400,'responseMessage'=>'Unable To Connect'));
	die();
	//exit;
}

?>
