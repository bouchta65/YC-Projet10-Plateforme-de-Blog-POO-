<?php
session_start(); 
include '../classes/User.php';
$user = unserialize($_SESSION['user_obj']);
$user->logout();
exit();
?>