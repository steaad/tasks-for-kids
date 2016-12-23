function hentJobber2(){
    $.ajax({
        url: "hentJobber2.php", 
        async: true, 
        success: function(result) {
            $("#tilgjengeligeJobber").html(result);
            setButtonListeners('#tilgjengeligeJobber', taJobb);
        }});
}

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
            
            //Odde tall
            if(counter % 2 != 0) {
                rad = "rad"+counter;
                $('#tilgjengeligeJobber').append("<div id='"+rad+"'"+" class='row'>");
            }
            
            var html = "<div class='col-xs-12 col-sm-6'>"+
                        "<div class='row row-content v-center'>"+
                            "<div class='col-xs-3 col-sm-3'>"+
                                "<img class='img-thumbnail' src='img/"+ val.bilde +"'"+" height='100' width='100' alt='oppgaveBilde'>"+
                            "</div>"+
                            "<div class='col-xs-6 col-sm-6 text-center'>"+
                                "<p class='oppgave-tekst'>"+ val.beskrivelse + "</p>"+
                            "</div>"+
                            "<div class='col-xs-3 col-sm-3'>"+
                                "<button id='"+ val.jobb_id +"' type='button' class='btn btn-default'>Ta oppgave</button>"+
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
        
        if(counter % 2 != 0) {
                $('#tilgjengeligeJobber').append("</div>");
        }
    });
}

function taJobb(e) {

    var jobb_id = e.target.id;
    
    var bruker = document.getElementById("bruker").innerHTML;
    var taJobbData = "bruker=" + bruker + "&jobb_id=" + jobb_id;
    
    /*$.ajax({
        url: "taJobb.php",
        type: "POST",
        data: taJobbData,
        success: function(data) {
            //$('#output').html(data);
            
            console.log(data)
        },
    });*/
    console.log(taJobbData);

    //e.stopPropagation();

}