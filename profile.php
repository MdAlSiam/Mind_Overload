<?php session_start(); if (!empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title><?=$_SESSION['fn']?>: MindOverLoad</title>

    <style media="screen">
      a:hover {
        text-decoration: inherit;
      }
    </style>
  </head>
  <body>
    <?php include 'navbar.php'; ?><br><br>


    <?php

        include 'inc/connect.php';

        $email = $_SESSION['email'];
        $queryProfile = "select * from user_info where email='$email'";
        $runQueryProfile = mysqli_query($con, $queryProfile);
        $result = mysqli_fetch_assoc($runQueryProfile);



    ?>
<br><br>
<?php if ($result['status']!='verified') { ?>
      <div class="container">
        <div class="alert alert-danger">
          <?php
            echo "Please verify your account. A link was sent to your email.";
           ?>
        </div>
      </div>
    <?php } ?>



    <br>
    <div class="container">
        <div class="jumbotron border">
          <div class="container">





            <div class="row justify-content-center">
              <div class="col-12">

              <form method="post">
                <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>First Name</td>
                                <td>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="fn" value="<?=$result['first_name']?>">
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="ln" value="<?=$result['last_name']?>">
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>
                                <div class="form-group">
                                <input type="email" class="form-control"  name="email" value="<?=$result['email']?>" disabled>
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Phone No.</td>
                                <td>
                                <div class="form-group">
                                <input type="text" class="form-control"  name="phn" value="<?=$result['phone_no']?>">
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Date of Birth</td>
                                <td>
                                <div class="form-group">
                                <input type="date" class="form-control"  name="dob" value="<?=$result['DOB']?>">
                                </div>
                                </td>
                            </tr>

                        </tbody>

                        </table>
                        <button type='submit' name='up' class='btn btn-success'>Save</button>
                    </form>
              </div>
              <?php

              if (isset($_POST['up'])) {
                $fn = htmlentities(mysqli_escape_string($con, $_POST['fn']));
                $ln = htmlentities(mysqli_escape_string($con, $_POST['ln']));
                $phn = htmlentities(mysqli_escape_string($con, $_POST['phn']));
                $dob = htmlentities(mysqli_escape_string($con, $_POST['dob']));


                $update = "update user_info set first_name='$fn', last_name='$ln', phone_no='$phn', DOB='$dob' where email='$email'";



                $run = mysqli_query($con, $update);


                if ($run) {
                    $_SESSION['fn'] = $fn;
                    $_SESSION['ln'] = $ln;
                    $_SESSION['phn'] = $phn;
                    $_SESSION['dob'] = $dob;
                    echo "<script>alert('your question has been sccessfully updated!!!')</script>";
                    echo "<script>window.open('profile.php', '_self')</script>";
                } else {
                    $_SESSION['err'] = "Error: " . mysqli_error($con);
                }
              }

              ?>
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
