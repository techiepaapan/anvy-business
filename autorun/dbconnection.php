<?php
//error_reporting(0);
try
{
	$connect= mysqli_connect('localhost','anvyffff_dfdg35435','[W7^,y]f#P2!','anvyffff_dsfddgdgd');//javamaze_sb  javasb  javamaze_test22
	if($connect){
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
