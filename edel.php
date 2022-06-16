<?php

  include 'inc/connect.php';

  if (isset($_GET['op'])) {
    $qId = $_GET['id'];
    $queryDelQuestion = "delete from questions where q_id = $qId";
    $runQueryDelQuestion = mysqli_query($con, $queryDelQuestion);

    if ($runQueryDelQuestion) {
        if (!empty($_GET['path'])) {
            $path = $_GET['path'];
            unlink($path);
        }
        
        echo "<script>alert('Your question has been sccessfully deleted!!!')</script>";
        echo "<script>window.open('timeline.php', '_self')</script>";
    } else {
        echo "<script>alert('Your question could not be deleted!!!')</script>";
    }


  }   else if (isset($_POST['up'])) {
            $qTitle = htmlentities(mysqli_escape_string($con, $_POST['q_title']));
            $body = htmlentities(mysqli_escape_string($con, $_POST['main_body']));
    
            $queryUpdate = "update questions set q_title='$qTitle', q_description='$body' where q_id=$id";
            $runQueryUpdate = mysqli_query($con, $queryUpdate);

            if ($runQueryUpdate) {
                echo "<script>alert('Your question has been sccessfully edited!!!')</script>";
                echo "<script>window.open('des_ques.php?id=$id', '_self')</script>";
            } else {
                echo "<script>alert('Your question could not be edited!!!')</script>";
            }
  }


    




 ?>
