<?php

  include 'inc/connect.php';

  $email = $_SESSION['email'];
  $query = "select * from questions where email = '$email' order by time desc ";


  $run = mysqli_query($con, $query);

 ?>
