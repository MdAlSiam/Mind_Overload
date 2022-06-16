<?php session_start(); if (!empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title>Update Question: MindOverLoad</title>

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

            <div class="row justify-content-center">
                <h4><i>Update</i></h4>
            </div>


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
            }

            $queryAnswers = "select first_name, last_name, ans_body, time from user_info, answers where user_info.email=answers.email and answers.q_id=$qId";

            $runQueryAnswers = mysqli_query($con, $queryAnswers);




        ?>





            <div class="row justify-content-center">
              <div class="col-12">
                <form enctype="multipart/form-data" method="post">
                  <div class="form-group">
                    <label for="title">Question Title</label>
                    <input type="text" class="form-control" id="title" name="q_title" placeholder="Question Title" value="<?=$title?>" required>
                  </div>

                  <div class="form-group">
                    <label for="body">Main Body</label>
                    <textarea class="form-control" id="body" name="main_body" rows="5" placeholder="Elaborate Question" required><?=$description?></textarea>
                  </div>

<!--
                  <div class="form-group">
                    <label for="file">Select Image</label>
                    <input type="file" class="form-control-file" id="file" name="image">
                  </div>
-->

                  <button type="submit" name="up" class="btn btn-primary">Update!</button>

                </form>
              </div>
              <?php include 'edel.php'; ?>
            </div><br>

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
