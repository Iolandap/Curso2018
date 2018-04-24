 <?php
	// Condicion pulsacion log_out
 	if(isset($_POST['log_out'])){
		if($_POST["log_out"]=="log_out"){
			unset($_SESSION["usuario"]);
			session_destroy();
		} // FIN del if(isset())
	}
?>
	<!-- Modal emergente LOG OUT-->
	<div class="modal fade" id="log_out" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        Vas a salir de la sesion...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anular</button>
	        <form method="post">
	        	<button type="submit" class="btn btn-primary" name="log_out" value="log_out">Confirmar</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div> <!-- FIN Modal Log Out -->