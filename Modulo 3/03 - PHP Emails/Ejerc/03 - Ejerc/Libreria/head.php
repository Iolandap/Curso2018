<head>
    <link href="css/head.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

    <!-- Menu cabecera -->
	<nav class="navbar">
        <img src="img/logo.jpg" width="50" height="50" alt="">
		<a class="navbar-brand"><h3>&nbsp;Zona aventura</h3></a>
         <?php if ( isset($_SESSION["usuario"])){
        /* echo     "Buenos dias usuario ".$_SESSION["usuario"]
                    ." || nivel ".$_SESSION["rol"]
                    ." || Id-->".$_SESSION["Id_usser"] ;*/
        }?>
            <!-- Menu por defecto izquierda -->
            <!-- mr-auto : posiciona derecha-->

        <form class="form-inline" action="index.php" method="post">
            <ul class="nav">
                <!-- ****************************** -->
                <!--        Menu Generico           -->
                <!-- ****************************** -->
                <li class="nav-item"><a href="index.php">           Home</a></li>
                <li class="nav-item"><a href="index.php?selec=1">   Listar</a></li>
          
                <!-- ****************************** -->
                <!--       Menu Especial Usuario    -->
                <!-- ****************************** -->
                <?php
                    // Condicion usuario ADMIN
                    if (    isset($_SESSION["usuario"]) && 
                            (   $_SESSION["rol"]=="Administrador" || 
                                $_SESSION["rol"]=="Editor" || 
                                $_SESSION["rol"]=="Colaborador")
                        ) {
                        
                         // Funcion opciones menu por usuario admin
                        $menu = get_menu($_SESSION['rol']);
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
                    <!-- ************************************* -->
                    <!--       Menu Especial Usuario LOG OUT   -->
                    <!-- ************************************* -->
                        <!-- Log Out con llamada a Modal -->
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#log_out">
                            <span class="fas fa-sign-out-alt"></span>
                        </button>
                <?php 
                    } // FIN condicional Admin
                    
                // ****************************************
                //      Menu Generico. LOGIN
                // ****************************************
                    // Si hay sesion creada desaparece la opcion de Log In
                    if(!isset($_SESSION["usuario"])){
                ?>    
                    <div class="text-center">
                        <a 
                            href="" 
                            class="btn btn-default btn-rounded my-3" 
                            data-toggle="modal" 
                            data-target="#log_in">
                            <span class="fas fa-lock"></span>
                            LogIn / Alta
                        </a>
                        </button>
                    </div>
                <?php 
                    } // FIN condicional usuario basico
                ?> 
            </ul>
        </form>       
	</nav>