<?php

include 'inc/connect.php';
session_start();
if (!empty($_SESSION['email'])) {
  $firstName = $_SESSION['fn'];
  session_destroy();
  echo "<script>alert('$firstName, you have logged out from MindOverLoad!!!')</script>";
  echo "<script>window.open('home.php', '_self')</script>";
}
 ?>
