<?php

include 'inc/connect.php';

if (isset($_POST['ask'])) {
  $qTitle = htmlentities(mysqli_escape_string($con, $_POST['q_title']));
  $body = htmlentities(mysqli_escape_string($con, $_POST['main_body']));
  $email = $_SESSION['email'];
  $firstName = $_SESSION['fn'];

  if (!empty($_FILES['image']['name'])) {
    $imgDir = 'uploaded_images/';
    $targetFile = $imgDir . basename($_FILES['image']['name']);
    $i = 1;
    $split = explode(".", $targetFile);
    while (file_exists($targetFile)) {
      $targetFile = $split[0] . $i . "." . $split[1];
      $i++;
    }
    $upload = move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    $insert = "insert into questions(q_title, q_description, image, email) values('$qTitle', '$body', '$targetFile', '$email')";
  } else {
    $insert = "insert into questions(q_title, q_description, email) values('$qTitle', '$body', '$email')";
  }


  $run = mysqli_query($con, $insert);


  if ($run) {
    echo "<script>alert('$firstName, your question has been sccessfully posted!!!')</script>";
    echo "<script>window.open('timeline.php', '_self')</script>";
  } 
}






 ?>
