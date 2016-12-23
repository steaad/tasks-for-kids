<?php

    include("config.php");

    session_start();

    $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $db = openDbConnection();
            
        // username and password sent from form         
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

        $sql = "SELECT bruker_id FROM bruker WHERE navn = '$myusername' and passord = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count == 1) {

            $_SESSION['login_user'] = $myusername;
            
            header("location: main.php");
        }else {
            $error = "Ditt brukernavn eller passord er feil";
        }
            
        mysqli_close($db);   
             
    }
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
    <!-- Custom styles for log in -->
    <link href="css/signin.css" rel="stylesheet">

    <title>Oppgaver i hjemmet</title>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jsLibrary.js"></script>

</head>

<body bgcolor="#FFFFFF">

    <header class="jumbotron ">
        <!-- Main component for a primary marketing message or call to action -->

        <div class="container">
            <div class="row row-header vertical-align">
                <div class="col-xs-12 text-center">
                    <h1>Velkommen til oppgaver i huset</h1>
                    <p style="padding:10px;"></p>
                    <p>Hjelp mamma og pappa med noen små jobber og bli belønnet</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <form class="form-signin" action="" method="post">
            <h2 class="form-signin-heading"></h2>
            <label for="brukernavn" class="sr-only">Brukernavn</label>
            <input type="text" id="brukernavn" name="username" class="form-control" placeholder="Brukernavn" required autofocus>
            <label for="inputPassword" class="sr-only">Passord</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Husk meg
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
            
            <div id="login-error">
                <?php echo $error; ?>
            </div>
        </form> 
    </div>


</body>

</html>