<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>

    <?php 
    ob_start();
    ?>

    <?php require_once 'check_sign_in.php'; ?>
    <?php require_once 'nav.php'; ?>
    <?php require_once 'sql.php'; ?>
    <br>
    <form method="POST">
      <fieldset>
        <table class="table-danger table table-bordered">
          <tr class="table-warning">
            <th colspan="18"><center> Employee Insert </center></th>
          </tr>

          <tr style="font-size:67%;" class="table-success">
            <th> Personal No </th> <th> Name </th> <th> PSG </th> <th> Age Yrs </th> <th> Hire Date </th> <th> Service years </th> <th> Perm Job Title </th>
            <th> Perm Div CC Title </th> <th> Perm Dept Title </th> <th> Previous Exp </th> <th> Days </th> <th> HIPO </th> <th> PMP 2021 </th> <th> PMP 2020 </th> <th> PMP 2019 </th>
          </tr>
          
          <tr class="table-primary">
            <th>  
              <input type="number" name="insert_emp_personal_no" min="0" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="text" name="insert_emp_name" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="number" name="insert_emp_psg" min="11" max="15" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="number" name="insert_emp_age" min="18" max="60" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="date" name="insert_emp_hire_date" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="number" name="insert_emp_service_years" min="0" max="40" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="text" name="insert_emp_perm_job_title" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="text" name="insert_emp_perm_div_cc_title" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="text" name="insert_emp_perm_dept_title" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="text" name="insert_emp_previous_exp" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <input type="number" name="insert_emp_days" min="0" max="360" class="form-control" placeholder="Enter New Data" style="font-size:50%;" required>
            </th>
            <th>  
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_hipo" value="Y" id="insert_emp_hipo_yes" checked>
                <label class="form-check-label" for="insert_emp_hipo_yes">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_hipo" value="N" id="insert_emp_hipo_no">
                <label class="form-check-label" for="insert_emp_hipo_no">
                  No
                </label>
              </div>
            </th>
            <th>  
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2021" value="S" id="insert_emp_pmp_2021_s" checked>
                <label class="form-check-label" for="insert_emp_pmp_2021_s">
                  S
              </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2021" value="E+" id="insert_emp_pmp_2021_e+">
                <label class="form-check-label" for="insert_emp_pmp_2021_e+">
                  E+
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2021" value="E" id="insert_emp_pmp_2021_e">
                <label class="form-check-label" for="insert_emp_pmp_2021_e">
                  E
                  </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2021" value="M" id="insert_emp_pmp_2021_m">
                <label class="form-check-label" for="insert_emp_pmp_2021_m">
                  M
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2021" value="D" id="insert_emp_pmp_2021_d">
                <label class="form-check-label" for="insert_emp_pmp_2021_d">
                  D
                </label>
              </div>
            </th>
            <th>  
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2020" value="S" id="insert_emp_pmp_2020_s" checked>
                <label class="form-check-label" for="insert_emp_pmp_2020_s">
                  S
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2020" value="E+" id="insert_emp_pmp_2020_e+">
                <label class="form-check-label" for="insert_emp_pmp_2020_e+">
                  E+
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2020" value="E" id="insert_emp_pmp_2020_e">
                <label class="form-check-label" for="insert_emp_pmp_2020_e">
                  E
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2020" value="M" id="insert_emp_pmp_2020_m">
                <label class="form-check-label" for="insert_emp_pmp_2020_m">
                  M
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2020" value="D" id="insert_emp_pmp_2020_d">
                <label class="form-check-label" for="insert_emp_pmp_2020_d">
                  D
                </label>
              </div>
            </th>
            <th>  
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2019" value="S" id="insert_emp_pmp_2019_s" checked>
                <label class="form-check-label" for="insert_emp_pmp_2019_s">
                  S
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2019" value="E+" id="insert_emp_pmp_2019_e+">
                <label class="form-check-label" for="insert_emp_pmp_2019_e+">
                  E+
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2019" value="E" id="insert_emp_pmp_2019_e">
                <label class="form-check-label" for="insert_emp_pmp_2019_e">
                  E
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2019" value="M" id="insert_emp_pmp_2019_m">
                <label class="form-check-label" for="insert_emp_pmp_2019_m">
                  M
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="insert_emp_pmp_2019" value="D" id="insert_emp_pmp_2019_d">
                <label class="form-check-label" for="insert_emp_pmp_2019_d">
                  D
                </label>
              </div>
            </th>
          </tr>
  
        </table>

        <style>
          input::-webkit-inner-spin-button,
          input::-webkit-outer-spin-button
          {
            -webkit-appearance: none;
          }
        </style>

        <div class="d-grid gap-2 m-3">
          <button type="submit" name="insert" class="btn btn-outline-primary m-3"> Insert </button>
        </div>
      </fieldset>
    </form>

    <?php

      if
        (
          isset($_POST["insert"]) && !empty($_POST["insert_emp_personal_no"]) && !empty($_POST["insert_emp_name"]) && !empty($_POST["insert_emp_psg"]) && !empty($_POST["insert_emp_age"]) && !empty($_POST["insert_emp_hire_date"])
          && !empty($_POST["insert_emp_service_years"]) && !empty($_POST["insert_emp_perm_job_title"]) && !empty($_POST["insert_emp_perm_div_cc_title"]) && !empty($_POST["insert_emp_perm_dept_title"])
          && !empty($_POST["insert_emp_previous_exp"]) && !empty($_POST["insert_emp_days"]) && !empty($_POST["insert_emp_hipo"]) && !empty($_POST["insert_emp_pmp_2021"]) 
          && !empty($_POST["insert_emp_pmp_2020"]) && !empty($_POST["insert_emp_pmp_2019"]) 
        )
        {
          $_SESSION["insert_emp_personal_no"] = $_POST["insert_emp_personal_no"];
          $_SESSION["insert_emp_name"] = $_POST["insert_emp_name"];
          $_SESSION["insert_emp_psg"] = $_POST["insert_emp_psg"];
          $_SESSION["insert_emp_age"] = $_POST["insert_emp_age"];
          $_SESSION["insert_emp_hire_date"] = $_POST["insert_emp_hire_date"];
          $_SESSION["insert_emp_service_years"] = $_POST["insert_emp_service_years"];
          $_SESSION["insert_emp_perm_job_title"] = $_POST["insert_emp_perm_job_title"];
          $_SESSION["insert_emp_perm_div_cc_title"] = $_POST["insert_emp_perm_div_cc_title"];
          $_SESSION["insert_emp_perm_dept_title"] = $_POST["insert_emp_perm_dept_title"];
          $_SESSION["insert_emp_previous_exp"] = $_POST["insert_emp_previous_exp"];
          $_SESSION["insert_emp_days"] = $_POST["insert_emp_days"];
          $_SESSION["insert_emp_hipo"] = $_POST["insert_emp_hipo"];
          $_SESSION["insert_emp_pmp_2021"] = $_POST["insert_emp_pmp_2021"];
          $_SESSION["insert_emp_pmp_2020"] = $_POST["insert_emp_pmp_2020"];
          $_SESSION["insert_emp_pmp_2019"] = $_POST["insert_emp_pmp_2019"];

          $_SESSION["psg"] = $_POST["insert_emp_psg"];
          $_SESSION["service_years"] = $_POST["insert_emp_service_years"];
          $_SESSION["perm_job_title"] = $_POST["insert_emp_perm_job_title"];
          $_SESSION["perm_dept_title"] = $_POST["insert_emp_perm_dept_title"];
          $_SESSION["perm_div_cc_title"] = $_POST["insert_emp_perm_div_cc_title"];
          $_SESSION["days"] = $_POST["insert_emp_days"];
          $_SESSION["hipo"] = $_POST["insert_emp_hipo"];
          $_SESSION["pmp_2021"] = $_POST["insert_emp_pmp_2021"];
          $_SESSION["pmp_2020"] = $_POST["insert_emp_pmp_2020"];
          $_SESSION["pmp_2019"] = $_POST["insert_emp_pmp_2019"];

          $select_personal_no = $connect_database->prepare('SELECT i.personal_no FROM info i , covering c , hipo h , pmp p , ranking r 
          WHERE i.personal_no = '.$_SESSION["insert_emp_personal_no"].' AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND
          p.personal_no = i.personal_no AND r.personal_no = i.personal_no
          ');
          $select_personal_no->execute();

          foreach($select_personal_no as $print)
          {
            $_SESSION["check_personal_no"] = $print["personal_no"];
          }
          
          if(!empty($_SESSION["check_personal_no"]))
          {
            echo '<center> Employee Id <b>'.$_SESSION["check_personal_no"].'</b> already exists ! </center>';
            exit;
          }
          elseif(empty($_SESSION["check_personal_no"]))
          {
          require_once 'function.php';

          echo ' <center>Are you sure you want to <b>Insert</b> this information ? <br></center>';
          echo '
            <table class="table-danger table table-bordered">
              <tr class="table-warning">
                <th colspan="23"><center><b> New Information </b></center></th>
              </tr>
              <tr style="font-size:67%;" class="table-success">
                <th> Personnel No </th> <th> Name </th> <th> PSG </th> <th> Score PSG </th> <th> Age Yrs </th> <th> Hire Date </th> <th> Service years </th> <th> Perm Job Title </th>
                <th> Perm Div CC Title </th> <th> Perm Dept Title </th> <th> Previous Exp </th> <th> Score dept </th> <th> Days </th> <th> Score days </th> <th> HIPO </th> <th> Score HIPO </th>
                <th> PMP 2021 </th> <th> PMP 2020 </th> <th> PMP 2019 </th> <th> AVG PMP </th> <th> Score PMP </th> <th> Total </th> <th> Rank </th>
              </tr>
              <tr style="font-size:67%;" class="table-success">
                <th> '.$_POST["insert_emp_personal_no"].' </th> <th> '.$_POST["insert_emp_name"].' </th> <th> '.$_POST["insert_emp_psg"].' </th> <th> '.$_SESSION["count_score_psg"].' </th> <th> '.$_POST["insert_emp_age"].' </th> <th> '.$_POST["insert_emp_hire_date"].' </th>
                <th> '.$_POST["insert_emp_service_years"].' </th> <th> '.$_POST["insert_emp_perm_job_title"].' </th> <th> '.$_POST["insert_emp_perm_div_cc_title"].' </th> <th> '.$_POST["insert_emp_perm_dept_title"].' </th> <th> '.$_POST["insert_emp_previous_exp"].' </th> 
                <th> '.$_SESSION["count_score_dept"].' </th> <th> '.$_POST["insert_emp_days"].' </th> <th> '.$_SESSION["count_score_days"].' </th> <th> '.$_POST["insert_emp_hipo"].' </th> <th> '.$_SESSION["count_score_hipo"].' </th> <th> '.$_POST["insert_emp_pmp_2021"].' </th> 
                <th> '.$_POST["insert_emp_pmp_2020"].' </th> <th> '.$_POST["insert_emp_pmp_2019"].' </th> <th> '.$_SESSION["avg_score_pmp"].' </th> <th> '.$_SESSION["count_score_pmp"].' </th> <th> '.$_SESSION["total_scores"].' </th> <th></th>
              </tr>
            </table>
          ';
          echo '
            <center>
              <form method="POST">
                <fieldset>
                  <div class="col-auto">
                    <button type="submit" name="confirm_insert" class="btn btn-outline-danger m-3"> Yes </button>
                    <button type="submit" name="cancel_insert" class="btn btn-outline-danger m-3"> No </button>
                  </div>
                </fieldset>
              </form>
            </center>
          ';
          }
        }
      if(isset($_POST["confirm_insert"]))
        {
          $insert_emp_info = $connect_database->prepare
          ('INSERT INTO info
            VALUES 
            (
            '.$_SESSION["insert_emp_personal_no"].' , "'.$_SESSION["insert_emp_name"].'" , '.$_SESSION["insert_emp_psg"].' , '.$_SESSION["count_score_psg"].' , '.$_SESSION["insert_emp_age"].' ,
            "'.$_SESSION["insert_emp_hire_date"].'" , '.$_SESSION["insert_emp_service_years"].' , "'.$_SESSION["insert_emp_perm_job_title"].'" , "'.$_SESSION["insert_emp_perm_div_cc_title"].'" ,
            "'.$_SESSION["insert_emp_perm_dept_title"].'" , "'.$_SESSION["insert_emp_previous_exp"].'" , '.$_SESSION["count_score_dept"].' , '.$_SESSION["total_scores"].'
            )
          ');

          $insert_emp_covering = $connect_database->prepare
          ('INSERT INTO covering
            VALUES 
            (
            '.$_SESSION["insert_emp_personal_no"].' , "'.$_SESSION["insert_emp_name"].'" , '.$_SESSION["insert_emp_days"].' , '.$_SESSION["count_score_days"].'
            )
          ');

          $insert_emp_hipo = $connect_database->prepare
          ('INSERT INTO hipo
            VALUES (
            '.$_SESSION["insert_emp_personal_no"].' , "'.$_SESSION["insert_emp_name"].'" , "'.$_SESSION["insert_emp_hipo"].'" , '.$_SESSION["count_score_hipo"].'
            )
          ');

          $insert_emp_pmp = $connect_database->prepare
          ('INSERT INTO pmp
            VALUES (
            '.$_SESSION["insert_emp_personal_no"].' , "'.$_SESSION["insert_emp_name"].'" , "'.$_SESSION["insert_emp_pmp_2021"].'" , "'.$_SESSION["insert_emp_pmp_2020"].'" ,
            "'.$_SESSION["insert_emp_pmp_2019"].'" , '.$_SESSION["count_score_pmp"].' , "'.$_SESSION["avg_score_pmp"].'"
            )
          ');

          $insert_emp_rank = $connect_database->prepare
          ('INSERT INTO ranking ( personal_no , name , total )
            VALUES (
            '.$_SESSION["insert_emp_personal_no"].' , "'.$_SESSION["insert_emp_name"].'" , '.$_SESSION["total_scores"].'
            )
          ');

          $insert_emp_info->execute();
          $insert_emp_covering->execute();
          $insert_emp_hipo->execute();
          $insert_emp_pmp->execute();
          $insert_emp_rank->execute();

          $select_emp_total = $connect_database->prepare
          ('
          SELECT i.total , i.personal_no
          FROM info i , covering c ,hipo h , pmp p , ranking r
          WHERE i.personal_no = i.personal_no and c.personal_no = i.personal_no and h.personal_no = i.personal_no and p.personal_no = i.personal_no and r.personal_no = i.personal_no
          and i.total = r.total
          ORDER BY i.total DESC
          ') ;
          $select_emp_total->execute();

          $x = 1;
          foreach($select_emp_total as $rank)
          {
            $update_emp_rank = $connect_database->prepare
            ('
            UPDATE ranking SET rank = '.($x).' WHERE personal_no = '.$rank["personal_no"].' ;
            ');
            $update_emp_rank->execute();
            $x++;
          }
          
          $select_info_insert = $connect_database->prepare
          ('
          SELECT i.personal_no , i.name , i.psg , i.age_yrs , i.hire_date , i.service_years , i.perm_job_title , i.perm_div_cc_title , i.perm_dept_title , i.previous_exp ,
          c.days ,
          h.hipo ,
          p.pmp_2021 , p.pmp_2020 , p.pmp_2019 
          from info i , covering c , hipo h , pmp p , ranking r
          where i.personal_no = '. $_SESSION["insert_emp_personal_no"] .' and c.personal_no = '. $_SESSION["insert_emp_personal_no"] .' and h.personal_no = '. $_SESSION["insert_emp_personal_no"] .' and p.personal_no = '. $_SESSION["insert_emp_personal_no"] .' and r.personal_no = '. $_SESSION["insert_emp_personal_no"] .'
          ');
          $select_info_insert->execute();

          if($select_info_insert->rowCount() == 1)
            {
              echo '
                <center>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b>'. $_SESSION["insert_emp_personal_no"] .' Inserted Successful </b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </center>
              ';
              header("refresh:2;url= insert.php");
            }
          else
            {
              echo '    
                <center>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <b> Insert Failed </b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </center>
              ';
              header("refresh:2;url= insert.php");
            }

        
        }
      elseif(isset($_POST["cancel_insert"]))
            {
              echo '
                <center>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b> Insert canceled Successful </b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </center>
              ';
              header("refresh:2;url= insert.php");
            }

    ?>

    <?php 
    ob_end_flush();
    ?>

  </body>
</html>