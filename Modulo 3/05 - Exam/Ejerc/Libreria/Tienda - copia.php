<?php
if(!isset($_POST['regresar'])){
        $id_tienda     = $_POST["id_tienda"];
?>
    <!-- Modal emergente Confirmar Borrado que se activa si no se ha pulsado el boton de borrar-->
    <div class="modal fade" id="tienda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <input 
                        type = "hidenn" 
                        name = "id_tienda" 
                        id   = "id_tienda">
                    <input 
                        type = "text" 
                        name = "Nombre" 
                        id   = "Nombre">
                    <input 
                        type = "text" 
                        name = "ciudad" 
                        id   = "ciudad">
                    <input 
                        type = "text" 
                        name = "Direccion" 
                        id   = "Direccion">
                    <input 
                        type = "text" 
                        name = "Foto" 
                        id   = "Foto">
                    <div class="modal-footer">
                        <button type ="button" name="regresar" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- FIN Modal Confirmar Borrado -->
<?php

}
?>