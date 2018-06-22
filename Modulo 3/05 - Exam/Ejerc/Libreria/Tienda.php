<?php
    $Id_tienda=$_GET["tienda"];
?>

<div class="modal fade" id="tienda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            <?php
                // Conexion servidor y conexion base de datos
                include("../Config_BD.php");
                // SQLa mostrar
                $sql =  "SELECT * 
                            FROM tiendas
                            WHERE id_tienda= $Id_tienda";
        
                // Generamos objeto sql
                $consulta = mysqli_query($conexion, $sql)
                            or die ("Fallo en la consulta".mysqli_error($conexion));

                $fila = mysqli_fetch_assoc($consulta)               
            ?>
                <tr>
                    <td> <?= $fila['Id_tienda']    ?>  </td><br/>
                    <td> <?= $fila['Nombre']        ?>  </td><br/>
                    <td> <?= $fila['Ciudad']        ?>  </td><br/>
                    <td> <?= $fila['Direccion']     ?>  </td><br/>
                    <!-- Mostrar imagen -->
                    <td> 
                        <img src=" <?= "../img/Tiendas/".$fila['Foto']     ?>"
                             alt=" <?=  $fila['Foto']           ?>"
                             width="100" height="80">
                    </td>
                </tr>
            </div>
            <div class="modal-footer">
                <a href="javascript:history.back()">Regresar</a>
            </div>
        </div>
    </div>
</div> <!-- FIN Modal Confirmar Borrado -->