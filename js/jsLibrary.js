function hentJobber2(){
    $.ajax({
        url: "hentJobber2.php", 
        async: true, 
        success: function(result){
            $("#tilgjengeligeJobber").html(result);
            setButtonListeners();
        }});
}

function setButtonListeners(){
    
    $("tilgjengeligeJobber").find('button').click(taJobb);
    
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
    console.log("Knapp er trykket på!");
    alert("Jobb id er " + jobb_id + " og bruker er " + bruker);

    //e.stopPropagation();

}