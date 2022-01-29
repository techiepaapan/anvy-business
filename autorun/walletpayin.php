<?php 
include 'dbconnection.php';
$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $date=$dat->format('Y-m-d');
                $time=$dat->format('H:i:s');
$qry=mysqli_query($connect,"SELECT ue.u_id,ul.username,ue.u_name,ue.u_mobile,sum(pay_amount) as amt,
		(select balance from user_wallet uw where uw.u_id=ue.u_id) as balance
		FROM user_payin upyn,user_extradetails ue,user_login ul where upyn.payin_date='$date'
					and upyn.u_id=ue.u_id and ul.u_id=ue.u_id group by upyn.u_id;");

foreach($qry as $res){
	$u_id=$res['u_id'];
	$u_name=$res['u_name'];
	$u_mobile=$res['u_mobile'];
	$username=$res['username'];
	$amt=$res['amt'];
	$balance=$res['balance'];
	$msg="Good morning ".$u_name."(".$username."). Rs".$amt." has been added to your wallet. Your current wallet balance is Rs".$balance;
	$msg = preg_replace('/ /', '%20',$msg);
	$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$u_mobile&msg=$msg&port=TA";
	file_get_contents($fullapiurl);
}

?>