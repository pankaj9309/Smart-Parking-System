<?php

 include 'dbconnect.php';
  
 	$id=$_GET['id']; 
    $role=$_GET['role'];
    if($role=='user')
    {        
    if($id=='all')
    {
    	         $query="truncate table user_details";
 		 mysqli_query($con,$query);

    }
    else
    {
    	         $query="delete from user_details where user_id=$id";
       		 mysqli_query($con,$query);

    }
     		 header('location: users.php');
    }
    if($role=='park')
    {
         if($id=='all')
    {
                 $query="truncate table parking_lot_details";
         mysqli_query($con,$query);

    }
    else
    {
                 $query="delete from parking_lot_details where parking_lot_id=$id";
             mysqli_query($con,$query);

    }

             header('location: parkingdetails.php');
    
    }     

     		?>


