<?php
class Model_action extends CI_Model
{
	public function logmodel($user1,$pass1){
		$query=$this->db->query("call sp_login('$user1','$pass1')");
		$result=$query->result();
		return $result;
	}
	public function logout($id,$pin)
	{
		$query=$this->db->query("call sp_logout('$id','$pin')");
		$result=$query->result();
		return $result;
		
	}
	
    public function checkpass($old,$id)
	{
		$query="call sp_checkuserpass('$old','$id')";
		
		$res=$this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		return $res->result();
	}
    public function chngepass($new,$id)
	{
		$query=$this->db->query("call sp_chngeuserpass('$new','$id')");
			
		$resu=$query->result();
		return $resu;
	}
	public function viewprofile($id,$pin)
	{
		$query=$this->db->query("call sp_viewprofile('$id','$pin')");
		$result=$query->result();
		return $result;
	
	}
	public function edituserprofile($fname,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$branch_name,$id,$pin)
	{
		$query=$this->db->query("call sp_edituserprofile('$fname','$mail','$mobile','$address','$city','$country','$state','$apin','$bank_name','$acnt_no','$ifsc','$pan','$branch_name','$id','$pin')");
			
		$resu=$query->result();
		return $resu;
		
	}
	public function loadwallet($id,$pin,$from,$to)
	{
		$query=$this->db->query("call sp_loadwallet('$id','$pin','$from','$to')");
		$result=$query->result();
		return $result;
	}
	public function activates($id,$pin,$number)
	{
                $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $date=$dat->format('Y-m-d');
                $time=$dat->format('H:i:s');

		$query=$this->db->query("call sp_activate('$id','$pin','$number','$date','$time')");
		$result=$query->result();
		return $result;
	}
	public function checkpin($id,$pin,$number)
	{
		$query=$this->db->query("call sp_checkpin('$id','$pin','$number')");
		$result=$query->result();
		return $result;
	}
	
	public function gettree($tree)
	{
		$query=$this->db->query("call sp_gettree('$tree')");
		$result=$query->result();
		return $result;
	}
	
	public function gettreedetails($id)
	{
		$query=$this->db->query("call sp_gettreedetails('$id')");
		$result=$query->result();
		mysqli_next_result($this->db->conn_id);
		return $result;
	}
	

	public function checkavailabes($user,$mail,$mob)
	{
		$query=$this->db->query("call sp_checkavailabes('$user','$mail','$mob')");
			
		$resu=$query->result();
		return $resu;
	}
public function loadpayoutwallet($id,$pin,$from,$to)
	{
		$query=$this->db->query("call sp_loadpayoutwallet('$id','$pin','$from','$to')");
		$result=$query->result();
		return $result;
	}
public function check_referralid_username_parent($bid1,$bid2,$bid3,$bid4,$bid5,$bid6,$pcode,$bv)
	{
	
		//echo "call sp_check_referralid_username_parentusers('$bid1','$bid2','$bid3','$bid4','$bid5','$bid6','$pcode','$bv')";
		$query=$this->db->query("call sp_check_referralid_username_parentusers('$bid1','$bid2','$bid3','$bid4','$bid5','$bid6','$pcode','$bv')");
			
		$resu=$query->result();
		return $resu;
	}
	
	public function addusers($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$parent,$referal,$pos,$userType)
	{
	         $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                 $date=$dat->format('Y-m-d');
                 $time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_addusers('$user','$password','$fname','$father','$gender','$dob','$mail','$mobile','$address','$city','$country','$state','$apin','$bank_name','$acnt_no','$ifsc','$pan','$nominee_name','$relations','$age','$add','$branch_name','$parent','$referal','$pos','$userType','$date','$time')");
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	public function activatepin_user($useid,$pin)
	{
                $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                 $date=$dat->format('Y-m-d');
                   $time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_activatepin_user('$useid','$pin','$date','$time')");
		$result=$query->result();
		return $result;
	}
	
	public function activatepin_freeuser($useid,$pin)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$query=$this->db->query("update pin_details set pin_status=1,activate_date='$date',activate_time='$time' where pinnumber='$pin'");
		
	}





//New Updates from here 17-6-2018
	
	public function getuserID($id,$getid)
	{
		$query=$this->db->query("call sp_getuserID('$id','$getid')");
		$result=$query->result();
		return $result;
	}
	
	
	
	public function getUserByPosition($id,$pos)
	{
		$query=$this->db->query("call sp_getUserByPosition('$id','$pos')");
		$result=$query->result();
		return $result;
	}
	
	
	public function getDSI($id,$from,$to)
	{
		
		$query=$this->db->query("SELECT * FROM user_payin where (payin_date between '$from' and '$to') 
						and u_id='$id' and mode='Direct Referral' and flag='1' order by payin_date desc");
		$result=$query->result();
		return $result;
	}


	public function getLSI($id,$from,$to)
	{
	
		$query=$this->db->query("SELECT * FROM user_payin where (payin_date between '$from' and '$to')
				and u_id='$id' and mode='Indirect Referral' and flag='1' order by payin_date desc");
		$result=$query->result();
		return $result;
	}
	
	public function getTSI($id,$from,$to)
	{
	
		$query=$this->db->query("SELECT * FROM user_payin where (payin_date between '$from' and '$to')
				and u_id='$id' and mode='Binary' and flag='1' order by payin_date desc");
		$result=$query->result();
		return $result;
	}
	
	
	public function getMI($id,$from,$to)
	{
	
		$query=$this->db->query("call sp_getMI('$id','$from','$to')");
		$result=$query->result();
		return $result;
	}
	
	public function imgupload($id,$file_name)
	{
	
		$query=$this->db->query("update user_extradetails set image='$file_name' where u_id='$id'");
	}
	
	
	
	public function createTicket($id,$msg,$sub)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_createTicket('$id','$msg','$sub','$date','$time')");
		$result=$query->result();
		return $result;
	}
	
	public function getMsg($id,$flag)
	{
		$from=1;
		$query=$this->db->query("call sp_getMsg('$id','$from','$flag')");
		$result=$query->result();
		return $result;
	}
	
	public function insertChat($id,$chat)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$from=0;
		$query=$this->db->query("call sp_insertChat('$id','$chat','$from','$date','$time')");
		$result=$query->result();
		return $result;
	}
	
	public function getMsgNotify($id)
	{
		$query=$this->db->query("select sc.sid,count(sc.scid) as cnt from support_chat sc,support s
							where fromuser='1' and s.u_id='$id' and s.sid=sc.sid and sread='0' group by sc.sid;");
		$resu=$query->result();
		return $resu;
	}
	
	
	public function calculateBinaryProducts($prodarray)
	{
		$tprice=0;$tbv=0;
		$arrlength = count($prodarray);
		$ptype="";
		if($arrlength>0 && $prodarray[0]!='free'){
			for($x = 0; $x < count($prodarray); $x++) {
				$id=$prodarray[$x];
				$query=$this->db->query("select bv,product_price from product_details where product_id='$id'");
				mysqli_next_result($this->db->conn_id);
				$resu=$query->result();
				foreach($resu as $val){
					$tprice=$tprice+$val->product_price;
					$tbv=$tbv+$val->bv;
				}
				}
		}
		if($arrlength>0 && $prodarray[0]=='free'){
			$ptype='free';
		}
		return array(array("price"=>$tprice,"bv"=>$tbv,"ptype"=>$ptype));
	}
	
	
	public function insertBinaryUserProducts($userid,$pid,$qty,$size)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_insertBinaryUserProducts('$userid','$pid','$qty','$size','$date','$time')");
		mysqli_next_result($this->db->conn_id);
		$result=$query->result();
		return $result;
	}
	

	
	public function upgradeuser_products($userid,$pid,$timestamp)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_upgradeuser_products('$userid','$pid','$date','$time','$timestamp')");
		mysqli_next_result($this->db->conn_id);
		$result=$query->result();
		return $result;
	}
	
	public function calculateBinaryProductsall($prodarray)
	{
		$tprice=0;$tbv=0;
		$arrlength = count($prodarray);
		$ptype="";
			foreach($prodarray as $rw){
				if($rw->id=="free"){
					$ptype='free';
				}
				else{
				$id=$rw->id;
				$qty=$rw->qty;
				$query=$this->db->query("select bv,product_price from product_details where product_id='$id'");
				mysqli_next_result($this->db->conn_id);
				$resu=$query->result();
				foreach($resu as $val){
					$tprice=$tprice+($qty*$val->product_price);
					$tbv=$tbv+($qty*$val->bv);
				}
				}
		}
		return array(array("price"=>$tprice,"bv"=>$tbv,"ptype"=>$ptype));
	}
	
	
	public function getSponserName_limit($value)
	{
		$query=$this->db->query("select ue.u_name from user_login ul, user_extradetails ue where ul.u_id=ue.u_id and  ul.username='$value' limit 1");
		$result=$query->result();
		return $result;
		
	}
}
?>
