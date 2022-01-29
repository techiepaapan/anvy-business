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
	public function index()
	{
		$this->load->view('index.php');
	}
	public function addpin()
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
	
	}
	public function changepassword()
	{
		$this->load->view('change-password.php');
	
	}
	
	public function payout()
	{
		$this->load->view('payout.php');
	
	}
	public function reprint()
	{
		$this->load->view('reprint.php');
	
	}
	
	public function addcat()
	{
		$this->load->view('add_category.php');
	
	}
	
	public function editcat()
	{
		$this->load->view('edit_category.php');
	
	}
	
	public function login()
	{
if(isset($_SESSION["uid"]))
		{
			unset($_SESSION["uid"]);
		}
		$this->load->view('login.php');
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
		$productbv= $_REQUEST['productbv'];
		$quantity= $_REQUEST['quantity'];
		$discounted_price= $_REQUEST['discounted_price'];
		$code=$_REQUEST['code'];
		$id=$_REQUEST['productid'];
		//echo $id;
		$size=$_REQUEST['size'];
		$cgst= $_REQUEST['cgst'];
		$sgst= $_REQUEST['sgst'];
		$igst= $_REQUEST['igst'];
		//echo $id;
		$this->load->model('Model_action');
		
		$row=$this->Model_action->editproductclick($id,$productname,$prodesc,$proprice,$code,$quantity,
		    $discounted_price,$productbv,$size,$cgst,$sgst,$igst);
		
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
				$this->upload->initialize($config);
				//echo json_encode($config);
				//if(!file_exists($_FILES['newuserfile']['tmp_name'][0])) {echo "No Image";}else{echo "Image";}
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
		$productbv= $_REQUEST['productbv'];
		$quantity= $_REQUEST['quantity'];
		$discounted_price= $_REQUEST['discounted_price'];
		$p_code= $_REQUEST['p_code'];
		$size= $_REQUEST['size'];
		$cgst= $_REQUEST['cgst'];
		$sgst= $_REQUEST['sgst'];
		$igst= $_REQUEST['igst'];
		
		$this->load->model('Model_action');
		
		$row = $this->Model_action->add_product($productname,$decription,$price,$productbv,
		    $p_code,$quantity,$discounted_price,$size,$cgst,$sgst,$igst);
		
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
				$this->upload->initialize($config);
				if (! $this->upload->do_upload ('userfile'))
				{
					// case - failure
					$msg='New Product Uploaded. No Image';
					$w=1;
					$array=array("result"=>$msg,"w"=>$w,"p"=>$pid);
					echo json_encode($array);
				}
				
				else {
				
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image($pid);
				
					$msg='New Product & Image Uploaded';
					$w=1;
					//	$this->load->view( 'add_brand' );
					$array=array("result"=>$msg,"w"=>$w,"p"=>$pid);
					echo json_encode($array);
				}
				
				}
				
				else
				{
					$msg='Product/Code Already Exists';
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
	public function usersuggest()
	{
		$this->load->model('Model_action');
		if (isset($_GET['term']))
		{
			$q = $_GET['term'];
			$res=$this->Model_action->usersuggest($q);
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
		$id=$_REQUEST['id'];
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
	
	public function checkavailabe()
	{
		
		$user=$_REQUEST['User'];
		$code=$_REQUEST['Product'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->checkavailabe($user,$code);
		echo json_encode ($row);
	}
	
	public function checkreferal()
	{
	
		$refer=$_REQUEST['Referal'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->checkreferal($refer);
		echo json_encode ($row);
	}
	
	/*public function addfirstuser()
	{
		$user=$_REQUEST['User'];
		$password=$_REQUEST['password'];
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
		$age=$_REQUEST['age'];
		$add=$_REQUEST['Added'];
		$code=$_REQUEST['code'];
		
		$this->load->model('Model_action');
		
		$row=$this->Model_action->addfirstuser($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$code);
		echo json_encode ($row);
		
		
	}*/
	public function checkparentid()
	{
		$parent=$_REQUEST['Parentid'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->checkparentid($parent);
		echo json_encode ($row);
		
	}
	/*public function addusers()
	{
		$user=$_REQUEST['User'];
		$password=$_REQUEST['password'];
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
		$age=$_REQUEST['age'];
		$add=$_REQUEST['Added'];
		$parent=$_REQUEST['Parent'];
		$referal=$_REQUEST['Referal'];
		$pos=$_REQUEST['Pos'];
		$code=$_REQUEST['code'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->addusers($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$parent,$referal,$pos,$code);
		echo json_encode ($row);
	}*/
	public function loadPin()
	{
		$this->load->model('Model_action');
		
		$row=$this->Model_action->loadPin();
		echo json_encode ($row);
	}
	public function loadprocode()
	{
		$this->load->model('Model_action');
		
		$row=$this->Model_action->loadprocode();
		echo json_encode ($row);
		
	}
	
	public function activateuser()
	{
		$id=$_REQUEST['Id'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->activateuser($id);
		
		echo json_encode ($row);
	}
	public function deactivateuser()
	{
		$id=$_REQUEST['Id'];
		$this->load->model('Model_action');
	
		$row=$this->Model_action->deactivateuser($id);
	
		echo json_encode ($row);
	}
	public function editusers()
	{
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
		$age=$_REQUEST['age'];
		$id=$_REQUEST['Id'];
		$maxbv=$_REQUEST['maxbv'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->editusers($fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$branch_name,$id,$maxbv);
		echo json_encode ($row);
	}
	public function loadpay()
	{
		
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
		
		$row=$this->Model_action->loadpay($id,$pin);
		
		echo json_encode ($row);
	}
	public function payout_action()
	{
		$id=1;
		$pin=2345;
		$pay=$_REQUEST['Pay'];
		$tot=$_REQUEST['Total'];
		$len=$_REQUEST['Len'];
		$array=json_decode($pay);
		$narray=array();
		$this->load->model('Model_action');
		$row=$this->Model_action->payout_action($id,$pin,$tot,$len);
		foreach($row as $result)
		{
			$mid=$result->mid;
		}
		if($mid!="")
		{
			//$sql="";$flgpc=0;
			foreach ($array as $value)
			{
				$uid= $value->userid;
				$ded= $value->ded;
				$dep= $value->dep;
				$amt= $value->amt;
				
				$this->load->model ( 'Model_action' );
				$row1 = $this->Model_action->payotuser($uid,$amt,$mid,$id,$dep,$ded);
			}
			$stat="success";
		}
		else 
		{
			$stat="fail";
		}
		array_push($narray, array("stat"=>$stat,"mid"=>$mid));
		echo json_encode ($narray);
	}
	public function loadreprint()
	{
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
		$row=$this->Model_action->loadreprint($id,$pin);
		echo json_encode ($row);
	}
	public function rebill()
	{
		//$this->load->view('Rebill.php');
		
		$pmid=$_REQUEST['pmid'];
		$jo['fix']=$pmid;
		//$this->m_pdf->pdf->Output(FCPATH.'exchange/'.$pdfFilePath,"F");
		
		
		$html=$this->load->view('Rebill.php',$jo,true);
		$pdfFilePath = "mass_venture.pdf";
		//load mPDF library
		$this->load->library('m_pdf');
		//generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($html);
		//download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "I");
	}
	public function reprintsrch()
	{
		$id=1;
		$pin=2345;
		$from=$_REQUEST['From'];
		$to=$_REQUEST['To'];
		$this->load->model('Model_action');
		$row=$this->Model_action->reprintsrch($id,$pin,$from,$to);
		echo json_encode ($row);
	}
	public function neworder()
	{
		$this->load->view('new-order.php');
	}
	public function oldorder()
	{
		$this->load->view('old-order.php');
	}
	
	public function loadorder()
	{
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
		$row=$this->Model_action->loadorder($id,$pin);
		echo json_encode ($row);
	}
	public function pload()
	{
		$id=1;
		$pin=2345;
		$p_code=$_REQUEST['p_code'];
		$this->load->model('Model_action');
		$row=$this->Model_action->pload($id,$pin,$p_code);
		echo json_encode ($row);
	}
	public function processorder()
	{
		$id=1;
		$pin=2345;
		$arrays=$_REQUEST['orderary'];
		$narray=array();
		$arrayy=json_decode($arrays);
		
		$this->load->model('Model_action');
		$row=$this->Model_action->checkid($id,$pin);
		//echo json_encode ($row);
		
		foreach($row as $result)
		{
			$mid=$result->res;
		}
		if($mid==1)
		{
			foreach ($arrayy as $value)
			{
				$uid= $value->o;
				
				$this->load->model ( 'Model_action' );
				$row1 = $this->Model_action->processorder($uid);
			}
			$stat="success";
		}
		else
		{
			$stat="fail";
		}
		array_push($narray, array("stat"=>$stat));
		echo json_encode ($narray);
	}
	
	public function re_add()
	{
		$this->load->view('repurchase-add-product.php');
	}
	public function re_edit()
	{
		$this->load->view('repurchase-edit-product.php');
	}
	
	public function AddReProAction()
	{
		$msg='';
		$w=0;
		$productname=$_REQUEST['productname'];
		$pcat=$_REQUEST['pcat'];
		$decription=$_REQUEST['product_decription'];
		$price= $_REQUEST['productprice'];
		$quantity= $_REQUEST['quantity'];
		$discounted_price= $_REQUEST['discounted_price'];
		$delivery_charge= $_REQUEST['delivery_charge'];
		$p_code= $_REQUEST['p_code'];
		$commission= $_REQUEST['commission'];
		//echo json_encode ($array);
		$array= $_REQUEST['sizearray'];
		$narray=array();
		$arrayy=json_decode($array);
		$this->load->model('Model_action');
		
		$row = $this->Model_action->add_reproduct($productname,$decription,$price,$p_code,$quantity,$discounted_price,$pcat,$delivery_charge,$commission);
		
		foreach ($row as $results)
		{
		
			$pid=$results->pro_id;
			$result=$results->result;
			//echo $result;
			
			if($result=='1')
			{
				foreach ($arrayy as $value)
				{
					$uid= $value->size;
				
					$this->load->model ( 'Model_action' );
					$row1 = $this->Model_action->insertsize($uid,$pid);
				}
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_1.jpeg';
				$this->load->library ( 'upload', $config );
				$this->upload->initialize($config);
				$msg='';
				$w=1;
				$array=array("w"=>$w);
				
				if ($this->upload->do_upload ('userfile1'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image1($pid);
					$w++;
					$array["w"]=$w;
				}
				
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_2.jpeg';
				$this->load->library ( 'upload', $config );
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload ('userfile2'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image2($pid);
					$w++;
					$array["w"]=$w;
				}
				
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_3.jpeg';
				$this->load->library ( 'upload', $config );
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload ('userfile3'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image3($pid);
					$w++;
					$array["w"]=$w;
					
				}
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_4.jpeg';
				$this->load->library ( 'upload', $config );
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload ('userfile4'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image4($pid);
					$w++;
					$array["w"]=$w;
						
				}
				
				
				echo json_encode($array);
			}
		
			else
			{
				$msg='Product/Code Already Exists';
				$w=0;
				$array=array("result"=>$msg,"w"=>$w);
				echo json_encode($array);
			}
		
		}
	}
	public function re_ordernew()
	{
		$this->load->view('repurchase_new_order.php');
	}
	public function re_orderold()
	{
		$this->load->view('repurchase_old_order.php');
	}
	public function loadreproducts()
	{
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
		
		$row=$this->Model_action->loadreproducts($id,$pin);
		
		echo json_encode ($row);
	}
	public function suggestrepro_action()
	{
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
		if (isset($_GET['term']))
		{
			$q = $_GET['term'];
			$res=$this->Model_action->suggestrepro_action($q,$id,$pin);
			echo json_encode($res);
		
		}
		
	}
	public function reproductdisplay()
	{
		$id=1;
		$pin=2345;
		$productid=$_REQUEST['productid'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->reproductdisplay($productid,$id,$pin);
		
		echo json_encode ($row);
	}
	public function deletereproduct()
	{
		$ids=$_REQUEST['id'];
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
	
		$row=$this->Model_action->deletereproduct($ids,$id,$pin);
	
		echo json_encode ($row);
	
	}
	public function EditRePro()
	{
		$msg='';
		$w=0;
		$id=1;
		$pin=2345;
		$productname=$_REQUEST['productname'];
		$prodesc=$_REQUEST['product_decription'];
		$proprice= $_REQUEST['productprice'];
		$quantity= $_REQUEST['quantity'];
		$catid=$_REQUEST['pcat'];
		$discounted_price= $_REQUEST['discounted_price'];
		$code=$_REQUEST['code'];
		$ids=$_REQUEST['productid'];
		$delivery_charge= $_REQUEST['delivery_charge'];
		$commission= $_REQUEST['commission'];
		//echo $id;
		$this->load->model('Model_action');
		$array= $_REQUEST['sizearray'];
		//$narray=array();
		$arrayy=json_decode($array);
		$row=$this->Model_action->reproedit($ids,$productname,$prodesc,$proprice,$code,$quantity,$discounted_price,$id,$pin,$catid,$delivery_charge,$commission);
		//echo json_encode ($row);
		foreach ($row as $results)
		{
			$pid=$results->pro_id;
			$result=$results->result;
			//echo $result;
			if($result==1)
			{
				
				foreach ($arrayy as $value)
				{
					$uid= $value->size;
					$sid= $value->sid;
				
					$this->load->model ( 'Model_action' );
					$row1 = $this->Model_action->updateReSize($uid,$pid,$sid);
				}
				
				
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_1.jpeg';
				$this->load->library ( 'upload', $config );
				$this->upload->initialize($config);
				$msg='';
				$w=1;
				$msg='Product Added';
				$array=array("w"=>$w,"result"=>$msg);
				
				if ($this->upload->do_upload ('userfile1'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image1($pid);
					$w++;
					$array["w"]=$w;
				}
				
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_2.jpeg';
				$this->load->library ( 'upload', $config );
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload ('userfile2'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image2($pid);
					$w++;
					$array["w"]=$w;
				}
				
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_3.jpeg';
				$this->load->library ( 'upload', $config );
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload ('userfile3'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image3($pid);
					$w++;
					$array["w"]=$w;
						
				}
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
				//$config ['max_size'] = '4000';
				$config ['max_width'] = '';
				$config ['max_height'] = '';
				$config ['overwrite'] = TRUE;
				$config ['remove_spaces'] = TRUE;
				$config['file_name'] = 'product1_'.$pid.'_4.jpeg';
				$this->load->library ( 'upload', $config );
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload ('userfile4'))
				{
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->change_product_image4($pid);
					$w++;
					$array["w"]=$w;
				
				}
				echo json_encode($array);
		
			}
			else if($result==2)
			{
				$msg='Product Not Exists';
				$w=0;
				$array=array("result"=>$msg,"w"=>$w);
				echo json_encode($array);
			}
			else
			{
				$msg='Invalid Admin';
				$w=0;
				$array=array("result"=>$msg,"w"=>$w);
				echo json_encode($array);
				
			}
		
		}
	}
	public function loadreprocode()
	{
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
		
		$row=$this->Model_action->loadreprocode($id,$pin);
		echo json_encode ($row);
	}
	
	
	
	public function load_nworder()
	{
		$id=1;
		$pin=2345;
		$this->load->model('Model_action');
		
		$row=$this->Model_action->load_nworder($id,$pin);
		echo json_encode ($row);
	}
	
	public function load_oldorder()
	{
		$id=1;
		$pin=2345;
		$from=$_REQUEST['from'];
		$to=$_REQUEST['to'];
		$stat=$_REQUEST['stat'];
		$this->load->model('Model_action');
		
		$row=$this->Model_action->load_oldorder($id,$pin,$from,$to,$stat);
		echo json_encode ($row);
	}
	
	
	public function mark_orders()
	{
		$id=1;
		$pin=2345;
		$val=$_REQUEST['val'];
		$poid=$_REQUEST['oid'];
		$array1 = json_decode($poid);
		foreach ($array1 as $array)
		{
		
			$oid=$array->oid;
			$this->load->model('Model_action');
			$row=$this->Model_action->mark_orders($id,$pin,$val,$oid);			
		}
		$narray=array();
		array_push($narray, array("stat"=>"Selected Orders Mardked As '$val'"));
		echo json_encode ($narray);
	}
	
	public function getlogin()
	{
		$user1=$_REQUEST['user'];
		$pass1=$_REQUEST['pwd'];
	//echo $user1." - ".$pass1;
		$this->load->model('Model_action');
		$res=$this->Model_action->logmodel($user1,$pass1);

		foreach ($res as $results)
		{
			$result=$results->res;
			$id=$results->uid;
			if($result==1)
			{
				$_SESSION['uid']=$id;
			}
                        //echo $id;
			//echo $_SESSION['uid'];
		}
		echo json_encode($res);
	
	}
	
	public function logout()
	{
	
		$id=$_SESSION['uid'];
		/*$pin=$_SESSION['pin'];
		$this->load->model('Model_action');
		$res=$this->Model_action->logout($id,$pin);*/
	
		unset($_SESSION["uid"]);
			
		?>
			    <script>
				window.location.href="<?php echo base_url();?>";
			</script>
			 <?php 
	
		}
		
		public function repurchsesettings()
		{
			$l1=$_REQUEST['l1'];
			$l2=$_REQUEST['l2'];
			$l3=$_REQUEST['l3'];
			$l4=$_REQUEST['l4'];
			$l5=$_REQUEST['l5'];
			$l6=$_REQUEST['l6'];
			$l7=$_REQUEST['l7'];
			$l8=$_REQUEST['l8'];
			$l9=$_REQUEST['l9'];
			$l10=$_REQUEST['l10'];
			$levelid=$_REQUEST['levelid'];
			
			$this->load->model('Model_action');
			$row=$this->Model_action->repurchsesettings($l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$levelid);
			echo json_encode ($row);
		}
		
		
public function trackorder()
		{
			//$this->load->view('Rebill.php');
		
			$pmid=$_REQUEST['pmid'];
			$jo['fix']=$pmid;
			
			 $html=$this->load->view('trackorder.php',$jo,true);
			 $pdfFilePath = "mass_venture.pdf";
			//load mPDF library
			$this->load->library('m_pdf');
			//generate the PDF from the given html
			$this->m_pdf->pdf->WriteHTML($html);
			//download it.
			$this->m_pdf->pdf->Output($pdfFilePath, "I"); 
		}
public function viewusers()
		{
			$this->load->model('Model_action');
			$row=$this->Model_action->viewusers();
			echo json_encode ($row);
		}
		public function userdisplay()
		{
			$userid=$_REQUEST['userid'];
			$from=$_REQUEST['From'];
			$to=$_REQUEST['To'];
			$this->load->model('Model_action');
		
			$row=$this->Model_action->userdisplay($userid,$from,$to);
		
			echo json_encode ($row);
		
		}
		public function edits()
		{
			$this->load->view('edit-user.php');
		
		}
		public function edituser()
		{
			$this->load->view('viewuser.php');
		
		}
public function genpin_action()
		{
			$val=$_REQUEST['option'];
			$i=0;
			$arrys=array();
			$this->load->model('Model_action');
			for($i=0;$i<$val;$i++)
			{
				
				$row=$this->Model_action->genpin_action();
				
				$row_array['current_mills']=($row[0]->current_mills).rand(1000,9999);
				//echo $row_array['current_mills'];
				array_push($arrys,$row_array); 
				usleep(1000);
			}
			
			echo json_encode ($arrys);
		}
		public function addpin_action()
		{
			$array=$_REQUEST['Pin_no'];
			$admin_id=$_SESSION['uid'];
			$hod=json_decode($array);
				
			$query="";
			foreach($hod as $rows)
			{
				$pin=$rows->pinum;
				$tp=$rows->tp;
				$bv=$rows->bv;
				$this->load->model('Model_action');
				$res=$this->Model_action->addpin_action($pin,$admin_id,$tp,$bv);
			}
			echo json_encode($res);
		}
public function addfirstuser()
		{
			$user=$_REQUEST['User'];
			$password=$_REQUEST['password'];
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
			$age=$_REQUEST['age'];
			$add=$_REQUEST['Added'];
			$code=$_REQUEST['code'];
		
			$this->load->model('Model_action');
		
			$row=$this->Model_action->addfirstuser($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$code);
			$narray=array();
			foreach($row as $result)
			{
				$useid=$result->user_id;
			}	
			if($useid!="")
		        {
			
				$this->load->model ( 'Model_action' );
				$row2 = $this->Model_action->activate1($useid);
			    $stat="success";
			}
		
			else {$stat="fail";}
			array_push($narray, array("stat"=>$stat,"user_id"=>$useid));
			echo json_encode ($narray);
		
		
		}
		public function addusers()
		{
			$user=$_REQUEST['User'];
			$password=$_REQUEST['password'];
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
			$age=$_REQUEST['age'];
			$add=$_REQUEST['Added'];
			$parent=$_REQUEST['Parent'];
			$referal=$_REQUEST['Referal'];
			$pos=$_REQUEST['Pos'];
			$code=$_REQUEST['code'];
			$this->load->model('Model_action');
		
			$row=$this->Model_action->addusers($user,$password,$fname,$father,$gender,$dob,$mail,$mobile,$address,$city,$country,$state,$apin,$bank_name,$acnt_no,$ifsc,$pan,$nominee_name,$relations,$age,$add,$branch_name,$parent,$referal,$pos,$code);
			$narray=array();
			foreach($row as $result)
			{
				$useid=$result->user_id;
			}	
			if(($useid!="")&&($code!="free"))
		    {
			
				$this->load->model('Model_action' );
				$row2 = $this->Model_action->activate1($useid);
			    $stat="success";


			}
else if($useid!="")
{
$stat="success";
}
		
			else {$stat="fail";}

if($useid=="" || $useid==null){}
			else
			{
				$mobileNo=$mobile;
				$uname=$user;
				$pwd=$password;
				$msg="Thank%20you%20for%20joining%20Anvy%20Business.%20Your%20User%20Name:".$uname."%20%20Password:".$pwd."%20%20Please%20keep%20it%20for%20further%20references.%20Visit%20www.anvybusiness.com";
				//echo $fullapiurl;
				$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mobileNo&msg=$msg&port=TA";
				file_get_contents($fullapiurl);
			}
			array_push($narray, array("stat"=>$stat,"user_id"=>$useid));
			echo json_encode ($narray);
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
		public function check_referralid_username_parent()
		{
			$bid1=$_REQUEST['bid1'];
			$bid2=$_REQUEST['bid2'];
			$bid3=$_REQUEST['bid3'];
			$bid4=$_REQUEST['bid4'];
			$bid5=$_REQUEST['bid5'];
			$this->load->model('Model_action');
		
			$row=$this->Model_action->check_referralid_username_parent($bid1,$bid2,$bid3,$bid4,$bid5);
			echo json_encode ($row);
		
		}
public function repurchasebonus()
		{
			$this->load->model('Model_action');
			
			$row=$this->Model_action->repurchasebonus();
			echo json_encode ($row);
		}

		public function sendSMS()
		{
			$mobileNo=$_REQUEST['phone'];
			$msg=$_REQUEST['msg'];
			
			$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mobileNo&msg=$msg&port=TA";
			//echo $fullapiurl;
			file_get_contents($fullapiurl);
			$narray=array();
			
			if(isset($_REQUEST['pinarray'])){
				$pinarray=json_decode($_REQUEST['pinarray']);
				foreach($pinarray as $pins){
					$pin=$pins->pinum;
					$this->load->model('Model_action');
					$row=$this->Model_action->addphonetopin($pin,$mobileNo);
				}
			}
			array_push($narray, array("stat"=>"1"));
			echo json_encode ($narray);
		
		}
public function paydetails()
		{
			$id=$_REQUEST['id'];
			$this->load->model('Model_action');
			$row=$this->Model_action->paydetails($id);
			echo json_encode ($row);
		}
		
		public function addcat_action()
		{
			$id=$_REQUEST['Cat'];
			
			$id=strtoupper($id);
			$this->load->model('Model_action');
			$row=$this->Model_action->addcat_action($id);
			echo json_encode ($row);
		}
		
		public function loadCat()
		{
			$this->load->model('Model_action');
			$row=$this->Model_action->loadCat();
			echo json_encode ($row);
		}
		
		public function edit_catname()
		{
			$catname=$_REQUEST['CatName'];
			$id=$_REQUEST['Id'];
			$catname=strtoupper($catname);
			
			$this->load->model('Model_action');
			$row=$this->Model_action->edit_catname($catname,$id);
			echo json_encode ($row);
		}
		/* public function deletecat()
		{
			$id=$_REQUEST['id'];
				
			$this->load->model('Model_action');
			$row=$this->Model_action->deletecat($id);
			$data=array("result"=>$row);
		    echo json_encode ($data);
			
		} */
		
		public function disablecat()
		{
			$id=$_REQUEST['id'];
		
			$this->load->model('Model_action');
			$row=$this->Model_action->disablecat($id);
			
			echo json_encode ($row);
				
		}
		public function enablecat()
		{
			$id=$_REQUEST['id'];
		
			$this->load->model('Model_action');
			$row=$this->Model_action->enablecat($id);
				
			echo json_encode ($row);
		
		}
		
		
		
		/*===================*/
		public function load_renworder()
		{
			$id=1;
			$pin=2345;
			$this->load->model('Model_action');
		
			$row=$this->Model_action->load_renworder($id,$pin);
			echo json_encode ($row);
		}
		
		
		public function repload()
		{
			$id=1;
			$pin=2345;
			$p_code=$_REQUEST['p_code'];
			$this->load->model('Model_action');
			$row=$this->Model_action->repload($id,$pin,$p_code);
			echo json_encode ($row);
		}
		
		
		
		public function process_reorder()
		{
			$id=1;
			$pin=2345;
			$arrays=$_REQUEST['orderary'];
			$narray=array();
			$arrayy=json_decode($arrays);
		
			$this->load->model('Model_action');
			$row=$this->Model_action->checkid($id,$pin);
			//echo json_encode ($row);
		
			foreach($row as $result)
			{
				$mid=$result->res;
			}
			if($mid==1)
			{
				foreach ($arrayy as $value)
				{
					$uid= $value->o;
		
					$this->load->model ( 'Model_action' );
					$row1 = $this->Model_action->process_reorder($uid);
				}
				$stat="success";
			}
			else
			{
				$stat="fail";
			}
			array_push($narray, array("stat"=>$stat));
			echo json_encode ($narray);
		}
		
		public function load_reoldorder()
		{
			$id=1;
			$pin=2345;
			$from=$_REQUEST['from'];
			$to=$_REQUEST['to'];
			$stat=$_REQUEST['stat'];
			$this->load->model('Model_action');
		
			$row=$this->Model_action->load_reoldorder($id,$pin,$from,$to,$stat);
			echo json_encode ($row);
		}
		
		public function mark_reorders()
		{
			$id=1;
			$pin=2345;
			$val=$_REQUEST['val'];
			$poid=$_REQUEST['oid'];
			$array1 = json_decode($poid);
			foreach ($array1 as $array)
			{
		
				$oid=$array->oid;
				//echo $oid;
				$this->load->model('Model_action');
				$row=$this->Model_action->mark_reorders($id,$pin,$val,$oid);
			}
			$narray=array();
			array_push($narray, array("stat"=>"Selected Orders Marked As '$val'"));
			echo json_encode ($narray);
		}


public function mobile_tree()
		{
			$this->load->view('mobile_tree.php');
		}
		
		public function usersuggest_m()
		{
			$this->load->model('Model_action');

			$q = $_REQUEST['term'];
			$res=$this->Model_action->usersuggest_m($q);
			echo json_encode($res);
		}
		
		public function viewusers_m()
		{
			$this->load->model('Model_action');
			$id = $_REQUEST['id'];
			$tp = $_REQUEST['tp'];
			$res=$this->Model_action->viewusers_m($id,$tp);
			echo json_encode($res);
		
		
		}
		
		public function userdisplay_m()
		{
			$this->load->model('Model_action');
		
			$q = $_REQUEST['term'];
			$res=$this->Model_action->userdisplay_m($q);
			echo json_encode($res);
		}

public function slider2()
		{
			$this->load->view('slider2.php');
		}
		
		public function slider2reproductdisplay()
		{

			$productid=$_REQUEST['productid'];
			$this->load->model('Model_action');
		
			$row=$this->Model_action->slider2reproductdisplay($productid);
		
			echo json_encode ($row);
		}
		
		public function slider2loadreproduct()
		{
			$this->load->model('Model_action');
		
			$row=$this->Model_action->slider2loadreproduct();
		
			echo json_encode ($row);
		}
		
		public function slider2deletereproduct()
		{
			$id=$_REQUEST['id'];
			$this->load->model('Model_action');
			$row=$this->Model_action->slider2deletereproduct($id);
			echo json_encode ($row);
		}

public function slider1()
		{
			$this->load->view('first.php');
		}
		public function AddSliderimg()
		{
			$msg='';
			$w=0;
			$productname=$_REQUEST['productname'];
			$narray=array();
			$this->load->model('Model_action');
			
			$row = $this->Model_action->add_sliderproduct($productname);
			
			foreach ($row as $results)
			{
			
				$pid=$results->combid;
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
					$config['file_name'] = 'combo_'.$pid.'.jpeg';
					$this->load->library ( 'upload', $config );
					$this->upload->initialize($config);
					$msg='';
					$w=0;
					$array=array("w"=>$w);
			
					if ($this->upload->do_upload ('file1'))
					{
						$this->load->model( 'Model_action' );
						$row = $this->Model_action->change_slider_image1($pid);
						$w++;
						$msg='Slider Image Uploaded';
						$array=array("result"=>$msg,"w"=>$w);
						
					}
					
			    	echo json_encode($array);
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
		public function loadsliderproducts()
		{
			$this->load->model('Model_action');
			$row=$this->Model_action->loadsliderproducts();
			echo json_encode ($row);
		}
		public function deleteslider1()
		{
			$id=$_REQUEST['id'];
			$this->load->model('Model_action');
			$row=$this->Model_action->deleteslider1($id);
			echo json_encode ($row);
		}
		public function EditSliderImg()
		{
			$pid=$_REQUEST['productid'];
			$config ['upload_path'] = './uploads/';
			$config ['allowed_types'] = 'txt|pdf|gif|jpg|png|jpeg';
			//$config ['max_size'] = '4000';
			$config ['max_width'] = '';
			$config ['max_height'] = '';
			$config ['overwrite'] = TRUE;
			$config ['remove_spaces'] = TRUE;
			$config['file_name'] = 'combo_'.$pid.'.jpeg';
			$this->load->library ( 'upload', $config );
			$this->upload->initialize($config);
			$msg='';
			$w=0;
				
			if ($this->upload->do_upload ('file2'))
			{
				$this->load->model( 'Model_action' );
				$row = $this->Model_action->change_slider_image1($pid);
				$w++;
				$msg='Slider Image Uploaded';
				$array=array("result"=>$msg,"w"=>$w);
			
			}
				
			echo json_encode($array);
		}
		public function loadsize()
		{
			$pid=$_REQUEST['id'];
			$this->load->model('Model_action');
			$row=$this->Model_action->loadsize($pid);
			echo json_encode ($row);
			
		}
		public function deletesize()
		{
			$pid=$_REQUEST['id'];
			$this->load->model('Model_action');
			$row=$this->Model_action->deletesize($pid);
			echo json_encode ($row);
		}

public function printaddress()
		{
			
			$jo['fix']='';
			//$this->m_pdf->pdf->Output(FCPATH.'exchange/'.$pdfFilePath,"F");
			
			
			$html=$this->load->view('printaddress.php',$jo,true);
			$pdfFilePath = "mass_venture.pdf";
			//load mPDF library
			$this->load->library('m_pdf');
			//generate the PDF from the given html
			$this->m_pdf->pdf->WriteHTML($html);
			//download it.
			$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}
	
		
		public function support()
		{
			$this->load->view('support.php');
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

			public function push()
		{
			$this->load->view('push.php');
		
		}
		
		public function reproductdisplay1()
		{
			$id=1;
			$pin=2345;
			$productid=$_REQUEST['productid'];
			$this->load->model('Model_action');
		
			$row=$this->Model_action->reproductdisplay1($productid,$id,$pin);
		
			echo json_encode ($row);
		}
	
		
		public function busintool()
		{
			$this->load->view('busintool.php');
		
		}
	
		
		
		public function uploadBTool() {
		
			$msg='';
			$w=0;
			$subject= $_REQUEST['subject'];
			$target_dir ='../Muser/uploads/tools/';
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			$filename= 'business_'.time().'.'.$imageFileType;
			
					$config ['upload_path'] = '../Muser/uploads/tools/';
					$config ['allowed_types'] = '*';
					//$config ['max_size'] = '4000';
					$config ['overwrite'] = TRUE;
					$config ['remove_spaces'] = TRUE;
					$config['file_name'] = $filename;
					$this->load->library ( 'upload', $config );
					$msg='';
					$w=0;
					$this->upload->initialize($config);
					if (! $this->upload->do_upload ('file'))
					{
						// case - failure
						$msg='Uploaded Failed';
						$w=1;
						$array=array("result"=>$msg,"w"=>$w,"p"=>$pid);
						echo json_encode($array);
					}
		
					else {
		
						$this->load->model( 'Model_action' );
						$row = $this->Model_action->add_business_tool($subject,$filename);
		
						$msg='New File Uploaded';
						$w=1;
						//	$this->load->view( 'add_brand' );
						$array=array("result"=>$msg,"w"=>$w);
						echo json_encode($array);
					}
		}
		
		public function deleteBTool()
		{
			$id=$_REQUEST['id'];
			$tool=$_REQUEST['tool'];
			$file='../Muser/uploads/tools/'.$tool;
			if (!unlink($file))
			{
				$array=array("result"=>"0");
			}
			else
			{
				$this->load->model('Model_action');
				$row=$this->Model_action->deleteBTool($id);
				$array=array("result"=>"1");
			}
			
			echo json_encode($array);
		}
	
		public function getMsgNotify()
		{
			$this->load->model('Model_action');
			$row=$this->Model_action->getMsgNotify();
			echo json_encode ($row);
		}
	
		
		
		public function changeref()
		{
			$ref=$_REQUEST['ref'];
			$id=$_REQUEST['id'];
			$this->load->model('Model_action');
			$row=$this->Model_action->changeref($ref,$id);
			echo json_encode ($row);
		}
	

		
		
		public function editusertopaid()
		{
			$tp=1;
			$bv=$_REQUEST['bv'];
			$pid=$_REQUEST['pid'];
			$u_id=$_REQUEST['u_id'];
			$admin_id=$_SESSION['uid'];
			$this->load->model('Model_action');
			$row=$this->Model_action->genpin_action();
			$addpin=0;
			
			if($row[0]->current_mills=='' || $row[0]->current_mills==null ||$bv==''){
				$array=array("result"=>"3");
				$pin="";
			}
			else{
				$pin=($row[0]->current_mills).rand(1000,9999);
				$this->load->model('Model_action');
				$res=$this->Model_action->addpin_action($pin,$admin_id,$tp,$bv);
				$addpin=$res[0]->result;
				
				if($addpin==0 || $addpin==null ||$addpin==''){
					$array=array("result"=>"2");
				}
				else{
					
					$this->load->model('Model_action');
					$res=$this->Model_action->sp_edituserstatusbeforepin($u_id,$pid);
					
					$this->load->model('Model_action' );
					$useid=$u_id;
					$row2 = $this->Model_action->activatepin_user($useid,$pin);
					$array=array("result"=>$row2[0]->res);
				}
				
			}
			
			echo json_encode($array);
		}
	


		
		public function customalert()
		{
			$this->load->view('customalert.php');
		}
					
		
		public function changeCAStatus()
		{
				$id=$_REQUEST['id'];
				$val=$_REQUEST['val'];
				$this->load->model( 'Model_action' );
				$row = $this->Model_action->changeCAStatus($id,$val);
		
			echo json_encode($row);
		}
		
		
		
		
		public function uploadCA() {
		
			$msg='';
			$w=0;
			$title= $_REQUEST['title'];
			$message= $_REQUEST['message'];
			$lnk= $_REQUEST['lnk'];
			$product= $_REQUEST['product'];
			$imaging= $_REQUEST['imaging'];
			
			
			$target_dir ='../Madmin/uploads/';
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				
			$filename= 'customalert.jpeg';
				
			$config ['upload_path'] = '../Madmin/uploads/';
			$config ['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			//$config ['max_size'] = '4000';
			$config ['overwrite'] = TRUE;
			$config ['remove_spaces'] = TRUE;
			$config['file_name'] = $filename;
			$this->load->library ( 'upload', $config );
			$msg='';
			$w=0;
			if($imaging==1){
				$this->upload->initialize($config);
				if (! $this->upload->do_upload ('file'))
				{
					// case - failure
					//$msg='Updated Successful (without image)';
					$msg=$this->upload->display_errors();
					$w=1;
					$imagename="";
					$imaging=0;
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->uploadCA($title,$message,$lnk,$product,$imagename,$imaging);
					$array=array("result"=>$msg,"w"=>$w,"p"=>$pid);
					echo json_encode($array);
				}
			
				else {
			
					$imagename=$filename;
					$this->load->model( 'Model_action' );
					$row = $this->Model_action->uploadCA($title,$message,$lnk,$product,$imagename,$imaging);
			
					$msg='Updated Successful (with image)';
					$w=1;
					//	$this->load->view( 'add_brand' );
					$array=array("result"=>$msg,"w"=>$w);
					echo json_encode($array);
				}
			}
			else{
				$msg='Updated Successful';
				$w=1;
				$imagename="";
				$this->load->model( 'Model_action' );
				$row = $this->Model_action->uploadCA($title,$message,$lnk,$product,$imagename,$imaging);
				$array=array("result"=>$msg,"w"=>$w,"p"=>$pid);
				echo json_encode($array);
			}
		}
		
	

		public function printmuser()
		{
			$t=$_REQUEST['t'];
			
			if($t==1){
			$this->load->model( 'Model_action' );
			$row = $this->Model_action->printmuser($t);
		
			
			
			function exportContactVCF($contactData){
			
				$userContacts = json_decode($contactData);
			
				$dataArray = '';
			
				foreach($userContacts as $contact){
			
					for($i=0; $i<sizeof($contact);$i++){
			
						$fullname = $contact[$i]->name;
			
						$fullnameArray = explode(" ",$fullname);
			
						$first_name = $fullnameArray[0];
			
						$last_name = $fullnameArray[1];
						
						$first_name=preg_replace('/\s+/', "_",$first_name);
						$first_name=str_replace(";", "_",$first_name);
						
						$last_name=preg_replace('/\s+/', "_",$last_name);
						$last_name=str_replace(";", "_",$last_name);
			
						$mobile_number = '+91'.$contact[$i]->mobile;
						$email=str_replace(" ", "_",$contact[$i]->email);
						$email_address= $email;
						
						$dataArray .="BEGIN:VCARD\nN:$first_name;$last_name\nFN:$first_name\nTEL;TYPE=WORK:$mobile_number\nEMAIL;TYPE=INTERNET:$email_address\nEND:VCARD\n";
			
					}
			
				}
			
				$data = $dataArray;
			
				$size = strlen($data);
			
				$filename = "anvybusinesscontact.vcf";
			
				header("Content-Type: application/octet-stream");
			
				header("Content-Length: $size");
			
				header("Content-Disposition: attachment; filename=\"$filename\"");
			
				header("Content-Transfer-Encoding: binary");
			
				return $data;
			
			}
			
			//Call the function
			
			$dat=json_encode($row);
			$contactData = '{"data":'.$dat.'}';
			
			//echo $contactData;
			echo exportContactVCF($contactData);
			}
			
		else if($t==2){
				
				$this->load->view('exportxls.php');
			}	
		}
	
	
			
		public function viewusers_m_id()
		{
			$id=$_REQUEST['id'];
			$tp=$_REQUEST['tp'];
			$this->load->model( 'Model_action' );
			$row = $this->Model_action->viewusers_m_id($id,$tp);
		
			echo json_encode($row);
		}
		
		
		public function editmuser()
		{
			$id=$_REQUEST['id'];
			$name=$_REQUEST['name'];
			$uname=$_REQUEST['uname'];
			$pwd=$_REQUEST['pwd'];
			$phone=$_REQUEST['phone'];
			$email=$_REQUEST['email'];
			$this->load->model( 'Model_action' );
			$row = $this->Model_action->editmuser($id,$name,$uname,$pwd,$phone,$email);
		
			echo json_encode($row);
		}
	
	
								
		public function reviews()
		{
			$this->load->view('reviews.php');
		}
		
		
		public function deleterve()
		{
			$ids=$_REQUEST['id'];
			$this->load->model( 'Model_action' );
			$result=$this->Model_action->deleterve($ids);
			echo json_encode($result);
		
		}
		
		public function approverve()
		{
				$ids=$_REQUEST['id'];
				$this->load->model( 'Model_action' );
				$result=$this->Model_action->approverve($ids);
				echo json_encode($result);
		
		}
		
		public function addrating()
		{
			$ids=$_REQUEST['id'];
			$product=$_REQUEST['product'];
			$rating=$_REQUEST['rating'];
			$heading=$_REQUEST['heading'];
			$review=$_REQUEST['review'];
			$this->load->model( 'Model_action' );
			$result=$this->Model_action->addrating($ids,$product,$rating,$heading,$review);
			echo json_encode($result);
		
		}
		
		public function usersuggest_m1()
		{
			$this->load->model('Model_action');
			if (isset($_REQUEST['term']))
			{
				$q = $_REQUEST['term'];
				$res=$this->Model_action->usersuggest_m1($q);
				echo json_encode($res);
		
			}
		
		}
	
						
	public function converteceltovcf()
		{
			$this->load->view('converteceltovcf.php');
		}
		
		public function doexporttovcf(){
			
			
			
			$file = $_FILES['userfile']['tmp_name'];
			//load the excel library
			$this->load->library('excel');
			//read file from path
			$objPHPExcel = PHPExcel_IOFactory::load($file);
			$totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel
			$objWorksheet=$objPHPExcel->setActiveSheetIndex(0);
			//loop from first data untill last data
			$row=array();
			for($i=2;$i<=$totalrows;$i++)
			{
				$name= strtoupper($objWorksheet->getCellByColumnAndRow(0,$i)->getValue());
				$phone= strtoupper($objWorksheet->getCellByColumnAndRow(1,$i)->getValue());
				$email=strtoupper($objWorksheet->getCellByColumnAndRow(2,$i)->getValue());
				$arr=array("name"=>$name,"mobile"=>$phone,"email"=>$email);
				array_push($row,$arr);
			}
			
			function startsWith($haystack, $needle) {
			    // search backwards starting from haystack length characters from the end
			    return $needle === ''
		    || strrpos($haystack, $needle, -strlen($haystack)) !== false;
			}	
			
			function exportContactVCF($contactData){
					
				$userContacts = json_decode($contactData);
					
				$dataArray = '';
					
				foreach($userContacts as $contact){
						
					for($i=0; $i<sizeof($contact);$i++){
							
						$first_name ="";
						$fullname = $contact[$i]->name;
						if($fullname!=""){	
						$fullnameArray = explode(" ",$fullname);
						
						for($ix= 0; $ix<=count($fullnameArray);++$ix)
						{
						if($fullnameArray[$ix]==null ||$fullnameArray[$ix]==''){}
						else{if($first_name==""){$first_name= $fullnameArray[$ix];}
							else{$first_name =$first_name." ".$fullnameArray[$ix];}}
						}
						
						$first_name=str_replace(";", "_",$first_name);
							
						if(strlen($contact[$i]->mobile)>10 && strlen($contact[$i]->mobile)<14)
						{
						    if(startsWith($contact[$i]->mobile, '+91'))
						    {
						        $mobile_number = $contact[$i]->mobile;
						    }
						    else if(startsWith($contact[$i]->mobile, '91'))
						    {
						        $mobile_number = '+'.$contact[$i]->mobile;
						    }
						    else if(startsWith($contact[$i]->mobile, '0')){
						        $mobile_number = $contact[$i]->mobile;
						    }
						    else {
						        $mobile_number = 0;
						    }
						}
						else if(strlen($contact[$i]->mobile)==10)
						{
						    $mobile_number = '+91'.$contact[$i]->mobile;
						}
						else {
						    $mobile_number = 0;
						}
						$email=str_replace(" ", "_",$contact[$i]->email);
						$email_address= $email;
							
						$dataArray .="BEGIN:VCARD\nN:$first_name\nFN:$first_name\nTEL;TYPE=WORK:$mobile_number\nEMAIL;TYPE=INTERNET:$email_address\nEND:VCARD\n";
						}	
					}
						
				}
					
				
				$data = $dataArray;
					
				$size = strlen($data);
					
				$filename = "convertedcontact.vcf";
					
				header("Content-Type: application/octet-stream");
					
				header("Content-Length: $size");
					
				header("Content-Disposition: attachment; filename=\"$filename\"");
					
				header("Content-Transfer-Encoding: binary");
					
				return $data;
					
			}
				
			//Call the function
				
			$dat=json_encode($row);
			//echo $dat;
			$contactData = '{"data":'.$dat.'}';
				
			//echo $contactData;
			echo exportContactVCF($contactData);
		}
	
		public function sendregsms()
		{
			$id=$_REQUEST['id'];
			$tp=1;
			$this->load->model( 'Model_action' );
			$res = $this->Model_action->viewusers_m_id($id,$tp);
			$stat=0;
			foreach($res as $row)
			{
				$mobileNo=$row->u_mobile;
				$uname=$row->username;
				$pwd=$row->u_password;
				$msg="Thank%20you%20for%20joining%20Anvy%20Business.%20Your%20User%20Name:".$uname."%20%20Password:".$pwd."%20%20Please%20keep%20it%20for%20further%20references.%20Visit%20www.anvybusiness.com";
				//echo $fullapiurl;
				$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mobileNo&msg=$msg&port=TA";
				file_get_contents($fullapiurl);
				$stat=1;
			}
			echo json_encode(array("stat"=>$stat));
		}
			
		public function converttoexcel()
		{
			$this->load->view('exportxls_binary.php');
		}
	
								
		public function sendregsms_binary()
		{
			$userid=$_REQUEST['id'];
			$from="";
			$to="";
			$this->load->model( 'Model_action' );
			$res = $this->Model_action->userdisplay($userid,$from,$to);
			$stat=0;
			foreach($res as $row)
			{
				$mobileNo=$row->u_mobile;
				$uname=$row->username;
				$pwd=$row->u_password;
				$msg="Thank%20you%20for%20joining%20Anvy%20Business.%20Your%20User%20Name:".$uname."%20%20Password:".$pwd."%20%20Please%20keep%20it%20for%20further%20references.%20Visit%20www.anvybusiness.com";
				//echo $fullapiurl;
				$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mobileNo&msg=$msg&port=TA";
				file_get_contents($fullapiurl);
				$stat=1;
			}
			echo json_encode(array("stat"=>$stat));
		}
	
						
								public function deleteBinaryUser()
		{
			$user=$_REQUEST['user'];
			$this->load->model('Model_action');
			$row=$this->Model_action->deleteBinaryUser($user);
			echo json_encode ($row);
		}
		
		
		public function binaryactivate()
		{
			$this->load->view('binaryactivate.php');
		
		}
		
		public function activateBinaryUser()
		{
			$user=$_REQUEST['user'];
			$this->load->model('Model_action');
			$row=$this->Model_action->activateBinaryUser($user);
			$result=0;$pbv=0;
			 foreach($row as $res){
			 	if(isset($res->res)){
			 		$result=$res->res;
			 	}
				 if(isset($res->pbv)){
				 $pbv=$res->pbv;
				 }
			 }
			$row1=$this->Model_action->activateBinaryUserMsg($user,$result,$pbv);
			echo json_encode ($row);
		}
	
						
			public function addachiver()
			{
				$this->load->view('addachiver.php');
			}
		public function loadtableval()
		{
			$this->load->model('Model_action');
			
			$row=$this->Model_action->loadtableval();
			echo json_encode ($row);
		}
		
		public function achivupdate()
		{
			
			$name=$_REQUEST['ach_name1'];
			$comment=$_REQUEST['ach_comment1'];
			$ach_id=$_REQUEST['ach_id'];
			echo $ach_id;
			
				if(!empty($_FILES["image1"]["name"]))
				{
					$file=basename( $_FILES["image1" ][ "name" ]);
					$extension1=pathinfo($file,PATHINFO_EXTENSION);
					$extension=strtolower($extension1);
					$filename1=time().".".$extension;
					//echo base_url();
					move_uploaded_file( $_FILES [ "image1" ]["tmp_name" ],"../images/acheivers/$filename1");
					// echo $filename1;
				}
				else
				{
					$filename1="";
						
				}
			
			$this->load->model('Model_action');
			$res=$this->Model_action->achupdate($name,$comment,$filename1,$ach_id);
			echo json_encode($res);
		
		
		
		}
		public function achiveact()
		{
			
			$name=$_REQUEST['ach_name'];
			$comment=$_REQUEST['ach_comment'];
			if(!empty($_FILES["image"]["name"]))
			{
				$file=basename( $_FILES["image" ][ "name" ]);
				$extension1=pathinfo($file,PATHINFO_EXTENSION);
				$extension=strtolower($extension1);
				$filename1=time().".".$extension;
				//echo base_url();
				move_uploaded_file( $_FILES [ "image" ]["tmp_name" ],"../images/acheivers/$filename1");
				// echo $filename1;
			}
			else
			{
				$filename1="";
				 
			}
			$this->load->model('Model_action');
			$res=$this->Model_action->achinsert($name,$comment,$filename1);
			echo json_encode($res);
			//header("location:".base_url()."welcome/addachiver");
	
		
		}
		public function loadtabledata()
		{
			$ach_id=$_REQUEST['ach_id'];
			$this->load->model('Model_action');
				
			$row=$this->Model_action->loadtabledata($ach_id);
			echo json_encode ($row);
		}
		
		public function deletedata()
		{
			$del_id=$_REQUEST['del_id'];
			$this->load->model('Model_action');
		
			$row=$this->Model_action->deletedata($del_id);
			echo json_encode ($row);
		}
			
		public function downloaduser()
		{
			$jo['fix']=[];
			$html=$this->load->view('downloaduser.php',$jo,true);
			$pdfFilePath = "anvybusiness".time().".pdf";
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
	
		public function userupgrade()
		{
			$this->load->view('userupgrade.php');
		}
		public function upgradeBinaryUser()
		{
			$product=$_REQUEST['product'];
			$this->load->model('Model_action');
			$row=$this->Model_action->upgradeBinaryUser($product);
			echo json_encode ($row);
		}
	
						
		public function downloadupgradeuser()
		{
			$jo['fix']=[];
			$html=$this->load->view('downloadupgradeuser.php',$jo,true);
			$pdfFilePath = "anvybusiness".time().".pdf";
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
	
		public function pay_list()
		{
			$this->load->view('pay_list');
		}
		
		public function viewpaylist()
		{
			$user=$_REQUEST['user'];
			$date=$_REQUEST['date'];
			$this->load->model('Model_action');
			$row=$this->Model_action->viewpaylist($user,$date);
			echo json_encode ($row);
		}
	
								
		public function getbinaryactprod()
		{
			$user=$_REQUEST['user'];
			$this->load->model('Model_action');
			$row=$this->Model_action->getbinaryactprod($user);
			echo json_encode ($row);
		}
		public function getproduct()
		{
			$pid=$_REQUEST['pid'];
			$this->load->model('Model_action');
			$row=$this->Model_action->getproduct($pid);
			echo json_encode ($row);
		}
		
			
		public function edituserproduct()
		{
			$uid=$_REQUEST['uid'];
			$prodarray=json_decode($_REQUEST['product']);
			
			if($uid==""){
				echo json_encode (array(array("res"=>0,"msg"=>"User Error")));
			}
			else if(count($prodarray)==0){
				echo json_encode (array(array("res"=>0,"msg"=>"Select Product")));
			}
			else{
			$this->load->model('Model_action');
			$row=$this->Model_action->calculateBinaryProductsall($prodarray);
			$tbv=$row;$flag=0;
			if($tbv=="" || $tbv==null){$flag=1;$tbv=0;}
			if(/*$tbv<=100 &&*/ $flag==0){
				$useid=$uid;
				$row=$this->Model_action->removeuserproduct($useid);
				foreach($prodarray as $rs){
						$pid=$rs->pid;
						$qty=$rs->qty;
						$size=$rs->size;
						$rowx=$this->Model_action->insertBinaryUserProducts($useid,$pid,$qty,$size);
				}
				echo json_encode (array(array("res"=>1)));
			}
			else{
				echo json_encode (array(array("res"=>0,"msg"=>"Select Product(s)")));
			}
			}
		}
	
			
	public function usersuggest1()
		{
			$this->load->model('Model_action');
			if (isset($_REQUEST['term']))
			{
				$q = $_REQUEST['term'];
				$res=$this->Model_action->usersuggest1($q);
				echo json_encode($res);
		
			}
		
		}
	
						
		public function setproduct()
		{
			$id=$_REQUEST['id'];
			$flag=$_REQUEST['flag'];
		
			$this->load->model('Model_action');
		
			$row=$this->Model_action->setproduct($id,$flag);
		
			echo json_encode ($row);
		
		}
			
		public function payoutExcel()
		{
			$this->load->view('payoutExcel.php');
		}
	
		public function changeToFreeUser()
		{
			$useid=$_REQUEST['user'];
		
			$this->load->model('Model_action');
		
			$row=$this->Model_action->removeuserproduct($useid);
			$row=$this->Model_action->changeToFreeUser($useid);
			echo json_encode (array(array("result"=>1)));
		
		}
	
		/* Daily Achiever*/
		
		public function adddailyachiever()
		{
		    $this->load->view('addAcheiverDaily.php');
		}
		public function loaddailyachiever()
		{
		    $this->load->model('Model_action');
		    
		    $row=$this->Model_action->loaddailyachiever();
		    echo json_encode ($row);
		}
		
		public function achievedailyupdate()
		{
		    
		    $name=$_REQUEST['ach_name1'];
		    $income=$_REQUEST['ach_comment1'];
		    $ach_id=$_REQUEST['ach_id'];
		    echo $ach_id;
		    
		    if(!empty($_FILES["image1"]["name"]))
		    {
		        $file=basename( $_FILES["image1" ][ "name" ]);
		        $extension1=pathinfo($file,PATHINFO_EXTENSION);
		        $extension=strtolower($extension1);
		        $filename1=time().".".$extension;
		        //echo base_url();
		        move_uploaded_file( $_FILES [ "image1" ]["tmp_name" ],"../images/daily_acheivers/$filename1");
		        // echo $filename1;
		    }
		    else
		    {
		        $filename1="";
		        
		    }
		    
		    $this->load->model('Model_action');
		    $res=$this->Model_action->achdailyupdate($name,$income,$filename1,$ach_id);
		    echo json_encode($res);
		    
		    
		    
		}
		public function achievedailyact()
		{
		    
		    $name=$_REQUEST['ach_name'];
		    $income=$_REQUEST['ach_comment'];
		    if(!empty($_FILES["image"]["name"]))
		    {
		        $file=basename( $_FILES["image" ][ "name" ]);
		        $extension1=pathinfo($file,PATHINFO_EXTENSION);
		        $extension=strtolower($extension1);
		        $filename1=time().".".$extension;
		        //echo base_url();
		        move_uploaded_file( $_FILES [ "image" ]["tmp_name" ],"../images/daily_acheivers/$filename1");
		        // echo $filename1;
		    }
		    else
		    {
		        $filename1="";
		        
		    }
		    $this->load->model('Model_action');
		    $res=$this->Model_action->achdailyinsert($name,$income,$filename1);
		    echo json_encode($res);
		    //header("location:".base_url()."welcome/addachiver");
		    
		    
		}
		public function loadtabledatadaily()
		{
		    $ach_id=$_REQUEST['ach_id'];
		    $this->load->model('Model_action');
		    
		    $row=$this->Model_action->loadtabledatadaily($ach_id);
		    echo json_encode ($row);
		}
		
		public function deletedatadaily()
		{
		    $del_id=$_REQUEST['del_id'];
		    $this->load->model('Model_action');
		    $row1=$this->Model_action->loadtabledatadaily($del_id);
		    $achImage="";
		    foreach($row1 as $rs){
		        $achImage=$rs->image;
		    }
		    if($achImage!=""){
		        try{
		            unlink("../images/daily_acheivers/$achImage");
		        }catch(Exception $e){}
		    }
		    $row=$this->Model_action->deletedatadaily($del_id);
		    echo json_encode ($row);
		}
		
		
		/* End */
}



?>