<?php session_start(); if (!empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title>Timeline: MindOverLoad</title>

    <style media="screen">
      a:hover {
        text-decoration: none;
      }
      .link {
        color: black;
      }
    </style>
  </head>
  <body>
    <?php include 'navbar.php'; ?><br><br>


    <?php
      include 'des_quesDB.php';
    ?>
          <br><br>

          <div class="container">

            <div class="row justify-content-center">
              <div class="col-12">

              </div>
            </div>

            <div class="jumbotron">
              <div class="row justify-content-center">
                <div class="col-12">
                  <p class="h3"> <?php echo $title; ?> </p>
                  <p class="h6">By <?php echo $writer; ?> </p>
                  <p class="h6"> <?php echo $time; ?> </p>
                </div>
              </div>
              <br><br>
              <div class="row justify-content-center">
                <div class="col-12">
                  <p class="h4"> Question Description</p><hr>
                  <p class="h6"> <?php echo $description; ?> </p>
                </div>
              </div><hr>
              <br>
              <div class="row justify-content-center">
                <div class="col-12">
                  <?php if ($writer==$_SESSION['fn']." ".$_SESSION['ln']) { ?>
                      <button onclick="location.href='edit.php?id=<?=$id?>'" class="btn btn-primary">Edit</button>&nbsp
                      <button onclick="location.href='edel.php?id=<?=$id?>&op=del&path=<?=$imagePath?>'" class="btn btn-danger" name="delete">Delete</button>&nbsp
                  <?php } ?>
                </div>
              </div>
              <br><br>
              <div class="row justify-content-center">
                <div class="col-12">
                  <?php if (!empty($imagePath)) { ?>
                  <img src = <?php echo $imagePath; ?> class="img-fluid img-thumbnail" alt="Responsive image">
                <?php } ?>
                </div>
              </div>
            </div>

            <br><br>
            <div class="row justify-content-center">
              <div class="col-12">

              </div>
            </div>
          </div>

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
                              echo "Please verify your account to give an answer. A link was sent to your email.";
                             ?>
                          </div>
                        </div>

                  <?php } else { ?>
                  <div class="row justify-content-center">
                      <h4><i>Give Your Solution!!!</i></h4>
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-12">
                      <form method="post">


                        <div class="form-group">
                          <label for="body">Answer Body</label>
                          <textarea class="form-control" id="body" name="answer_body" rows="2" placeholder="Write Answer" required></textarea>
                        </div>



                        <button type="submit" name="answer" class="btn btn-primary">Answer!</button>

                      </form>
                    </div>
                    <?php include 'answerDB.php'; ?>
                  </div><br>
                <?php } ?>
                  <div class="row justify-content-center">
                    <div class="col-12">

                    </div>
                  </div>
                </div>
            </div>
          </div>


          <div class="container">

            <div class="row justify-content-center">
              <div class="col-12">

              </div>
            </div>
            <?php while ($row = mysqli_fetch_assoc($runQueryAnswers)) { ?>
              <div class="jumbotron">
                <div class="row justify-content-center">
                  <div class="col-12">
                    <p class="h5"><?php echo $row['first_name'] . " " . $row['last_name']; ?> </p>
                    <p class="h6"><?php echo $row['time']; ?> </p>
                  </div>
                </div>
                <br><br>
                <div class="row justify-content-center">
                  <div class="col-12">
                    <p class="h5"> Answer</p><hr>
                    <p class="h6"> <?php echo $row['ans_body']; ?> </p>
                  </div>
                </div><hr>
                <br><br>

              </div>
            <?php } ?>

            <br><br>
            <div class="row justify-content-center">
              <div class="col-12">

              </div>
            </div>
          </div><br><br>

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
