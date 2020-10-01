<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

   $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblvehicle where  RFIDNumber='$cid'");

$rowcount=mysqli_num_rows($ret);

if($rowcount==1){

while ($row=mysqli_fetch_array($ret)) {
	

 
  
  
  
if($row['balance']>$row['TollCharge'])
  {
    
   
      $remark="paid";
      $status="out";
      $TollCharge=$row['TollCharge'];
     $balance=$row['balance']-$TollCharge;
 
    
     
   $query=mysqli_query($con, "update  tblvehicle set Remark='$remark',Status='$status', balance =$balance where RFIDNumber='$cid'");
    if ($query) {
   
   
  $a='Managaluru-Bangaluru-Heavy-B14';
  $b=$row['VehicleCategory'];
  $c=$row['VehicleCompanyname'];
  $d=$row['RegistrationNumber'];
  $e=$row['OwnerName'];
  $f=$row['OwnerContactNumber'];
  $g=$row['InTime'];
  $h=$row['OutTime']; 
  $i=$row['TollCharge'];
  $j=$remark; 
  $k=$status ;
  $l=$row['accountnumber'];
  $m=$row['bankname']; 
  $n=$row['ifsccode']; 
  $o=$balance;
  
     
    $query=mysqli_query($con, "insert into  tbltransactionhistry(TollBoothName,RFIDNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,InTime,OutTime,TollCharge,Remark,Status,accountnumber,bankname,ifsccode,balance) value('$a','$cid','$b','$c','$d','$e',$f,'$g','$h','$i','$j','$k',$l,'$m','$n',$o)");
	
	echo "<script>alert('TollTax deducted from the account, Thank you for using RFID base Toll System');window.location.href='sms1.php?n=$f&t=$i&b=$o&p=$a&ac=$l';</script>";

	
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}


else
		echo "<script>alert('Insufficent balance in the account, Inform the Owner to take diversion for manual Toll Payment');</script>";




  } 
  
}

else
{
	echo "<script>alert('Invalid RFID Detected, Inform the Owner to take diversion for manual Toll Payment');</script>";
	
}

  }
  ?>
  
  
  
  <!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>VPMS - Demo page</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->


    <!-- Left Panel -->

    <!-- Right Panel -->


        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    
                   
                </div>
            </div>
        </div>
 
  
  
  
  
  
 <?php include_once('includes/footer.php');?>
<h1 align="center"> Demo Page</h1><br/>
<h3 align="center"> RFID Reader (Sensor) at TollGate detect the RFID of Vehicle and send to this webpage using get method
<br/>ex:http://localhost/vpms/view-incomingvehicle-detail1.php?viewid=56111
</h3>
<br/><br/>
<h3 align="center"> Furture operations are carried out by PHP  <font color="red">(RFID validation, account balance checning in dumy account, deduction of Tollfee and SMS Sending)</font>
and Phython <font color="red">(exit gate opening and closing,entry gate opening for next Vehicle)</font> programs</h3>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html> 
  
  
  
  
  

