<?php
$puid="";
if(isset($_SESSION['uid']))
{
	if(($_SESSION['uid']=="")||($_SESSION['uid']==null))
	{
	    ob_start();
		header('location:'.base_url().'welcome/login');
	}
	else 
	{
		$puid=$_SESSION['uid'];
	}
}
else {
	header('Location: '.base_url().'welcome/login');
	exit();
}
?>