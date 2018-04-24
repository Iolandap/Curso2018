<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <!-- Fichero externo CSS -->
    <link rel="stylesheet" href="css/index.css" title="style">
     <!-- Iconos Fontqwesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<?php 
		// incluimos un fichero php con funciones
		require("libreria/funciones.php");  
		// Inicializacion sesion
		session_start();
	?>

</head>
<body>

    <!-- Menu cabecera -->
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand"><h3>Menu usuarios</h3></a>

        <!-- Menu cabecera izquierda -->
            <?php 
                //Condicion pulsacion log_in
                if(isset($_POST["log_in"])){
                    // Definiciones iniciales
                    $str_0  = $_POST["pasword"];

                    // Llamada a funcion control password
                    $user_level = ctr_pasword($str_0);

                    // Control nivel passwords
                    if($user_level == '0'){
                        // Devuelve 0. Password incorrecto
                        echo    str_repeat('<br>', 2)
                                ."<h1 style='color:white; background-color: red; display:inline;'>
                                    INCORRECTO, no cuadra con el codigo almacenado
                                </h1>";
                    }else{
                        // Devuelve un usuario valido
                        // Definicion variable sesion
                        $_SESSION["usuario"] = $user_level;

                        // Funcion opciones menu por usuario
                        $menu = get_menu($_SESSION['usuario']);
            ?>
                        <ul class="nav mr-auto">
            <?php 
                            // Impresion opciones menu segun usuario
                            foreach( $menu as $link => $opcion){
                              // ya lo imprimes con tu formato para estilos, aquí es sólo una demostración
                              echo "<li class=\"nav-item\">
                                        <a href=\"$link.php\">$opcion </a>
                                    </li>";
                            }
                ?>
                        </ul>

            <?php 
                    } //FIN control paswords
                }else{
            ?>
                     <!-- Menu por defecto -->
                     <!-- mr-auto : posiciona derecha-->
                     <ul class="nav mr-auto">
                      <li class="nav-item"><a href="#home">Home</a></li>
                      <li class="nav-item"><a href="#news">News</a></li>
                      <li class="nav-item"><a href="#contact">Contact</a></li>
                      <li class="nav-item"><a href="#about">About</a></li>
                    </ul>
            <?php 
                } // FIN control boton log_in
            ?>

        <!-- Menu cabecera derecha -->
        <form class="form-inline" method="post">
        	<!-- Inicio sesion con llamada a Modal -->
            <a class="nav-link" href="#" data-toggle="modal" data-target="#log_in">
                <span class="fas fa-lock"></span><!-- Icono de fontawesome  -->
            	Iniciar Sesion</span>
        	</a>
        	<!-- Log Out con llamada a Modal -->
        	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#log_out">
        		<span class="fas fa-sign-out-alt"></span>
			</button>
       	</form>
	</nav>

    <!-- Pie -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <p>&#169;2018 Yo mismo</p> 
                </div>
            </div>
            <p>Este sitio web puede utilizar algunas <em>'cookies'</em> para mejorar su experiencia de navegación. Por favor, antes de continuar con su navegación por nuestro sitio web, le recomendamos que lea la 
            	<!-- Politica cookies con llamada a Modal -->
                <a href="#" style="color:orange" data-toggle="modal" data-target="#politica_cookies">
                    política de cookies
                </a>
            </p>
        </div>
	</footer>


   <?php
	
		// Condicion pulsacion log_out
		if(isset($_POST["log_out"])){
			echo "Salido de la sesion";
			unset( $_SESSION['usuario']);
		} // FIN del if(isset())
	?>

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
	                        <input type="text" class="form-control" id="username">
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
	        	<button type="submit" class="btn btn-primary" name="log_out">Confirmar</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div> <!-- FIN Modal Log Out -->

	<!-- MODAL Politica cookies -->
    <!-- Modal -->
      <div class="modal fade" id="politica_cookies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div>
                <h2>1.1 Aviso legal (LSSI)</h2>
            </div>
                <p>De conformidad con el artículo 10 de la Ley 34/2002, de 11 de julio, de “Servicios de la Sociedad de la Información y Comercio Electrónico (LSSI)”, ponemos en su conocimiento la siguiente información:</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, commodi. Fuga ab vero itaque iste, dolore pariatur nam esse rerum autem maiores commodi tempora vel modi voluptatum. Ad, ut exercitationem.</p>
                <div>
                    <p>
                        <strong>
                            CONCEPTO DE USUARIO&nbsp;<br>
                        </strong>
                    </p>
                    <p>La utilización del portal Web atribuye la condición de Usuario, e implica la aceptación total y sin reservas de todas y cada una de las disposiciones incluidas en este Aviso Legal, en la versión publicada para PCBOX en el mismo momento en que el Usuario acceda a la Web. En consecuencia, el Usuario tiene que leer atentamente el presente Aviso Legal en cada una de las ocasiones en que se proponga utilizar la Web, puesto que puede sufrir modificaciones.</p>
                    <p><strong>INFORMACIÓN SOBRE LOS VÍNCULOS “LINKS”&nbsp;</strong></p>
                    <p>PCBOX no se hace responsable de las webs no propias o de terceros, a las cuales se puede acceder mediante vínculos “links” o de cualquier contenido puesto a disposición por terceros.</p>
                    <p>Cualquier uso de un vínculo o acceso a una Web no propia es realizado por voluntad y riesgo exclusivo del usuario y PCBOX no recomienda ni garantiza ninguna información obtenida a través de un vínculo ajeno a la Web de pcbox.com ni se responsabiliza de ninguna pérdida, reclamación o perjuicio derivada del uso o mal uso de un vínculo, o de la información obtenida a través de él, incluyendo otros vínculos o webs, de la interrupción en el servicio o en el acceso, o del uso o mal uso de un vínculo, tanto al conectar al portal Web pcbox.com cómo al acceder a la información de otros webs desde el mismo portal Web.</p>
                    <p><strong>RENÚNCIA Y LIMITACIÓN DE LA RESPONSABILIDAD</strong></p>
                    <p>La información y servicios incluidos o disponibles a través de las páginas Web pueden incluir incorrecciones o errores tipográficos. De forma periódica se incorporan cambios a la información contenida. PCBOX puede introducir en cualquier momento mejoras y/o cambios en los servicios o contenidos.</p>
                    <p>También se advierte que los contenidos de esta Web, tienen la finalidad informativa en cuanto a la oferta de servicios y tarifas. Según lo previsto en el presente aviso legal y el resto de textos legales del presente portal Web. </p>
                    <p><strong>INFORMACIÓN SOBRE LA EXENCIÓN DE TODA RESPONSABILIDAD DERIVADA DE UN FALLO TÉCNICO Y DE CONTENIDO</strong></p>
                    <p>PCBOX declina cualquier responsabilidad en caso de que existan interrupciones o un mal funcionamiento de los servicios o contenidos ofrecidos en Internet, cualquier que sea su causa. Así mismo, PCBOX no se hace responsable por caídas de la red, pérdidas de negocio a consecuencia de estas caídas, suspensiones temporales del fluido eléctrico o cualquiera otro tipo.</p>
                    <p>PCBOX no declara ni garantiza que los servicios o contenidos no sean interrumpidos o que estén libres de errores, que los defectos sean corregidos, o que el servicio o el servidor que lo pone a disposición estén libres de virus u otros componentes nocivos, sin perjuicio que PCBOX realiza sus mejores esfuerzos a evitar este tipo de incidentes. En caso de que el Usuario tomara determinadas decisiones o realizara acciones en base a la información incluida en cualquier de los “websites”, se recomienda la comprobación de la información recibida con otras fuentes.</p>
                    <p><strong>INFORMACIÓN RELATIVA A LA PROPIEDAD INTELECTUAL Y INDUSTRIAL</strong></p>
                    <p>1. La estructura, diseño y forma de presentación de los elementos (gráficos, imágenes, ficheros logotipos, combinaciones de colores y cualquier elemento susceptible de protección) están protegidos por derechos de propiedad intelectual, titularidad de PCBOX.</p>
                    <p>2. Están prohibidas la reproducción, la transformación, distribución, comunicación pública, puesta a disposición del público y, en general cualquier otra forma de explotación, parcial o total de los elementos referidos en el apartado anterior. Estos actos de explotación sólo podrán ser realizados en virtud de autorización expresa de PCBOX y que, en todo caso, tendrán que hacer referencia explícita a la titularidad de los citados derechos de propiedad intelectual de PCBOX.</p>
                    <p>3. Sólo está autorizado para el uso privado del material documental elaborado para la PCBOX. En ningún caso, podrá suprimir, alterar, eludir o manipular cualesquier dispositivo de protección o sistemas de seguridad que puedan estar instalados.</p>
                    <p>4. Excepto autorización expresa de PCBOX No se permite el enlace a “páginas finales”, el “frame” y cualquier otra manipulación similar. Los enlaces tienen que ser siempre en la página principal o “home page” pcbox.com.</p>
                    <p>5. Los signos distintivos (marcas, nombres comerciales) de PCBOX. Están protegidos por derechos de propiedad industrial, quedando prohibida la utilización o manipulación de cualquier de estos, excepto autorización expresa y por escrito de PCBOX.</p>
                    <p><strong>COMPRA ON-LINE SEGURA</strong></p>
                    <p>La seguridad es una prioridad para PCBOX por lo que realizamos el máximo esfuerzo para asegurarnos de que nuestro proceso de transacciones sea seguro y de que su información personal esté a buen resguardo:</p>
                    <p>No Comparta su Información Personal.</p>
                    <p>Identifique los Correos Electrónicos Falsos (intentos de 'spoofing' o 'phishing').</p>
                    <p>Comunique los Intentos de 'phishing'.</p>
                    <p>Siempre efectúe sus pagos mediante los medios de pago de PCBOX.</p>
                    <p><strong>NO COMPARTA SU INFORMACIÓN PERSONAL</strong></p>
                    <p>PCBOX nunca le enviará un correo electrónico ni le llamará por teléfono para pedirle que revele o verifique la contraseña de su cuenta en PCBOX ni sus números de cuenta bancaria o tarjeta de crédito, ni ningún otro tipo de información personal. En caso de que alguien se ponga en contacto con usted o de recibir un correo electrónico no solicitado que le pida alguno de los datos anteriores, no responda y comuníquelo inmediatamente a PCBOX para que procedan a la investigación del incidente.</p>
                    <p><strong>IDENTIFIQUE LOS CORREOS ELECTRÓNICOS FALSOS (intentos de 'spoofing' o 'phishing')</strong></p>
                    <p>Ignore todo correo electrónico que reciba en el que se le solicite información personal o que le redirija a otra página web que no sea propiedad de PCBOX o de sociedades de su grupo, o en el que se le pida que pague fuera de los medios de pago descritos en las condiciones generales, ya que podría ser un intento de suplantación de personalidad ('spoofing' o 'phishing'), y deberá considerarlo fraudulento.</p>
                    <p>PCBOX utiliza el dominio "pcbox.com" para sus correos electrónicos. Si usted recibe un correo electrónico con un formato distinto, como por ejemplo: pcbox.security@hotmail.com, puede estar seguro de que es un correo falso.</p>
                    <p>Algunos correos electrónicos que practican phishing contienen enlaces a sitios web que utilizan la palabra "pcbox.com" en su URL, pero que le dirigirán a un sitio web completamente distinto. Si desplaza el ratón por encima del enlace, podrá ver la URL asociada, que probablemente tendrá un formato diferente a las enlazadas en los sitios web auténticos de PCBOX.</p>
                    <p>Si aun así usted hace clic en un correo electrónico que practica phishing y es redirigido a una página que se asemeje a "Su Cuenta" o a cualquiera que le pida verificar o modificar su información personal, ignórela y considérela como fraudulenta.</p>
                    <p><strong>COMUNIQUE LOS INTENTOS DE 'phishing'&nbsp;</strong></p>
                    <p>Envíe un correo electrónico a la dirección lopd@pcbox.es y adjunte el correo electrónico que considera falso. Al adjuntarnos dicho correo electrónico fraudulento, nos está ayudando a localizar su origen.</p>
                    <p>Si no puede adjuntar el correo electrónico falso, reenvíelo a lopd@pcbox.es e incluya la mayor cantidad de información posible sobre el mismo.</p>
                    <p><strong>SIEMPRE EFECTÚE SUS PAGOS MEDIANTE LOS MEDIOS DE PAGO DE PCBOX.'</strong></p>
                    <p>Los pagos realizados a través de los medios de pago de PCBOX son seguros, están garantizados, y son los únicos métodos de pago autorizados y reconocidos en PCBOX.</p>
                    <p><strong>INFORMACIÓN AL COMPRADOR SOBRE LA PLATAFORMA DE RESOLUCIÓN DE CONFLICTOS E-commerce.</strong></p>
                    <p>Se informa al comprador de productos de este sitio web, de la existencia de una plataforma de resolución de litigios online. Conforme al Artículo 14.1 del Reglamento (UE) 524/2013:</p>
                    <p id="politicaprivacidad">“La Comisión Europea facilita una plataforma de resolución de litigios en línea que se encuentra disponible en el siguiente enlace: http://ec.europa.eu/consumers/odr/. Los consumidores podrán someter sus reclamaciones a través de la plataforma de resolución de litigios en línea”.</p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div> <!-- FIN Modal Politica Cookies -->

</body>
</html>
