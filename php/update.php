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

    <center>
      <form method="POST">
        <fieldset>
          <div class="col-sm-3">
            <input type="number" name="update_emp_info" class="form-control m-3" placeholder="Enter Employee ID" required>
          </div>
    
          <style>
            input::-webkit-inner-spin-button,
            input::-webkit-outer-spin-button
              {
                -webkit-appearance: none;
              }
          </style>

          <div class="col-auto">
            <button type="submit" name="update_info" class="btn btn-outline-danger m-3"> Update </button>
          </div>
        </fieldset>
      </form>

      <?php
        if(isset($_POST["update_info"]) && !empty($_POST["update_emp_info"]))
          {
            $_SESSION["update_emp_info"] = $_POST["update_emp_info"];
            $_SESSION["update_info"] = $_POST["update_info"];
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
                FROM info i , covering c , hipo h , pmp p , ranking r
                WHERE i.personal_no = '. $_SESSION["update_emp_info"] .' and i.personal_no = c.personal_no and i.personal_no = h. personal_no and i.personal_no = p.personal_no and i.personal_no = r.personal_no
                ');
                $select_data_info->execute();

                // print all info
                if($select_data_info->rowCount() == 1)
                  {
                    foreach($select_data_info as $print_info)
                            {
                              echo '
                                    <br>
                                    <table class="table-success table table-bordered" style="font-size:67%;">
                                      <tr class="table-warning">
                                        <th colspan="23"><center> Old Employee Info </center></th>
                                      </tr>
                                      <tr class="table-success">
                                        <th> Personnel No </th> <th> Name </th> <th> PSG </th> <th> Score PSG </th> <th> Age Yrs </th> <th> Hire Date </th> <th> Service years </th>
                                        <th> Perm Job Title </th> <th> Perm Div CC Title </th> <th> Perm Dept Title </th> <th> Previous Exp </th> <th> Score dept </th> <th> Days </th>
                                        <th> Score days </th> <th> HIPO </th> <th> Score HIPO </th> <th> PMP 2021 </th> <th> PMP 2020 </th> <th> PMP 2019 </th> <th> AVG PMP </th>
                                        <th> Score PMP </th> <th> Total </th> <th> Rank </th>
                                      </tr>
                                      <tr class="table-info">
                                        <th> '.$print_info["personal_no"].' </th> <th> '.$print_info["name"].' </th> <th> '.$print_info["psg"].' </th> <th> '.$print_info["score_psg"].' </th>
                                        <th> '.$print_info["age_yrs"].' </th> <th> '.$print_info["hire_date"].' </th> <th> '.$print_info["service_years"].' </th> <th> '.$print_info["perm_job_title"].' </th>
                                        <th> '.$print_info["perm_div_cc_title"].' </th> <th> '.$print_info["perm_dept_title"].' </th> <th> '.$print_info["previous_exp"].' </th> <th> '.$print_info["score_dept"].' </th>
                                        <th> '.$print_info["days"].' </th> <th> '.$print_info["score_days"].' </th> <th> '.$print_info["hipo"].' </th> <th> '.$print_info["score_hipo"].' </th>
                                        <th> '.$print_info["pmp_2021"].' </th> <th> '.$print_info["pmp_2020"].' </th> <th> '.$print_info["pmp_2019"].' </th> <th> '.$print_info["score_pmp"].' </th>
                                        <th> '.$print_info["avg_pmp"].' </th> <th> '.$print_info["total"].' </th> <th> '.$print_info["ranking"].' </th>
                                      </tr>
                                    </table>
                                    <br>
                              ';
                              $_SESSION["personal_no"] = $print_info["personal_no"]; $_SESSION["name"] = $print_info["name"]; $_SESSION["psg"] = $print_info["psg"]; $_SESSION["score_psg"] = $print_info["score_psg"];
                              $_SESSION["age_yrs"] = $print_info["age_yrs"]; $_SESSION["hire_date"] = $print_info["hire_date"]; $_SESSION["service_years"] = $print_info["service_years"]; $_SESSION["perm_job_title"] = $print_info["perm_job_title"];
                              $_SESSION["perm_div_cc_title"] = $print_info["perm_div_cc_title"]; $_SESSION["perm_dept_title"] = $print_info["perm_dept_title"]; $_SESSION["previous_exp"] = $print_info["previous_exp"];
                              $_SESSION["score_dept"] = $print_info["score_dept"]; $_SESSION["days"] = $print_info["days"]; $_SESSION["score_days"] = $print_info["score_days"]; $_SESSION["hipo"] = $print_info["hipo"];
                              $_SESSION["score_hipo"] = $print_info["score_hipo"]; $_SESSION["pmp_2021"] = $print_info["pmp_2021"]; $_SESSION["pmp_2020"] = $print_info["pmp_2020"]; $_SESSION["pmp_2019"] = $print_info["pmp_2019"];
                              $_SESSION["score_pmp"] = $print_info["score_pmp"]; $_SESSION["avg_pmp"] = $print_info["avg_pmp"]; $_SESSION["total"] = $print_info["total"]; $_SESSION["rank"] = $print_info["ranking"];
                            }
                    echo '
                          <form method="POST">
                            <fieldset>
                              <table class="table-danger table table-bordered">
                                <tr class="table-warning">
                                  <th colspan="18"><center> Enter New Employee Info </center></th>
                                </tr>
                                <tr style="font-size:67%;" class="table-success">
                                  <th> Name </th> <th> PSG </th> <th> Age Yrs </th> <th> Hire Date </th> <th> Service years </th> <th> Perm Job Title </th>
                                  <th> Perm Div CC Title </th> <th> Perm Dept Title </th> <th> Previous Exp </th> <th> Days </th> <th> HIPO </th> 
                                  <th> PMP 2021 </th> <th> PMP 2020 </th> <th> PMP 2019 </th>
                                </tr>
                                <tr class="table-danger">
                                  <th>
                                    <input type="text" name="update_emp_name" class="form-control" value="'.$_SESSION["name"].'" placeholder="'.$_SESSION["name"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="number" name="update_emp_psg" min="11" max="15" class="form-control" value="'.$_SESSION["psg"].'" placeholder="'.$_SESSION["psg"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="number" name="update_emp_age" min="18" max="60" class="form-control" value="'.$_SESSION["age_yrs"].'" placeholder="'.$_SESSION["age_yrs"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="date" name="update_emp_hire_date" class="form-control" value="'.$_SESSION["hire_date"].'" placeholder="'.$_SESSION["hire_date"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="number" name="update_emp_service_years" min="0"  max="40"class="form-control" value="'.$_SESSION["service_years"].'" placeholder="' .$_SESSION["service_years"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="text" name="update_emp_perm_job_title" class="form-control" value="'.$_SESSION["perm_job_title"].'" placeholder="'.$_SESSION["perm_job_title"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="text" name="update_emp_perm_div_cc_title" class="form-control" value="'.$_SESSION["perm_div_cc_title"].'" placeholder="'.$_SESSION["perm_div_cc_title"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="text" name="update_emp_perm_dept_title" class="form-control" value="'.$_SESSION["perm_dept_title"].'" placeholder="'.$_SESSION["perm_dept_title"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="text" name="update_emp_previous_exp" class="form-control" value="'.$_SESSION["previous_exp"].'" placeholder="'.$_SESSION["previous_exp"].'" style="font-size:50%;" required>
                                  </th>
                                  <th>
                                    <input type="number" name="update_emp_days" min="0" max="360" class="form-control" value="'.$_SESSION["days"].'" placeholder="'.$_SESSION["days"].'" style="font-size:50%;" required>
                                  </th>
                    ';  
                    // hipo y/yes
                    if ($_SESSION["hipo"] == "Y" || $_SESSION["hipo"] == "Yes")
                      {
                        echo'
                              <th>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_hipo" value="Y" id="update_emp_hipo_yes" checked>
                                  <label class="form-check-label" for="update_emp_hipo_yes">
                                    Yes
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_hipo" value="N" id="update_emp_hipo_no">
                                  <label class="form-check-label" for="update_emp_hipo_no">
                                    No
                                  </label>
                                </div>
                                </th>
                        ';
                      }
                     // hipo n/no
                    elseif ($_SESSION["hipo"] == "N" || $_SESSION["hipo"] == "No")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_hipo" value="'.$_SESSION["hipo"].'" id="update_emp_hipo_yes">
                                      <label class="form-check-label" for="update_emp_hipo_yes">
                                        Yes
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_hipo" value="'.$_SESSION["hipo"].'" id="update_emp_hipo_no" checked>
                                      <label class="form-check-label" for="update_emp_hipo_no">
                                        No
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2021 S
                    if ($_SESSION["pmp_2021"] == "S")
                      {
                        echo'
                              <th>  
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="S" id="update_emp_pmp_2021_s" checked>
                                  <label class="form-check-label" for="update_emp_pmp_2021_s">
                                    S
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E+" id="update_emp_pmp_2021_e+">
                                  <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                    E+
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E" id="update_emp_pmp_2021_e">
                                  <label class="form-check-label" for="update_emp_pmp_2021_e">
                                    E
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="M" id="update_emp_pmp_2021_m">
                                  <label class="form-check-label" for="update_emp_pmp_2021_m">
                                    M
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="D" id="update_emp_pmp_2021_d">
                                  <label class="form-check-label" for="update_emp_pmp_2021_d">
                                    D
                                  </label>
                                </div>
                              </th>
                        ';
                      }
                    // pmp 2021 E+
                    elseif ($_SESSION["pmp_2021"] == "E+")
                          {
                            echo'
                                  <th>  
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="S" id="update_emp_pmp_2021_s">
                                      <label class="form-check-label" for="update_emp_pmp_2021_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E+" id="update_emp_pmp_2021_e+" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E" id="update_emp_pmp_2021_e">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="M" id="update_emp_pmp_2021_m">
                                      <label class="form-check-label" for="update_emp_pmp_2021_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="D" id="update_emp_pmp_2021_d">
                                      <label class="form-check-label" for="update_emp_pmp_2021_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2021 E
                    elseif ($_SESSION["pmp_2021"] == "E")
                          {
                            echo'
                                  <th>  
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="S" id="update_emp_pmp_2021_s">
                                      <label class="form-check-label" for="update_emp_pmp_2021_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E+" id="update_emp_pmp_2021_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E" id="update_emp_pmp_2021_e" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2021_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="M" id="update_emp_pmp_2021_m">
                                      <label class="form-check-label" for="update_emp_pmp_2021_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="D" id="update_emp_pmp_2021_d">
                                      <label class="form-check-label" for="update_emp_pmp_2021_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2021 M
                    elseif ($_SESSION["pmp_2021"] == "M")
                          {
                            echo'
                                  <th>  
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="S" id="update_emp_pmp_2021_s">
                                      <label class="form-check-label" for="update_emp_pmp_2021_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E+" id="update_emp_pmp_2021_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E" id="update_emp_pmp_2021_e">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="M" id="update_emp_pmp_2021_m" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2021_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="D" id="update_emp_pmp_2021_d">
                                      <label class="form-check-label" for="update_emp_pmp_2021_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2021 D
                    elseif ($_SESSION["pmp_2021"] == "D")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="S" id="update_emp_pmp_2021_s">
                                      <label class="form-check-label" for="update_emp_pmp_2021_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E+" id="update_emp_pmp_2021_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="E" id="update_emp_pmp_2021_e">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="M" id="update_emp_pmp_2021_m">
                                      <label class="form-check-label" for="update_emp_pmp_2021_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2021" value="D" id="update_emp_pmp_2021_d" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2021_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2020 S
                    if ($_SESSION["pmp_2020"] == "S")
                      {
                        echo'
                              <th>  
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="S" id="update_emp_pmp_2020_s" checked>
                                  <label class="form-check-label" for="update_emp_pmp_2020_s">
                                    S
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E+" id="update_emp_pmp_2020_e+">
                                  <label class="form-check-label" for="update_emp_pmp_2020_e+">
                                    E+
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E" id="update_emp_pmp_2020_e">
                                  <label class="form-check-label" for="update_emp_pmp_2020_e">
                                    E
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="M" id="update_emp_pmp_2020_m">
                                  <label class="form-check-label" for="update_emp_pmp_2020_m">
                                    M
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="D" id="update_emp_pmp_2020_d">
                                  <label class="form-check-label" for="update_emp_pmp_2020_d">
                                    D
                                  </label>
                                </div>
                              </th>
                        ';
                      }
                    // pmp 2020 E+
                    elseif ($_SESSION["pmp_2020"] == "E+")
                          {
                            echo'
                                  <th>  
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="S" id="update_emp_pmp_2020_s">
                                      <label class="form-check-label" for="update_emp_pmp_2020_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E+" id="update_emp_pmp_2020_e+" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2020_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E" id="update_emp_pmp_2020_e">
                                      <label class="form-check-label" for="update_emp_pmp_2020_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="M" id="update_emp_pmp_2020_m">
                                      <label class="form-check-label" for="update_emp_pmp_2020_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="D" id="update_emp_pmp_2020_d">
                                      <label class="form-check-label" for="update_emp_pmp_2020_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2020 E
                    elseif ($_SESSION["pmp_2020"] == "E")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="S" id="update_emp_pmp_2020_s">
                                      <label class="form-check-label" for="update_emp_pmp_2020_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E+" id="update_emp_pmp_2020_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2020_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E" id="update_emp_pmp_2020_e" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2020_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="M" id="update_emp_pmp_2020_m">
                                      <label class="form-check-label" for="update_emp_pmp_2020_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="D" id="update_emp_pmp_2020_d">
                                      <label class="form-check-label" for="update_emp_pmp_2020_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2020 M
                    elseif ($_SESSION["pmp_2020"] == "M")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="S" id="update_emp_pmp_2020_s">
                                      <label class="form-check-label" for="update_emp_pmp_2020_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E+" id="update_emp_pmp_2020_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2020_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E" id="update_emp_pmp_2020_e">
                                      <label class="form-check-label" for="update_emp_pmp_2020_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="M" id="update_emp_pmp_2020_m" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2020_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="D" id="update_emp_pmp_2020_d">
                                      <label class="form-check-label" for="update_emp_pmp_2020_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2020 D
                    elseif ($_SESSION["pmp_2020"] == "D")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="S" id="update_emp_pmp_2020_s">
                                      <label class="form-check-label" for="update_emp_pmp_2020_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E+" id="update_emp_pmp_2020_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2020_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="E" id="update_emp_pmp_2020_e">
                                      <label class="form-check-label" for="update_emp_pmp_2020_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="M" id="update_emp_pmp_2020_m">
                                      <label class="form-check-label" for="update_emp_pmp_2020_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2020" value="D" id="update_emp_pmp_2020_d" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2020_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2019 S
                    if ($_SESSION["pmp_2019"] == "S")
                      {
                        echo'
                              <th>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="S" id="update_emp_pmp_2019_s" checked>
                                  <label class="form-check-label" for="update_emp_pmp_2019_s">
                                    S
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E+" id="update_emp_pmp_2019_e+">
                                  <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                    E+
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E" id="update_emp_pmp_2019_e">
                                  <label class="form-check-label" for="update_emp_pmp_2019_e">
                                    E
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="M" id="update_emp_pmp_2019_m">
                                  <label class="form-check-label" for="update_emp_pmp_2019_m">
                                    M
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="D" id="update_emp_pmp_2019_d">
                                  <label class="form-check-label" for="update_emp_pmp_2019_d">
                                    D
                                  </label>
                                </div>
                              </th>
                        ';
                      }
                    // pmp 2019 E+
                    elseif ($_SESSION["pmp_2019"] == "E+")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="S" id="update_emp_pmp_2019_s">
                                      <label class="form-check-label" for="update_emp_pmp_2019_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E+" id="update_emp_pmp_2019_e+" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E" id="update_emp_pmp_2019_e">
                                      <label class="form-check-label" for="update_emp_pmp_2019_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="M" id="update_emp_pmp_2019_m">
                                      <label class="form-check-label" for="update_emp_pmp_2019_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="D" id="update_emp_pmp_2019_d">
                                      <label class="form-check-label" for="update_emp_pmp_2019_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2019 E
                    elseif ($_SESSION["pmp_2019"] == "E")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="S" id="update_emp_pmp_2019_s">
                                      <label class="form-check-label" for="update_emp_pmp_2019_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E+" id="update_emp_pmp_2019_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E" id="update_emp_pmp_2019_e" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2019_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="M" id="update_emp_pmp_2019_m">
                                      <label class="form-check-label" for="update_emp_pmp_2019_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="D" id="update_emp_pmp_2019_d">
                                      <label class="form-check-label" for="update_emp_pmp_2019_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2019 M
                    elseif ($_SESSION["pmp_2019"] == "M")
                          {
                            echo'
                                  <th> 
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="S" id="update_emp_pmp_2019_s">
                                      <label class="form-check-label" for="update_emp_pmp_2019_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E+" id="update_emp_pmp_2019_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E" id="update_emp_pmp_2019_e">
                                      <label class="form-check-label" for="update_emp_pmp_2019_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="M" id="update_emp_pmp_2019_m" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2019_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="D" id="update_emp_pmp_2019_d">
                                      <label class="form-check-label" for="update_emp_pmp_2019_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    // pmp 2019 D
                    elseif ($_SESSION["pmp_2019"] == "D")
                          {
                            echo'
                                  <th>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="S" id="update_emp_pmp_2019_s">
                                      <label class="form-check-label" for="update_emp_pmp_2019_s">
                                        S
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E+" id="update_emp_pmp_2019_e+">
                                      <label class="form-check-label" for="update_emp_pmp_2021_e+">
                                        E+
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="E" id="update_emp_pmp_2019_e">
                                      <label class="form-check-label" for="update_emp_pmp_2019_e">
                                        E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="M" id="update_emp_pmp_2019_m">
                                      <label class="form-check-label" for="update_emp_pmp_2019_m">
                                        M
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="update_emp_pmp_2019" value="D" id="update_emp_pmp_2019_d" checked>
                                      <label class="form-check-label" for="update_emp_pmp_2019_d">
                                        D
                                      </label>
                                    </div>
                                  </th>
                            ';
                          }
                    echo '
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
                            <button type="submit" name="update" class="btn btn-outline-danger m-3"> Update </button>
                          </div>
                          </fieldset>
                          </form>
                    ';
                  }
                else
                  {
                    echo 'Employee Id <b>'.$_SESSION["update_emp_info"].'</b> not found !';
                    exit;
                  }
              }
          }
      ?>
    </center>

    <?php
      if
        (
          isset($_POST["update"]) && !empty($_POST["update_emp_name"]) && !empty($_POST["update_emp_psg"]) && !empty($_POST["update_emp_age"]) && !empty($_POST["update_emp_hire_date"]) &&
          !empty($_POST["update_emp_service_years"]) && !empty($_POST["update_emp_perm_job_title"]) && !empty($_POST["update_emp_perm_div_cc_title"]) && !empty($_POST["update_emp_perm_dept_title"]) &&
          !empty($_POST["update_emp_previous_exp"]) && !empty($_POST["update_emp_days"]) && !empty($_POST["update_emp_hipo"]) && !empty($_POST["update_emp_pmp_2021"]) &&
          !empty($_POST["update_emp_pmp_2020"]) && !empty($_POST["update_emp_pmp_2019"]) 
        )
        {
          echo ' <center>Are you sure you want to <b>Update</b> this information for Employee ID <b>'. $_SESSION["update_emp_info"] .'</b> ? <br></center>';
          echo '
                <table class="table-danger table table-bordered">
                  <tr class="table-warning">
                    <th colspan="18"><center><b> New Employee Information </b></center></th>
                  </tr>
                  <tr style="font-size:67%;" class="table-success">
                    <th> Name </th> <th> PSG </th> <th> Age Yrs </th> <th> Hire Date </th> <th> Service years </th> <th> Perm Job Title </th>
                    <th> Perm Div CC Title </th> <th> Perm Dept Title </th> <th> Previous Exp </th> <th> Days </th> <th> HIPO </th> 
                    <th> PMP 2021 </th> <th> PMP 2020 </th> <th> PMP 2019 </th>
                  </tr>
                  <tr style="font-size:67%;" class="table-success">
                    <th> '.$_POST["update_emp_name"].' </th> <th> '.$_POST["update_emp_psg"].' </th> <th> '.$_POST["update_emp_age"].' </th> <th> '.$_POST["update_emp_hire_date"].' </th>
                    <th> '.$_POST["update_emp_service_years"].' </th> <th> '.$_POST["update_emp_perm_job_title"].' </th> <th> '.$_POST["update_emp_perm_div_cc_title"].' </th> 
                    <th> '.$_POST["update_emp_perm_dept_title"].' </th> <th> '.$_POST["update_emp_previous_exp"].' </th> <th> '.$_POST["update_emp_days"].' </th>
                    <th> '.$_POST["update_emp_hipo"].' </th> <th> '.$_POST["update_emp_pmp_2021"].' </th> <th> '.$_POST["update_emp_pmp_2020"].' </th> <th> '.$_POST["update_emp_pmp_2019"].' </th>
                  </tr>
                </table>
          ';

          // session update information
          $_SESSION["update_emp_name"] = $_POST["update_emp_name"];
          $_SESSION["update_emp_psg"] = $_POST["update_emp_psg"];
          $_SESSION["update_emp_age"] = $_POST["update_emp_age"];
          $_SESSION["update_emp_hire_date"] = $_POST["update_emp_hire_date"];
          $_SESSION["update_emp_service_years"] = $_POST["update_emp_service_years"];
          $_SESSION["update_emp_perm_job_title"] = $_POST["update_emp_perm_job_title"];
          $_SESSION["update_emp_perm_div_cc_title"] = $_POST["update_emp_perm_div_cc_title"];
          $_SESSION["update_emp_perm_dept_title"] = $_POST["update_emp_perm_dept_title"];
          $_SESSION["update_emp_previous_exp"] = $_POST["update_emp_previous_exp"];
          $_SESSION["update_emp_days"] = $_POST["update_emp_days"];
          $_SESSION["update_emp_hipo"] = $_POST["update_emp_hipo"];
          $_SESSION["update_emp_pmp_2021"] = $_POST["update_emp_pmp_2021"];
          $_SESSION["update_emp_pmp_2020"] = $_POST["update_emp_pmp_2020"];
          $_SESSION["update_emp_pmp_2019"] = $_POST["update_emp_pmp_2019"];

          $_SESSION["psg"] = $_POST["update_emp_psg"];
          $_SESSION["perm_job_title"] = $_POST["update_emp_perm_job_title"];
          $_SESSION["perm_div_cc_title"] = $_POST["update_emp_perm_div_cc_title"];
          $_SESSION["perm_dept_title"] = $_POST["update_emp_perm_dept_title"];
          $_SESSION["days"] = $_POST["update_emp_days"];
          $_SESSION["hipo"] = $_POST["update_emp_hipo"];
          $_SESSION["pmp_2021"] = $_POST["update_emp_pmp_2021"];
          $_SESSION["pmp_2020"] = $_POST["update_emp_pmp_2020"];
          $_SESSION["pmp_2019"] = $_POST["update_emp_pmp_2019"];

          echo '
                <center>
                  <form method="POST">
                    <fieldset>
                      <div class="col-auto">
                        <button type="submit" name="confirm_update" class="btn btn-outline-danger m-3"> Yes </button>
                        <button type="submit" name="cancel_update" class="btn btn-outline-danger m-3"> No </button>
                      </div>
                    </fieldset>
                  </form>
                </center>
          ';
        }
        if(isset($_POST["confirm_update"]))
          {
            $select_info = $connect_database->prepare('SELECT * FROM info WHERE personal_no = '.$_SESSION["update_emp_info"].'');
            $select_covering = $connect_database->prepare('SELECT * FROM covering WHERE personal_no = '.$_SESSION["update_emp_info"].'');
            $select_hipo = $connect_database->prepare('SELECT * FROM hipo WHERE personal_no = '.$_SESSION["update_emp_info"].'');
            $select_pmp = $connect_database->prepare('SELECT * FROM pmp WHERE personal_no = '.$_SESSION["update_emp_info"].'');
            $select_ranking = $connect_database->prepare('SELECT * FROM ranking WHERE personal_no = '.$_SESSION["update_emp_info"].'');

            $select_info->execute();
            $select_covering->execute();
            $select_hipo->execute();
            $select_pmp->execute();
            $select_pmp->execute();

            if($select_info->rowCount() == 1 && $select_covering->rowCount() == 1 && $select_hipo->rowCount() == 1 &&
                $select_pmp->rowCount() == 1 && $select_pmp->rowCount() == 1 
              )
              {
                require_once "function.php";
                // update info table
                $update_emp_info = $connect_database->prepare
                ('
                UPDATE info SET name = "'.$_SESSION["update_emp_name"].'" , psg = '.$_SESSION["update_emp_psg"].' , age_yrs = '.$_SESSION["update_emp_age"].' ,
                hire_date = "'.$_SESSION["update_emp_hire_date"].'" , service_years = '.$_SESSION["update_emp_service_years"].' , perm_job_title = "'.$_SESSION["update_emp_perm_job_title"].'" ,
                perm_div_cc_title = "'.$_SESSION["update_emp_perm_div_cc_title"].'" , perm_dept_title = "'.$_SESSION["update_emp_perm_dept_title"].'" , previous_exp = "'.$_SESSION["update_emp_previous_exp"].'" ,
                score_psg = '.$_SESSION["count_score_psg"].' , score_dept = '.$_SESSION["count_score_dept"].' , total = '.$_SESSION["total_scores"].'
                WHERE personal_no = '.$_SESSION["update_emp_info"].'
                ');
                // update covering table
                $update_emp_covering = $connect_database->prepare
                ('
                UPDATE covering SET name = "'.$_SESSION["update_emp_name"].'" , days = '.$_SESSION["update_emp_days"].' , score_days = '.$_SESSION["count_score_days"].'
                WHERE personal_no = '.$_SESSION["update_emp_info"].'
                ');
                // update hipo table
                $update_emp_hipo = $connect_database->prepare
                ('
                UPDATE hipo SET name = "'.$_SESSION["update_emp_name"].'" , hipo = "'.$_SESSION["update_emp_hipo"].'" , score_hipo = '.$_SESSION["count_score_hipo"].'
                WHERE personal_no = '.$_SESSION["update_emp_info"].'
                ');
                // update pmp table
                $update_emp_pmp = $connect_database->prepare
                ('
                UPDATE pmp SET name = "'.$_SESSION["update_emp_name"].'" , pmp_2021 = "'.$_SESSION["update_emp_pmp_2021"].'" , pmp_2020 = "'.$_SESSION["update_emp_pmp_2020"].'" ,
                pmp_2019 = "'.$_SESSION["update_emp_pmp_2019"].'" , score_pmp = '.$_SESSION["count_score_pmp"].' , avg_pmp = "'.$_SESSION["avg_score_pmp"].'"
                WHERE personal_no = '.$_SESSION["update_emp_info"].'
                ');
                // update ranking table
                $update_emp_ranking = $connect_database->prepare
                ('
                UPDATE ranking SET name = "'.$_SESSION["update_emp_name"].'" , total = '.$_SESSION["total_scores"].' , ranking = '.$_SESSION["rank"].'
                WHERE personal_no = '.$_SESSION["update_emp_info"].'
                ');

                $update_emp_info->execute();
                $update_emp_covering->execute();
                $update_emp_hipo->execute();
                $update_emp_pmp->execute();
                $update_emp_ranking->execute();

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
    
                        $_SESSION["score_psg"] = $print["score_psg"]; $_SESSION["service_years"] = $print["service_years"]; $_SESSION["score_dept"] = $print["score_dept"];
                        $_SESSION["score_days"] = $print["score_days"]; $_SESSION["score_hipo"] = $print["score_hipo"]; $_SESSION["score_pmp"] = $print["score_pmp"];
                        
                        $_SESSION["total_scores"] = round((($_SESSION["score_psg"]/100)*$_SESSION["percent_psg"]) + (($_SESSION["score_dept"]/3)*$_SESSION["percent_dept"]) + 
                        ($_SESSION["score_days"]*$_SESSION["percent_covering"]) + (($_SESSION["service_years"]/40)*$_SESSION["percent_service_years"]) + 
                        (($_SESSION["score_hipo"]/15)*$_SESSION["percent_hipo"]) + (($_SESSION["score_pmp"]/15)*$_SESSION["percent_pmp"]),2);
        
                        $update_emp_rank = $connect_database->prepare
                        ('
                        UPDATE ranking SET ranking = '.($x).' WHERE personal_no = '.$_SESSION["personal_no"].'
                        ');
                        $update_emp_rank->execute();
                        $x++;
                      }

                $select_info_update = $connect_database->prepare
                ('
                SELECT i.name , i.psg , i.age_yrs , i.hire_date , i.service_years , i.perm_job_title , i.perm_div_cc_title , i.perm_dept_title , i.previous_exp ,
                c.days , 
                h.hipo ,
                p.pmp_2021 , p.pmp_2020 , p.pmp_2019 , p.score_pmp ,
                r.total , r.ranking
                from info i , covering c , hipo h , pmp p , ranking r
                where i.personal_no = '. $_SESSION["update_emp_info"] .' and i.personal_no = c.personal_no and i.personal_no = h. personal_no and i.personal_no = p.personal_no and i.personal_no = r.personal_no and
                i.name = "'. $_SESSION["update_emp_name"] .'"
                ');
                $select_info_update->execute();
              }
              if($select_info_update->rowCount() == 1 )
                {
                  echo '    
                        <center>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <b>'. $_SESSION["update_emp_info"] .' Update Successful </b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </center>
                  ';
                  header("refresh:3;url= update.php");
                }
              else
                {
                  echo '    
                        <center>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <b> Update Failed </b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </center>
                  ';
                  header("refresh:2;url= update.php");
                }
          }
        elseif(isset($_POST["cancel_update"])) 
              {
                echo '    
                      <center>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <b> update canceled Successful </b>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </center>
                ';
                header("refresh:2;url= update.php");
              }

    ?>

    <?php
    ob_end_flush();
    ?>

  </body>
</html>