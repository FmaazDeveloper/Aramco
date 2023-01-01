    <?php require_once 'check_sign_in.php'; ?>
    <?php require_once 'sql.php'; ?>

    <form method="POST">
        <table class="table table-bordered">
            <tr>
                <td> <p> &nbsp; Total By Name </p>  </td>
            </tr>
            <?php
                if(!empty($_SESSION["depts"]))
                    {
                        $select_total_name = $connect_database->prepare
                        ('
                        SELECT i.name , i.total , r.rank FROM info i , covering c , pmp p , hipo h , ranking r WHERE
                        i.personal_no = i.personal_no AND c.personal_no = i.personal_no AND h.personal_no = i.personal_no AND p.personal_no = i.personal_no AND r.personal_no = i.personal_no AND
                        i.personal_no '.$_SESSION["personal_no_filter"].' AND i.name '.$_SESSION["name_filter"].' AND i.psg '.$_SESSION["psg_filter"].' AND
                        i.service_years BETWEEN '.$_SESSION["min_service_years"].' AND '.$_SESSION["max_service_years"].' AND h.hipo '.$_SESSION["hipo_filter"].' AND
                        p.avg_pmp '.$_SESSION["avg_pmp_filter"].' AND r.rank BETWEEN '.$_SESSION["min_rank"].' AND '.$_SESSION["max_rank"].' AND i.perm_job_title '.$_SESSION["depts"].'
                        ORDER BY r.rank
                        ');
                        $select_total_name->execute();
                    }
                elseif(empty($_SESSION["depts"]))
                        {
                            $select_total_name = $connect_database->prepare('SELECT name , total , rank FROM ranking ORDER BY rank');
                            $select_total_name->execute();
                        }
                foreach($select_total_name as $print)
                        {
                            echo '
                                    <tr>
                                        <td width="750px">
                                            <input type="submit" class="btn-check" name="total_by_name" value="'.$print["name"].'" id="'.$print["name"].'" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="'.$print["name"].'"> '.$print["rank"].' - '.$print["name"].' </label>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: '.$print["total"].'%;" aria-valuenow="'.$print["total"].'" aria-valuemin="0" aria-valuemax="100">'.$print["total"].'</div>
                                            </div>
                                        </td>
                                    </tr>
                            ';
                            if(isset($_POST["total_by_name"]))
                                {
                                    $_SESSION["print_name"] = ' = "'. $_POST["total_by_name"].'"';
                                    $_SESSION["name_filter"] = ' = "'. $_POST["total_by_name"].'"';
                                }
                        }
            ?>
        </table>
    </form>