<?php

error_reporting(0);
include 'dbconnection.php';

        $query=mysqli_query($connect,"select * from token order by id desc");
        
        if($rows=mysqli_fetch_array($query))
        {
        	$res=$rows['token'];
			echo $res."<br><br>";
        }



?>

