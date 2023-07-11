<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>

    <?php require_once 'check_sign_in.php'; ?>
    <?php require_once 'nav.php'; ?>
    <?php require_once 'sql.php'; ?>

    <center>
      <form method="POST">
        <fieldset>
          <div class="col-sm-3">
            <input type="number" name="delete_emp_info" min="0" class="form-control m-3" placeholder="Enter Employee ID" required>
          </div>

          <style>
            input::-webkit-inner-spin-button,
            input::-webkit-outer-spin-button
              {
                -webkit-appearance: none;
              }
          </style>

          <div class="col-auto">
            <button type="submit" name="delete_info" class="btn btn-outline-danger m-3"> Delete </button>
          </div>
        </fieldset>
      </form>

      <?php

        if(isset($_POST["delete_info"]) && !empty($_POST["delete_emp_info"]))
          {
            $_SESSION["delete_emp_info"] = $_POST["delete_emp_info"];
            $_SESSION["delete_info"] = $_POST["delete_info"];
            if($connect_database)
              {
                // select all info from all tables
                $select_data_info = $connect_database->prepare
                ('
                SELECT i.personal_no , i.name , i.psg , i.score_psg , i.age_yrs , i.hire_date , i.service_years , i.perm_job_title , i.perm_div_cc_title , i.perm_dept_title , i.previous_exp , i.score_dept ,
                c.days , c.score_days , 
                h.hipo , h.score_hipo ,
                p.pmp_2021 , p.pmp_2020 , p.pmp_2019 , p.score_pmp , p.avg_pmp ,
                r.total , r.ranking
                from info i , covering c , hipo h , pmp p , ranking r
                where i.personal_no = '. $_SESSION["delete_emp_info"] .' and i.personal_no = c.personal_no and i.personal_no = h. personal_no and i.personal_no = p.personal_no and i.personal_no = r.personal_no
                ');
                $select_data_info->execute();

                // print all info
                if($select_data_info->rowCount() == 1)
                  {
                    foreach($select_data_info as $print_info)
                            {
                              echo '
                                    <br>
                                    <p> Are you sure you want to <b>Delete</b> the employee with this information ?</p>
                                    <table class="table-success table table-bordered" style="font-size:67%;">
                                      <tr class="table-warning">
                                        <th colspan="23"><center> Employee Info </center></th>
                                      </tr>
                                      <tr class="table-success">
                                        <th> Personnel No </th> <th> Name </th> <th> PSG </th> <th> Score PSG </th> <th> Age Yrs </th>
                                        <th> Hire Date </th> <th> Service years </th> <th> Perm Job Title </th><th> Perm Div CC Title </th>
                                        <th> Perm Dept Title </th> <th> Score dept </th> <th> Previous Exp </th> <th> Days </th> <th> Score days </th>
                                        <th> HIPO </th> <th> Score HIPO </th><th> PMP 2021 </th> <th> PMP 2020 </th> <th> PMP 2019 </th> <th> AVG PMP </th>
                                        <th> Score PMP </th> <th> Total </th> <th> Rank </th>
                                      </tr>
                                      <tr class="table-info">
                                        <th> '.$print_info["personal_no"].' </th> <th> '.$print_info["name"].' </th> <th> '.$print_info["psg"].' </th> <th> '.$print_info["score_psg"].' </th>
                                        <th> '.$print_info["age_yrs"].' </th> <th> '.$print_info["hire_date"].' </th> <th> '.$print_info["service_years"].' </th>
                                        <th> '.$print_info["perm_job_title"].' </th> <th> '.$print_info["perm_div_cc_title"].' </th> <th> '.$print_info["perm_dept_title"].' </th>
                                        <th> '.$print_info["previous_exp"].' </th> <th> '.$print_info["score_dept"].' </th> <th> '.$print_info["days"].' </th> <th> '.$print_info["score_days"].' </th>
                                        <th> '.$print_info["hipo"].' </th> <th> '.$print_info["score_hipo"].' </th> <th> '.$print_info["pmp_2021"].' </th> <th> '.$print_info["pmp_2020"].' </th>
                                        <th> '.$print_info["pmp_2019"].' </th> <th> '.$print_info["score_pmp"].' </th> <th> '.$print_info["avg_pmp"].' </th> <th> '.$print_info["total"].' </th> <th> '.$print_info["ranking"].' </th>
                                      </tr>
                                    </table>
                              ';
                              $_SESSION["personal_no"] = $print_info["personal_no"]; $_SESSION["name"] = $print_info["name"]; $_SESSION["psg"] = $print_info["psg"]; $_SESSION["score_psg"] = $print_info["score_psg"];
                              $_SESSION["age_yrs"] = $print_info["age_yrs"]; $_SESSION["hire_date"] = $print_info["hire_date"]; $_SESSION["service_years"] = $print_info["service_years"]; $_SESSION["perm_job_title"] = $print_info["perm_job_title"];
                              $_SESSION["perm_div_cc_title"] = $print_info["perm_div_cc_title"]; $_SESSION["perm_dept_title"] = $print_info["perm_dept_title"]; $_SESSION["previous_exp"] = $print_info["previous_exp"];
                              $_SESSION["score_dept"] = $print_info["score_dept"]; $_SESSION["days"] = $print_info["days"]; $_SESSION["score_days"] = $print_info["score_days"]; $_SESSION["hipo"] = $print_info["hipo"];
                              $_SESSION["score_hipo"] = $print_info["score_hipo"]; $_SESSION["pmp_2021"] = $print_info["pmp_2021"]; $_SESSION["pmp_2020"] = $print_info["pmp_2020"]; $_SESSION["pmp_2019"] = $print_info["pmp_2019"];
                              $_SESSION["score_pmp"] = $print_info["score_pmp"]; $_SESSION["avg_pmp"] = $print_info["avg_pmp"]; $_SESSION["total"] = $print_info["total"]; $_SESSION["rank"] = $print_info["ranking"]; 
                            }
                  }
                else
                  {
                    echo 'Employee Id <b>'.$_SESSION["delete_emp_info"].'</b> not found !';
                    exit;
                  }
              }
              echo '
                    <form method="POST">
                      <fieldset>
                        <div class="col-auto">
                          <button type="submit" name="confirm_delete" class="btn btn-outline-danger m-3"> Yes </button>
                          <button type="submit" name="cancel_delete" class="btn btn-outline-danger m-3"> No </button>
                        </div>
                      </fieldset>
                    </form>
                  ';
          }
        if(isset($_POST["confirm_delete"]))
          {
            $select_info = $connect_database->prepare('SELECT * FROM info WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
            $select_covering = $connect_database->prepare('SELECT * FROM covering WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
            $select_hipo = $connect_database->prepare('SELECT * FROM hipo WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
            $select_pmp = $connect_database->prepare('SELECT * FROM pmp WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
            $select_ranking = $connect_database->prepare('SELECT * FROM ranking WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
            
            $select_info->execute();
            $select_covering->execute();
            $select_hipo->execute();
            $select_pmp->execute();
            $select_pmp->execute();
  
            if($select_info->rowCount() == 1 && $select_covering->rowCount() == 1 && $select_hipo->rowCount() == 1 &&
                $select_pmp->rowCount() == 1 && $select_pmp->rowCount() == 1 
              )
              {
                $delete_emp_info = $connect_database->prepare('DELETE FROM info WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $delete_emp_covering = $connect_database->prepare('DELETE FROM covering WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $delete_emp_hipo = $connect_database->prepare('DELETE FROM hipo WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $delete_emp_pmp = $connect_database->prepare('DELETE FROM pmp WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $delete_emp_ranking = $connect_database->prepare('DELETE FROM ranking WHERE personal_no = '.$_SESSION["delete_emp_info"].'');

                $delete_emp_info->execute();
                $delete_emp_covering->execute();
                $delete_emp_hipo->execute();
                $delete_emp_pmp->execute();
                $delete_emp_ranking->execute();

                $select_info_deleted = $connect_database->prepare('SELECT * FROM info WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $select_covering_deleted = $connect_database->prepare('SELECT * FROM covering WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $select_hipo_deleted = $connect_database->prepare('SELECT * FROM hipo WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $select_pmp_deleted = $connect_database->prepare('SELECT * FROM pmp WHERE personal_no = '.$_SESSION["delete_emp_info"].'');
                $select_ranking_deleted = $connect_database->prepare('SELECT * FROM ranking WHERE personal_no = '.$_SESSION["delete_emp_info"].'');

                $select_info_deleted->execute();
                $select_covering_deleted->execute();
                $select_hipo_deleted->execute();
                $select_pmp_deleted->execute();
                $select_ranking_deleted->execute();

                $select_data_info = $connect_database->prepare
                ('
                SELECT *
                FROM info i , covering c ,hipo h , pmp p , ranking r
                WHERE i.personal_no = i.personal_no and c.personal_no = i.personal_no and h.personal_no = i.personal_no and
                p.personal_no = i.personal_no and r.personal_no = i.personal_no
                ORDER BY i.total DESC
                ');
                $select_data_info->execute();
    
                $x = 1;
                foreach($select_data_info as $print)
                      {
                        $_SESSION["personal_no"] = $print["personal_no"];
                        $update_emp_rank = $connect_database->prepare
                        ('
                        UPDATE ranking SET ranking = '.($x).' WHERE personal_no = '.$_SESSION["personal_no"].'
                        ');
                        $update_emp_rank->execute();
                        $x++;
                      }
              }

              if($select_info_deleted->rowCount() == 0 && $select_covering_deleted->rowCount() == 0 && $select_hipo_deleted->rowCount() == 0 && 
                  $select_pmp_deleted->rowCount() == 0 && $select_ranking_deleted->rowCount() == 0 
                )
                {
                  echo '    
                        <center>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <b>'. $_SESSION["delete_emp_info"] .' Deleted Successful </b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </center>
                  ';
                  header("refresh:3;url= delete.php");
                }
              else
                {
                  echo '    
                        <center>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <b> Delete Failed </b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </center>
                  ';
                  header("refresh:2;url= delete.php");
                }
  
          }
        elseif(isset($_POST["cancel_delete"]))
              { 
                echo '    
                      <center>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <b> Delete canceled Successful </b>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </center>
                ';
                header("refresh:2;url= delete.php");
              }

      ?>

    </center>

  </body>
</html>