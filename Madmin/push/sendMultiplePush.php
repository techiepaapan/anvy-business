<?php 
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php'; 
 
$db = new DbOperation();
 
$response = array(); 
 

 //hecking the required params 
 if(isset($_REQUEST['title']) && isset($_REQUEST['message']) && isset($_REQUEST['id'])) {
 //creating a new push
 $push = null;
 //first check if the push has an image with it
 if(isset($_REQUEST['image'])){
 $push = new Push(
 $_REQUEST['title'],
 $_REQUEST['message'],
 $_REQUEST['id'],
 $_REQUEST['image']
 );
 }else{
 //if the push don't have an image give null in place of image
 $push = new Push(
 $_REQUEST['title'],
 $_REQUEST['message'],
 $_REQUEST['id'],
 null
 );
 }
 
 //getting the push from push object
 $mPushNotification = $push->getPush();
 //getting the token from database object 
  $devicetoken= $db->getAllTokens();
 
 //creating firebase class object 
 $firebase = new Firebase(); 
 //sending push notification and displaying result 
 //echo $firebase->send($devicetoken, $mPushNotification);
	  $cnt=count($devicetoken);
	/*  $ix=0;
	 $devicetok=array();
 foreach($devicetoken as $row)
 {
 	$ix++;
 	$a=$row;
	array_push($devicetok,$a);
 	if($ix%900==0){
		//echo $cnta." - ".$cnt." - ".$ix."->".sizeof($devicetok)."<br>".json_encode($devicetok)."<br><br><br>";$cnta=0;
 	echo $firebase->send(json_encode($devicetok), $mPushNotification);
		$devicetok=array();
 	}
 }*/
	// echo $cnta."<br>".$cnt." - ".$ix."->".sizeof($devicetok)."<br>".json_encode($devicetok)."<br><br><br>";
 echo $firebase->send($devicetoken, $mPushNotification);
 
 $response['error']=false;
 $response['message']='Success';
 }else{
 $response['error']=true;
 $response['message']='Parameters missing';
 echo json_encode($response);
 }
 

