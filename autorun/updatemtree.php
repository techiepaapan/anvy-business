<?php
//error_reporting(0);
include 'dbconnection.php';

$rquery1 = mysqli_query($connect,"select * from mtree where flag='2'");
mysqli_next_result($connect);
		
	while ($row=mysqli_fetch_array($rquery1))
	{
		$mid=$row['mid'];
		$query = mysqli_query($connect,"call webservice_updatemtree('$mid')");
		mysqli_next_result($connect);
	}
?>