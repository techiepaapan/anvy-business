<?php 
set_time_limit(0);
include 'dbconnection.php';
$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $date=$dat->format('Y-m-d');
                $time=$dat->format('H:i:s');
$qry=mysqli_query($connect,"call sp_autopay('$date','$time');");
?>