<head>
    <link href="css/head.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

    <!-- Menu cabecera -->
	<nav class="navbar">
        <img src="img/logo.jpg" width="50" height="50" alt="">
		<a class="navbar-brand"><h3>&nbsp;Zona aventura</h3></a>
            <!-- Menu por defecto izquierda -->
            <!-- mr-auto : posiciona derecha-->

        <form class="form-inline" action="index.php" method="post">
            <ul class="nav">
                <li class="nav-item"><a href="index.php">           Home</a></li>
                <li class="nav-item"><a href="index.php?selec=1">   Experiencias</a></li>
                <li class="nav-item"><a href="index.php?selec=2">   Montaña</a></li>
                <li class="nav-item"><a href="index.php?selec=3">   Agua</a></li>
                <li class="nav-item"><a href="index.php?selec=4">   Aire</a></li>              

            <!-- Menu cabecera izquierda segun usuario admin-->
                <?php
                    // Condicion usuario ADMIN
                    if (    isset($_SESSION["usuario"]) && 
                            ( $_SESSION["usuario"]=="admin" || $_SESSION["usuario"]=="standar")
                        ) {
                        
                         // Funcion opciones menu por usuario admin
                        $menu = get_menu($_SESSION['usuario']);
                            // Impresion opciones menu segun usuario
                            foreach( $menu as $link => $opcion){
                              // ya lo imprimes con tu formato para estilos, aquí es sólo una demostración
                              echo "<li class=\"nav-item\">
                                        <a href=\"index.php?selec=$link \">
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