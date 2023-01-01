<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'head.php'; ?>
    </head>
    <body>

        <?php
            $hostName="localhost";
            $user="root";
            $pass="";
            $db="ert";
            $connect_database = new PDO("mysql:host=$hostName;dbname=$db;charset=utf8;",$user,$pass);
        ?>

    </body>
</html>