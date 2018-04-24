<div class="image-container">
    <img class="logo" src="img/medusaverd.png" alt="medusaverd" />
</div>
<form class="navbarmenu" action="index.php" method ="post"> 
	<ul>
		<li><button class="navbarbut" value="home" name="seccio" type="submit">Home</button></li>
		<li><button class="navbarbut" value="pelis" name="seccio" type="submit">Pelis</button></li>
		<li><button class="navbarbut" value="series" name="seccio" type="submit">Series</button></li>
		<li><button class="navbarbut" value="libros" name="seccio" type="submit">Libros</button></li>

		<?php
 		if($_SESSION['cfg']['userlogtipus']=="none"){
 		?>
		<li><button class="initsesbut" value="login" name="seccio" type="submit">Iniciar Sesión</button></li>

		<?php
		}
		elseif($_SESSION['cfg']['userlogtipus']=="user"){
		?>
		<li><button class="navbarbut" value="upload" name="seccio" type="submit">Subir Ficheros</button></li>
		<li><button class="navbarbut" value="unlogin" name="seccio" type="submit">Cerrar Sesión</button></li>
		<?php
		}
		?>	
	</ul>
</form>
