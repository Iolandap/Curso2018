
    window.addEventListener('load', inicio);

      function inicio() {
        document.getElementById("lnombre").addEventListener("focus" , focusFunction);
        document.getElementById("lnombre").addEventListener("blur"  , blurFunction);
        document.getElementById("lnombre").addEventListener("change", changeFunction);

        document.getElementById("lapellido").addEventListener("focus" , focusFunction);
        document.getElementById("lapellido").addEventListener("blur"  , blurFunction);
        document.getElementById("lapellido").addEventListener("change", changeFunction);
      }

    function focusFunction() {
        // Focus = Pasa el color a amarillo
        this.style.background = "yellow";
        this.nextSibling.nextSibling.className ="visible";
        this.nextSibling.nextSibling.innerText = this.nextSibling.nextSibling.innerText  +" Has entrado en el campo "; 
        console.log(this.nextSibling.nextSibling);
    }
    
    function blurFunction() {
        // No focus = Vuelve a color original
        this.style.background = "";
        this.nextSibling.nextSibling.className ="oculto";
        this.nextSibling.nextSibling.innerText = this.nextSibling.nextSibling.innerText  +" Has salido campo ";
    }

    function changeFunction() {
        // Change = mensaje de cambio de informacion en campo
        this.nextSibling.nextSibling.innerText = this.nextSibling.nextSibling.innerText  + " Has modificado el campo ";
    }
