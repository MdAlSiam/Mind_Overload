<?php

  include 'inc/connect.php';

  $qId = $_GET['id'];
  $queryQuestion = "select * from questions where q_id = $qId";
  $runQueryQuestion = mysqli_query($con, $queryQuestion);




    $result = mysqli_fetch_assoc($runQueryQuestion);
    $id = $result['q_id'];
    $title = $result['q_title'];
    $description = $result['q_description'];
    $imagePath = $result['image'];
    $userEmail = $result['email'];

    $queryUser = "select * from user_info where email = '$userEmail'";
    $runQueryUser = mysqli_query($con, $queryUser);

    if ($runQueryUser) {
      $result_ = mysqli_fetch_assoc($runQueryUser);
      $writer = $result_['first_name'] . " " . $result_['last_name'];
      $time = $result['time'];
    }

    $queryAnswers = "select first_name, last_name, ans_body, time from user_info, answers where user_info.email=answers.email and answers.q_id=$qId";

    $runQueryAnswers = mysqli_query($con, $queryAnswers);



 ?>
