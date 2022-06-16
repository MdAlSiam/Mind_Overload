<?php session_start(); if (!empty($_SESSION['email'])) { ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">

    <title><?php echo $_SESSION['fn']; ?>: Home: MindOverLoad</title>

    <style media="screen">
      a:hover {
        text-decoration: inherit;
      }
      .link {
        color: black;
      }
    </style>
  </head>
  <body>
    <?php include 'navbar.php'; ?><br><br>




    <?php include 'homeDB.php' ?> <br>

    <div class="container border">

      <div class="row justify-content-center align-items-center">
        <div class="col-12">

        </div>
      </div>

      <?php while ($row = mysqli_fetch_assoc($run)) { ?>
        <?php $qid = $row['q_id']; ?>
        <div class="row justify-content-center align-items-center">
          <div class="col-12"><br>
            <div class="jumbotron border border-success">
              <a href="des_ques.php?id=<?php echo $qid; ?>" class="link d-flex justify-content-center h4"> <?php echo $row['q_title']; ?><br></a>
              <p class="h5 d-flex justify-content-center">By <?php echo $row['first_name'] . " " . $row['last_name']; ?> </p>
              <p class="h6 d-flex justify-content-center">At <?php echo $row['time']; ?> </p>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="row justify-content-center align-items-center">

          <nav aria-label="Page navigation example">
            <ul class="pagination">

              <?php if ($start != 0) { ?>
                <li class="page-item"><a class="page-link" href="home.php?page=<?php echo $_GET['page']-1; ?>">Previous</a></li>
              <?php } ?>

              <?php for ($page = 1; $page <= $number_of_pages; $page++) { ?>
                <?php if ($page == $_GET['page']) { ?>
                  <li class="page-item active"><a class="page-link" href="home.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                <?php } else { ?>
                  <li class="page-item"><a class="page-link" href="home.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                <?php } ?>
              <?php } ?>

              <?php if ($_GET['page'] != $number_of_pages) { ?>
                <li class="page-item"><a class="page-link" href="home.php?page=<?php echo $_GET['page']+1; ?>">Next</a></li>
              <?php } ?>

            </ul>
          </nav>

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
