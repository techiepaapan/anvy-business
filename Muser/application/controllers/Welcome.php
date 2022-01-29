<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	
	
	public function index()
	{
		$base=substr((base_url()),0,-6);
		if(isset($_SESSION['uid1']))
		{//echo "yes";
		if(($_SESSION['uid1']=="")||($_SESSION['uid1']==null))
		{
			header("location:$base");
		}
		else {
			$this->load->view('index.php');
		}
		}
		else {
			header("location:$base");
		}
		
	}
	/*public function addpin()
	{
		$this->load->view('add-pin.php');
	}
	public function addproduct()
	{
		$this->load->view('add-product.php');
	}
	public function editproduct()
	{
		$this->load->view('edit-product.php');
		
	}
	public function settings()
	{
		$this->load->view('settings.php');
	
	}
	public function editpin()
	{
		$this->load->view('edit-pin.php');
	
	}
	public function adduser()
	{
		$this->load->view('add-user.php');
	
	}*/
	public function profile()
	{
		$this->load->view('profile.php');
	
	}
	public function activate()
	{
		$this->load->view('activate-user.php');
	
	}
	public function ewallet()
	{
		$this->load->view('ewallet.php');
	}
	public function changepassword()
	{
		$this->load->view('changepassword.php');
	
	}
	public function home()
	{
		$this->load->view('index.php');
	}
	public function adduser()
	{
		$this->load->view('add-user.php');
	
	}
	public function adduser1()
	{
		unset($_SESSION['t']);
		$_SESSION['t']=$_REQUEST['tree'];
		$array=array("result"=>1);
		echo json_encode($array);
		//echo "done = ".$_SESSION['t'];
	}
	
	public function log_action()
	{
		$user1=$_REQUEST['user'];
		$pass1=$_REQUEST['pass'];
		/*$user1='alfin1992';
		$pass1='alfin';*/
	
		$this->load->model('Model_action');
		$res=$this->Model_action->logmodel($user1,$pass1);
		foreach ($res as $results)
		{
			$result=$results->res;
			$id=$results->uid;
			$user=$results->userx;
			if($result==1)
			{
				$_SESSION['uid1']=$id;
				$_SESSION['pin1']=$pin;
				$_SESSION['user1']=$user;
			}
			//echo $_SESSION['uid']." ".$_SESSION['pin'];
		}
		echo json_encode($res);
	
	}
	public function logout()
	{
	
		$id=$_SESSION['uid1'];
		$pin=$_SESSION['pin1'];
		$this->load->model('Model_action');
		$res=$this->Model_action->logout($id,$pin);
unset($_SESSION["uid1"]);
				unset($_SESSION["pin1"]);
		$base=substr((base_url()),0,-6);
		header('location:'.$base.'welcome/logout');
	}
		
		
		
	public function addpin_action()
	{
		$pin=$_REQUEST['Pin_no'];
		$admin_id=$_REQUEST['Admin_id'];
		
		$this->load->model('Model_action');
		$res=$this->Model_action->addpin_action($pin,$admin_id);
		
		
		echo json_encode($res);
	}
	public function check_productname() {
		$bid1=$_REQUEST['bid1'];
		
		$this->load->model('Model_action');
	
		$row=$this->Model_action->check_productname($bid1);
	
		echo json_encode ($row);
	}
	public function EditProAction()
	{
		$msg='';
		$w=0;
		$productname=$_REQUEST['productname'];
		$prodesc=$_REQUEST['product_decription'];
		$proprice= $_REQUEST['productprice'];
		$id=$_REQUEST['productid'];
		//echo $id;
		$this->load->model('Model_action');
		
		$row=$this->Model_action->editproductclick($id,$productname,$prodesc,$proprice);
		//echo json_encode ($row);
		foreach ($row as $results)
		{
			$pid=$results->pro_id;
			$result=$results->result;
			//echo $result;
			if($result==1)
			{
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product_'.$pid.'.jpeg';
				$this->load->library ( 'upload', $config );
				$msg='';
				$w=0;
		
				if (! $this->upload->do_upload('newuserfile'))
				{
					// case - failure
					$msg='Product Updated. No New Image';
					$w=1;
					$p=$pid;
					$array=array("result"=>$msg,"w"=>$w,"p"=>$p);
					echo json_encode($array);
				}
		
				else {
		
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image($pid);
		
					$msg='Product Updated';
					$w=1;
					$p=$pid;
					//	$this->load->view( 'add_brand' );
					$array=array("result"=>$msg,"w"=>$w,"p"=>$p);
					echo json_encode($array);
				}
		
			}
		
			else
			{
				$msg='Product Not Exists';
				$w=0;
				$array=array("result"=>$msg,"w"=>$w);
				echo json_encode($array);
			}
		
		}
		
	}
	public function AddProAction() {
	
		$msg='';
		$w=0;
		$productname=$_REQUEST['productname'];
		$decription=$_REQUEST['product_decription'];
		$price= $_REQUEST['productprice'];

		
		$this->load->model('Model_action');
		
		$row = $this->Model_action->add_product($productname,$decription,$price);
		
		foreach ($row as $results)
		{
		
			$pid=$results->pro_id;
			$result=$results->result;
			//echo $result;
			if($result==1)
			{
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product_'.$pid.'.jpeg';
				$this->load->library ( 'upload', $config );
				$msg='';
				$w=0;
				
				if (! $this->upload->do_upload ('userfile'))
				{
					// case - failure
					$msg='New Product Uploaded. No Image';
					$w=1;
					$p=$pid;
					$array=array("result"=>$msg,"w"=>$w,"p"=>$p);
					echo json_encode($array);
				}
				
				else {
				
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image($pid);
				
					$msg='New Product & Image Uploaded';
					$w=1;
					$p=$pid;
					//	$this->load->view( 'add_brand' );
					$array=array("result"=>$msg,"w"=>$w,"p"=>$p);
					echo json_encode($array);
				}
				
				}
				
				else
				{
					$msg='Product Already Exists';
					$w=0;
					$array=array("result"=>$msg,"w"=>$w);
					echo json_encode($array);
				}
	
		}
	}
	public function loadproducts()
	{
		$this->load->model('Model_action');
		
		$row=$this->Model_action->loadproducts();
		
		echo json_encode ($row);
	}
	public function deleteproduct()
	{
		$id=$_REQUEST['id'];
		
		$this->load->model('Model_action');
		
		$row=$this->Model_action->deleteproduct($id);
		
		echo json_encode ($row);
		
	}
	public function editproductclick()
	{
		$id=$_REQUEST['id'];
		$productname=$_REQUEST['productname'];
		$prodesc=$_REQUEST['prodesc'];
		$proprice=$_REQUEST['proprice'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->editproductclick($id,$productname,$prodesc,$proprice);
		
		echo json_encode ($row);
	}
	public function suggest_action()
	{
		$this->load->model('Model_action');
		if (isset($_GET['term']))
		{
			$q = $_GET['term'];
			$res=$this->Model_action->suggest_model($q);
			echo json_encode($res);
	
		}
	}
	public function productdisplay()
	{
		$productid=$_REQUEST['productid'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->productdisplay($productid);
		
		echo json_encode ($row);
	}
	public function settingsinsert()
	{
		$scharge=$_REQUEST['Scharge'];
		$bvpoint=$_REQUEST['Bvpoint'];
		$bvamt=$_REQUEST['Bvamt'];
		$id=$_REQUEST['Adid'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->settingsinsert($scharge,$bvpoint,$bvamt,$id);
		
		echo json_encode ($row);
		
	}
	public function loadsettings()
	{
		$this->load->model('Model_action');
		
		$row=$this->Model_action->loadsettings();
		
		echo json_encode ($row);
		
	}
	public function searchpin()
	{
		$from=$_REQUEST['From'];
		$to=$_REQUEST['To'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->searchpin($from,$to);
		
		echo json_encode ($row);
		
	}
	public function editpinnumber()
	{
		$pin=$_REQUEST['Pin'];
		$id=$_REQUEST['Id'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->editpinnumber($pin,$id);
		
		echo json_encode ($row);
	}
	public function deletepin()
	{
		$id=$_REQUEST['id'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->deletepin($id);
		$data=array("result"=>$row);
		echo json_encode ($data);
	}
     public function chngepass()
	{
		$old=$_REQUEST['Oldpass'];
		$new=$_REQUEST['Newpass'];
		$id=$_SESSION['uid1'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->checkpass($old,$id);
		
		//echo json_encode ($row);
		foreach ($row as $results)
		{
			$result=$results->result;
			//echo $result;
			if($result==1)
			{
				$this->load->model('Model_action' );
				$row= $this->Model_action->chngepass($new,$id);
				//echo json_encode ($row);
				$msg='Password Changed Successfully';
				$w=1;
				//	$this->load->view( 'add_brand' );
				$array=array("result"=>$msg,"w"=>$w);
				echo json_encode($array); 
				
			}
		
			else
			{
				$msg='Invalid Password';
				$w=0;
				$array=array("result"=>$msg,"w"=>$w);
				echo json_encode($array);
			}  
		
		}
		
	}
	
	public function viewprofile()
	{
		
		$id=$_SESSION['uid1'];
		$pin=$_SESSION['pin1'];
		//echo $id." - ".$pin;
		$this->load->model('Model_action');
		$res=$this->Model_action->viewprofile($id,$pin);
		echo json_encode($res);
	}
	public function edituserprofile()
	{
		$fname=$_REQUEST['Fname'];
		$mail=$_REQUEST['mail'];
		$mobile=$_REQUEST['mobile'];
		$address=$_REQUEST['address'];
		$city=$_REQUEST['city'];
		$country=$_REQUEST['country'];
		$state=$_REQUEST['state'];
		$apin=$_REQUEST['apin'];
		$bank_name=$_REQUEST['bank_name'];
		$branch_name=$_REQUEST['branch_name'];
		$acnt_no=$_REQUEST['acnt_no'];
		$ifsc=$_REQUEST['ifsc'];
		$pan=$_REQUEST['pan'];
		$id=$_SESSION['uid1'];
		$pin=$_SESSION['pin1'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->edituserprofile($fname,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$branch_name,$id,$pin);
		echo json_encode ($row);
	}
	public function loadwallet()
	{
		$id=$_SESSION['uid1'];
		$pin=$_SESSION['pin1'];
		$from=$_REQUEST['from'];
		$to=$_REQUEST['to'];
		$this->load->model('Model_action');
		$row=$this->Model_action->loadwallet($id,$pin,$from,$to);
		echo json_encode ($row);
	}
	public function activates()
	{
		$id=$_SESSION['uid1'];
		$pin=$_SESSION['pin1'];
		$number=$_REQUEST['Pins'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->activates($id,$pin,$number);
		echo json_encode ($row);
	}
	public function checkpin()
	{
		$id=$_SESSION['uid1'];
		$pin=$_SESSION['pin1'];
		$number=$_REQUEST['number'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->checkpin($id,$pin,$number);
		echo json_encode ($row);
	}
	
	public function gettree()
	{
		$tree=$_REQUEST['tree'];
		$this->load->model('Model_action');
		$row=$this->Model_action->gettree($tree);
		echo json_encode ($row);
	}
	
	
	public function gettreedetails()
	{
		$id=$_REQUEST['id'];
		$this->load->model('Model_action');
		$row=$this->Model_action->gettreedetails($id);
		echo json_encode ($row);
	}

	public function checkavailabes()
	{
	
		$user=$_REQUEST['User'];
		$mail=$_REQUEST['Mail'];
		$mob=$_REQUEST['Mob'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->checkavailabes($user,$mail,$mob);
		echo json_encode ($row);
	}
	
	
	
	public function userloggedin()
	{
		$this->load->library('session');
		$_SESSION['uid1']=$_REQUEST['uid'];
		$_SESSION['pin1']=$_REQUEST['pin'];
		$_SESSION['user1']=$_REQUEST['name'];
		
		//echo $_SESSION['pin1'];
		header('location:'.base_url());
		
	
	}
	public function userloggedout()
	{
		$base=substr((base_url()),0,-6);
		if(isset($_SESSION["uid1"]))
		{
				unset($_SESSION["uid1"]);
				unset($_SESSION["pin1"]);
				unset($_SESSION["user1"]);
		}
		header('location:'.$base.'welcome/logout');
	}
public function loadpayoutwallet()
	{
		$id=$_SESSION['uid1'];
		$pin=$_SESSION['pin1'];
		$from=$_REQUEST['from'];
		$to=$_REQUEST['to'];
		$this->load->model('Model_action');
		$row=$this->Model_action->loadpayoutwallet($id,$pin,$from,$to);
	
		echo json_encode ($row);
	}
	public function check_referralid_username_parent()
	{
		$bid1=$_REQUEST['bid1'];
			$bid2=$_REQUEST['bid2'];
			$bid3=$_REQUEST['bid3'];
			$bid4=$_REQUEST['bid4'];
			$bid5=$_REQUEST['bid5'];
			$bid6=$_REQUEST['bid6'];
			$prodarray=json_decode($_REQUEST['p_code']);
			
			$bv=0;$pcode="";
			$this->load->model('Model_action');
			$row1=$this->Model_action->calculateBinaryProducts($prodarray);
			$row1=json_encode($row1);
			//echo $row1;
			$row1=json_decode($row1);
			foreach($row1 as $val1){
				$bv=$val1->bv;
				$pcode=$val1->ptype;
			}
			$row=$this->Model_action->check_referralid_username_parent($bid1,$bid2,$bid3,$bid4,$bid5,$bid6,$pcode,$bv);
			echo json_encode ($row);
	}
	
	
	
	public function addusers()
	{
		$pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
			
		for($i=0; $i < 7; $i++) {
			$key .= $pool[mt_rand(0, count($pool) - 1)];
		}
		$key=strtoupper($key);
		
		$user='nouser';
		$password=$key;
		$fname=$_REQUEST['Fname'];
		$father=$_REQUEST['Father'];
		$gender=$_REQUEST['gender'];
		$dob=$_REQUEST['dob'];
		$mail=$_REQUEST['mail'];
		$mobile=$_REQUEST['mobile'];
		$address=$_REQUEST['address'];
		$city=$_REQUEST['city'];
		$country=$_REQUEST['country'];
		$state=$_REQUEST['state'];
		$apin=$_REQUEST['apin'];
		$bank_name=$_REQUEST['bank_name'];
		$branch_name=$_REQUEST['branch_name'];
		$acnt_no=$_REQUEST['acnt_no'];
		$ifsc=$_REQUEST['ifsc'];
		$pan=$_REQUEST['pan'];
		$nominee_name=$_REQUEST['nominee_name'];
		$relations=$_REQUEST['relation'];
		$age=0;
		$add=$_REQUEST['Added'];
		$parent=$_REQUEST['Parent'];
		$referal=$_REQUEST['Referal'];
		$pos=$_REQUEST['Pos'];
		$code=json_decode($_REQUEST['code']);
		$useid="";$res=0;$msg="Failed";
		$nuname="";
		
		$userType='';
		$arrlength = count($code);
		if($arrlength>0){
		foreach($code as $rs){
			if($rs->id=='free'){
			$userType='free';
			}
		}
		
		$this->load->model('Model_action');
		
		$row=$this->Model_action->addusers($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$parent,$referal,$pos,$userType);

		foreach($row as $result)
		{
			$useid=$result->user_id;
			$res=$result->res;
			$msg=$result->msg;
			$nuname=$result->nuname;
		}
		if($res==1)
		{
			foreach($code as $rs){
				if($rs->id!='free'){
					$pid=$rs->id;
					$qty=$rs->qty;
					$size=$rs->size;
					$rowx=$this->Model_action->insertBinaryUserProducts($useid,$pid,$qty,$size);
				}
			}
		}


		if($res==1){
				$mobileNo=$mobile;
				$uname=$nuname;
				$pwd=$password;
				$msgx="Thank%20you%20for%20joining%20Anvy%20Business.%20Your%20User%20Name:".$uname."%20%20Password:".$pwd."%20%20%20Please%20keep%20it%20for%20further%20references.%20Visit%20www.anvybusiness.com";
				//echo $fullapiurl;
				$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mobileNo&msg=$msgx&port=TA";
				file_get_contents($fullapiurl);
			}
		}
		else{
			$msg="Unknown error with product(s)";
		}
		echo json_encode (array(array("res"=>$res,"msg"=>$msg,"user_id"=>$useid,"UID"=>$nuname)));
	}	


public function sendSMS()
	{
		$mobileNo=$_REQUEST['mobile'];
		$uname=$_REQUEST['uname'];
		$pwd=$_REQUEST['pwd'];
		
		$msg="Thank%20you%20for%20joining%20Anvy%20Business.%20Your%20User%20Name:".$uname."%20%20Password:".$pwd."%20%20Please%20keep%20it%20for%20further%20references.%20Visit%20www.anvybusiness.com";
		$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mobileNo&msg=$msg&port=TA";
		//echo $fullapiurl;
		file_get_contents($fullapiurl);
		$narray=array();
		array_push($narray, array("stat"=>"1"));
		echo json_encode ($narray);
				
	}



	public function teamView()
	{
		$this->load->view('teamView.php');
	
	}
	public function support()
	{
		$this->load->view('support.php');
	
	}	
	public function directSalesIncentive()
	{
		$this->load->view('direct_sales_incentive.php');
	
	}	
	public function teamSalesIncentive()
	{
		$this->load->view('team_sales_incentive.php');
	
	}	
	public function leadersSuccessIncentive()
	{
		$this->load->view('leaders_success_incentive.php');
	
	}	
	public function myIncome()
	{
		$this->load->view('myIncome.php');
	
	}	
	public function directMembers()
	{
		$this->load->view('directMembers.php');
	
	}	
	public function downlineList()
	{
		$this->load->view('downlineList.php');
	
	}	
	
	
	public function businessTools()
	{
		$this->load->view('businessTools.php');
	
	}
	
	
	public function getuserID()
	{
		$id=$_SESSION['uid1'];
		$getid=$_REQUEST['id'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->getuserID($id,$getid);
		echo json_encode ($row);
	}
	
	
	public function getUserByPosition()
	{
		$id=$_SESSION['uid1'];
		$pos=$_REQUEST['pos'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->getUserByPosition($id,$pos);
		echo json_encode ($row);
	}
	
	
	public function getDSI()
	{
		$id=$_SESSION['uid1'];
		$from=$_REQUEST['from'];
		$to=$_REQUEST['to'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->getDSI($id,$from,$to);
		echo json_encode ($row);
	}
	
	
	public function getLSI()
	{
		$id=$_SESSION['uid1'];
		$from=$_REQUEST['from'];
		$to=$_REQUEST['to'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->getLSI($id,$from,$to);
		echo json_encode ($row);
	}
	
		
	public function getTSI()
	{
		$id=$_SESSION['uid1'];
		$from=$_REQUEST['from'];
		$to=$_REQUEST['to'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->getTSI($id,$from,$to);
		echo json_encode ($row);
	}
	
	public function getMI()
	{
		$id=$_SESSION['uid1'];
		$from=$_REQUEST['from'];
		$to=$_REQUEST['to'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->getMI($id,$from,$to);
		echo json_encode ($row);
	}
	
	
	
	
	public function imgupload() {
	
		$msg='';
		$w=0;
		$id=$_SESSION['uid1'];
	
		//$image_path = $this->upload->data ();
		$file_name = "profile_".$id.".jpeg";
		// $upload_data = $this->upload->data();
	

	
		$config ['upload_path'] = './images/profile/';
		$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
		$config ['overwrite'] = TRUE;
		$config ['remove_spaces'] = TRUE;
		$config ['file_name'] = $file_name;
	
		$this->load->library ( 'upload', $config );
	
	
		if (! $this->upload->do_upload ( 'photo' )) {
			// case - failure
			$msg='Image Not Uploaded!!!';
			$w=0;
			$array=array("result"=>$msg,"w"=>$w);
			echo json_encode($array);
		}
	
		else {
	
			$image_path = $this->upload->data();
			$msg='Image Uploaded';
			$this->load->model('Model_action');
			$row=$this->Model_action->imgupload($id,$file_name);
			$w=1;
	
			//	$this->load->view( 'add_brand' );
			$array=array("result"=>$msg,"w"=>$w,"img"=>$file_name);
			echo json_encode($array);
		}
	
	
	}
	
	public function createTicket()
	{
		$id=$_SESSION['uid1'];
		$msg=$_REQUEST['msg'];
		$sub=$_REQUEST['sub'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->createTicket($id,$msg,$sub);
		echo json_encode ($row);
	}
	
	
	public function getAllMsg()
	{
		$id=$_REQUEST['id'];
		$flag=0;
		$this->load->model('Model_action');
		$row=$this->Model_action->getMsg($id,$flag);
		echo json_encode ($row);
	}
	
	

	public function insertChat()
	{
		$id=$_REQUEST['id'];
		$chat=$_REQUEST['chat'];
		$this->load->model('Model_action');
		$row=$this->Model_action->insertChat($id,$chat);
		echo json_encode ($row);
	}
	
	public function getMsg()
	{
		$id=$_REQUEST['id'];
		$flag=1;
		$this->load->model('Model_action');
		$row=$this->Model_action->getMsg($id,$flag);
		echo json_encode ($row);
	}
	
	
	public function getMsgNotify()
	{
		$id=$_SESSION['uid1'];
		$this->load->model('Model_action');
		$row=$this->Model_action->getMsgNotify($id);
		echo json_encode ($row);
	}
	
	
	
		
	public function downloaduser()
	{
		$jo['fix']=[];
		$html=$this->load->view('downloaduser.php',$jo,true);
		$pdfFilePath = "mass_venture".time().".pdf";
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->AddPage('', // L - landscape, P - portrait
				'', '', '', '',
				2, // margin_left
				2, // margin right
				8, // margin top
				5, // margin bottom
				0, // margin header
				0); // margin footer
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath, "I");
	
	}
	
	public function calculateBinaryProducts()
	{
		$prodarray=json_decode($_REQUEST['products']);
		$this->load->model('Model_action');
		$row=$this->Model_action->calculateBinaryProducts($prodarray);
		echo json_encode ($row);
	}

		public function upgradeuser()
	{
		$this->load->view('upgradeuser.php');
	
	}
	
	public function upgradeuser_products()
	{
		$product=json_decode($_REQUEST['product']);
		$useid=$_SESSION['uid1'];
		$arrlength = count($product);

		list($msec, $sec) = explode(' ', microtime());

		$time_milli = $sec.substr($msec, 2, 3); // '1491536422147'
		$time_micro = $sec.substr($msec, 2, 6);
		$timestamp=$time_micro;
		if($arrlength>0 && $product[0]!='free'){
					for($x = 0; $x < count($product); $x++) {
						$pid=$product[$x];
						$this->load->model('Model_action');
						$rowx=$this->Model_action->upgradeuser_products($useid,$pid,$timestamp);
					}
				}
		echo json_encode (array(array("res"=>1)));
	}
	
	
	public function calculateBinaryProductsall()
	{
		$prodarray=json_decode($_REQUEST['products']);
		$this->load->model('Model_action');
		$row=$this->Model_action->calculateBinaryProductsall($prodarray);
		echo json_encode ($row);
	}
	public function getSponserName_limit()
	{
		$value=$_REQUEST['value'];
		$this->load->model('Model_action');
		$row=$this->Model_action->getSponserName_limit($value);
		echo json_encode ($row);
	}
	
	/*public function userBill()
	{
	    $jo['fix']=[];
	    $html=$this->load->view('userBill.php',$jo,true);
	    $pdfFilePath = "mass_venture".time().".pdf";
	    $this->load->library('m_pdf');
	    $this->m_pdf->pdf->AddPage('', // L - landscape, P - portrait
	        '', '', '', '',
	        1, // margin_left
	        1, // margin right
	        8, // margin top
	        5, // margin bottom
	        0, // margin header
	        0); // margin footer
	        $this->m_pdf->pdf->WriteHTML($html);
	        $this->m_pdf->pdf->Output($pdfFilePath, "I");
	}*/
		
}
?>