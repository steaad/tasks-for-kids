

/*function setButtonListeners(){
    
    $("tilgjengeligeJobber").find('button').click(taJobb);
    
}*/

function setButtonListeners(tag, func){
    
    $(tag).find('button').click(func);
    
}

function hentJobber() {
    /* call the php page that has the php array which is json_encoded */
    $.getJSON('hentJobber.php', function(data) {

        var counter = 0;
        var rad = 0;
        
        /* data will hold the php array as a javascript object */
        $.each(data, function(key, val) {
            
            counter++;
            
            //Oddetall
            if(counter % 2 != 0) {
                rad = "rad"+counter;
                $('#tilgjengeligeJobber').append("<div id='"+rad+"'"+" class='row'>");
            }
            
            var html = "<div class='col-xs-12 col-sm-6'>"+
                        "<div class='row row-content v-center'>"+
                            "<div class='col-xs-3 col-sm-3'>"+
                                "<img class='img-thumbnail' src='img/"+ val.bilde +"'"+" height='100' width='100' alt='oppgaveBilde'>"+
                            "</div>"+
                            "<div class='col-xs-5 col-sm-5 text-center'>"+
                                "<p class='oppgave-tekst'>"+ val.beskrivelse + "</p>"+
                            "</div>"+
                            "<div class='col-xs-2 col-sm-2 text-center'>"+
                                "<span class='label label-default'> "+ val.verdi +" Kr</span>"+
                            "</div>"+
                            "<div class='col-xs-2 col-sm-2'>"+
                                "<button id='"+ val.jobb_id +"' type='button' class='btn btn-default'>Ta</button>"+
                            "</div>"+
                        "</div>"+
                    "</div>";
            
            $(html).appendTo('#'+rad);
            
            //Partall
            if(counter % 2 == 0) {
                $('#tilgjengeligeJobber').append("</div>");
            }

            $("#" + val.jobb_id).click(taJobb);
        });
        
        //Antall oppgaver i lista er ett oddetall. Må da 
        if(counter % 2 != 0) {
                $('#tilgjengeligeJobber').append("</div>");
        }
    });
}

function hentDineJobber() {
    /* call the php page that has the php array which is json_encoded */
    $.getJSON('hentDineJobber.php', function(data) {
        
        /* data will hold the php array as a javascript object */
        $.each(data, function(key, val) {
            
            var status = "";
            var button = "";
            
            if(val.utført == 0){
                button = "<button id='"+ val.jobb_id +"' type='button' class='btn btn-default'>Ferdig</button>";
            }
            else {
                button = "<p class='oppgave-tekst'>Ferdig</p>";
            }
            
            if(val.utført == 1 & val.jobb_godkjent == 0){
                status = "<p class='oppgave-tekst'><span class='label label-warning center-block'>Venter på godkjenning</span></p>";
            }
            else if(val.utført == 1 & val.jobb_godkjent == 1){
                status = "<p class='oppgave-tekst'><span class='label label-success center-block'>Godkjent</span></p>";
            }
            else if(val.utført == 1 & val.jobb_underkjent == 1){
                status = "<p class='oppgave-tekst'><span class='label label-danger center-block'>Ikke godkjent</span></p>";
            }
            
            var html = "<div class='row row-content v-center'>"+
                            "<div class='col-xs-3'>"+
                                "<img class='img-thumbnail center-block' src='img/"+ val.bilde +"'"+" height='100' width='100' alt='oppgaveBilde'>"+
                            "</div>"+
                            "<div class='col-xs-3 text-center'>"+
                                "<p class='oppgave-tekst'>"+ val.beskrivelse + "</p>"+
                            "</div>"+
                            "<div class='col-xs-1 text-center'>"+
                                "<span class='label label-default'> "+ val.verdi +" Kr</span>"+
                            "</div>"+
                            "<div class='col-xs-3 text-center'>"+
                                button+
                            "</div>"+
                            "<div class='col-xs-2'>"+
                                status +
                            "</div>"+
                        "</div>";
                   
                $('#dineJobber').append(html);

            $("#" + val.jobb_id).click(jobbFerdig);
        });
    });
}

function taJobb(e) {

    var jobb_id = e.target.id;
    
    var bruker = document.getElementById("bruker").innerHTML;
    var taJobbData = "bruker=" + bruker + "&jobb_id=" + jobb_id;
    
    $.ajax({
        url: "taJobb.php",
        type: "POST",
        data: taJobbData,
        success: function(data) {
            location.reload(true);
            console.log(data)
        },
    });
    console.log(taJobbData);

    //e.stopPropagation();

}

function jobbFerdig(e){
    
    var jobb_id = e.target.id;

    var jobbFerdigData = "jobb_id=" + jobb_id;
    
    $.ajax({
        url: "jobbFerdig.php",
        type: "POST",
        data: jobbFerdigData,
        success: function(data) {
            location.reload(true);
            console.log(data);
        },
    });

}

function godkjennJobb(e){
    
    var jobb_id = e.target.id;

    var jobbGodkjentData = "jobb_id=" + jobb_id;
    
    $.ajax({
        url: "jobbgodkjenn.php",
        type: "POST",
        data: jobbGodkjentData,
        success: function(data) {
            location.reload(true);
            console.log(data);
        },
    });

}