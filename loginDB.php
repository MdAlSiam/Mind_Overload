<?php

include 'inc/connect.php';

if (isset($_POST['login'])) {
  $email = htmlentities(mysqli_escape_string($con, $_POST['email']));
  $passWord = htmlentities(mysqli_escape_string($con, $_POST['password']));
  $passWord = md5($passWord);

  $login = "select * from user_info where email = '$email' and password = '$passWord'";

  $run = mysqli_query($con, $login);

  if (mysqli_num_rows($run) == 1) {
    $result = mysqli_fetch_assoc($run);
    $_SESSION['fn'] = $result['first_name'];
    $_SESSION['ln'] = $result['last_name'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['phn'] = $result['phone_no'];
    $_SESSION['dob'] = $result['DOB'];
    $firstName = $_SESSION['fn'];
    echo "<script>alert('$firstName, you have logged into MindOverLoad!!!')</script>";
    echo "<script>window.open('home.php', '_self')</script>";
  } else {
    echo "<script>alert('Your email and/or password were wrong.!!!')</script>";
    #$_SESSION['err'] = "Error: " . mysqli_error($con);
    echo "<script>window.open('login.php', '_self')</script>";
  }
}






 ?>
