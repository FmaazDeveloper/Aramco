<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'head.php'; ?>
  </head>
  <body>

    <?php require_once 'check_sign_in.php'; ?>
    <?php require_once 'nav.php'; ?>
    <?php require_once 'sql.php'; ?>

    <div class="m-3">
      <h3><b> Dirlling Engineering </b></h3>
    </div>
    <form method="POST">
    <input type="submit" name="show">
    <!-- table depts -->
    <table class="table-success table table-bordered" style="font-size:67%;">
      <tr>
        <?php
        if(isset($_POST["show"]))
        {
          if(!empty($_SESSION["avg_pmp_filter"]) && $_SESSION["avg_pmp_filter"] != "AVG PMP")
            {
              $select_perm_job_title = $connect_database->prepare('SELECT DISTINCT i.perm_job_title FROM info i , pmp p WHERE i.personal_no = p.personal_no AND p.avg_pmp = "'.$_SESSION["avg_pmp_filter"].'"');
              $select_perm_job_title->execute();
            }
          else
            {
              $select_perm_job_title = $connect_database->prepare('SELECT DISTINCT perm_job_title FROM info');
              $select_perm_job_title->execute();
            }
        }
        else
        {
          $select_perm_job_title = $connect_database->prepare('SELECT DISTINCT perm_job_title FROM info');
          $select_perm_job_title->execute();
        }
            foreach($select_perm_job_title as $print)
            {
              echo '
                    <td>
                        <input type="submit" name="depts" class="form-control" value="'.$print["perm_job_title"].'">
                      </form>
                    </td>
                  ';
            }
            if(isset($_POST["depts"]))
            $_SESSION["depts"] = $_POST["depts"];
        ?>
      </tr>
    </table>
    <div class="row m-3">
        <div class="col">
          <table class="table table-bordered">
              <!-- tabel filters -->
              <!-- avg pmp -->
              <tr>
                <td>
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="avg_pmp">
                    <option selected>AVG PMP</option>
                    <?php
                        if(!empty($_SESSION["depts"]))
                        {
                        $select_avg_pmp = $connect_database->prepare('SELECT DISTINCT p.avg_pmp FROM pmp p , info i WHERE i.personal_no = i.personal_no and p.personal_no = i.personal_no and i.perm_job_title = "'.$_SESSION["depts"].'"');
                        $select_avg_pmp->execute();
                        }
                        elseif(empty($_SESSION["depts"]))
                        {
                          $select_avg_pmp = $connect_database->prepare('SELECT DISTINCT avg_pmp FROM pmp');
                          $select_avg_pmp->execute();
                        }
                        foreach($select_avg_pmp as $print)
                                {
                                  echo '
                                          <option value="'.$print["avg_pmp"].'">'.$print["avg_pmp"].'</option>
                                  ';
                                }
                                if(!empty($_POST["avg_pmp"]) && $_POST["avg_pmp"] != "AVG PMP")
                                $_SESSION["avg_pmp_filter"] = $_POST["avg_pmp"];
                    ?>
                  </select>
                </td>
                <!-- psg -->
                <div class="btn-group m-3" dir="ltr">
                  <td>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="psg">
                      <option selected>PSG</option>
                      <?php
                      if(isset($_POST["show"]))
                      {
                        if(!empty($_SESSION["avg_pmp_filter"]) && $_SESSION["avg_pmp_filter"] != "AVG PMP")
                          {
                            $select_psg = $connect_database->prepare('SELECT DISTINCT i.psg FROM info i , pmp p WHERE i.personal_no = p.prsonal_no AND i.perm_job_title = "'.$_SESSION["depts"].'" AND p.avg_pmp = "'.$_SESSION["avg_pmp_filter"].'" ORDER BY i.psg');
                            $select_psg->execute();
                          }
                        else
                          {
                            $select_psg = $connect_database->prepare('SELECT DISTINCT psg FROM info ORDER BY psg');
                            $select_psg->execute();
                          }
                      }
                      else
                      {
                        if(!empty($_SESSION["depts"]))
                          {
                          $select_psg = $connect_database->prepare('SELECT DISTINCT psg FROM info WHERE perm_job_title = "'.$_SESSION["depts"].'" ORDER BY psg');
                          $select_psg->execute();
                          }
                        else
                          {
                            $select_psg = $connect_database->prepare('SELECT DISTINCT psg FROM info ORDER BY psg');
                            $select_psg->execute();
                          }
                      }
                        foreach($select_psg as $print)
                                {
                                  echo '
                                          <option value="'.$print["psg"].'">'.$print["psg"].'</option>
                                  ';
                                }
                                if(!empty($_POST["psg"]) && $_POST["psg"] != "PSG")
                                  $_SESSION["psg_filter"] = $_POST["psg"];
                      ?>
                    </select>
                  </td>
                </div>
              </tr>
          </table>      
          <!-- service years -->
          <table class="table table-bordered">
              <tr>
                <td>
                  <br>
                  <div class="btn-group">
                    <?php
                        // range min service years
                        if(!empty($_SESSION["depts"]))
                          {
                          $select_min_service_years = $connect_database->prepare('SELECT DISTINCT  min(service_years) FROM info WHERE perm_job_title = "'.$_SESSION["depts"].'"');
                          $select_min_service_years->execute();
                          }
                        elseif(empty($_SESSION["depts"]))
                          {
                            $select_min_service_years = $connect_database->prepare('SELECT DISTINCT  min(service_years) FROM info');
                            $select_min_service_years->execute();
                          }
                        foreach($select_min_service_years as $print)
                                {
                                  echo '
                                        <label for="min_service_years">From</label>
                                        <input type="number" name="min_service_years" id="min_service_years" class="form-control m-3" placeholder="'.$print["min(service_years)"].'">
                                  ';
                                }
                                if(empty($_POST["min_service_years"]))
                                $_SESSION["min_service_years"] = $print["min(service_years)"];
                                else
                                $_SESSION["min_service_years"] = $_POST["min_service_years"];
                        // range max service years
                        if(!empty($_SESSION["depts"]))
                          {
                          $select_max_service_years = $connect_database->prepare('SELECT DISTINCT  max(service_years) FROM info WHERE perm_job_title = "'.$_SESSION["depts"].'"');
                          $select_max_service_years->execute();
                          }
                        elseif(empty($_SESSION["depts"]))
                          {
                            $select_max_service_years = $connect_database->prepare('SELECT DISTINCT  max(service_years) FROM info');
                            $select_max_service_years->execute();
                          }
                        foreach($select_max_service_years as $print)
                                {
                                  echo '
                                        <label for="max_service_years">To</label>
                                        <input type="number" name="max_service_years" id="max_service_years" class="form-control m-3" placeholder="'.$print["max(service_years)"].'">
                                  ';
                                }
                                if(empty($_POST["max_service_years"]))
                                $_SESSION["max_service_years"] = $print["max(service_years)"];
                                else
                                $_SESSION["max_service_years"] = $_POST["max_service_years"];
                    ?>
                  </div>
                  <center><label> Enter Service Years </label></center>
                </td>
                <td>
                  <br>
                  <!-- rank -->
                  <div class="btn-group">
                    <?php
                        // range min rank
                        if(!empty($_SESSION["depts"]))
                          {
                          $select_min_rank = $connect_database->prepare('SELECT DISTINCT  min(r.rank) FROM ranking r , info i WHERE i.personal_no = i.personal_no and r.personal_no = i.personal_no and i.perm_job_title = "'.$_SESSION["depts"].'"');
                          $select_min_rank->execute();
                          foreach($select_min_rank as $print)
                          {
                            echo '
                                  <label for="min_rank">From</label>
                                  <input type="number" name="min_rank" id="min_rank" class="form-control m-3" placeholder="'.$print["min(r.rank)"].'">
                            ';
                          }
                          if(empty($_POST["min_rank"]))
                          $_SESSION["min_rank"] = $print["min(r.rank)"];
                          else
                          $_SESSION["min_rank"] = $_POST["min_rank"];
                          }
                        elseif(empty($_SESSION["depts"]))
                          {
                            $select_min_rank = $connect_database->prepare('SELECT DISTINCT  min(rank) FROM ranking');
                            $select_min_rank->execute();
                            foreach($select_min_rank as $print)
                            {
                              echo '
                                    <label for="min_rank">From</label>
                                    <input type="number" name="min_rank" id="min_rank" class="form-control m-3" placeholder="'.$print["min(rank)"].'">
                              ';
                            }
                            if(empty($_POST["min_rank"]))
                            $_SESSION["min_rank"] = $print["min(rank)"];
                            else
                            $_SESSION["min_rank"] = $_POST["min_rank"];
                          }
                        // range max rank
                        if(!empty($_SESSION["depts"]))
                          {
                            $select_max_rank = $connect_database->prepare('SELECT DISTINCT  max(r.rank) FROM ranking r , info i WHERE i.personal_no = i.personal_no and r.personal_no = i.personal_no and i.perm_job_title = "'.$_SESSION["depts"].'"');
                            $select_max_rank->execute();
                            foreach($select_max_rank as $print)
                            {
                              echo '
                                    <label for="max_rank">To</label>
                                    <input type="number" name="max_rank" id="max_rank" class="form-control m-3" placeholder="'.$print["max(r.rank)"].'">
                              ';
                            }
                            if(empty($_POST["max_rank"]))
                            $_SESSION["max_rank"] = $print["max(r.rank)"];
                            else
                            $_SESSION["max_rank"] = $_POST["max_rank"];
                          }
                        elseif(empty($_SESSION["depts"]))
                          {
                            $select_max_rank = $connect_database->prepare('SELECT DISTINCT  max(rank) FROM ranking');
                            $select_max_rank->execute();
                            foreach($select_max_rank as $print)
                            {
                              echo '
                                    <label for="max_rank">To</label>
                                    <input type="number" name="max_rank" id="max_rank" class="form-control m-3" placeholder="'.$print["max(rank)"].'">
                              ';
                            }
                            if(empty($_POST["max_rank"]))
                            $_SESSION["max_rank"] = $print["max(rank)"];
                            else
                            $_SESSION["max_rank"] = $_POST["max_rank"];
                          }
                    ?>
                  </div>
                  <center><label> Enter Rank </label></center>
                  <br>
                </td>
              </tr>
          </table>
          <!-- names -->
          <table class="table table-bordered">
              <tr>
                <td> <p> &nbsp; Name </p>  </td>
              </tr>
              <?php
                if(!empty($_SESSION["depts"]))
                  {
                    $select_emp_name = $connect_database->prepare('SELECT name FROM info WHERE perm_job_title = "'.$_SESSION["depts"].'"');
                    $select_emp_name->execute();
                  }
                elseif(empty($_SESSION["depts"]))
                  {
                    $select_emp_name = $connect_database->prepare('SELECT name FROM info');
                    $select_emp_name->execute();
                  }
                foreach($select_emp_name as $print)
                        {
                          echo '
                          <tr>
                          <td width="67%">
                            <div class="btn-group-vertical m-3" role="group" aria-label="Basic radio toggle button group">
                              <input type="submit" class="btn-check" name="emp_name" value="'.$print["name"].'" id="'.$print["name"].'" autocomplete="off">
                              <label class="btn btn-outline-secondary" for="'.$print["name"].'"> '.$print["name"].' </label>
                            </div>
                          </td>
                        </tr>
                          ';
                          // $_SESSION["emp_name"] = $_POST["emp_name"];
                        }
              ?>
          </table>
        </div>
        <div class="col">
          <!-- table total by name -->
          <table class="table table-bordered">
            <tr>
              <td> <p> &nbsp; Total By Name </p>  </td>
            </tr>
            <?php
              if(!empty($_SESSION["depts"]))
                {
                  $select_total_name = $connect_database->prepare('SELECT i.name , i.total FROM ranking r , info i WHERE i.personal_no = i.personal_no and r.personal_no = i.personal_no and i.perm_job_title = "'.$_SESSION["depts"].'" ORDER BY r.rank');
                  $select_total_name->execute();
                }
              elseif(empty($_SESSION["depts"]))
                {
                  $select_total_name = $connect_database->prepare('SELECT name , total FROM ranking ORDER BY rank');
                  $select_total_name->execute();
                }
                foreach($select_total_name as $print)
                        {
                          echo '
                                <tr>
                                  <td width="750px">
                                    <input type="submit" class="btn-check" name="total_by_name" value="'.$print["name"].'" id="'.$print["name"].'1" autocomplete="off">
                                      <label class="btn btn-outline-secondary" for="'.$print["name"].'1"> '.$print["name"].' </label>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: '.$print["total"].'%;" aria-valuenow="'.$print["total"].'" aria-valuemin="0" aria-valuemax="100">'.$print["total"].'</div>
                                      </div>
                                  </td>
                                </tr>
                              ';
                              // $_SESSION["total_by_name"] = $_POST["total_by_name"];
                        }
            ?>
          </table>
      </div>
      </form>
      <div style="width: 300; border:15px solid green; padding: 50px; margin: 20px">
        <!-- table employee information -->
        <?php
          // print employee information by emb name
          if(isset($_POST["emp_name"]))
            {
              $select_emp_info = $connect_database->prepare
              ('
              SELECT * FROM
              info i , covering c , hipo h , pmp p , ranking r
              WHERE i.personal_no = i.personal_no and c.personal_no = i.personal_no and h.personal_no = i.personal_no and p.personal_no = i.personal_no and r.personal_no = i.personal_no and
              i.name = "'.$_POST["emp_name"].'" 
              ');
              $select_emp_info->execute();
              foreach($select_emp_info as $print)
                      {
                        echo '
                                <table class="table table-bordered">
                                  <tr>
                                    <th colspan="5">
                                      <center> Employee Information </center>
                                    </th>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                    <b><center> '.$print["name"].' </center></b>
                                  </td>
                                  <td colspan="1">
                                  <b><center> '.$print["personal_no"].' </center></b>
                                </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <b><center> '.$print["avg_pmp"].' </center></b>
                                    <br>
                                    <b><center> AVG PMP </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["pmp_2021"].' </center></b>
                                    <br>
                                    <b><center> PMP 2021 </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["pmp_2020"].' </center></b>
                                    <br>
                                    <b><center> PMP 2020 </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["pmp_2019"].' </center></b>
                                    <br>
                                    <b><center> PMP 2019 </center></b>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <b><center> '.$print["age_yrs"].' </center></b>
                                    <br>
                                    <b><center> AVG Yrs </center></b>
                                  </td>
                                  <td colspan="2">
                                    <b><center> '.$print["psg"].' </center></b>
                                    <br>
                                    <b><center> PSG </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["service_years"].' </center></b>
                                    <br>
                                    <b><center> Service Years </center></b>
                                  </td>
                                  <td rowspan="4">
                                    <b><center> '.$print["perm_job_title"].' </center></b>
                                    <br>
                                    <b><center> '.$print["perm_div_cc_title"].' </center></b>
                                    <br>
                                    <b><center> '.$print["perm_dept_title"].' </center></b>
                                    <br>
                                    <b><center> Pervious Exp </center></b>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <b><center> '.$print["hipo"].' </center></b>
                                    <br>
                                    <b><center> HIPO </center></b>
                                  </td>
                                  <td colspan="2">
                                    <b><center> '.$print["days"].' </center></b>
                                    <br>
                                    <b><center> Days </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["perm_div_cc_title"].' </center></b>
                                    <br>
                                    <b><center> Perm Div </center></b>
                                  </td>
                                </tr>
                              </table>
                        ';
                      }
            }
          // print employee information by total by name
          elseif(isset($_POST["total_by_name"]))
            {
              $select_emp_info = $connect_database->prepare
              ('
              SELECT * FROM
              info i , covering c , hipo h , pmp p , ranking r
              WHERE i.personal_no = i.personal_no and c.personal_no = i.personal_no and h.personal_no = i.personal_no and p.personal_no = i.personal_no and r.personal_no = i.personal_no and
              i.name = "'.$_POST["total_by_name"].'" 
              ');
              $select_emp_info->execute();
              foreach($select_emp_info as $print)
                      {
                        echo '
                                <table class="table table-bordered">
                                  <tr>
                                    <th colspan="5">
                                      <center> Employee Information </center>
                                    </th>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                    <b><center> '.$print["name"].' </center></b>
                                  </td>
                                  <td colspan="1">
                                  <b><center> '.$print["personal_no"].' </center></b>
                                </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <b><center> '.$print["avg_pmp"].' </center></b>
                                    <br>
                                    <b><center> AVG PMP </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["pmp_2021"].' </center></b>
                                    <br>
                                    <b><center> PMP 2021 </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["pmp_2020"].' </center></b>
                                    <br>
                                    <b><center> PMP 2020 </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["pmp_2019"].' </center></b>
                                    <br>
                                    <b><center> PMP 2019 </center></b>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <b><center> '.$print["age_yrs"].' </center></b>
                                    <br>
                                    <b><center> AVG Yrs </center></b>
                                  </td>
                                  <td colspan="2">
                                    <b><center> '.$print["psg"].' </center></b>
                                    <br>
                                    <b><center> PSG </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["service_years"].' </center></b>
                                    <br>
                                    <b><center> Service Years </center></b>
                                  </td>
                                  <td rowspan="4">
                                    <b><center> '.$print["perm_job_title"].' </center></b>
                                    <br>
                                    <b><center> '.$print["perm_div_cc_title"].' </center></b>
                                    <br>
                                    <b><center> '.$print["perm_dept_title"].' </center></b>
                                    <br>
                                    <b><center> Pervious Exp </center></b>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <b><center> '.$print["hipo"].' </center></b>
                                    <br>
                                    <b><center> HIPO </center></b>
                                  </td>
                                  <td colspan="2">
                                    <b><center> '.$print["days"].' </center></b>
                                    <br>
                                    <b><center> Days </center></b>
                                  </td>
                                  <td>
                                    <b><center> '.$print["perm_div_cc_title"].' </center></b>
                                    <br>
                                    <b><center> Perm Div </center></b>
                                  </td>
                                </tr>
                              </table>
                        ';
                      }
            }
        ?>
      </div>
    </div>
      <style>
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button
          {
            -webkit-appearance: none;
          }
      </style>

  </body>
</html>