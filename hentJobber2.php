<?php

    include("config.php");

    $db = openDbConnection();
    
    $return_arr = array();
    $row_array = array();
    $counter = 0;

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
            
            $counter++;
            
            if($counter % 2 != 0){
                $html .= "<div class='row row-content'>";
            }
            
            $html .= "<div class='col-xs-12 col-sm-6'>";
            $html .= "<div class='row'>";
            $html .= "<div class='col-xs-3 col-sm-3'>";
            $html .= "<img class='img-thumbnail' src='img/".$row["bilde"]." height='100' width='100' alt='oppgaveBilde'>";
            $html .= "</div>";
            $html .= "<div class='col-xs-6 col-sm-6 text-center'>";
            $html .= "<p class='oppgave-tekst'>".$row["beskrivelse"]."</p>";
            $html .= "</div>";
            $html .= "<div class='col-xs-3 col-sm-3'>";
            $html .= "<button type='button' class='btn btn-default'>Ta oppgave</button>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
            
            /*$row_array["ingen_jobber"] = false;
            $row_array["jobb_id"] = $row["jobb_id"];
            $row_array["beskrivelse"] = $row["beskrivelse"];
            $row_array["verdi"] = $row["verdi"];
            $row_array["opprettet_dato"] = $row["opprettet_dato"];
            $row_array["bilde"] = $row["bilde"];*/
        }
    }
    else{
        
    }

    array_push($return_arr,$row_array);

    mysqli_close($db);

    echo json_encode($return_arr);
    
    /*echo "<br>";
    echo "<br>";
    print_r($return_arr);*/

?>