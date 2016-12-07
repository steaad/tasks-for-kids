<?php

    include("config.php");

    $db = openDbConnection();
    $bruker_id = "";

    if(isset($_POST["bruker"]) && isset($_POST["jobb_id"]))   {
        $bruker_navn = $_POST["bruker"];
        $jobb_id = $_POST["jobb_id"];
    }
    else exit();
    
    $sql_getUserId = "SELECT bruker_id FROM bruker WHERE navn='$bruker_navn'";

    if ($result = mysqli_query( $db, $sql_getUserId )){
        
        /*$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $bruker_id = $row["bruker_id"];*/
        while ($row = mysqli_fetch_assoc($result)) {
            
            $bruker_id = $row["bruker_id"];
    
        }
    }

    $sql_taJobb = "SET foreign_key_checks = 0;";
    $sql_taJobb .= "UPDATE jobb SET bruker_id=$bruker_id WHERE jobb_id=$jobb_id;";
    $sql_taJobb .= "SET foreign_key_checks = 1;";
    $sql_taJobb .= "UPDATE jobb SET jobb_tatt = true WHERE jobb_id=$jobb_id;";

    if (mysqli_multi_query($db, $sql_taJobb)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }

    mysqli_close($db);

?>