<?php


if (isset($_POST['answer'])) {
  $answerBody = htmlentities(mysqli_escape_string($con, $_POST['answer_body']));
  $email = $_SESSION['email'];
  $queryAnswer = "insert into answers(q_id, ans_body, email) values('$qId', '$answerBody', '$email')";

  $runQueryAnswer = mysqli_query($con, $queryAnswer);


  if ($runQueryAnswer) {
    echo "<script>window.open('des_ques.php?id=$qId', '_self')</script>";
  } else {
  }
}






 ?>
