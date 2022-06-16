<?php session_start(); if (empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title>MindOverLoad</title>
    <style media="screen">
      body{
        background-image: url();
        background-size: auto;
      }

    </style>
  </head>
  <body>
    <br><br><br>
    <div class="container">
      <div class="jumbotron">
        <div class="container">
          <div class="row justify-content-center">
              <h2><i> Welcome to MindOverLoad!!! </i></h2>
          </div>
          <div class="row justify-content-center">
            <p>
              <i>Question whatever you like and get the best answers from people all around the world.</i>
            </p>
          </div><br><br>
          <div class="row justify-content-md-center">
            <button onclick="location.href='signup.php'" class="btn btn-primary">Sign Up</button>&nbsp
            <button onclick="location.href='login.php'" class="btn btn-success">Log In</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="inc/jquery-3.3.1.slim.min.js"></script>
    <script src="inc/popper.min.js"></script>
    <script src="inc/bootstrap.min.js"></script>
  </body>
</html>
<?php } else {
  echo "<script>window.open('home.php', '_self')</script>";
}
?>
