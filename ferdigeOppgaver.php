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

    <body onload="adminContent()">
       <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
       
        <!--<nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul id="brukerMeny" class="nav navbar-nav">
                    <li><a href="main.php">Tilgjengelige oppgaver</a></li>
                    <li><a href="dineoppgaver.php">Mine oppgaver</a></li>
                    <li class="active"><a href="ferdigeOppgaver.php">Ferdige oppgaver</a></li>
                </ul>
            </div>
        </nav>-->
        <div class="container">
            <h1>Velkommen <span id="bruker"><?php echo $login_session_name; ?></span></h1>
            <h2><a href = "logout.php">Logg ut</a></h2>

            <?php 
                //$admin_rights kommer fra session.php som er inkludert i toppen
                if($admin_rights == 1) {
                    echo "<p id='rettigheter'>Voksen</p>";
                }else echo "<p id='rettigheter'>Barn</p>"; 
            ?>

                <h2>Ferdige oppgaver</h2>
                
                <div class="" id="ferdigeJobber"></div>
                
        </div>

        <script>
            $(document).ready(function () {
                
                //hentDineJobber2();
            });
        </script>

    </body>

    </html>