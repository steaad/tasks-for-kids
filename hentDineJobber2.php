<?php

    session_start();

    include("config.php");

    $db = openDbConnection();
    
    $utført = "Nei";

    //Spørring dine jobber
    $sql = "SELECT 
                jobb.jobb_id, 
                oppgaver.beskrivelse, 
                oppgaver.verdi,
                jobb.utført,
                jobb.jobb_godkjent,
                oppgaver.bilde
            FROM jobb
            INNER JOIN oppgaver
            ON jobb.oppgave_id = oppgaver.oppgave_id
            WHERE jobb.bruker_id = ".$_SESSION['login_bruker_id'];
    
    $result = mysqli_query($db, $sql);

    $noRows = mysqli_num_rows($result);

    $counter = 0;

    $html = "";

    if ($noRows > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            
            $counter++;
            
            if($counter % 2 != 0){
                $html .= "<div class='row row-content'>";
            }
            
            $html .= "<div class='col-xs-12 col-sm-6'>";
            $html .= "<div class='row'>";
            $html .= "<div class='col-xs-3 col-sm-3'>";
            $html .= "<img class='img-thumbnail' src='img/".$row["bilde"]."height='100' width='100' alt='oppgaveBilde'></div>";
            $html .= "";
            $html .= "";
            $html .= "";
            
            if($counter % 2 == 0){
                $html .= "</div>";
            }
            
        }

    
            
                if($row["utført"] == 1) $utført = "Ja";
                else $utført = "Nei";
            
                $html .= "<tr>";
                $html .= "<td><img src='img/".$row["bilde"]."'alt='ting' height='42' width='42'></td>";
                $html .= "<td>".$row["beskrivelse"]."</td>";
                $html .= "<td>".$row["verdi"]."</td>";
                $html .= "<td>".$utført."</td>";
                $html .= '<td><button id="' .$row["jobb_id"]. '">Rapporter ferdig!</button></td>';
                $html .= '</tr>';   

        
        
    }
    else $html = "<p>Du har ingen oppgaver</p>";

    echo $html;

    mysqli_close($db);


?>