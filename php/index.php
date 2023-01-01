<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>

  <?php require_once 'sql.php'; ?>

    <center>
      <img src="https://www.eyeofriyadh.com/news_images/2019/11/11107b92bbec4.jpg" width="450" height="250">
      <h3> Engineering Ranking Tool 2022 </h3>
      <form method="POST" action="index.php">
        <fieldset>
          <div class="col-sm-3">
            <input type="email" name="email" class="form-control m-3" placeholder="Email" required>
          </div>
          <div class="col-sm-3">
            <input type="password" name="password" class="form-control m-3" placeholder="Password" required>
          </div>
          <div class="col-auto">
            <button type="submit" name="sign_in" class="btn btn-outline-primary m-3">Sign in</button>
          </div>
        </fieldset>
      </form>

      <?php
        if(isset($_POST["sign_in"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
          {
            $_POST["email"] = '"'.$_POST["email"].'"';
            $_POST["password"] = '"'.$_POST["password"].'"';
            if($connect_database)
              {
                $sign_in = $connect_database->prepare('SELECT * FROM sign_in WHERE email = '.$_POST["email"].' AND password = '.$_POST["password"].'');
                $sign_in->execute();
                foreach($sign_in as $print)
                {
                  $_SESSION["check_email"] = '"'.$print["email"].'"';
                  $_SESSION["check_password"] = '"'.$print["password"].'"';
                }
                if(empty($_SESSION["check_email"]))
                $_SESSION["check_email"] = "";
                if(empty($_SESSION["check_password"]))
                $_SESSION["check_password"] = "";
              }
                if($_POST["email"]==$_SESSION["check_email"] && $_POST["password"]==$_SESSION["check_password"])
                  { 
                    $_SESSION["email"] = $_POST["email"]; 
                    $_SESSION["password"] = $_POST["password"]; 
                    $_SESSION["sign_in"] = $_POST["sign_in"];
                    echo '
                          <center>
                            <div class="alert alert-success" role="alert">
                              <b> Succefall Sign in </b> 
                            </div>
                          </center>
                    ';
                    header("refresh:2;url= main.php");
                  }            
            elseif($_POST["email"]!=$_SESSION["check_email"] || $_POST["password"]!=$_SESSION["check_password"])
                  {
                    session_unset();
                    echo '
                          <center>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <b> The username or password is incorrect </b>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          </center>
                    ';
                    header("refresh:2;url= index.php");
                  }
            else
                {
                  session_unset();
                  echo '
                          <center>
                            <div class="alert alert-danger" role="alert">
                              <b>ERROR !</b>
                            </div>
                          </center>
                  ';
                  header("refresh:2;url= index.php");
                }
          }
      ?>
    
    </center>

  </body>
</html>