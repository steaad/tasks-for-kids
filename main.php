<?php 
    include("config.php");
    include("session.php"); 
    
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta charset="UTF-8">
        <meta name="author" content="Steffen Aadnevik">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/mystylesApp.css">

        <title>Oppgaver i hjemmet</title>

        <style>
            .jobbListe th,
            td {
                padding: 15px;
                text-align: left;
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/jsLibrary.js"></script>

    </head>

    <nav id="nav">

    </nav>

    <body onload="adminContent()">

            <h1>Velkommen <span id="bruker"><?php echo $login_session_name; ?></span></h1>
            <h2><a href = "logout.php">Logg ut</a></h2>

            <?php 
                //$admin_rights kommer fra session.php som er inkludert i toppen
                if($admin_rights == 1) {
                    echo "<p id='rettigheter'>Voksen</p>";
                }else echo "<p id='rettigheter'>Barn</p>"; 
            ?>

                <script>
                    function adminContent() {
                        var rettigheter = document.getElementById("rettigheter").innerHTML;

                        if (rettigheter == "Voksen") {

                            var nav = document.getElementById("nav");
                            var aTag = document.createElement("a");
                            aTag.setAttribute("href", "adminpage.php");
                            aTag.innerHTML = "Administrere oppgaver";
                            nav.appendChild(aTag);
                        }
                    }
                </script>

                <h2>Tilgjengelige jobber</h2>

                <div class="container">
                    <div id="tilgjengeligeJobber"></div>
                </div>

                <h2>Dine jobber</h2>

                <div id="dineJobber">

                </div>

        <script>
            $(document).ready(function () {
                hentJobber2();
                //hentDineJobber2();
               

            });
        </script>

    </body>

    </html>