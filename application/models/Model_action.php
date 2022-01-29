<?php
class Model_action extends CI_Model
{

	
	public function getproducts($limit1,$limit2)
	{
		$query=$this->db->query("select * from product_details where active='1' order by product_id asc limit $limit1, $limit2");
		$resu=$query->result();
		return $resu;
	}
	
	public function getreproducts($limit1,$limit2,$id)
	{
		//echo $id;
		if($id==0)
		{
			$query=$this->db->query("select * from repurchase_product order by re_product_id desc limit $limit1, $limit2");
			
		}
		else
		{
			$query=$this->db->query("select * from repurchase_product where catid=$id order by re_product_id desc limit $limit1, $limit2");
			
		}
		$resu=$query->result();
		return $resu;
	}
	/*public function getreproducts($limit1,$limit2)
	{
		
		
	        $query=$this->db->query("select * from repurchase_product order by re_product_id desc limit $limit1, $limit2");
		
		$resu=$query->result();
		return $resu;
	}*/
	public function getproductsdetail($pd)
	{
		$query=$this->db->query("select * from product_details where product_id=$pd");
		$resu=$query->result();
		return $resu;
	}
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
	
	public function placeneworder($name,$address,$city,$state,$pin,$country,$refid,$prod,$type,$phone,$num,$size)
	{
                $dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $date=$dat->format('Y-m-d');
                $time=$dat->format('H:i:s');
		$query=$this->db->query("call sp_placeneworder('$name','$address','$city','$state','$pin','$country','$refid','$prod','$type','$phone','$date','$time','$num','$size')");
		$result=$query->result();
		return $result;
	}
	
	public function getreflogin($refid)
	{
		$query=$this->db->query("select u_id from user_login where u_referalid='$refid'");
		$result=$query->result();
		return $result;
	}
public function getpassword($user1,$mob1)
	{
		$query=$this->db->query("call sp_getpassword('$user1','$mob1')");
		$result=$query->result();
		return $result;
	}
	
	public function selectnewcategory($id)
	{
		//echo $id;
		if($id==0)
		{
			$query=$this->db->query("select count(re_product_id) as cnt from repurchase_product");
				
		}
		else
		{
			$query=$this->db->query("select count(re_product_id) as cnt from repurchase_product where catid='$id'");
		}
		$result=$query->result();
		return $result;
	}
	
	public function daily_acheivers()
	{
	    $query=$this->db->query("SELECT * FROM acheiver_daily");
	    $resu=$query->result();
	    return $resu;
	}
}
?>
