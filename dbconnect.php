<?php
$hostname="192.168.169.133";
$db="wcewle8w_finalsps";
$username="wcewle8w_shubham";
$password="shubham123";
$con = mysqli_connect($hostname, $username, $password, $db);

// Check connection
if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

?>