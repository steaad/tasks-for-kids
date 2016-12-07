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
    /*if (mysqli_query($db, $sql_jobbFerdig)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }*/

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
        
    if ($result = mysqli_query( $db, $sql )){
        
        $html = '<table id = "dineJobber" class = "jobbListe">';
        $html .= '<tr><th></th><th>Beskrivelse</th> <th>Verdi</th><th>Gjort ferdig</th></tr>';
            
        while ($row = mysqli_fetch_assoc($result)) {   
                
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
        
        $html .= '</table>'; 
        
        echo $html;
    }


    mysqli_close($db);
?>