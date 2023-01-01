<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>

    <?php require_once 'check_sign_in.php'; ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/aramco/php/main.php">Aramco</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://localhost/aramco/php/edit_percentages.php">Edit Percentages</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Edit Employees Information
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="http://localhost/aramco/php/info.php">Info</a></li>
                  <li><a class="dropdown-item" href="http://localhost/aramco/php/insert.php">Insert</a></li>
                  <li><a class="dropdown-item" href="http://localhost/aramco/php/update.php">Update</a></li>
                  <li><a class="dropdown-item" href="http://localhost/aramco/php/delete.php">Delete</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" method="POST">
              <button class="btn btn-danger" type="submit" name="log_out">Log Out</button>
            </form>
          </div>
      </div>
    </nav>

    <?php

      if(isset($_POST["log_out"]))
        {
          echo '
                <center>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b> Log Out Successful </b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </center>
          ';
          header("refresh:2;url= index.php");
          session_unset();
          exit;
        }

    ?>

  </body>
</html>