window.addEventListener('load', muestra);
    
    function muestra() {

        document.getElementById("mon").addEventListener("click",mon);
        document.getElementById("vilanova").addEventListener("click",vilanova);
}

 function mon(){
    console.log("mon");
    $('#img_mon').bxSlider({
        auto: true,
        autoControls: true,
        stopAutoOnClick: true,
        pager: true,
        captions: true,
        slideWidth: 600
    });
}

function vilanova(){
    console.log("vilanova");
    $('#img_vilanova').bxSlider({
        auto: true,
        autoControls: true,
        stopAutoOnClick: true,
        pager: true,
        captions: true,
        slideWidth: 600
    });
}