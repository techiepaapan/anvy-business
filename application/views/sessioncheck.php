<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/Ajax/url.js"></script>
<?php
include 'dbconnection.php';


$logpanel = '<li class="list-first"><a href="' . base_url() . 'welcome/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>';
$lg = 0;
$puid = "";
$ppin = "";
$pname = "";
//echo "Yes1";
if (isset($_SESSION['uid'])) {
	//echo "Yes2";
	if (($_SESSION['uid'] == "") || ($_SESSION['uid'] == null)) {
	} else {
		$lg = 1;
		$puid = $_SESSION['uid'];
		$ppin = $_SESSION['pin'];
		$pname = $_SESSION['user'];
		//$logpanel='<li class="list-first" style="cursor:pointer;"><a id="unext">Hi '.$_SESSION['user'].'</a></li><li class="list-first"><a href="'.base_url().'Muser/welcome/userloggedout">Logout</a></li>';
		$logpanel = '<li class="list-second dropdown">
		<a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		Hi ' . $_SESSION['user'] . '
		<span class="caret"></span>
		</a>
		
		<ul class="dropdown-menu " id="login-nav" aria-labelledby="dLabel">
		
		<li><a href="' . base_url() . 'welcome/logout"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		</ul>
		</li>';
	}
}


if (isset($_SESSION['nuser'])) {
} else {
	$dat = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
	$curdate = $dat->format('Y-m-d');

	//echo 1;
	$qry1 = mysqli_query($connect, "call sp_nuser('$curdate')");
	$_SESSION['nuser'] = "1";
}
?>
<script>
	$(document).ready(function() {
		var baseurl = getUrl();
		$(document).on("click", "#unext", function() {
			var ur = baseurl + "Muser/welcome/userloggedin?uid=<?php echo $puid; ?>&pin=<?php echo $ppin; ?>&name=<?php echo $pname; ?>";
			window.open(ur);
		});
	});
</script>