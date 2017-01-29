<?php 
    include("config.php");
    include("session.php"); 
    
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Steffen Aadnevik">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/mystylesApp.css">

        <title>Oppgaver i hjemmet</title>

        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/jsLibrary.js"></script>

    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul id="brukerMeny" class="nav navbar-nav">
                    <li><a href="main.php">Tilgjengelige oppgaver</a></li>
                    <li class="active"><a href="">Mine oppgaver</a></li>
                    <li><a href="ferdigeOppgaver.php">Ferdige oppgaver</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <h1>Velkommen <span id="bruker"><?php echo $login_session_name; ?></span></h1>
            <h2><a href = "logout.php">Logg ut</a></h2>

            <?php 
                //$admin_rights kommer fra session.php som er inkludert i toppen
                if($admin_rights == 1) {
                    echo "<p id='rettigheter'>Voksen</p>";
                }else echo "<p id='rettigheter'>Barn</p>"; 
            ?>

                <h2>Dine oppgaver</h2>
                
                <div class="" id="dineJobber"></div>
                
        </div>

        <script>
            $(document).ready(function () {
                
                hentDineJobber();
            });
        </script>

    </body>

    </html>