<table align="center" class="table" style="width:100%">
    <thead>
        <tr>
            <th scope="col">Producto    </th>
            <th scope="col">Precio      </th>
        </tr>
    </thead>
    <tbody>

    <?php

            // Conexion servidor y conexion base de datos
            include("Config_BD.php");
            // SQLa mostrar
            $sql =  "SELECT Id_producto, Nombre_producto, Precio
                        FROM productos";
    
            // Generamos objeto sql
            $consulta = mysqli_query($conexion, $sql)
                        or die ("Fallo en la consulta".mysqli_error($conexion));
            // Hallamos la longitud del objeto obtenido
            $nfilas = mysqli_num_rows($consulta);

            // Verificamos que tenemos datos dentro de la busqueda
            if($nfilas>0){
                // Visulizacion data
                while ($fila = mysqli_fetch_assoc($consulta)){
    ?>
                    <!-- HTML para mostrar la tabla -->
                    <form method="post">
                        <tr> 
                            <td  onclick="window.location.href='libreria/producto.php?produc=<?= $fila["Id_producto"]?>'">
                                <?= $fila['Nombre_producto'];?>
                            </td>
                            <td onclick="window.location.href='libreria/producto.php?produc=<?= $fila["Id_producto"]?>'">
                                <?= $fila['Precio'];?>
                            </td>
                        </tr>
                    </form>
    <?php 
                } // FIN del WHILE
            }else{
     ?>
            Productos no encontrados
     <?php 
            } // FIN del if($nfilas)

            // Cierre base de datos.
            // La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
            mysqli_close($conexion);
    ?>

    </tbody>
</table>