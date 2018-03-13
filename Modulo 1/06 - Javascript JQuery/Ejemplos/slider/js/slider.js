$(document).ready(function() { 

    $('#slider div:gt(0)').hide();

    // Temporizador
    setInterval(
        function(){
            $('#slider div:first-child').fadeOut(0)
            .next('div').fadeIn(1000)
            .end().appendTo('#slider');
        }
        , 4000);
});