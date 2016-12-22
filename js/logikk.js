   
function taJobb(e) {

    var jobb_id = e.target.id;
    
    var bruker = document.getElementById("bruker").innerHTML;
    var taJobbData = "bruker=" + bruker + "&jobb_id=" + jobb_id;
    
    $.ajax({
        url: "taJobb.php",
        type: "POST",
        data: taJobbData,
        success: function(data) {
            //$('#output').html(data);
            
            console.log(data)
        },
    });
    
    //alert("Jobb id er " + jobb_id + " og bruker er " + bruker);

    //e.stopPropagation();

}

function jobbFerdig(e){
    
    var jobb_id = e.target.id;
    
    var bruker = document.getElementById("bruker").innerHTML;
    var jobbFerdigData = "jobb_id=" + jobb_id;
    
    $.ajax({
        url: "jobbFerdig.php",
        type: "POST",
        data: jobbFerdigData,
        success: function(data) {
            //location.reload(true);
            $("#dineJobber").html(data);
            setButtonListeners();
            console.log(data);
        },
    });
    
    //alert("Jobb id er " + jobb_id);

    //e.stopPropagation();
}


function hentDineJobber(){
    /* call the php page that has the php array which is json_encoded */
    $.getJSON('hentDineJobber.php', function(data) {

        /* data will hold the php array as a javascript object */
        $.each(data, function(key, val) {

            var utført = "";
            
            if(val.utført == 0) utført = "Nei";
            else utført = "Ja";
            
            $('#dineJobber').append('<tr id="' + key + '"><td><img src="img/' + val.bilde + '" alt="post" height="42" width="42"></td><td>' + val.beskrivelse + '</td><td>' + val.verdi + ' Kr</td><td>' + utført + '</td><td><button id="' + val.jobb_id + '">Rapporter ferdig!</button></td></tr>');

            $("#" + val.jobb_id).click(jobbFerdig);
            
        });
    });
}

function meld(){
    alert("Alert funksjon kjører!");
}

function hentDineJobber2(){
    $.ajax({
        url: "hentDineJobber2.php", 
        async: true, 
        success: function(result){
            $("#dineJobber").html(result);
            setButtonListeners();
        }});
}

function hentJobber2(){
    $.ajax({
        url: "hentJobber2.php", 
        async: true, 
        success: function(result){
            $("#tilgjengeligeJobber").html(result);
            setButtonListeners("tilgjengeligeJobber", taJobb);
        }});
}


function setButtonListeners(var tag, var func){
    
    $(tag).find('button').click(func);
    
}


