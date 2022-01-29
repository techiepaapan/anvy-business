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
public function forgot()
	{
		$this->load->view('forgot_password.php');
	
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
	public function products()
	{
		$this->load->view('products.php');
	
	}
	public function contact_us()
	{
		$this->load->view('contact-us.php');
	
	}
	public function about_us()
	{
		$this->load->view('about-us.php');
	
	}
	public function repurchase_products()
	{
		$this->load->view('repurchase-products.php');
	
	}
	
	public function cart()
	{
		$this->load->view('cart.php');
	
	}
	public function delivery_details()
	{
		$this->load->view('delivery-details.php');
	
	}
	
	public function product_details()
	{
		$this->load->view('product-details.php');
	
	}
	public function login()
	{
		if(isset($_SESSION['uid1']))
		{
			header('location:'.base_url().'Muser/');
		}
		else if(isset($_SESSION['uid']))
		{
			header('location:'.base_url());
		}
		else{
		$this->load->view('login.php');
		}
	
	}
	public function sessioncheck()
	{
		$this->load->view('sessioncheck.php');
	
	}
	
	public function getproducts()
	{
		$limit1=$_REQUEST['limit1'];
		$limit2=$_REQUEST['limit2'];
		$this->load->model('Model_action');
		$row=$this->Model_action->getproducts($limit1,$limit2);
		echo json_encode ($row);
	}
	public function getproductsdetail()
	{
		$pd=$_REQUEST['pd'];
		$this->load->model('Model_action');
		$row=$this->Model_action->getproductsdetail($pd);
		echo json_encode ($row);
	}
	
	public function getreproducts()
	{
		$limit1=$_REQUEST['limit1'];
		$limit2=$_REQUEST['limit2'];
                $id=$_REQUEST['id'];
		$this->load->model('Model_action');
		$row=$this->Model_action->getreproducts($limit1,$limit2,$id);
		echo json_encode ($row);
	}

	/*public function getreproducts()
	{
		$limit1=$_REQUEST['limit1'];
		$limit2=$_REQUEST['limit2'];
              
		$this->load->model('Model_action');
		$row=$this->Model_action->getreproducts($limit1,$limit2);
		echo json_encode ($row);
	}*/
	public function getlogin()
	{
		$user1=$_REQUEST['user'];
		$pass1=$_REQUEST['pwd'];
	
		$this->load->model('Model_action');
		$res=$this->Model_action->logmodel($user1,$pass1);
		foreach ($res as $results)
		{
			$result=$results->res;
			$id=$results->uid;
			$pin=$results->pin;
			$user=$results->userx;
			$type=$results->type;
			if(($result==1)&&($type=='M'))
			{
				$_SESSION['uid']=$id;
				$_SESSION['pin']=$pin;
				$_SESSION['user']=$user;
			}
			//echo $_SESSION['uid']." ".$_SESSION['pin']." ".$_SESSION['user'];
		}
		echo json_encode($res);
	
	}
	
	public function logout()
	{
	
		$id=$_SESSION['uid'];
		$pin=$_SESSION['pin'];
		$this->load->model('Model_action');
		$res=$this->Model_action->logout($id,$pin);

		unset($_SESSION["uid"]);
		unset($_SESSION["pin"]);
		unset($_SESSION["user"]);
			
		 	?>
		    <script>
			window.location.href="<?php echo base_url();?>";
		</script>
		 <?php 

	}
	
	
	public function placeneworder()
	{

		$name=$_REQUEST["name"];
		$address=$_REQUEST["address"];
		$city=$_REQUEST["city"];
		$state=$_REQUEST["state"];
		$pin=$_REQUEST["pin"];
		$country=$_REQUEST["country"];
		$refid=$_REQUEST["refid"];
		$prod=$_REQUEST["prod"];
		$type=$_REQUEST["type"];
		$phone=$_REQUEST["phone"];
                $num=$_REQUEST["num"];
		$size=$_REQUEST["size"];
		$this->load->model('Model_action');
		$row=$this->Model_action->placeneworder($name,$address,$city,$state,$pin,$country,$refid,$prod,$type,$phone,$num,$size);
		echo json_encode ($row);
	}
	
	public function getreflogin()
	{
		$refid=$_REQUEST['refid'];
		$this->load->model('Model_action');
		$row=$this->Model_action->getreflogin($refid);
		echo json_encode ($row);
	}
public function getpassword()
	{
		$user1=$_REQUEST['user'];
		$mob1=$_REQUEST['mob'];
		
		$this->load->model('Model_action');
		$res=$this->Model_action->getpassword($user1,$mob1);
		echo json_encode($res);
	}
	
public function sendSMS()
	{
		
		$pass=$_REQUEST['pass'];
		$mob=$_REQUEST['mob'];
		$user=$_REQUEST['user'];
        $name=$_REQUEST['name'];
          $array=explode(" ",$name);
            $name=implode("%20",$array);
        $msg="Hi%20".$name.",%20You%20recently%20requested%20to%20retrieve%20the%20login%20credentials%20for%20your%20Anvy%20Business%20account.%20%20Here%20is%20your%20login%20details:%20Username:%20".$user."%20Password:%20".$pass;
        
  

$fullapiurl="http://smspanel.bluesoft.in/api/user?id=OTk5NTgyNzE3OA&senderid=MASSVE&to=$mob&msg=$msg&port=TA";
        //echo $fullapiurl;
        file_get_contents($fullapiurl);
        $narray=array();
        array_push($narray, array("stat"=>"1"));
        echo json_encode ($narray);
        
	}

function loadtime()
{
$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$date=$dat->format('Y-m-d');
$time=$dat->format('H:i:s');
echo $date;
echo $time;
}


public function sendEnquiry()
	{
	
		$to = 'vipinsafelife@gmail.com';
		
		    $subject = 'Anvy Business Enquiry';
		
		    $bename = $_REQUEST['bename'];
		    $beemail = $_REQUEST['beemail'];
		    $bephone = $_REQUEST['bephone'];
		    $beplace = $_REQUEST['beplace'];
		    // To send HTML mail, the Content-type header must be set
		
		    $headers  = 'MIME-Version: 1.0' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		    // Create email headers
		
		    $headers .= 'From: '.$bename."\r\n".

		    // Compose a simple HTML email message
		
		    $message = '<html><body>';
		
		    $message .= '<h1 style="color:#f40;">Enquired By:</h1>';
		
		    $message .= '<p style="font-size:18px;">Name: '.$bename.'</p>';
		    $message .= '<p style="font-size:18px;">Mail: '.$beemail.'</p>';
		    $message .= '<p style="font-size:18px;">Phone: '.$bephone.'</p>';
		    $message .= '<p style="font-size:18px;">Place: '.$beplace.'</p>';
		
		    $message .= '</body></html>';
		
		    
		
		    // Sending email
		
		    if(mail($to, $subject, $message, $headers)){
		
		        $res=1;
		
		    } else{
		
		        $res=0;
		
		    }
		$narray=array();
		array_push($narray, array("res"=>$res));
		echo json_encode($narray);
	
	}


	public function training()
	{
		$this->load->view('training.php');
	
	}
	public function plans()
	{
		$this->load->view('plans.php');
	
	}
	public function legal()
	{
		$this->load->view('legal.php');
	
	}
	public function grievance()
	{
		$this->load->view('grievance.php');
	
	}


	public function sendComplaint()
	{
	    
	    $to = 'vipinsafelife@gmail.com';
	    
	    $subject = 'Anvy Business Complaints';
	    
	    $gname = $_REQUEST['gname'];
	    $guserid = $_REQUEST['guserid'];
	    $gemail = $_REQUEST['gemail'];
	    $gphone = $_REQUEST['gphone'];
	    $gcomplaint = $_REQUEST['gcomplaint'];
	    // To send HTML mail, the Content-type header must be set
	    
	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    
	    // Create email headers
	    
	    $headers .= 'From: '.$gname."\r\n".
	   	    
	   	    // Compose a simple HTML email message
	    
	    $message = '<html><body>';
	    
	    $message .= '<h1 style="color:#f40;">Grievance By:</h1>';
	    
	    $message .= '<p style="font-size:18px;">Name: '.$gname.'</p>';
	    $message .= '<p style="font-size:18px;">UserID: '.$guserid.'</p>';
	    $message .= '<p style="font-size:18px;">Mail: '.$gemail.'</p>';
	    $message .= '<p style="font-size:18px;">Phone: '.$gphone.'</p>';
	    $message .= '<p style="font-size:18px;">Complaint: '.$gcomplaint.'</p>';
	    
	    $message .= '</body></html>';
	    
	    
	    
	    // Sending email
	    
	    if(mail($to, $subject, $message, $headers)){
	        
	        $res=1;
	        
	    } else{
	        
	        $res=0;
	        
	    }
	    $narray=array();
	    array_push($narray, array("res"=>$res));
	    echo json_encode($narray);
	    
	}
	
	public function selectnewcategory($id)
	{
		$id=$_REQUEST['id'];
		$this->load->model('Model_action');
		$row=$this->Model_action->selectnewcategory($id);
		echo json_encode($row);
	}
	
	public function android_aboutus()
	{
		$this->load->view('android_about-us.php');
	}
	public function android_contactus()
	{
		$this->load->view('android_contact-us.php');
	}
	public function android_plans()
	{
		$this->load->view('android_plans.php');
	}
	
	public function android_privacy_policy()
	{
		$this->load->view('android_privacy_policy.php');
	}
	
	public function daily_acheivers()
	{
	    $this->load->model('Model_action');
	    $row=$this->Model_action->daily_acheivers();
	    echo json_encode ($row);
	}
}
?>