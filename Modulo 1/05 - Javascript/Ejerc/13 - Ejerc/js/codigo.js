window.addEventListener('load', muestra);

/* Funcion control de pulsacion de botones. Si se hace Click envia a su funcion especifica */
     function muestra() {
        document.getElementById("add").addEventListener("click",addItem);
        document.getElementById("remove").addEventListener("click",removeItem);
    }

/* Funcion para añadir elementos */

    function addItem(){
        var ul = document.getElementById("lista");              // pone la lista en una array
        var candidate = document.getElementById("candidate");   // coje lo introducido en INPUT
        var li = document.createElement("li");                  // Define una linea
        // crea un LI con ID y el valor entrado en el INPUT
        li.setAttribute('id',candidate.value);          
        // Junta todo lo entrado en el li
        li.appendChild(document.createTextNode(candidate.value));
        /* añade el li al ul */
        ul.appendChild(li);
    }
    
/* Funcion para eliminar elementos */
    function removeItem(){
        var ul = document.getElementById("lista");          // pone la lista en una array
        /* Pone las li de cada ul. Si ponemos document. seria de todo el documento */
        var lis=ul.getElementsByTagName("li");
        /* Variable para guardar el INPUT */
        var candidate = document.getElementById("candidate");

        /* Bucle para correr cada li array y buscar si el texto entrado esta */
        for(li in lis){
            /* pasa por cada elmentos array y mira si el texto esta contenido */
            if(lis[li].textContent.indexOf(candidate.value)>=0){
                ul.removeChild(lis[li]);
            }
        }

    }


/* Diferentes opciones

    function addItem()
        var array_li = document.getElementsByTagName("li");
        if(array_li.lenght==0){
            document.getElementById("remove")
            .disabled = false;
        }
        var elemento = document.createElement("li");
        var texto = document.createTextNode("Elemento de prueba");
        elemento.appendChild(texto);

        var lista = document.getElementById("lista");
        lista.appendChild(elemento);
    
    function addItem() {
        var elemento = document.createElement("li");
        var texto = document.createTextNode("Elemento de prueba");
        elemento.appendChild(texto);
        
        var lista = document.getElementById("lista");
        lista.appendChild(elemento);
        
        var nuevoElemento = "<li>Texto de prueba</li>";
        lista.innerHTML = lista.innerHTML + nuevoElemento;
    }

    function removeItem(){
        var lista = document.getElementById("lista");       // ponemos la lista en una variable
        var array_li = lista.getElementsByTagName("li");    // ponemos las "li" de la variable "lista" en una array

        var ultimo_li = array_li[array_li.length-1];        // buscamos el penultimo elemento de la array
        ultimo_li.parentNode.removeChild(ultimo_li);        // borramos el hijo del penultimo elemento
        if (array_li.length ==0 ){
            document.getElementById("remove")
            .disabled = true;
        }
    }
     */