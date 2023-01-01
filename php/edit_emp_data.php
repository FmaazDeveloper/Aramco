<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>
    
    <?php require_once 'check_sign_in.php'; ?>
    <?php require_once 'nav.php'; ?>

    <center>
      <form method="POST">
        <fieldset>
          <div class="col-sm-3">
            <input type="number" name="emp_id" class="form-control m-3" placeholder="Enter Employee ID" required>
          </div>
          <div class="col-auto">
            <button type="submit" name="check_id" class="btn btn-primary m-3">Check ID</button>
          </div>
        </fieldset>
      </form>
      <style>
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button
          {
            -webkit-appearance: none;
          }
      </style>

      <?php

        if(isset($_POST["check_id"]) && !empty($_POST["emp_id"]))
          {
            $_SESSION["emp_id"] = $_POST["emp_id"];
            echo '
                  <form method="POST" class="row gx-3 gy-2 align-items-center">
                    <fieldset>
                      <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Select type of edit
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="http://localhost/aramco/php/insert.php">Insert</a></li>
                          <li><a class="dropdown-item" href="http://localhost/aramco/php/update.php">Update</a></li>
                          <li><a class="dropdown-item" href="http://localhost/aramco/php/delete.php">Delete</a></li>
                        </ul>
                      </div>
                    </fieldset>
                  </form>
            ';
          }

      ?>

    </center>
  </body>
</html>