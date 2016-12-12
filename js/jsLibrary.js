function hentJobber2(){
    $.ajax({
        url: "hentJobber2.php", 
        async: true, 
        success: function(result){
            $("#tilgjengeligeJobber").html(result);
            //setButtonListeners();
        }});
}