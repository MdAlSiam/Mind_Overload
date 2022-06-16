<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-secondary border">
  <?php if (empty($_SESSION['email'])) { ?>
    <a class="navbar-brand" href="welcome.php">MindOverLoad</a>
  <?php } else { ?>
    <a class="navbar-brand" href="home.php">MindOverLoad</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="profile.php"><?php echo $_SESSION['fn']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="timeline.php">Timeline</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="question.php">Ask</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ___
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="logoutDB.php">Log Out</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit" disabled>Search</button>
      </form>
    </div>
  <?php } ?>
</nav>
