<?php 
 include('dbconnect.php');
//If a post request is detected 

 $username = $_GET['user'];
 $parkingname = $_GET['parkingname'];
 $request_no=$_GET['request_no'];
  $vehicle_no = $_GET['vehicle_no'];
 
  $sql = "SELECT parking_lot_id FROM parking_lot_details WHERE loginname = '$parkingname'"; 

 $result = mysqli_fetch_array(mysqli_query($con,$sql));
 
  $parking_id = $result['parking_lot_id'];
 
 $sql = "SELECT user_id FROM user_details WHERE username = '$username'"; 
 

 $result = mysqli_fetch_array(mysqli_query($con,$sql));
 
 $user_id = $result['user_id'];
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}

$date = date("d/m/Y");
$date1 =  date("H:i a");
$final= $date."  ".$date1;

  $sql = "INSERT INTO historyparked (user_id,parking_lot_id,vehicle_no,time) values ($user_id,$parking_id,'$vehicle_no','$final')";

 //If the table is updated 
 if(mysqli_query($con,$sql)){
 //displaying success 
 echo 'success';
 $deletecurrent="delete from parking_request where request_id=$request_no";
 mysqli_query($con,$deletecurrent);
 header('location: requestcomming.php');
 
 }else{
 //displaying failure 
 echo 'failure';
 } 
 //Closing the database 
 mysqli_close($con);

