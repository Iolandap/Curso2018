window.addEventListener('load', cargaEventos);

function cargaEventos(){
	document.getElementById("enlace").addEventListener("click",muestra);
}

function muestra() {
	var elemento = document.getElementById("adicional");				
	// Si fem servir la primera opció l'element només treballa amb un sola class i substituim la que tenia per la nova, la segona opci� (la tenim comentada) permet treballar amb m�s d'una class
	elemento.className = "visible";
	//elemento.classList.add("visible");
	var enlace = document.getElementById("enlace");
	enlace.className = "oculto";
	elemento.style.color = "red";
}