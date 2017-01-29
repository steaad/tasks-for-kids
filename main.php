<?php 
    include( "config.php"); 
    include( "session.php"); 
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jsLibrary.js"></script>

</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav" id="brukerMeny" >
                    <li class="active"><a href="#">Tilgjengelige oppgaver</a></li>
                    <li><a href="dineoppgaver.php">Mine oppgaver</a></li>
                    <li><a href="ferdigeOppgaver.php">Ferdige oppgaver</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text userLogin-text">Logget inn som <span id="bruker"><?php echo $login_session_name; ?></span></p>
                    </li>
                    <li>
                        <a class="btn" id="logoutBtn" href = "logout.php">
                            <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
       
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p class="pSize_1">Hei <span id="bruker"><?php echo $login_session_name; ?></span></p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <p class="pSize_1">Opptjent <span class="label label-default"><?php echo $opptjent." Kr"; ?></span></p>
            </div>
        </div>

        <h2>Tilgjengelige oppgaver</h2>

        <div class="" id="tilgjengeligeJobber"></div>

    </div>

    <script>
        $(document).ready(function() {
            hentJobber();
            //hentDineJobber2();
        });
    </script>

</body>

</html>