<?php include( "config.php"); include( "session.php"); ?>
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

    <title>Godkjenning av oppgaver</title>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jsLibrary.js"></script>

</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul id="brukerMeny" class="nav navbar-nav">
                <li class="active"><a href="main_admin.php">Tilgjengelige oppgaver</a></li>
                <li><a href="oppgaverGodkjenning.php">Godkjenning av oppgaver</a></li>
                <li><a href="leggTilOppgaver.php">Legg til oppgaver</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-6">

            </div>
            <div class="col-xs-12 col-sm-6">
                <button type="button" id="addBtn" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Legg til ny jobb
                </button>
            </div>
        </div>

        <h2>Tilgjengelige oppgaver</h2>

        <div class="" id="tilgjengeligeJobber"></div>

    </div>

    <!-- Modal -->
    <div id="addTaskModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Lag ny jobb</h4>
                </div>
                <div class="modal-body">
                    <form action="leggTilJobb.php" id="leggTilJobbSkjema" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="oppgaver">Velg oppgave</label>
                            <div class="col-sm-10">
                                <select name="oppgave" class="form-control" id=oppgaver required>
                                    <?php echo "<option disabled selected value> -- Velg en oppgave -- </option>"; $db=openDbConnection(); $sql=mysqli_query($db, "SELECT oppgave_id, beskrivelse FROM oppgaver"); while ($row=$sql->fetch_assoc()){ $id = $row['oppgave_id']; echo "
                                    <option value='".$id ."'>" .$id." ".$row['beskrivelse'] . "</option>"; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="date">Frist til</label>
                            <div class="col-sm-10">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' name="dato" class="form-control" placeholder="date" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-offset-2 col-xs-5">
                                <input type="submit" value="Legg til" class="btn btn-primary"/>
                            </div>
                            <div class="col-xs-5">
                                <p id="leggTilStatus"></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Modal vindu håndtering
        $(document).ready(function() {
            $("#addBtn").click(function() {
                $("#addTaskModal").modal("toggle");
            });

            //Handling sending of form with ajax
            $("#leggTilJobbSkjema").on("submit", function(){
                var form = $(this),
                    type = form.attr("method"),
                    data = {};
                
                form.find("[name]").each(function(index, value){
                    var input = $(this),
                        name = input.attr("name"),
                        value = input.val();
                    
                    data[name] = value;
                });
                
                
                
                $.ajax({
                    url : "leggTilJobb.php",
                    type : type,
                    data : data,
                    success : function(response){
                        $("#leggTilStatus").html("Ok! Jobb ble lagt til").css("color", "green");
                        $("#leggTilStatus").fadeIn('fast').delay(2000).fadeOut('fast');
                        clearForm("leggTilJobbSkjema");
                    },
                    Error : function(xhr, textStatus, errorThrown) {
                        $("#leggTilStatus").html("Feilet! Jobb ble ikke lagt til").css("color", "red");;
                        $("#leggTilStatus").fadeIn('fast').delay(2000).fadeOut('fast');
                    }
                    
                });
                
                return false;
            });

        });
    </script>

</body>

</html>