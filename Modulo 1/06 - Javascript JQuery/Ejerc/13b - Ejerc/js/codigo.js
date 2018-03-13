$(document).ready(function(){ 
    //document.getElementById("add").addEventListener("click",addItem);
    $("#add")    .on("click",addItem);
    //document.getElementById("remove").addEventListener("click",removeItem);
    $("#remove") .on("click",removeItem);
});

/* Funcion para añadir elementos */

    function addItem(){
        var entrada = "<li>"+$("#candidate").val()+"</li>";
        $("#lista").append(entrada);            
    }
    
/* Funcion para eliminar elementos */
    function removeItem(){
        $("#lista li").eq(-1).remove();  // QE() devuelve un elemento con un número de índice específico
    }

