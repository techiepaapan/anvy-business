<?php
//error_reporting(0);
include 'dbconnection.php';

$qry1=mysqli_query($connect,"select ul.username as id,ue.u_name as nm,ue.u_mobile as ph,ue.u_email as em,ue.u_joindate as jd,
							(select username from user_login ul1 where ul1.u_id=ue.referral_id) as rby,
							(select count(ue1.user_extraid) from user_extradetails ue1 where ue1.referral_id=ue.u_id) as ref
							from user_login ul,user_extradetails ue where ul.u_id=ue.u_id and  ul.type_flg='M' order by ul.u_id asc");
$i=1;
$data=array();
if(mysqli_num_rows($qry1)>0)
{
	while($rows=mysqli_fetch_assoc($qry1))
	{
		$row_array['UserID']=$rows['id'];
		$row_array['Name']=$rows['nm'];
		$row_array['Phone']=$rows['ph'];
		$row_array['Email']=$rows['em'];
		$row_array['Referredby']=$rows['rby'];
		$row_array['Referred']=$rows['ref'];
		$row_array['Join Date']=trim( implode('_', array_reverse(explode('-', $rows['jd']))));
		array_push($data,$row_array);
	}
}

function filterData(&$str)
{
	$str = preg_replace("/\t/", "\\t", $str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// file name for download
$fileName = "massventure_" . date('Ymd') . ".xls";

// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");

$flag = false;
foreach($data as $row) {
	if(!$flag) {
		// display column names as first row
		echo implode("\t", array_keys($row)) . "\n";
		$flag = true;
	}
	// filter data
	array_walk($row, 'filterData');
	echo implode("\t", array_values($row)) . "\n";

}

?>