<?php
class Model_action extends CI_Model
{
	
	
	public function check_productname($bid1)
	{
		$query=$this->db->query("call sp_check_productname('$bid1')");
		
		return $query->result();
	}
	public function add_product($productname,$decription,$price,$productbv,$p_code,$quantity,$discounted_price,$size,$cgst,$sgst,$igst)
	{
		$query=$this->db->query("call sp_addproduct('$productname','$decription','$price','$productbv','$p_code','$quantity','$discounted_price','$size','$cgst','$sgst','$igst')");
		mysqli_next_result($this->db->conn_id);
		return $query->result();
	}	
	
	public function loadproducts()
	{
		$query=$this->db->query("call sp_loadproduct()");
		
		return $query->result();
	}
	public function deleteproduct($id)
	{
		$query="call sp_deletepro('$id')";
		$res=$this->db->query($query);
		if($res==true)
		{
			
			return 'success';
			
		}
		else 
		{
			return 'fail';
		}
	}
	
	public function editproductclick($id,$productname,$prodesc,$proprice,$code,$quantity, $discounted_price,$productbv,$size,$cgst,$sgst,$igst)
	{
		
		$query="call sp_editproduct('$id','$productname','$prodesc','$proprice','$code','$quantity', '$discounted_price','$productbv','$size','$cgst','$sgst','$igst')";
		// echo $query;
		$res=$this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		return $res->result();
	}
	public function suggest_model($q)
	{
		$query=$this->db->query("call sp_user_name('$q')");
			
		$resu=$query->result();
		 
		return $resu;
	}
	public function usersuggest($q)
	{
		$query=$this->db->query("call sp_loadusername('$q')");
			
		$resu=$query->result();
			
		return $resu;
		
	}
	public function productdisplay($productid)
	{
		$query=$this->db->query("call sp_productsearch('$productid')");
			
		$resu=$query->result();
			
		return $resu;
	}
	public function change_product_image($pid)
	{
		$fname="product_".$pid.".jpeg";
		$query="call sp_updateimage('$pid','$fname')";
		$res=$this->db->query($query);
		/*return $res->result();*/
		
	}	
	
	public function settingsinsert($scharge,$bvpoint,$bvamt,$id)
	{
		$query=$this->db->query("call sp_settingsinsert('$scharge','$bvpoint','$bvamt','$id')");
			
		$resu=$query->result();
			
		return $resu;
	}
	public function loadsettings()
	{
		$query=$this->db->query("call sp_loadsettings()");
			
		$resu=$query->result();
			
		return $resu;
		
	}
	public function searchpin($from,$to)
	{
		$query=$this->db->query("call sp_searchpin('$from','$to')");
			
		$resu=$query->result();
			
		return $resu;
		
	}
	public function editpinnumber($pin,$id)
	{
		$query=$this->db->query("call sp_editpinnumber('$pin','$id')");
			
		$resu=$query->result();
		
			
		return $resu;
		
	}
	
	public function deletepin($id)
	{
		$query="call sp_deletepin('$id')";
		$res=$this->db->query($query);
		if($res==true)
		{
				
			return 'success';
				
		}
		else
		{
			return 'fail';
		}
		
	}
	public function checkpass($old,$id)
	{
		$query="call sp_checkpass('$old','$id')";
		
		$res=$this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		return $res->result();
	}
	public function chngepass($new,$id)
	{
		$query=$this->db->query("call sp_chngepass('$new','$id')");
			
		$resu=$query->result();
		return $resu;
	}
	public function checkavailabe($user,$code)
	{
		$query=$this->db->query("call sp_checkavailabe('$user','$code')");
			
		$resu=$query->result();
		return $resu;
	}
	
	public function checkreferal($refer)
	{
		
		$query=$this->db->query("call sp_checkreferal('$refer')");
			
		$resu=$query->result();
		return $resu;
	}
	
	public function checkparentid($parent)
	{
		$query=$this->db->query("call sp_checkparentid('$parent')");
			
		$resu=$query->result();
		return $resu;
		
	}
	
	public function loadPin()
	{
		$query=$this->db->query("call sp_loadPin()");
			
		$resu=$query->result();
		return $resu;
		
	}
	public function loadprocode()
	{
		
		$query=$this->db->query("call sp_loadprocode()");
			
		$resu=$query->result();
		return $resu;
	}
	
	public function activateuser($id)
	{
		$query=$this->db->query("call sp_activateuser('$id')");
			
		$resu=$query->result();
			
		return $resu;
	}
	public function deactivateuser($id)
	{

		$query=$this->db->query("call sp_deactivateuser('$id')");
			
		$resu=$query->result();
			
		return $resu;
		
	}
	public function editusers($fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$branch_name,$id,$maxbv)
	{
		$query=$this->db->query("call sp_editusers('$fname','$father','$gender','$dob','$mail','$mobile','$address','$city','$country','$state','$apin','$bank_name','$acnt_no','$ifsc','$pan','$nominee_name','$relations','$age','$branch_name','$id','$maxbv')");
			
		$resu=$query->result();
		return $resu;
	}
	public function loadpay($id,$pin)
	{
		$query=$this->db->query("call sp_loadpay('$id','$pin')");
			
		$resu=$query->result();
			
		return $resu;
		
	}
	public function payout_action($id,$pin,$tot,$len)
	{
                  $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                  $date=$dat->format('Y-m-d');
                  $time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_payout('$id','$pin','$tot','$len','$date','$time')");
			
		$resu=$query->result();
		mysqli_next_result($this->db->conn_id);
		return $resu;
	}
	
	public function payotuser($uid,$amt,$mid,$id,$dep,$ded)
	{

                  $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                  $date=$dat->format('Y-m-d');
                  $time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_payotuser('$uid','$amt','$mid','$id','$date','$time','$dep','$ded')");
			
		$resu=$query->result();
		mysqli_next_result($this->db->conn_id);
		return $resu;
	}
	public function loadreprint($id,$pin)
	{
		$query=$this->db->query("call sp_loadreprint('$id','$pin')");
			
		$resu=$query->result();
		
		return $resu;
	}
	public function reprintsrch($id,$pin,$from,$to)
	{
		$query=$this->db->query("call sp_reprintsrch('$id','$pin','$from','$to')");
			
		$resu=$query->result();
		
		return $resu;
	}
	public function loadorder($id,$pin)
	{
		$query=$this->db->query("call sp_loadorder('$id','$pin')");
			
		$resu=$query->result();
		
		return $resu;
	}
	public function pload($id,$pin,$p_code)
	{
		$query=$this->db->query("call sp_pload('$id','$pin','$p_code')");
			
		$resu=$query->result();
		
		return $resu;
	}
	public function checkid($id,$pin)
	{
		$query=$this->db->query("call sp_checkid('$id','$pin')");
			
		$resu=$query->result();
		mysqli_next_result($this->db->conn_id);
		return $resu;
	}
	public function processorder($uid)
	{
		$query=$this->db->query("call sp_processorder('$uid')");
			
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		
		return $resu;
	}
	public function add_reproduct ($productname,$decription,$price,$p_code,$quantity,$discounted_price,$pcat,$delivery_charge,$commission)
	{
		$query=$this->db->query("call sp_readdproduct('$productname','$decription','$price','$p_code','$quantity','$discounted_price','$pcat','$delivery_charge','$commission')");
		mysqli_next_result($this->db->conn_id);
		return $query->result();
	}
	public function change_product_image1($pid)
	{
		$fname="product1_".$pid."_1.jpeg";
		$query="call sp_updateimage1('$pid','$fname')";
		$res=$this->db->query($query);
		/*return $res->result();*/
	}
	public function change_product_image2($pid)
	{
		$fname="product1_".$pid."_2.jpeg";
		$query="call sp_updateimage2('$pid','$fname')";
		$res=$this->db->query($query);
		/*return $res->result();*/
	}
	public function change_product_image3($pid)
	{
		$fname="product1_".$pid."_3.jpeg";
		$query="call sp_updateimage3('$pid','$fname')";
		$res=$this->db->query($query);
		/*return $res->result();*/
	}
	public function change_product_image4($pid)
	{
		$fname="product1_".$pid."_4.jpeg";
		$query="call sp_updateimage4('$pid','$fname')";
		$res=$this->db->query($query);
		/*return $res->result();*/
	}
	public function loadreproducts($id,$pin)
	{
		$query=$this->db->query("call sp_loadreproducts('$id','$pin')");		
		$resu=$query->result();
		return $resu;
	}
	public function suggestrepro_action($q,$id,$pin)
	{
		$query=$this->db->query("call sp_suggestrepro_action('$q','$id','$pin')");		
		$resu=$query->result();	
		return $resu;
	}
	public function reproductdisplay($productid,$id,$pin)
	{
		$query=$this->db->query("call sp_reproductdisplay('$productid','$id','$pin')");	
		$resu=$query->result();
		return $resu;
	}
	public function deletereproduct($ids,$id,$pin)
	{
		$query="call sp_deletereproduct('$ids','$id','$pin')";
		$res=$this->db->query($query);
		return $res->result();
	}
	public function reproedit($ids,$productname,$prodesc,$proprice,$code,$quantity,$discounted_price,$id,$pin,$catid,$delivery_charge,$commission)
	{
		$query="call sp_reproedit('$ids','$productname','$prodesc','$proprice','$code','$quantity','$discounted_price','$id','$pin','$catid','$delivery_charge','$commission')";
		// echo $query;
		$res=$this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		return $res->result();
	}
	public function loadreprocode($id,$pin)
	{
		$query=$this->db->query("call sp_loadreprocode('$id','$pin')");	
		$resu=$query->result();
		return $resu;
	}
	
	
	public function load_nworder($id,$pin)
	{
		$query=$this->db->query("call sp_load_nworder('$id','$pin')");		
		$resu=$query->result();
		return $resu;
	}

	public function load_oldorder($id,$pin,$from,$to,$stat)
	{
		$query=$this->db->query("call sp_load_oldorder('$id','$pin','$from','$to','$stat')");	
		$resu=$query->result();
		return $resu;
	}
	
	
	
	public function mark_orders($id,$pin,$val,$oid)
	{
		$query=$this->db->query("call sp_mark_porders('$val','$oid')");
		//mysqli_next_result($this->db->conn_id);
		//return $resu;
	}
	
	public function logmodel($user1,$pass1){
		$query=$this->db->query("call sp_admin_login('$user1','$pass1')");
		$result=$query->result();
		return $result;
	}
	public function repurchsesettings($l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$levelid)
	{
		$query=$this->db->query("call sp_repurchsesettings('$l1','$l2','$l3','$l4','$l5','$l6','$l7','$l8','$l9','$l10','$levelid')");
		$result=$query->result();
		return $result;
	}
	
	
	public function viewusers()
	{
		$query=$this->db->query("call sp_loadviewusers()");
		$result=$query->result();
		return $result;
	}
	public function userdisplay($userid,$from,$to)
	{
		$query=$this->db->query("call sp_userdisplay('$userid','$from','$to')");
			
		$resu=$query->result();
			
		return $resu;
	
	}
	public function genpin_action()
	{
		//$query=$this->db->query("select conv(concat(substring(uid,16,3), substring(uid,10,4), substring(uid,1,8)),16,10) div 10000 - (141427 * 24 * 60 * 60 * 1000) as current_mills from (select uuid() uid) as alias;");
		$query=$this->db->query("call sp_autogenerate()");
		
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	public function addpin_action($pin,$admin_id,$tp,$bv)
	{        
                 $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                 $date=$dat->format('Y-m-d');
	
		$query=$this->db->query("call sp_addpin('$pin','$admin_id','$date','$tp','$bv')");
	
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;		
	}

	public function addfirstuser($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$code)
	{
      
                 $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                 $date=$dat->format('Y-m-d');
	         $time=$dat->format('H:i:s');
	
		$query=$this->db->query("call sp_addfirstuser('$user','$password','$fname','$father','$gender','$dob','$mail','$mobile','$address','$city','$country','$state','$apin','$bank_name','$acnt_no','$ifsc','$pan','$nominee_name','$relations','$age','$add','$branch_name','$code','$date','$time')");
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	public function addusers($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$parent,$referal,$pos,$code)
	{
      
                 $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                 $date=$dat->format('Y-m-d');
	         $time=$dat->format('H:i:s');
	
		$query=$this->db->query("call sp_addusers('$user','$password','$fname','$father','$gender','$dob','$mail','$mobile','$address','$city','$country','$state','$apin','$bank_name','$acnt_no','$ifsc','$pan','$nominee_name','$relations','$age','$add','$branch_name','$parent','$referal','$pos',$code,'$date','$time')");
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	public function checkavailabes($user,$mail,$mob)
	{
		$query=$this->db->query("call sp_checkavailabes('$user','$mail','$mob')");
			
		$resu=$query->result();
		return $resu;
	}
	public function check_referralid_username_parent($bid1,$bid2,$bid3,$bid4,$bid5)
	{
		$query=$this->db->query("call sp_check_referralid_username_parent('$bid1','$bid2','$bid3','$bid4','$bid5')");
			
		$resu=$query->result();
		return $resu;
	}
	public function activate1($useid)
	{
                  

		$query=$this->db->query("call sp_activate1('$useid')");
			
		$resu=$query->result();
		return $resu;
	}
public function repurchasebonus()
	{
		$query=$this->db->query("call sp_payrebonus()");
			
		$resu=$query->result();
		return $resu;
	}
public function paydetails($id)
	{
		$query=$this->db->query("select * from user_payin where u_id='$id' and flag=0 order by payin_date desc,payin_time desc");
			
		$resu=$query->result();
		return $resu;
	}
	
	public function addcat_action($id)
	{
		$query=$this->db->query("call sp_catadd('$id')");
			
		$resu=$query->result();
		return $resu;
	}
	
	
	public function loadCat()
	{
		$query=$this->db->query("call sp_loadcat()");
			
		$resu=$query->result();
		return $resu;
	}
	
	
	public function edit_catname($catname,$id)
	{
		
		$query=$this->db->query("call sp_edit_catname('$catname','$id')");
			
		$resu=$query->result();
		return $resu;
	}
    
	/* public function deletecat($id)
	{
		$query=$this->db->query("call sp_deletecat('$id')");
			
		
	    if($query==true)
	 	{
				
			return 'success';
				
		}
		else
		{
			return 'fail';
		}
	} */
	public function disablecat($id)
	{
		$query=$this->db->query("call sp_disablecat('$id')");
		$resu=$query->result();
		return $resu;
	
	}
	public function enablecat($id)
	{
		$query=$this->db->query("call sp_enablecat('$id')");
		$resu=$query->result();
		return $resu;
	
	}
	
	
	/*----------------------------------------*/
	
	
	public function load_renworder($id,$pin)
	{
		$query=$this->db->query("call sp_load_renworder('$id','$pin')");
			
		$resu=$query->result();
		return $resu;
	}
	public function repload($id,$pin,$p_code)
	{
		$query=$this->db->query("call sp_repload('$id','$pin','$p_code')");
		$resu=$query->result();
		return $resu;
	}
	
	public function process_reorder($uid)
	{
		$query=$this->db->query("call sp_processreorder('$uid')");
	
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	
	public function load_reoldorder($id,$pin,$from,$to,$stat)
	{
		$query=$this->db->query("call sp_load_reoldorder('$id','$pin','$from','$to','$stat')");
		$resu=$query->result();
		return $resu;
	}
	
	public function mark_reorders($id,$pin,$val,$oid)
	{
		//echo $val;
		//echo $oid;
		$query=$this->db->query("call sp_mark_reorder('$oid','$val')");
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}

public function usersuggest_m($q)
	{
		$query=$this->db->query("select ue.u_name from user_login ul,user_extradetails ue where ul.u_id=ue.u_id and ue.u_name like CONCAT('$q', '%') and ul.type_flg='M' limit 15");
			
		$resu=$query->result();
			
		return $resu;
	
	}
	
	
	public function viewusers_m($id,$tp)
	{
		$query=$this->db->query("call sp_viewusers_m('$id','$tp')");
		$resu=$query->result();
		return $resu;
	}
	
	public function userdisplay_m($q)
	{
		$query=$this->db->query("call sp_userdisplay_m('$q')");
		$resu=$query->result();
		return $resu;
	}

public function slider2reproductdisplay($productid)
	{
		$query=$this->db->query("call sp_slider2reproductdisplay('$productid')");
		$resu=$query->result();
		return $resu;
	}
	
	public function slider2loadreproduct()
	{
		$query=$this->db->query("select * from repurchase_product rp,slider2 s2 where s2.pid=rp.re_product_id");
		$resu=$query->result();
		return $resu;
	}
	public function slider2deletereproduct($id)
	{
		$query=$this->db->query("call sp_slider2deletereproduct('$id')");
		$resu=$query->result();
		return $resu;
	}
public function add_sliderproduct($productname)
	{
		$query=$this->db->query("call sp_add_sliderproduct('$productname')");
		
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	public function change_slider_image1($pid)
	{
		$fname="combo_".$pid.".jpeg";
		$query="call sp_updateslider('$pid','$fname')";
		$res=$this->db->query($query);
		/*return $res->result();*/
	}
	public function loadsliderproducts()
	{
		$query=$this->db->query("call sp_loadslider()");
		
		
		$resu=$query->result();
		return $resu;
	}
	
	public function deleteslider1($id)
	{
		$query=$this->db->query("call sp_deleteslider1('$id')");
		$resu=$query->result();
		return $resu;
	}


public function insertsize($uid,$pid)
	{
		$query=$this->db->query("call sp_insertsize('$uid','$pid')");
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	public function loadsize($pid)
	{
		$query=$this->db->query("call sp_loadsize('$pid')");
		//mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	public function deletesize($pid)
	{
		$query=$this->db->query("delete from repurchase_size where size_id='$pid';");
		//mysqli_next_result($this->db->conn_id);
		//$resu=$query->result();
		//return $resu;
		if($query==true)
		{
			return 'success';
		}
		else 
		{
			return 'fail';
		}
	}
	
		
	public function updateReSize($uid,$pid,$sid)
	{
		$query=$this->db->query("call sp_updateReSize('$uid','$pid','$sid')");
		mysqli_next_result($this->db->conn_id);
		$resu=$query->result();
		return $resu;
	}
	
		
	public function getMsg($id,$flag)
	{
		$from=0;
		//echo "call sp_getMsg('$id','$from','$flag')<br>";
		$query=$this->db->query("call sp_getMsg('$id','$from','$flag')");
		$result=$query->result();
		return $result;
	}
	
	public function insertChat($id,$chat)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$from=1;
		$query=$this->db->query("call sp_insertChat('$id','$chat','$from','$date','$time')");
		$result=$query->result();
		return $result;
	}
	
	
		
	public function reproductdisplay1($productid,$id,$pin)
	{
		$query=$this->db->query("call sp_reproductdisplay1('$productid','$id','$pin')");
		$resu=$query->result();
		return $resu;
	}
	
	
		
	public function add_business_tool($subject,$filename)
	{
		$query=$this->db->query("INSERT INTO business_tools(subject, tool) VALUES('$subject','$filename')");
	}
	
	
	public function deleteBTool($id)
	{
		$query=$this->db->query("delete from business_tools where id='$id'");
	}
	
	public function getMsgNotify()
	{
		$query=$this->db->query("select sid,count(scid) as cnt from support_chat where fromuser='0' and sread='0' group by sid;");
		$resu=$query->result();
		return $resu;
	}
	
		
	public function changeref($ref,$id)
	{
		$query=$this->db->query("call sp_changeref('$ref','$id')");
		$resu=$query->result();
		return $resu;
	}
	
	
		
	
	public function sp_edituserstatusbeforepin($u_id,$pid)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_edituserstatusbeforepin('$u_id','$pid','$date','$time')");
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
		mysqli_next_result($this->db->conn_id);
		return $result;
	}
	
	
		
	public function changeCAStatus($id,$val)
	{
		$query=$this->db->query("call sp_changeCAStatus('$id','$val')");
			
		$resu=$query->result();
			
		return $resu;
	}
	
	
	public function uploadCA($title,$message,$lnk,$product,$imagename,$imaging)
	{
		$query=$this->db->query("call sp_uploadCA('$title','$message','$lnk','$product','$imagename','$imaging')");
		$resu=$query->result();
		return $resu;
	}
	
	public function printmuser($t)
	{
		if($t==1){
		$query=$this->db->query("select u_name as name,u_mobile as mobile,u_email as email from user_login ul,user_extradetails ue where ul.u_id=ue.u_id and type_flg='M' order by ul.u_id asc");
		}
		$resu=$query->result();
		return $resu;
	}
	
		
	public function viewusers_m_id($id,$tp)
	{
		$query=$this->db->query("call sp_viewusers_m_id('$id','$tp')");
		$resu=$query->result();
		return $resu;
	}
	
	public function editmuser($id,$name,$uname,$pwd,$phone,$email)
	{
		$query=$this->db->query("call sp_editmuser('$id','$name','$uname','$pwd','$phone','$email')");
		$resu=$query->result();
		return $resu;
	}
	
	
	public function deleterve($ids)
	{
		$query=$this->db->query("delete from product_rating where id='$ids'");
		if($query==true)
		{
			return "success";
		}
		else
		{
			return "fail";
		}
	
	}
	public function approverve($ids)
	{
		$query=$this->db->query("update product_rating  set flag=1 where id='$ids'");
		if($query==true)
		{
			return "success";
		}
		else
		{
			return "fail";
		}
	
	}
	
	public function addrating($ids,$product,$rating,$heading,$review)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		$query=$this->db->query("call webservice_addrating('$ids','$product','$rating','$heading','$review','$date','$time')");
		$result=$query->result();
		mysqli_next_result($this->db->conn_id);
		
		if($result[0]->ids==null ||$result[0]->ids==0){}
		else{
			$idsx= $result[0]->ids;
		$this->db->query("update product_rating set flag='1' where id='$idsx'");
		}
		return $result;
	}
	
	public function usersuggest_m1($q)
	{
		$query=$this->db->query("select extra.u_name,extra.u_mobile,user.username,user.u_id,com.u_city 
from user_login user,user_extradetails extra,user_communication_details com  
where com.u_id=user.u_id and user.u_id=extra.u_id and extra.u_name like CONCAT('$q', '%') and type_flg='M'");
			
		$resu=$query->result();
			
		return $resu;
	
	}
	
	
	public function addphonetopin($pin,$mobileNo)
	{
		$query=$this->db->query("update pin_details set phone='$mobileNo' where pinnumber='$pin'");
		mysqli_next_result($this->db->conn_id);
	}
	
		public function deleteBinaryUser($user)
	{
		$query=$this->db->query("call sp_deleteBinaryUser('$user')");
		$resu=$query->result();
		return $resu;
	}
	
	
	public function activateBinaryUser($user)
	{
		
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		
		$freeuser=0;
		$query1=$this->db->query("select freeuser from user_login where u_id='$user'");
		mysqli_next_result($this->db->conn_id);
		$resu1=$query1->result();
		foreach($resu1 as $val){
			$freeuser=$val->freeuser;
		}
		if($freeuser==0){
			$query=$this->db->query("call sp_binaryactivate('$user','$date')");
			$resu=$query->result();
			return $resu;
		}
		else if($freeuser==1){
			$query=$this->db->query("update user_login set freeuser='1',activateuser='1',u_status='1',activated='1' where u_id='$user'");
			mysqli_next_result($this->db->conn_id);
			$query=$this->db->query("update user_extradetails set u_activatedate='$date' where u_id='$user'");
			return array(array("res"=>"1"));
		}
		else{
			return array(array("res"=>"0"));
		}
	}
	
	
	public function loadtableval()
	{
		$query=$this->db->query("select * from achiver");
		$resu=$query->result();
		return $resu;
	}
	public  function achinsert($name,$comment,$filename1)
	{
		//$query=$this->db->query("INSERT INTO achiver (name,comments,image) VALUES ('$name','$comment','$image')");
		$query=$this->db->query("INSERT INTO achiver (name,comments,image) VALUES ('$name','$comment','$filename1')");
	
		//return $query->result();
		return "success";
	}
	public function achupdate($name,$comment,$filename1,$ach_id)
	{
		//$query=$this->db->query("INSERT INTO achiver (name,comments,image) VALUES ('$name','$comment','$image')");
		if($filename1!="")
		{
			$query=$this->db->query("update achiver set name='$name',comments='$comment',image='$filename1' where id='$ach_id'");
			return "success";
		}
		else 
		{
			$query=$this->db->query("update achiver set name='$name',comments='$comment' where id='$ach_id'");
			return "success";
		}	
		
		//return $query->result();
		
	}
	public function loadtabledata($ach_id)
	{
		$query=$this->db->query("select * from achiver where id='$ach_id'");
		$resu=$query->result();
		return $resu;
	}
	public function deletedata($del_id)
	{
		$query=$this->db->query("delete from achiver where id='$del_id'");
		if($query==true)
		{
			return "success";
		}
		else
		{
			return "fail";
		}
		//$resu=$query->result();
		//return $resu;
	}
	
	public function upgradeBinaryUser($product)
	{
		$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
		$date=$dat->format('Y-m-d');
		$time=$dat->format('H:i:s');
		

		$query=$this->db->query("call sp_upgradeBinaryUser('$product','$date')");
		$resu=$query->result();
		return $resu;
	}

		
	public function viewpaylist($user,$date)
	{
		$query=$this->db->query("call sp_viewpaylist('$user','$date')");
		$resu=$query->result();
		return $resu;
	}
	
	public function getbinaryactprod($user)
	{
		$query=$this->db->query("select pd.product_id,pd.product_code, pd.product_price, pd.bv,upp.qty,upp.size,pd.pro_size from user_login ul,user_product_prefer upp,product_details pd
				where ul.activated='0' and upp.upgraded='0' and ul.u_id=upp.u_id and pd.product_id=upp.product_id and ul.u_id='$user'");
		$resu=$query->result();
		return $resu;
	}
	
	public function getproduct($pid)
	{
		$query=$this->db->query("select * from product_details where product_id='$pid'");
		$resu=$query->result();
		return $resu;
	}
	

	public function calculateBinaryProductsall($prodarray)
	{
		$tprice=0;$tbv=0;
		$arrlength = count($prodarray);
		$ptype="";
			foreach($prodarray as $rw){
				$id=$rw->pid;
				$qty=$rw->qty;
				$query=$this->db->query("select bv,product_price from product_details where product_id='$id'");
				mysqli_next_result($this->db->conn_id);
				$resu=$query->result();
				foreach($resu as $val){
					$tprice=$tprice+($qty*$val->product_price);
					$tbv=$tbv+($qty*$val->bv);
				}
				
				
		}
		return $tbv;
		//return array(array("price"=>$tprice,"bv"=>$tbv,"ptype"=>$ptype));
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
	
	public function removeuserproduct($useid)
	{
		$query=$this->db->query("DELETE user_product_prefer,order_comm_detail FROM user_product_prefer
						        INNER JOIN
						    order_comm_detail ON (order_comm_detail.po_id = user_product_prefer.user_product_id and order_comm_detail.type='1') 
						WHERE
						   user_product_prefer.u_id='$useid' 
						   and user_product_prefer.upgraded='0' 
						   and user_product_prefer.status='Ordered'");
		mysqli_next_result($this->db->conn_id);
	}
	
	public function usersuggest1($q)
	{
		$query=$this->db->query("call sp_loadusername1('$q')");
			
		$resu=$query->result();
			
		return $resu;
	
	}
	
	public function activateBinaryUserMsg($user,$result,$pbv)
	{

		if($result==1){
			mysqli_next_result($this->db->conn_id);
			$query=$this->db->query("select ue.u_mobile,ue.u_name,ul.username from user_extradetails ue, user_login ul where ul.u_id=ue.u_id and ul.u_id='$user' limit 1");
			$resu=$query->result();
			mysqli_next_result($this->db->conn_id);
			foreach($resu as $row1){
				$u_mobile=$row1->u_mobile;
				$u_name=$row1->u_name;
				$username=$row1->username;
				
				if($pbv==0 || $pbv==''){
					$actype='free account';
				}
				else{
					$actype="account worth $pbv BV";
				}
				$msg="Hi $u_name($username). Welcome to Anvy Business. Your $actype has been activated.";
				$msg=urlencode($msg);
				//echo $fullapiurl;
				$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$u_mobile&msg=$msg&port=TA";
				file_get_contents($fullapiurl);
			}
		}
	
	}
	
	public function setproduct($id,$flag)
	{
		if($flag==0){
			$query="update product_details set active='0' where product_id='$id'";
		}
		else{
			$query="update product_details set active='1' where product_id='$id'";
		}
		$res=$this->db->query($query);
		if($res==true)
		{
			return 'success';
		}
		else
		{
			return 'fail';
		}
	}
	
	public function changeToFreeUser($user)
	{
		$query=$this->db->query("update user_login set freeuser='1' where u_id='$user'");
		mysqli_next_result($this->db->conn_id);
		$query=$this->db->query("update user_child set freewallet='4950' where u_id='$user'");
	
	}
	
/*  Daily Achiever   */
	
	
	public function loaddailyachiever()
	{
	    $query=$this->db->query("select * from acheiver_daily");
	    $resu=$query->result();
	    return $resu;
	}
	public  function achdailyinsert($name,$income,$filename1)
	{
	    //$query=$this->db->query("INSERT INTO achiver (name,comments,image) VALUES ('$name','$comment','$image')");
	    $query=$this->db->query("INSERT INTO acheiver_daily (name,income,image) VALUES ('$name','$income','$filename1')");
	    
	    //return $query->result();
	    return "success";
	}
	public function achdailyupdate($name,$income,$filename1,$ach_id)
	{
	    //$query=$this->db->query("INSERT INTO achiver (name,comments,image) VALUES ('$name','$comment','$image')");
	    if($filename1!="")
	    {
	        $query=$this->db->query("update acheiver_daily set name='$name',income='$income',image='$filename1' where id='$ach_id'");
	        return "success";
	    }
	    else
	    {
	        $query=$this->db->query("update acheiver_daily set name='$name',income='$income' where id='$ach_id'");
	        return "success";
	    }
	    
	    //return $query->result();
	    
	}
	public function loadtabledatadaily($ach_id)
	{
	    $query=$this->db->query("select * from acheiver_daily where id='$ach_id'");
	    $resu=$query->result();
	    return $resu;
	}
	public function deletedatadaily($del_id)
	{
	    mysqli_next_result($this->db->conn_id);
	    $query=$this->db->query("delete from acheiver_daily where id='$del_id'");
	    if($query==true)
	    {
	        return "success";
	    }
	    else
	    {
	        return "fail";
	    }
	    //$resu=$query->result();
	    //return $resu;
	}
	
	
	
	/*  End    */
}
?>
