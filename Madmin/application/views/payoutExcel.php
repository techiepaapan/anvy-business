<?php
error_reporting(0);
include 'dbconnection.php';



if(isset($_REQUEST['pmid'])){
	
	$pmid=$_REQUEST['pmid'];

$id=1;
$pin=2345;
    		//echo "call re_print('$id','$pin','$pmid')";
$qry=mysqli_query($connect,"call re_print('$id','$pin','$pmid')");
$i=1;
    		//echo "row=".mysqli_num_rows($qry);
$databank=array();
$datasbi=array();
$tamt=0;

if(mysqli_num_rows($qry)>0)
{
	while($row1=mysqli_fetch_assoc($qry))
	{
		$amount=$row1['amount'];

		$tamt=$tamt+$amount;
		
		$row_array['SL NO']=$i;
		$row_array['NAME']=$row1['u_name'];
		$row_array['ACCOUNT NUMBER']=$row1['u_accountno'];
		$bank=$row1['u_bankname'];
		$clean_code = preg_replace('/[^a-zA-Z]/', '', $bank);
		$clean_code=strtoupper($clean_code);
		
		if ((strpos($clean_code, 'STATEBANKOFINDIA') === 0)||(strpos($clean_code, 'SBI') === 0)) {
			$row_array['BANK NAME']='STATE BANK OF INDIA';
			$ptype=1;
		}
		else{
			$row_array['BANK NAME']=$row1['u_bankname'];
			$ptype=2;
		}
		$row_array['IFSC CODE']=$row1['u_ifsc'];
		$row_array['PLACE']=$row1['u_branch'];
		$row_array['AMOUNT']=number_format((float)$amount, 2, '.', '');
		if($ptype==1){
			array_push($datasbi,$row_array);
		}
		else{
		array_push($databank,$row_array);
		}
		
	}
	
	
	foreach($datasbi as &$datasbi1){
		$datasbi1['SL NO']=$i;
		$i++;
	}
	
	foreach($databank as &$databank1){
		$databank1['SL NO']=$i;
		$i++;
	}
	
	if(count($datasbi)>0 && count($databank)>0){
		$row_array['SL NO']="OTHER";
		$row_array['NAME']="BANKS";
		$row_array['ACCOUNT NUMBER']="";
		$row_array['BANK NAME']="";
		$row_array['IFSC CODE']="";
		$row_array['PLACE']="";
		$row_array['AMOUNT']="";
		
		array_push($datasbi,$row_array);
	}
	
	$row_array['SL NO']="";
	$row_array['NAME']="";
	$row_array['ACCOUNT NUMBER']="";
	$row_array['BANK NAME']="";
	$row_array['IFSC CODE']="";
	$row_array['PLACE']="Total";
	$row_array['AMOUNT']=number_format((float)$tamt, 2, '.', '');
	
	array_push($databank,$row_array);
}

else{
	$row_array['SL NO']="";
	$row_array['NAME']="";
	$row_array['ACCOUNT NUMBER']="";
	$row_array['BANK NAME']="";
	$row_array['IFSC CODE']="";
	$row_array['PLACE']="";
	$row_array['AMOUNT']="";
	
	array_push($databank,$row_array);
}

/*echo json_encode($datasbi)."<br>";
echo json_encode($databank);*/

function filterData(&$str)
{
	$str = preg_replace("/\t/", "\\t", $str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// file name for download
$fileName = "massventure_bank_" . date('Ymd') . ".xls";


// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");

$flag = false;
foreach($datasbi as $row) {
	if(!$flag) {
		// display column names as first row
		echo implode("\t", array_keys($row)) . "\n";
		$flag = true;
	}
	// filter data
	array_walk($row, 'filterData');
	echo implode("\t", array_values($row)) . "\n";

}

foreach($databank as $row) {
	if(!$flag) {
		// display column names as first row
		echo implode("\t", array_keys($row)) . "\n";
		$flag = true;
	}
	// filter data
	array_walk($row, 'filterData');
	echo implode("\t", array_values($row)) . "\n";

}
}

?>