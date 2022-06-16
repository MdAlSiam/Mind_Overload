<?php session_start(); if (empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title>Sign Up: MindOverLoad</title>

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
              <h2><i>Sign Up</i></h2>
            </div><br>

            <div class="row justify-content-center">
              <div class="col-12">
                <form method="post">

                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname"name="first_name" placeholder="Enter First Name" required>
                  </div>

                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Enter Last Name" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
                  </div>

                  <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="birth_date" placeholder="Enter Date of Birth" required>
                  </div>
                  <div class="form-group">
                    <a href="login.php">Already have an account?</a>
                  </div>

                  <button type="submit" name="signup" class="btn btn-primary">Sign Up!</button>

                </form>
              </div>
            </div>
            <?php include 'signupDB.php'; ?>
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
