<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Steffen Aadnevik">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test layout</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mystylesApp.css">
    
</head>
<body>
    <div class="container">
        <?php
            $html = "";
            $noTestRows = 20;
            $counter = 0;
        
            if ($noTestRows > 0){
        
                while ($noTestRows > 0) {
            
                    $counter++;

                    if($counter % 2 != 0){
                        $html .= "<div class='row'>";
                    }

                    $html .= "<div class='col-xs-12 col-sm-6'>";
                    $html .= "<div class='row row-content'>";
                    $html .= "<div class='col-xs-3 col-sm-3'>";
                    $html .= "<img class='img-thumbnail' src='img/oppvaskmaskin.png' height='100' width='100' alt='oppgaveBilde'>";
                    $html .= "</div>";
                    $html .= "<div class='col-xs-6 col-sm-6 text-center'>";
                    $html .= "<p class='oppgave-tekst'>Ta ut av oppvaskmaskinen og plasser innhold i skuffer og skap</p>";
                    $html .= "</div>";
                    $html .= "<div class='col-xs-3 col-sm-3'>";
                    $html .= "<button type='button' class='btn btn-default'>Ta oppgave</button>";
                    $html .= "</div>";
                    $html .= "</div>";
                    $html .= "</div>";

                    if($counter % 2 == 0){
                        $html .= "</div>";
                    }
                    
                    $noTestRows--;
                    
                }
            }
            else{
                $html = "<p>Ingen oppgaver</p>";
            }
        
            echo $html;
        
        ?>
        
        
        <svg height="100" width="100">
              <circle cx="50" cy="50" r="20" stroke="black" stroke-width="1" fill="green" />
        </svg>
    </div>
</body>
</html>