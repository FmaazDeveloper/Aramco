<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>

    <?php require_once 'check_sign_in.php'; ?>
    <?php require_once 'nav.php'; ?>
    <?php require_once 'sql.php'; ?>
    <br>
    <?php

      if($connect_database)
        {
          // select all info from all tables
          $select_data_info = $connect_database->prepare
          ('
          SELECT *
          FROM info i , covering c , hipo h , pmp p , ranking r
          WHERE i.personal_no = c.personal_no and i.personal_no = h. personal_no and i.personal_no = p.personal_no and i.personal_no = r.personal_no
          ORDER BY r.ranking ASC
          ');
          $select_data_info->execute();
          // print all info
          echo '
                <br>
                <table class="table-success table table-bordered" style="font-size:67%;">
                  <tr class="table-warning">
                    <th colspan="23"><center> Employees Info </center></th>
                  </tr>
                  <tr class="table-success">
                    <th> Personnel No </th> <th> Name </th> <th> PSG </th> <th> Score PSG </th> <th> Age Yrs </th>
                    <th> Hire Date </th> <th> Service years </th> <th> Perm Job Title </th> <th> Perm Div CC Title </th>
                    <th> Perm Dept Title </th> <th> Score dept </th> <th> Previous Exp </th> <th> Days </th> <th> Score days </th>
                    <th> HIPO </th> <th> Score HIPO </th> <th> PMP 2021 </th> <th> PMP 2020 </th> <th> PMP 2019 </th>
                    <th> AVG PMP </th> <th> Score PMP </th> <th> Total </th> <th> Rank </th>
                  </tr>
          ';
          ?> 
          <?php
            foreach($select_data_info as $print_info)
                    {
                      echo '
                            <tr class="table-info">
                              <th> '.$print_info["personal_no"].' </th> <th> '.$print_info["name"].' </th> <th> '.$print_info["psg"].' </th> <th> '.$print_info["score_psg"].' </th>
                              <th> '.$print_info["age_yrs"].' </th> <th> '.$print_info["hire_date"].' </th> <th> '.$print_info["service_years"].' </th> <th> '.$print_info["perm_job_title"].' </th>
                              <th> '.$print_info["perm_div_cc_title"].' </th> <th> '.$print_info["perm_dept_title"].' </th> <th> '.$print_info["score_dept"].' </th> <th> '.$print_info["previous_exp"].' </th>
                              <th> '.$print_info["days"].' </th> <th> '.$print_info["score_days"].' </th> <th> '.$print_info["hipo"].' </th> <th> '.$print_info["score_hipo"].' </th>
                              <th> '.$print_info["pmp_2021"].' </th> <th> '.$print_info["pmp_2020"].' </th> <th> '.$print_info["pmp_2019"].' </th> <th> '.$print_info["score_pmp"].' </th>
                              <th> '.$print_info["avg_pmp"].' </th> <th> '.$print_info["total"].' </th> <th> '.$print_info["ranking"].' </th>
                            </tr>
                      ';
          ?> 
          <?php
                    }
          echo '
                </table>
          ';
    
        }

    ?>

  </body>
</html>