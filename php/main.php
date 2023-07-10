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

    <!-- count employees -->
      <!-- if empty -->
      <?php
        // depts
        if(isset($_POST["reset_data"]) || empty($_SESSION["depts"]))
        $_SESSION["depts"] = 'is not null';
        // personal_no
        if(isset($_POST["reset_data"]) || empty($_SESSION["personal_no_filter"]))
        $_SESSION["personal_no_filter"] = 'is not null';
        // names & total by name
        if(isset($_POST["reset_data"]) || empty($_SESSION["name_filter"]))
        $_SESSION["name_filter"] = 'is not null';
        // psg
        if(isset($_POST["reset_data"]) || empty($_SESSION["psg_filter"]))
        $_SESSION["psg_filter"] = 'is not null';
        // hipo
        if(isset($_POST["reset_data"]) || empty($_SESSION["hipo_filter"]))
        $_SESSION["hipo_filter"] = 'is not null';
        // avg pmp
        if(isset($_POST["reset_data"]) || empty($_SESSION["avg_pmp_filter"]))
        $_SESSION["avg_pmp_filter"] = 'is not null';
        // min rank
        if(isset($_POST["reset_data"]) || empty($_SESSION["min_rank"]))
        {
          $min_rank = $connect_database->prepare('SELECT MIN(`ranking`) min_rank FROM ranking');
          $min_rank->execute();
          foreach($min_rank as $print)
          $_SESSION["min_rank"] = $print['min_rank'];
        }
        // max rank
        if(isset($_POST["reset_data"]) || empty($_SESSION["max_rank"]))
        {
          $max_rank = $connect_database->prepare('SELECT MAX(`ranking`) max_rank FROM ranking');
          $max_rank->execute();
          foreach($max_rank as $print)
          $_SESSION["max_rank"] = $print['max_rank'];
        }
        // min service years
        if(isset($_POST["reset_data"]) || empty($_SESSION["min_service_years"]))
        {
          $min_service_years = $connect_database->prepare('SELECT MIN("service_years") min_service_years FROM info');
          $min_service_years->execute();
          foreach($min_service_years as $print)
          $_SESSION["min_service_years"] = $print['min_service_years'];
        }
        // max service years
        if(isset($_POST["reset_data"]) || empty($_SESSION["max_service_years"]))
        {
          $max_service_years = $connect_database->prepare('SELECT MAX("service_years") max_service_years FROM info');
          $max_service_years->execute();
          foreach($max_service_years as $print)
          $_SESSION["max_service_years"] = $print['max_service_years'];
        }

      ?>
    <?php
      if($connect_database)
      {
        $count_emp = $connect_database->prepare
        ('
        SELECT COUNT("i.personal_no") count_emp FROM info i , covering c , hipo h , pmp p , ranking r WHERE
        i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
        i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
        i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
        p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
        ');
        $count_emp->execute();
        foreach($count_emp as $print)
                {
                  $_SESSION["count_emp"] = $print["count_emp"];
                }
      }
    ?>

    <div class="m-3">
      <div class="row">
        <div class="col">
          <h3><b> Dirlling Engineering </b></h3>
        </div>
        <div class="col">
          <h4><?php echo 'Number of Employees : '.$_SESSION["count_emp"].''; ?></h4>
        </div>
        <div class="col"></div>
      </div>
    </div>
    <form method="POST">
      <!-- table depts -->
      <table class="table-success table table-bordered" style="font-size:67%;">
        <tr>
          <?php
            if($connect_database)
            {
                $select_perm_job_title = $connect_database->prepare
                ('
                SELECT DISTINCT i.perm_job_title FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                ORDER BY i.perm_job_title
                ');
                $select_perm_job_title->execute();
                foreach($select_perm_job_title as $print)
                      {
                        echo '
                                <td>
                                  <input type="submit" name="depts" class="form-control" value="'.$print["perm_job_title"].'">
                                </td>
                        ';
                      }
              if(isset($_POST["depts"]))
              {
                $_SESSION["depts"] = ' = "'.$_POST["depts"].'"';
                header("Location:main.php");
              }
            }
          ?>
        </tr>
      </table>
      <div class="row m-3">
        <div class="col">
          <!-- tabel filters -->
          <table class="table table-bordered">
              <tr>
                <!-- avg pmp -->
                <td>
                  <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="avg_pmp">
                    <option selected>AVG PMP</option>
                    <?php
                      if($connect_database)
                      {
                        $select_avg_pmp = $connect_database->prepare
                        ('
                        SELECT DISTINCT p.avg_pmp FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                        i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                        i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                        i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                        p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                        ORDER BY p.avg_pmp DESC
                        ');
                        $select_avg_pmp->execute();
                        foreach($select_avg_pmp as $print)
                                {
                                  echo '
                                          <option value="'.$print["avg_pmp"].'">'.$print["avg_pmp"].'</option>
                                  ';
                                }
                                if(!empty($_POST["avg_pmp"]) && $_POST["avg_pmp"] != "AVG PMP")
                                $_SESSION["avg_pmp_filter"] = ' = "'.$_POST["avg_pmp"].'"';
                      }
                    ?>
                  </select>
                </td>
                <!-- psg -->
                <td>
                  <div class="btn-group" dir="ltr">
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="psg">
                      <option selected>PSG</option>
                      <?php
                        if($connect_database)
                        {
                            $select_psg = $connect_database->prepare
                            ('
                            SELECT DISTINCT i.psg FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                            i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                            i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                            i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                            p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                            ORDER BY i.psg DESC
                            ');
                            $select_psg->execute();
                        foreach($select_psg as $print)
                                {
                                  echo '
                                          <option value="'.$print["psg"].'">'.$print["psg"].'</option>
                                  ';
                                }
                                if(!empty($_POST["psg"]) && $_POST["psg"] != "PSG")
                                $_SESSION["psg_filter"] = ' = '.$_POST["psg"].'';
                        }
                      ?>
                    </select>
                  </div>
                </td>
                <!-- service years -->
                <td>
                  <div class="btn-group">
                    <?php
                      if($connect_database)
                      {
                        // range min service years
                            $select_min_service_years = $connect_database->prepare
                            ('
                            SELECT MIN(i.service_years) service_years FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                            i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                            i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                            i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                            p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                            ');
                            $select_min_service_years->execute();
                        foreach($select_min_service_years as $print)
                                {
                                  echo '
                                        <input type="number" name="min_service_years" id="min_service_years" class="form-control m-3" placeholder="Service Years From : '.$print["service_years"].'">
                                  ';
                                  if(!empty($_POST["min_service_years"]))
                                  $_SESSION["min_service_years"] = $_POST["min_service_years"];
                                }
                        // range max service years
                          $select_max_service_years = $connect_database->prepare
                          ('
                          SELECT MAX(i.service_years) service_years FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                          i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                          i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                          i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                          p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                          ');
                          $select_max_service_years->execute();
                        foreach($select_max_service_years as $print)
                                {
                                  echo '
                                        <input type="number" name="max_service_years" id="max_service_years" class="form-control m-3" placeholder="Service Years To : '.$print["service_years"].'">
                                  ';
                                  if(!empty($_POST["max_service_years"]))
                                  $_SESSION["max_service_years"] = $_POST["max_service_years"];
                                }
                      }
                    ?>
                  </div>
                </td>
                <!-- rank -->
                <td>
                  <div class="btn-group">
                    <?php
                      if($connect_database)
                      {
                        // range min rank
                            $select_min_rank = $connect_database->prepare
                            ('
                            SELECT MIN(r.ranking) min_rank FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                            i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                            i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                            i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                            p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                            ');
                            $select_min_rank->execute();
                            foreach($select_min_rank as $print)
                                    {
                                      echo '
                                              <input type="number" name="min_rank" id="min_rank" class="form-control m-3" placeholder="Rank From : '.$print["min_rank"].'">
                                      ';
                                      if(!empty($_POST["min_rank"]))
                                      $_SESSION["min_rank"] = $_POST["min_rank"];
                                    }
                        // range max rank
                            $select_max_rank = $connect_database->prepare
                            ('
                            SELECT MAX(r.ranking) max_rank FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                            i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                            i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                            i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                            p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                            ');
                            $select_max_rank->execute();
                            foreach($select_max_rank as $print)
                                    {
                                      echo '
                                              <input type="number" name="max_rank" id="max_rank" class="form-control m-3" placeholder="Rank To : '.$print["max_rank"].'">
                                      ';
                                      if(!empty($_POST["max_rank"]))
                                      $_SESSION["max_rank"] = $_POST["max_rank"];
                                    }
                      }
                    ?>
                  </div>
                </td>
              </tr>
          </table>
          </div>
        </div>
      </div>
      <!-- names & total by name -->
      <?php
          if(empty($_SESSION["print_name"]))
          $_SESSION["print_name"] = 'is not null';
      ?>
      <div class="row m-3">
        <!-- table total by name -->
        <div class="col">
          <iframe src="total_by_name.php" height="550" width="715"></iframe>
        </div>
        <div class="col">
          <br><br><br><br>
          <!-- table employee information -->
        <?php
          // print employee information by emb name
          if(isset($_POST["show_data"]))
          {
            $_SESSION["show_data"] = "show_data";
            header("Location:main.php");
          }
          if(isset($_POST["reset_data"]))
          $_SESSION["show_data"] = null;

          if(!empty($_SESSION["show_data"]))
            {
              $select_emp_info = $connect_database->prepare
              ('
              SELECT * FROM info i , covering c , pmp p , hipo h , ranking r WHERE
              i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
              i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
              i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
              p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.ranking BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
              ');
              $select_emp_info->execute();
              if($select_emp_info->rowCount()==1)
              {
                foreach($select_emp_info as $print)
                      {
                        echo '
                            <div style="width: 300; border:8px solid green; padding: 5px; margin: 2px">
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
                            </div>
                        ';
                      }
              }
            }
        ?>
        </div>
      </div>
      <center>
        <button class="btn btn-outline-primary btn-lg m-3" type="submit" name="show_data">Show Data </button>
        <button class="btn btn-outline-danger btn-lg m-3" type="submit" name="reset_data">Reset Data </button>
      </center>
    </form>
      <style>
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button
          {
            -webkit-appearance: none;
          }
      </style>

    <?php
    ob_end_flush();
    ?>

  </body>
</html>