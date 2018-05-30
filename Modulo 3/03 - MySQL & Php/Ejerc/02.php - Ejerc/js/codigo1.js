
function CargarContenido(file_txt){

	// Llamada a fichero de la estacion.php y enviamos los datos del file.txt que queremos usar
  	$.post("libreria/container.php",{nomArxiu:file_txt},

		// Carga en el DIV contenido la informacion que se genera desde la estacion.php
		function(data){
			$("#contenido").html(data);
		}
	);
}