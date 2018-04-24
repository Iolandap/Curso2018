    <!-- Modal emergente INICIAR SESION-->
    <!-- id: tiene el nombre del MODAL -->
    <div class="modal fade" id="log_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Cabecera -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                    <!-- Definicion "X" esquina derecha -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body -->
                <div class="modal-body">
                    <!-- Formulario -->
                    <form method="post">
	                    <div class="form-group">
	                        <label for="username" class="col-form-label">Username</label>
	                        <input type="text" class="form-control" name="username">
	                    </div>
	                    <div class="form-group">
	                        <label for="pasword" class="col-form-label">Pasword:</label>
	                        <input type="text" class="form-control" name="pasword">
	                    </div>
	                    <!-- Boton envio -->
	                    <button type="submit"  class="btn pull-left btn-outline-dark" name="log_in">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- FIN Modal Iniciar Sesion -->