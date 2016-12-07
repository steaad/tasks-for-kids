<?php

    include("config.php");

    $db = openDbConnection();
    
    $return_arr = array();
    $row_array = array();

    //Spørring ledige jobber
    $sql = "SELECT 
                jobb.jobb_id, 
                oppgaver.beskrivelse, 
                oppgaver.verdi,
                jobb.opprettet_dato,
                oppgaver.bilde
            FROM jobb
            INNER JOIN oppgaver
            ON jobb.oppgave_id = oppgaver.oppgave_id
            WHERE jobb.jobb_tatt = false
            ";
    
    $result = mysqli_query($db, $sql);

    $noRows = mysqli_num_rows($result);


    if ($noRows > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            
            $row_array["ingen_jobber"] = false;
            $row_array["jobb_id"] = $row["jobb_id"];
            $row_array["beskrivelse"] = $row["beskrivelse"];
            $row_array["verdi"] = $row["verdi"];
            $row_array["opprettet_dato"] = $row["opprettet_dato"];
            $row_array["bilde"] = $row["bilde"];
        }
    }
    else{
        $row_array["ingen_jobber"] = true; 
        $row_array["melding"] = "Det finnes ingen tilgjengelige jobber";
    }

    array_push($return_arr,$row_array);

    mysqli_close($db);

    echo json_encode($return_arr);
    
    /*echo "<br>";
    echo "<br>";
    print_r($return_arr);*/

?>