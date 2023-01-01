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

    <?php

      if($connect_database)
        {
          $select_data_info = $connect_database->prepare('SELECT * FROM percent');
          $select_data_info->execute();
          foreach($select_data_info as $print_info)
                  {
                    $_SESSION["percent_psg"] = $print_info["percent_psg"]; $_SESSION["percent_service_years"] = $print_info["percent_service_years"];
                    $_SESSION["percent_dept"] = $print_info["percent_dept"]; $_SESSION["percent_covering"] = $print_info["percent_covering"];
                    $_SESSION["percent_hipo"] = $print_info["percent_hipo"]; $_SESSION["percent_pmp"] = $print_info["percent_pmp"];
                    $_SESSION["percent_total"] = $print_info["percent_total"];
                  }
        }

    ?>

    <form method="POST" class="m-3">
      <fieldset>
        <div class="col-sm-3">
          <table style="width:360%">
            <tr>
              <td>
                <center><label for="psg_percent"> Enter PSG Percent </label></center>
                <input type="number" name="psg_percent" id="psg_percent" min="0" class="form-control m-3" value="<?php $_SESSION["percent_psg"] ; ?>" placeholder="<?php echo $_SESSION["percent_psg"] ; ?>">
              </td>
              <td>
                <center><label for="service_years_percent"> Enter Service Years Percent </label></center>
                <input type="number" name="service_years_percent" id="service_years_percent" min="0" class="form-control m-3" value="<?php $_SESSION["percent_service_years"] ; ?>" placeholder="<?php echo $_SESSION["percent_service_years"] ; ?>">
              </td>
              <td>
                <center><label for="dept_percent"> Enter Dept Percent </label></center>
                <input type="number" name="dept_percent" id="dept_percent" min="0" class="form-control m-3" value="<?php $_SESSION["percent_dept"] ; ?>" placeholder="<?php echo $_SESSION["percent_dept"] ; ?>">
              </td>
              <td>
                <center><label for="days_percent"> Enter Covering Percent </label></center>
                <input type="number" name="days_percent" id="days_percent" min="0" class="form-control m-3" value="<?php $_SESSION["percent_covering"] ; ?>" placeholder="<?php echo $_SESSION["percent_covering"] ; ?>">
              </td>
              <td>
                <center><label for="hipo_percent"> Enter HIPO Percent </label></center>
                <input type="number" name="hipo_percent" id="hipo_percent" min="0" class="form-control m-3" value="<?php $_SESSION["percent_hipo"] ; ?>" placeholder="<?php echo $_SESSION["percent_hipo"] ; ?>">
              </td>
              <td>
                <center><label for="pmp_percent"> Enter PMP Percent </label></center>
                <input type="number" name="pmp_percent" id="pmp_percent" min="0" class="form-control m-3" value="<?php $_SESSION["percent_pmp"] ; ?>" placeholder="<?php echo $_SESSION["percent_pmp"] ; ?>">
              </td>

              <?php
                $total = $_SESSION["percent_psg"]+$_SESSION["percent_service_years"]+$_SESSION["percent_dept"]+$_SESSION["percent_covering"]+$_SESSION["percent_hipo"]+$_SESSION["percent_pmp"] ;
                $_SESSION["count_scores"] = $total;
              ?>
              <td>
                <center><label for="total"> Total </label></center>
                <input type="number" name="total" id="total" min="0" class="form-control m-3" value="<?php $_SESSION["percent_total"] ; ?>" placeholder="<?php echo $_SESSION["percent_total"] ; ?>" disabled>
              </td>
            </tr>
          </table>

        </div>
          <div class="col-auto">
        <button type="submit" name="change_percent" class="btn btn-danger m-3">Change Percentages</button>
        </div>

        <?php

          if(isset($_POST["change_percent"]))
            {
              //psg percent
              if(empty($_POST["psg_percent"]))
                {
                  $_POST["psg_percent"] = $_SESSION["percent_psg"];
                }
                $_SESSION["psg_percent"] = $_POST["psg_percent"];

              //service years percent
              if(empty($_POST["service_years_percent"]))
                {
                  $_POST["service_years_percent"] = $_SESSION["percent_service_years"];
                }
                $_SESSION["service_years_percent"] = $_POST["service_years_percent"];
              
              //dept percent
              if(empty($_POST["dept_percent"]))
                {
                  $_POST["dept_percent"] = $_SESSION["percent_dept"];
                }
                $_SESSION["dept_percent"] = $_POST["dept_percent"];
              
              //days percent
              if(empty($_POST["days_percent"]))
                {
                  $_POST["days_percent"] = $_SESSION["percent_covering"];
                }
                $_SESSION["days_percent"] = $_POST["days_percent"];

              //hipo percent
              if(empty($_POST["hipo_percent"]))
                {
                  $_POST["hipo_percent"] = $_SESSION["percent_hipo"];
                }
                $_SESSION["hipo_percent"] = $_POST["hipo_percent"];

              //pmp percent
              if(empty($_POST["pmp_percent"]))
                {
                  $_POST["pmp_percent"] = $_SESSION["percent_pmp"];
                }
                  $_SESSION["pmp_percent"] = $_POST["pmp_percent"];

                  $total = $_POST["psg_percent"] + $_POST["service_years_percent"] + $_POST["dept_percent"] + $_POST["days_percent"] + $_POST["hipo_percent"] + $_POST["pmp_percent"] ;
                  $_SESSION["count_scores"] = $total;
            }

        ?>
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


      if($_SESSION["count_scores"] !== 100)
        {
          echo '
                  <center>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <b> The Total Must Be 100 ! </b>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  </center>
              ';
              header("refresh:2;url= edit_percentages.php");
        }
      if(isset($_POST["change_percent"]) && $_SESSION["count_scores"] == 100)
        {
          echo ' <center>Are you sure you want to <b>Change Percentages</b>? <br></center>';
          echo '
                <form method="POST" class="m-3">
                  <fieldset>
                    <div class="col-sm-3">
                      <table style="width:350%">
                        <tr>
                          <td>
                            <center><label for="psg_percent"> New PSG Percent </label></center>
                            <input type="number" name="psg_percent" id="psg_percent" class="form-control m-3" value="'.$_POST["psg_percent"].'" placeholder="'.$_POST["psg_percent"].'" disabled>
                            </td>
                            <td>
                              <center><label for="service_years_percent"> New Service Years Percent </label></center>
                              <input type="number" name="service_years_percent" id="service_years_percent" class="form-control m-3" value="'.$_POST["service_years_percent"].'" placeholder="'.$_POST["service_years_percent"].'" disabled>
                            </td>
                          <td>
                            <center><label for="dept_percent"> New Dept Percent </label></center>
                            <input type="number" name="dept_percent" id="dept_percent" class="form-control m-3" value="'.$_POST["dept_percent"].'" placeholder="'.$_POST["dept_percent"].'" disabled>
                          </td>
                          <td>
                            <center><label for="days_percent"> New Covering Percent </label></center>
                            <input type="number" name="days_percent" id="days_percent" class="form-control m-3" value="'.$_POST["days_percent"].'" placeholder="'.$_POST["days_percent"].'" disabled>
                          </td>
                          <td>
                            <center><label for="hipo_percent"> New HIPO Percent </label></center>
                            <input type="number" name="hipo_percent" id="hipo_percent" class="form-control m-3" value="'.$_POST["hipo_percent"].'" placeholder="'.$_POST["hipo_percent"].'" disabled>
                          </td>
                          <td>
                            <center><label for="pmp_percent"> New PMP Percent </label></center>
                            <input type="number" name="pmp_percent" id="pmp_percent" class="form-control m-3" value="'.$_POST["pmp_percent"].'" placeholder="'.$_POST["pmp_percent"].'" disabled>
                          </td>
                          <?php
                            $total = $_SESSION["score_psg"]+$_SESSION["score_service_years"]+$_SESSION["score_dept"]+$_SESSION["score_covering"]+$_SESSION["score_hipo"]+$_SESSION["score_pmp"] ;
                            $_SESSION["count_scores"] = $total;
                            if(isset($_POST["change_percent"]))
                              {
                                $total = $_POST["psg_percent"]+$_POST["service_years_percent"]+$_POST["dept_percent"]+$_POST["days_percent"]+$_POST["hipo_percent"]+$_POST["pmp_percent"] ;
                                $_SESSION["count_scores"] = $total;
                              }
                          ?>
                          <td>
                            <center><label for="total"> Total </label></center>
                            <input type="number" name="total" id="total" class="form-control m-3" value="'.$_SESSION["count_scores"].'" placeholder="'.$_SESSION["count_scores"].'" disabled>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </fieldset>
                </form>
          ';
          echo '
            <center>
              <form method="POST">
                <fieldset>
                  <div class="col-auto">
                    <button type="submit" name="confirm_change_percent" class="btn btn-outline-danger m-3"> Yes </button>
                    <button type="submit" name="cancel_change_percent" class="btn btn-outline-danger m-3"> No </button>
                  </div>
                </fieldset>
              </form>
            </center>
          ';
        }
        if(isset($_POST["confirm_change_percent"]))
          {
            $update_percent = $connect_database->prepare
            ('
            UPDATE percent SET percent_psg = '.$_SESSION["psg_percent"].' , percent_service_years = '.$_SESSION["service_years_percent"].' ,
            percent_dept = '.$_SESSION["dept_percent"].' , percent_covering = '.$_SESSION["days_percent"].' ,
            percent_hipo = '.$_SESSION["hipo_percent"].' , percent_pmp = '.$_SESSION["pmp_percent"].' ,
            percent_total = '.$_SESSION["count_scores"].'
            ');
            $update_percent->execute();

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

                    $update_total_info = $connect_database->prepare
                    ('
                    UPDATE info SET total = '.$_SESSION["total_scores"].' WHERE personal_no = '.$_SESSION["personal_no"].'
                    ');
                    $update_total_info->execute();

                    $update_total_ranking = $connect_database->prepare
                    ('
                    UPDATE ranking SET total = '.$_SESSION["total_scores"].' WHERE personal_no = '.$_SESSION["personal_no"].'
                    ');
                    $update_total_ranking->execute();

                    $update_emp_rank = $connect_database->prepare
                    ('
                    UPDATE ranking SET rank = '.($x).' WHERE personal_no = '.$_SESSION["personal_no"].'
                    ');
                    $update_emp_rank->execute();
                    $x++;
                  }
            if($update_percent && $update_total_info && $update_total_ranking && $update_emp_rank)
            {
              echo '
                    <center>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b> percentges changed Successful </b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    </center>
              ';
              header("refresh:2;url= edit_percentages.php");
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
              header("refresh:2;url= edit_percentages.php");
            }
          }
          elseif(isset($_POST["cancel_change_percent"]))
              {
                echo '
                      <center>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <b> percentges change cancled Successful </b>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </center>
                ';
                header("refresh:2;url= edit_percentages.php");
              }
    ?>

    <?php
    ob_end_flush();
    ?>

  </body>
</html>