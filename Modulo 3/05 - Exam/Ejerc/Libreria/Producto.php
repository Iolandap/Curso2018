<head>
    <link href="../css/producto.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<?php
    $Id_producto=$_GET["produc"];

    // ********************************************************
    //      Generacion SQL Impresion detalle articulo
    // ********************************************************

    // Conexion servidor y conexion base de datos
    include("../Config_BD.php");
    // SQLa mostrar
    $sql1 =  "SELECT p.Id_producto, p.Nombre_producto, p.Precio, p.Foto, p.Descripcion
            FROM productos AS p
            WHERE p.Id_producto= $Id_producto";

    // Generamos objeto sql
    $consulta1 = mysqli_query($conexion, $sql1)
                or die ("Fallo en la consulta".mysqli_error($conexion));
    // Hallamos la longitud del objeto obtenido
    $nfilas = mysqli_num_rows($consulta1);
?>

    <!-- *********************************  -->
    <!--    1ra parte. Impresion articulo   -->
    <!-- *********************************  -->
    <h1> Articulo seleccionado </h1>
    <table align="center" class="table" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Id_producto </th>
                <th scope="col">Producto    </th>
                <th scope="col">Precio      </th>
                <th scope="col">Foto        </th>
                <th scope="col">Descripcion </th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Verificamos que tenemos datos dentro de la busqueda
            if($nfilas>0){
                // Visulizacion data
                while ($fila = mysqli_fetch_assoc($consulta1)){
?>
                    <!-- HTML para mostrar la tabla -->
                    <tr>
                        <td align="center"> <?= $fila['Id_producto']       ?>  </td>
                        <td align="center"> <?= $fila['Nombre_producto']   ?>  </td>
                        <td align="center"> <?= $fila['Precio']            ?>  </td>
                        <!-- Mostrar imagen -->
                        <td align="center"> 
                            <img src=" <?= "../img/Productos/".$fila['Foto']     ?>"
                                 alt=" <?=  $fila['Foto']           ?>"
                                 width="100" height="80">
                        </td>
                        <td align="center"> <?= $fila['Descripcion']       ?>  </td>
                    </tr>
<?php 
                } // FIN del WHILE
            }else{
?>
                Productos no encontrados
<?php 
            } // FIN del if($nfilas)
            // Cierre base de datos.
            mysqli_close($conexion);
?>
        </tbody>
    </table>

<?php
    // ********************************************************
    //      Generacion SQL Impresion tiendas con stock
    // ********************************************************

    // Conexion servidor y conexion base de datos
    include("../Config_BD.php");
    // SQLa mostrar
    $sql2 =  "SELECT t.Nombre, e.Cantidad
            FROM productos AS p
            RIGHT OUTER JOIN existencias AS e
                ON p.Id_producto = e.Fk_Id_producto
            RIGHT OUTER JOIN tiendas AS t
                ON e.Fk_Id_Tienda = t.Id_tienda
            WHERE p.Id_producto= $Id_producto";

    // Generamos objeto sql
    $consulta2 = mysqli_query($conexion, $sql2)
                or die ("Fallo en la consulta".mysqli_error($conexion));
    // Hallamos la longitud del objeto obtenido
    $nfilas = mysqli_num_rows($consulta2);
?>

    <!-- *********************************  -->
    <!--    2da parte. Impresion articulo   -->
    <!-- *********************************  -->
    <h1> Tiendas con Stock </h1>
    <table align="center" class="table" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Tienda      </th>
                <th scope="col">Stock       </th>
            </tr>
        </thead>
        <tbody>
<?php
            // Variable suma stock
            $stock = 0;
            // Verificamos que tenemos datos dentro de la busqueda
            if($nfilas>0){
                // Visulizacion data
                while ($fila = mysqli_fetch_assoc($consulta2)){
                    $stock = $fila['Cantidad'] + $stock;
?>
                    <!-- HTML para mostrar la tabla -->
                    <tr>
                        <td align="center"> <?= $fila['Nombre']   ?>  </td>
                        <td align="center"> <?= $fila['Cantidad'] ?>  </td>
                    </tr>
<?php 
                } // FIN del WHILE
            }else{
 ?>
            Productos no encontrados
 <?php 
            } // FIN del if($nfilas)
            // Cierre base de datos.
            mysqli_close($conexion);
?>
        </tbody>
    </table>

<?php 
    echo " Stock disponible -->$stock unidades";
?>

    <!-- Botonera compra -->
    <div class="btn-ground text-xs-center" style="padding-bottom: 30px">
        <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Comprar</button>
    </div>