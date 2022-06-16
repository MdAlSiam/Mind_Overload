<?php

  include 'inc/connect.php';

  $results_per_page = 5;
  if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
    $start = 0;
  } else {
    $start = ($_GET['page'] - 1) * $results_per_page;
  }

  $query = "select q_id, q_title, time, first_name, last_name from questions, user_info
            where user_info.email=questions.email order by time desc";

  $run = mysqli_query($con, $query);
  $number_of_pages = ceil(mysqli_num_rows($run) / $results_per_page);

  $queryLimited = "select q_id, q_title, time, first_name, last_name from questions, user_info
            where user_info.email=questions.email order by time desc limit $start, $results_per_page ";
  $run = mysqli_query($con, $queryLimited);

 ?>
