<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>
    <?php

      if(isset($_SESSION["sign_in"]) && !empty($_SESSION["email"]) && !empty($_SESSION["password"]))
        {
          if($_SESSION["email"]==$_SESSION["check_email"] && $_SESSION["password"]==$_SESSION["check_password"])
            {
            } 
        }
      else
        {
          session_unset();
          echo '
                <center>
                  <div class="alert alert-danger" role="alert">
                    <b> ERROR ! </b>
                  </div>
                </center>
          ';
          header("refresh:2;url= index.php");
          exit;
        }
    ?>
  </body>
</html>