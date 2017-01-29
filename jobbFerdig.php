<?php

session_start();
include("config.php");

    $db = openDbConnection();
    
    $jobb_id = "";

    if(isset($_POST["jobb_id"]))   {
        $jobb_id = $_POST["jobb_id"];
    }
    else exit();

    $sql_jobbFerdig = "UPDATE jobb SET utført=true WHERE jobb_id=$jobb_id";

    mysqli_query($db, $sql_jobbFerdig);
    
    if (mysqli_query($db, $sql_jobbFerdig)) {
        echo "Jobb id number ".$jobb_id." Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }

    mysqli_close($db);
?>