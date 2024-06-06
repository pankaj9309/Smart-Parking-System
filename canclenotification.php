<?php


include('dbconnect.php');
include('func.php');

 echo "shubham";
  $parkingname = $_GET['parkingname'];
 $username = $_GET['user'];
 $request_no=$_GET['request_no'];
  $vehicle_no = $_GET['vehicle_no'];
  $sql = "SELECT phone FROM user_details WHERE username = '$username'"; 
 $result = mysqli_fetch_array(mysqli_query($con,$sql));
 $phone = $result['phone'];
  $sql = "SELECT parking_name FROM parking_lot_details WHERE loginname = '$parkingname'"; 
  $result = mysqli_fetch_array(mysqli_query($con,$sql));
   $title = $result['parking_name'];

  $msg="Sorry , your request has been cancelled of ".$title." for vehicle number ".$vehicle_no." plz try again";
  echo $msg;
   //echo "</br></br><a href='requestcomming.php'>Go Back</a>";
   $deletecurrent="delete from parking_request where request_id=$request_no";
  mysqli_query($con,$deletecurrent);
  sendOtp($msg,$phone);
 
 
        
    
 //Closing the database connection 
 mysqli_close($con);

 
 function sendOtp($otp, $phone){
 
error_reporting(0);
set_time_limit(0);
$ser="http://site24.way2sms.com/";
$ckfile = tempnam ("/tmp", "CURLCOOKIE");
$login=$ser."Login1.action";
// * Reciving Username of Way2sms A/c from Html form //
$uid='7798730162';
// * Reciving Password of Way2sms A/c from Html form //
$pwd="rajshubh96311";
// * To whome the message send to //
$to=$phone;//input($_REQUEST['to']);
// * Message to be sended //
$msg='Smart parking system:'.$otp;//input($_REQUEST['msg']);
if(!$to)
{ $to=$uid; }
if(!$msg)
{ $msg=rword(5).rword(5).rword(5).rword(5).rword(5); }
$captcha=input($_REQUEST['captcha']);
flush();
if($uid && $pwd)
{
$ibal="0";
$sbal="0";
$lhtml="0";
$shtml="0";
$khtml="0";
$qhtml="0";
$fhtml="0";
$te="0";

$loginpost="gval=&username=".$uid."&password=".$pwd."&Login=Login";

$ch = curl_init();
$lhtml=post($login,$loginpost,$ch,$ckfile);
////curl_close($ch);

if(stristr($lhtml,'Location: '.$ser.'vem.action') || stristr($lhtml,'Location: '.$ser.'MainView.action') || stristr($lhtml,'Location: '.$ser.'ebrdg.action'))
{
preg_match("/~(.*?);/i",$lhtml,$id);
$id=$id['1'];

///$ch = curl_init();
$msg=urlencode($msg);
$main=$ser."smstoss.action";
$ref=$ser."sendSMS?Token=".$id;
$conf=$ser."smscofirm.action?SentMessage=".$msg."&Token=".$id."&status=0";

$post="ssaction=ss&Token=".$id."&mobile=".$to."&message=".$msg."&Send=Send Sms&msgLen=".strlen($msg);
$mhtml=post($main,$post,$ch,$ckfile,$proxy,$ref);

curl_close($ch);
  
    


}}
 
   

}
   
?>
