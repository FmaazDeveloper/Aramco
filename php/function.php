<?php require_once "check_sign_in.php" ;  ?>
<?php

    //count score psg
    function count_score_psg ()
        {
            switch($_SESSION["psg"])
                    {
                        case 11 :
                            $_SESSION["count_score_psg"] = 20;
                            $_SESSION["count_score_psg"];
                            break;
                        case 12 :
                            $_SESSION["count_score_psg"] = 40;
                            $_SESSION["count_score_psg"];
                            break;
                        case 13 :
                            $_SESSION["count_score_psg"] = 60;
                            $_SESSION["count_score_psg"];
                            break;
                        case 14 :
                            $_SESSION["count_score_psg"] = 80;
                            $_SESSION["count_score_psg"];
                            break;
                        case 15 :
                            $_SESSION["count_score_psg"] = 100;
                            $_SESSION["count_score_psg"];
                            break;
                        default :
                        $_SESSION["count_score_psg"] = 0;
                        $_SESSION["count_score_psg"];
                    }
        }

    //count score dept
    function count_score_dept()
        {
            $_SESSION["count_score_dept"] = 0;
            if(strlen($_SESSION["perm_job_title"]) >1)
                {
                    $_SESSION["count_score_dept"] += 1;
                }
            else
                {
                    $_SESSION["count_score_dept"] += 0;
                }
            if(strlen($_SESSION["perm_div_cc_title"]) >1)
                {
                    $_SESSION["count_score_dept"] += 1;
                }
            else
                {
                    $_SESSION["count_score_dept"] += 0;
                }
            if(strlen($_SESSION["perm_dept_title"]) >1)
                {
                    $_SESSION["count_score_dept"] += 1;
                }
            else
                {
                    $_SESSION["count_score_dept"] += 0;
                }
                $_SESSION["count_score_dept"];
        }

    //count score days
    function count_score_days()
        {
            $_SESSION["count_score_days"] = round($_SESSION["days"] / 360 , 2);
        }

    // count score hipo
    function count_score_hipo()
        {
            if($_SESSION["hipo"] == "Y" || $_SESSION["hipo"] == "y" || $_SESSION["hipo"] == "Yes" || $_SESSION["hipo"] == "yes")
                {
                        $_SESSION["count_score_hipo"] = 15;
                }
            elseif($_SESSION["hipo"] == "N" || $_SESSION["hipo"] == "n" || $_SESSION["hipo"] == "No" || $_SESSION["hipo"] == "no")
                {
                    $_SESSION["count_score_hipo"] = 0;
                }
            else
                {
                    $_SESSION["count_score_hipo"] = 0;
                }
                $_SESSION["count_score_hipo"];
        }

    // couont score pmp
    function count_score_pmp()
        {
            switch($_SESSION["pmp_2021"])
                    {
                        case "S" :
                            $_SESSION["count_score_pmp_2021"] = 5;
                            break;
                        case "E+" :
                            $_SESSION["count_score_pmp_2021"] = 4;
                            break;
                        case "E" :
                            $_SESSION["count_score_pmp_2021"] = 3;
                            break;
                        case "M" :
                            $_SESSION["count_score_pmp_2021"] = 2;
                            break;
                        case "D" :
                            $_SESSION["count_score_pmp_2021"] = 1;
                            break;
                        default :
                        $_SESSION["count_score_pmp_2021"] = 0;
                    }
            switch($_SESSION["pmp_2020"])
                    {
                        case "S" :
                            $_SESSION["count_score_pmp_2020"] = 5;
                            break;
                        case "E+" :
                            $_SESSION["count_score_pmp_2020"] = 4;
                            break;
                        case "E" :
                            $_SESSION["count_score_pmp_2020"] = 3;
                            break;
                        case "M" :
                            $_SESSION["count_score_pmp_2020"] = 2;
                            break;
                        case "D" :
                            $_SESSION["count_score_pmp_2020"] = 1;
                            break;
                        default :
                            $_SESSION["count_score_pmp_2020"] = 0;
                    }
            switch($_SESSION["pmp_2019"])
                    {
                        case "S" :
                            $_SESSION["count_score_pmp_2019"] = 5;
                            break;
                        case "E+" :
                            $_SESSION["count_score_pmp_2019"] = 4;
                            break;
                        case "E" :
                            $_SESSION["count_score_pmp_2019"] = 3;
                            break;
                        case "M" :
                            $_SESSION["count_score_pmp_2019"] = 2;
                            break;
                        case "D" :
                            $_SESSION["count_score_pmp_2019"] = 1;
                            break;
                        default :
                            $_SESSION["count_pmp_2019"] = 0;
                    }
                    $_SESSION["count_score_pmp"] = $_SESSION["count_score_pmp_2021"] + $_SESSION["count_score_pmp_2020"] + $_SESSION["count_score_pmp_2019"] ;
        }

    // avg score pmp
    function avg_score_pmp()
        {
            if(($_SESSION["count_score_pmp"]/3) <=5 && ($_SESSION["count_score_pmp"]/3) >=4.5)
                {
                    $_SESSION["avg_score_pmp"] = "S";
                }
            elseif(($_SESSION["count_score_pmp"]/3) <=4.49 && ($_SESSION["count_score_pmp"]/3) >=3.5)
                {
                $_SESSION["avg_score_pmp"] = "E+";
                }
            elseif(($_SESSION["count_score_pmp"]/3) <=3.49 && ($_SESSION["count_score_pmp"]/3) >=2.5)
                {
                    $_SESSION["avg_score_pmp"] = "E";
                }
            elseif(($_SESSION["count_score_pmp"]/3) <=2.49 && ($_SESSION["count_score_pmp"]/3) >=1.5)
                {
                    $_SESSION["avg_score_pmp"] = "M";
                }
            elseif(($_SESSION["count_score_pmp"]/3) <=1.49 && ($_SESSION["count_score_pmp"]/3) >=0)
                {
                    $_SESSION["avg_score_pmp"] = "D";
                }
            else
                {
                    $_SESSION["avg_score_pmp"] = "";
                }
                $_SESSION["avg_score_pmp"];
        }

    // total scores
    require_once "sql.php";
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
    function total_scores()
        {
            $_SESSION["total_scores"] = round((($_SESSION["count_score_psg"]/100)*$_SESSION["percent_psg"]) +
            (($_SESSION["count_score_dept"]/3)*$_SESSION["percent_dept"]) + ($_SESSION["count_score_days"]*$_SESSION["percent_covering"]) +
            (($_SESSION["service_years"]/40)*$_SESSION["percent_service_years"]) + (($_SESSION["count_score_hipo"]/15)*$_SESSION["percent_hipo"]) +
            (($_SESSION["count_score_pmp"]/15)*$_SESSION["percent_pmp"]),2);
        }

    count_score_psg();
    count_score_dept();
    count_score_days();
    count_score_hipo();
    count_score_pmp();
    avg_score_pmp();
    total_scores();

?>