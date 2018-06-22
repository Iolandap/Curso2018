<?php
// *******************************************************************
//                               Fichero Queries
//  ******************************************************************


// ***************************************************
//                       Listados
// ***************************************************
    //  $Listado   : Nombre listado solicitado
    //  $Inicio    : fila inicial a listar
    //  Num_items  : Por defecto se daran 10 lineas
    //  Return de JSON(succes, data)
    function getlist($seccio, $inici) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");
        initCfg();
        connectBD();

    	// Opcion acceso por switch *********************************
    	switch ($seccio) {
    		case 'List_pv':
    			    $sql =  "SELECT * 
        				FROM proveedor
                        LIMIT $inici, 10";
    			break;
    		
    	    case 'List_cl':
    			    $sql =  "SELECT * 
        				FROM cliente
                        LIMIT $inici, 10";
    			break;
    	}

        // Generamos objeto sql
        $consulta = mysqli_query($conexion, $sql)
            or die ("Fallo en la consulta".mysqli_error($conexion));

        if ($consulta){
            $error = "Registros leídos correctamente";                      
            $datos = array();
            while($fila = mysqli_fetch_assoc($consulta)){                 
                $datos [] = $fila;
            }                    
        }else{
            $error = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
        echo json_encode([ // codifica datos para enviar de vuelta con json
                "consulta"  => $datos,
                "error"     => $error,
                "resultado" => "Conexión con la base de datos correcta"
            ]);

        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion

// ***************************************************
//             Menus opciones por usuario (NAVBAR)
// ***************************************************
    //  Return de JSON(menu)
    function getnavbar($User) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");
        initCfg();
        connectBD();

        $sql =  "SELECT Id_usuario, User, seccion FROM navbar 
                    INNER JOIN roles
                    ON Id_navbar = Fid_navbar
                    INNER JOIN usuarios
                    on Id_usuario = Fid_usuario
                    WHERE User = $User;";

        // Generamos objeto sql
        $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

        // Hallamos la longitud del objeto obtenido
        if ($consulta){
            $error = "Registros leídos correctamente";                      
            $datos = array();
            while($fila = mysqli_fetch_assoc($consulta)){                 
                $datos [] = $fila;
            }                    
        }else{
            $error = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
        echo json_encode([ // codifica datos para enviar de vuelta con json
                "consulta"  => $datos,
                "error"     => $error,
                "resultado" => "Conexión con la base de datos correcta"
            ]);
            
        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion

// ***************************************************
//                  Control usuario
// ***************************************************
    //  Return de JSON(succes, data)
    function getuser($pass, $user) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");
        initCfg();
        connectBD();

        // Decodificacion pasword entrada a formato almacenado en BD
        $pass0 = md5(sha1($pass,true)."1");

        // SQL a mostrar
        $sql =  "SELECT *
                    FROM usuarios
                    WHERE   Nombre_usuario  = '$user'    AND
                            Contrasenya     = '$pass0'   AND
                            Activado        = '1'
                ";

        // Generamos objeto sql
        $consulta = mysqli_query($conexion, $sql)
                    or die ("Fallo en la consulta".mysqli_error($conexion));

        // ********************************
        //  Condicion carga sesion usuario
        // ********************************
        if ($consulta){
            $error = "Registros leídos correctamente";                      
            $datos = array();
            while($fila = mysqli_fetch_assoc($consulta)){                 
                $datos [] = $fila;
            }                    
        }else{
            $error = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
        echo json_encode([ // codifica datos para enviar de vuelta con json
                "consulta"  => $datos,
                "error"     => $error,
                "resultado" => "Conexión con la base de datos correcta"
            ]);

        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion
?>