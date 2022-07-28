<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
$user_online = true;	
}else{
$user_online = false;
}
?>