<?php 
    // Inicializacion sesion usuarios
    session_start();
    // incluimos un fichero php con funciones generales
    require("libreria/funciones.php");  
?>

<!DOCTYPE html>
<html>
    <?php
        // Configuracion inicial links externos
        include ("Config_Links.php");
    ?>
<body>

    <?php
        // Configuracion inicial usuarios
        include ("Config_Users.php");

        // **********************
        //      PAGINA
        // **********************
        // Head
        include($libreria."head.php");
        // Container
        include($libreria."container.php");
        // Footer
        include($libreria."footer.php");

        // **********************
        //      MODALES
        // **********************
        // Modal polica de Log In
        include($libreria."log_in.php");
        // Modal polica de Log Out
        include($libreria."log_out.php");
        // Modal polica de Cookies
        include($libreria."pol.php");
    ?>

</body>
</html>
