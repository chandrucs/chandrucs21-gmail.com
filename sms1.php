<?php
error_reporting (E_ALL ^ E_NOTICE);
$username="xxxx";
$password ="xxxxx";
$number=$_GET['n'];
$t=$_GET['t'];
$b=$_GET['b'];
$p=$_GET['p'];
$a=$_GET['ac'];
$sender="TESTID";
$now = date('Y-m-d');
$message="Your A/C no ".$a."is debited for Rs.".$t." on ".$now." at ".$p." as Toll Tax";


$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo $curl_scraped_page = curl_exec($ch);
curl_close($ch); 


?>