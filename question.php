<?php session_start(); if (!empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title>Ask Question: MindOverLoad</title>

    <style media="screen">
      a:hover {
        text-decoration: inherit;
      }
    </style>
  </head>
  <body>
    <?php include 'navbar.php'; ?><br><br>

    <br><br>
    <div class="container">
        <div class="jumbotron border">
          <div class="container">

            <?php


                    include 'inc/connect.php';

                    $email = $_SESSION['email'];
                    $queryProfile = "select status from user_info where email='$email'";
                    $runQueryProfile = mysqli_query($con, $queryProfile);
                    $result = mysqli_fetch_assoc($runQueryProfile);


             if ($result['status']!='verified') { ?>
                  <div class="container">
                    <div class="alert alert-danger">
                      <?php
                        echo "Please verify your account to post a question. A link was sent to your email.";
                       ?>
                    </div>
                  </div>

          <?php } else { ?>
            <div class="row justify-content-center">
                <h4><i>Ask Your Question!!!</i></h4>
            </div>

            <div class="row justify-content-center">
              <div class="col-12">
                <form enctype="multipart/form-data" method="post">
                  <div class="form-group">
                    <label for="title">Question Title</label>
                    <input type="text" class="form-control" id="title" name="q_title" placeholder="Question Title" required>
                  </div>

                  <div class="form-group">
                    <label for="body">Main Body</label>
                    <textarea class="form-control" id="body" name="main_body" rows="5" placeholder="Elaborate Question" required></textarea>
                  </div>

                  <div class="form-group">
                    <label for="file">Select Image</label>
                    <input type="file" class="form-control-file" id="file" name="image">
                  </div>

                  <button type="submit" name="ask" class="btn btn-primary">Ask!</button>

                </form>
              </div>
              <?php include 'questionDB.php'; ?>
            </div><br>
          <?php } ?>
            <div class="row justify-content-center">
              <div class="col-12">

              </div>
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
  echo "<script>window.open('welcome.php', '_self')</script>";
}
?>
