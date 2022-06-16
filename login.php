<?php session_start(); if (empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title>Log In: MindOverLoad</title>

    <style media="screen">
      a:hover {
        text-decoration: inherit;
      }
    </style>
  </head>
  <body>
    <?php include 'navbar.php'; ?><br>



    <div class="container">
        <div class="jumbotron border">
          <div class="container">

            <div class="row justify-content-center">
              <h2><i>Log In</i></h2>
            </div><br>

            <div class="row justify-content-center">
              <div class="col-12">
                <form method="post">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
                  </div>

                  <div class="form-group">
                    <a href="signup.php">Don't have an account? Create one!!!</a>
                  </div>

                  <button type="submit" name="login" class="btn btn-primary">Log In!</button>

                </form>
              </div>
            </div>
            <?php include 'loginDB.php'; ?>
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
