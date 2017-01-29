<?php
    
    session_start();

    $db = openDbConnection();

    $user_check = $_SESSION["login_user"];
    $opptjent = 135;//$_SESSION["opptjent"];


    $ses_sql = mysqli_query($db,"select * from bruker where navn = '$user_check'");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_bruker_id = $row["bruker_id"];
    $login_session_name = $row["navn"];
    $admin_rights = $row["administrator"];

    $_SESSION["login_bruker_id"] = $login_bruker_id;

    mysqli_close($db); 

    if(!isset($_SESSION["login_user"])){
        header("location:login.php");
    }
?>