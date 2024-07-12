<?php
$fname = $_GET['fname'];
$mname = $_GET['mname'];
$lname = $_GET['lname'];
$addr = $_GET['addr'];
$zip = $_GET['zip'];
$bday = $_GET['bday'];
$email = $_GET['email'];
$pass = $_GET['pass'];

include_once '../Class/user.php';
$u = new User();

echo $u->signup($fname, $mname, $lname, $addr, $zip, $bday, $email, $pass);
?>
