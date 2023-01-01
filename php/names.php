    <?php require_once 'check_sign_in.php'; ?>
    <?php require_once 'sql.php'; ?>
    <form method="POST">
            <table class="table table-bordered">
                <tr>
                    <td> <p> &nbsp; Name </p>  </td>
                </tr>
                <?php
                    if(!empty($_SESSION["depts"]))
                        {
                            $select_emp_name = $connect_database->prepare('SELECT name FROM info WHERE perm_job_title '.$_SESSION["depts"].'');
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
                                                <div class="btn-group-vertical" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="submit" class="btn-check" name="emp_name" value="'.$print["name"].'" id="'.$print["name"].'" autocomplete="off">
                                                    <label class="btn btn-outline-secondary" for="'.$print["name"].'"> '.$print["name"].' </label>
                                                </div>
                                            </td>
                                        </tr>
                                ';
                                if(isset($_POST["emp_name"]))
                                    {
                                        $_SESSION["print_name"] = ' = "'. $_POST["emp_name"].'"';
                                        $_SESSION["name_filter"] = ' = "'. $_POST["emp_name"].'"';
                                    }
                            }
                ?>
            </table>
    </form>