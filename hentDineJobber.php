<?php

    session_start();

    include("config.php");

    $db = openDbConnection();
    
    $return_arr = array();

    //Spørring ledige jobber
    $sql = "SELECT 
                jobb.jobb_id, 
                oppgaver.beskrivelse, 
                oppgaver.verdi,
                jobb.utført,
                jobb.jobb_godkjent,
                jobb.jobb_underkjent,
                oppgaver.bilde
            FROM jobb
            INNER JOIN oppgaver
            ON jobb.oppgave_id = oppgaver.oppgave_id
            WHERE jobb.bruker_id = ".$_SESSION['login_bruker_id'];
        
    if ($result = mysqli_query( $db, $sql )){
        while ($row = mysqli_fetch_assoc($result)) {
            
            $row_array["bilde"] = $row["bilde"];
            $row_array["jobb_id"] = $row["jobb_id"];
            $row_array["beskrivelse"] = $row["beskrivelse"];
            $row_array["verdi"] = $row["verdi"];
            $row_array["utført"] = $row["utført"];
            $row_array["jobb_godkjent"] = $row["jobb_godkjent"];
            $row_array["jobb_underkjent"] = $row["jobb_underkjent"];
            
            array_push($return_arr,$row_array);
        }
    }

    mysqli_close($db);

    echo json_encode($return_arr);
    
    /*echo "<br>";
    echo "<br>";
    print_r($return_arr);*/

?>