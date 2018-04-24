<head>
    <link href="css/head.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

    <!-- Menu cabecera -->
	<nav class="navbar navbar-dark bg-dark">
        <img src="img/logo.png" width="50" height="50" alt="">
		<a class="navbar-brand"><h3>&nbsp;Relatos literiarios</h3></a>
            <!-- Menu por defecto izquierda -->
            <!-- mr-auto : posiciona derecha-->

        <form class="form-inline" action="index.php" method="post">
            <ul class="nav">
                <li class="nav-item"><a href="index.php">           Home</a></li>
                <li class="nav-item"><a href="index.php?selec=1">   Libros</a></li>
                <li class="nav-item"><a href="index.php?selec=2">   Peliculas</a></li>
                <li class="nav-item"><a href="index.php?selec=3">   Series</a></li>

            <!-- Menu cabecera izquierda segun usuario admin-->
                <?php
                    // Condicion usuario ADMIN
                    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]=="admin") {
                         echo$_SESSION["usuario"];

                         // Funcion opciones menu por usuario admin
                        $menu = get_menu($_SESSION['usuario']);
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
                        <!-- Menu cabecera Log Out-->
                        <!-- Log Out con llamada a Modal -->
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#log_out">
                            <span class="fas fa-sign-out-alt"></span>
                        </button>
                <?php 
                    } // FIN condicional Admin
                    
                    if(!isset($_SESSION["usuario"])){
                ?>    
                    <!-- Usuario basico -->
                    <!-- Menu cabecera Log In-->
                        <!-- Inicio sesion con llamada a Modal -->
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#log_in">
                            <span class="fas fa-lock"></span><!-- Icono de fontawesome  -->
                            Iniciar Sesion</span>
                        </a>
                <?php 
                    } // FIN condicional usuario basico
                ?> 
            </ul>
        </form>       
	</nav>