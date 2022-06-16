<?php
session_start();

if(!empty($_SESSION['email'])) {
	echo "<script>window.open('home.php', '_self')</script>";
} else {
	echo "<script>window.open('welcome.php', '_self')</script>";
}



?>
