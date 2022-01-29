<?php
$base=substr((base_url()),0,-6);
$logpanel='<li class="list-first"><a href="'.base_url().'welcome/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>';
$lg=0;
if(isset($_SESSION['uid1']))
{//echo "yes";
	if(($_SESSION['uid1']=="")||($_SESSION['uid1']==null))
	{
		header("location:$base");
	}
	
	else 
	{
		$lg=1;
		$logpanel='<li class="list-first"><a href="'.base_url().'Muser/welcome/index">Hi '.$_SESSION['user1'].'</a></li><li class="list-first"><a href="'.base_url().'welcome/logout">Logout</a></li>';
	}
}
else {
	header("location:$base");
}

?>