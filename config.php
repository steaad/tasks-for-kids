<?php
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'Steaad050382');
    define('DB_DATABASE', 'oppgaver_for_barn');

    function openDbConnection(){
        
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        
        mysqli_set_charset($db,"utf8");
        
        if (mysqli_connect_errno()) {
           
            //die("<br><p style='color:blue;margin-left:30px;font-size: 30px;'>Feil ved tilkobling mot databasen!</p>");
            echo "<br><p style='color:blue;margin-left:30px;font-size: 30px;'>Feil ved tilkobling mot databasen!</p>";
            echo "<p style='color:blue;margin-left:30px;font-size: 25px;'>Kontakt administrator!</p>";
            exit();
            
        }
        
        return $db;
    }
?>