
function CargarContenido(file_txt, estacion){

  	$.post(	"php/"+estacion+".php",{nomArxiu:file_txt},
  			function(data){
  				$("#contendido").html(data);
			});
}