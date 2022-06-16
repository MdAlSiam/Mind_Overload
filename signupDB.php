<?php

include 'inc/connect.php';

if (isset($_POST['signup'])) {
  $firstName = htmlentities(mysqli_escape_string($con, $_POST['first_name']));
  $lastName = htmlentities(mysqli_escape_string($con, $_POST['last_name']));
  $email = htmlentities(mysqli_escape_string($con, $_POST['email']));
  $passWord = htmlentities(mysqli_escape_string($con, $_POST['password']));
  $birthDate = htmlentities(mysqli_escape_string($con, $_POST['birth_date']));
  $passWord = md5($passWord);
  $hash = md5( rand(0,1000) );
  $insert = "insert into user_info(first_name, last_name, email, password, phone_no, DOB, status) values('$firstName', '$lastName', '$email', '$passWord', '', '$birthDate', '$hash')";

  #$insert = "insert into user_info(first_name, last_name, email, password, phone_no, DOB, status) values('$firstName', '$lastName', '$email', '$passWord', '', '$birthDate', 'Not verified')";

  $run = mysqli_query($con, $insert);

  if ($run) {
    $to      = $email;
    $subject = 'MindOverLoad Account Verification';
    $message = '

    Thanks for signing up!

    Please click this link to activate your account:
    http://localhost:8080/mind_over_load/verify.php?email='.$email.'&hash='.$hash.'

    ';

    $headers = 'From:hasanrakib729@gmail.com' . "\r\n"; // Set from headers
    $sent = mail($to, $subject, $message, $headers); // Send our email
    if ($sent) {
      #$_SESSION['msg'] = "A verification mail has been sent to your email. Please confirm.";
      echo "<script>alert('$firstName, you have sccessfully registerd yourself!!!')</script>";
      echo "<script>window.open('login.php', '_self')</script>";
    } else {
      $del = "delete from user_info where email='$email'";
      $run = mysqli_query($con, $del);
      echo "<script>alert('Your email is incorrect!!!')</script>";
      echo "<script>window.open('signup.php', '_self')</script>";
    }
  }
}






 ?>
