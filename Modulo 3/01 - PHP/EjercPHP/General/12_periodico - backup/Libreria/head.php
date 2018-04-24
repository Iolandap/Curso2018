<head>
    <link href="css/head.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

    <!-- Menu cabecera -->
	<nav class="navbar navbar-dark bg-dark">
        <img src="img/logo.png" width="50" height="50" alt="">
		<a class="navbar-brand"><h3>&nbsp;Relatos literiarios</h3></a>

        <!-- Menu cabecera izquierda -->
            <?php 
                //Condicion pulsacion log_in
                if(isset($_POST["log_in"])){
                    // Definiciones iniciales
                    $username = $_POST["username"];
                    $pasword  = $_POST["pasword"];

                    // Llamada a funcion control password
                    $user_level = ctr_pasword($username, $pasword);

                    // Control nivel passwords
                    if($user_level == '0'){
                        // Devuelve 0. Password incorrecto
                        echo    str_repeat('<br>', 2)
                                ."<h4 style='color:white; background-color: red; display:inline;'>
                                    INCORRECTO, no cuadra con el codigo almacenado
                                </h4>";
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
                                        <a href=\" $link.php \">
                                            $opcion
                                        </a>                                        
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
                      <li class="nav-item"><a href="#home">     Libros</a></li>
                      <li class="nav-item"><a href="#news">     Peliculas</a></li>
                      <li class="nav-item"><a href="#contact">  Series</a></li>
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