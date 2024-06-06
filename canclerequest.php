<?php 
 include('dbconnect.php');
//If a post request is detected 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $username = $_POST['username'];
 $parkingname = $_POST['parkingname'];
  $vehicle_no = $_POST['vehiclenumber'];
 
  $sql = "SELECT parking_lot_id FROM parking_lot_details WHERE parking_name = '$parkingname'"; 

 $result = mysqli_fetch_array(mysqli_query($con,$sql));
 
  $parking_id = $result['parking_lot_id'];
 
 $sql = "SELECT user_id FROM user_details WHERE username = '$username'"; 

 $result = mysqli_fetch_array(mysqli_query($con,$sql));
 
 $user_id = $result['user_id'];
 
 $sql = "UPDATE parking_request set status='Cancelled' where parking_lot_id=$parking_id and user_id=$user_id and vehicle_no='$vehicle_no'";

 //If the table is updated 
 if(mysqli_query($con,$sql)){
 //displaying success 
 echo 'success';
 }else{
 //displaying failure 
 echo 'failure';
 } 
 //Closing the database 
 mysqli_close($con);
}
