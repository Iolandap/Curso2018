<?php
    include("Edicion.php");
?>

<table align="center" class="table" style="width:100%">
    <thead>
        <tr>
            <th scope="col">Id_noticia  </th>
            <th scope="col">Titulo      </th>
            <th scope="col">Cuerpo      </th>
            <th scope="col">Categoria   </th>
            <th scope="col">Foto        </th>
            <th scope="col">Usuario     </th>
        </tr>
    </thead>
    <tbody>

    <?php

            // Conexion servidor y conexion base de datos
            include("Config_BD.php");
            // SQLa mostrar
            $Id_usser = $_SESSION['Id_usser'];
            switch ($_SESSION['rol']) {
                case 'Colaborador':
                    $sql =  "SELECT * 
                                FROM noticias AS n
                                WHERE n.fk_id_usuario = '$Id_usser'
                            ";
                    break;
                case 'Editor':
                    $sql =  "SELECT * 
                            FROM noticias";
                    break;
                case 'Administrador':
                    $sql =  "SELECT * 
                            FROM noticias";
                    break;
            }

            echo $_SESSION['rol'];

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
                    <tr>
                        <td> <?= $fila['Id_noticia']    ?>  </td>
                        <td> <?= $fila['Titulo']        ?>  </td>
                        <td> <?= $fila['Cuerpo']        ?>  </td>
                        <td> <?= $fila['Categoria']     ?>  </td>
                        <!-- Mostrar imagen -->
                        <td> 
                            <img src=" <?= "img/".$fila['Foto']     ?>"
                                 alt=" <?=  $fila['Foto']           ?>"
                                 width="100" height="80">
                        </td>
                        <td> <?= $fila['fk_id_usuario']         ?>  </td>
                        <td>
                            <form method="post">
                                <a  class   = "btn nav-link" 
                                    href    = "#" 
                                    onclick = "edicion  ('<?=   $fila['Id_noticia']     ?>',
                                                        '<?=    $fila['Titulo']         ?>',
                                                        '<?=    $fila['Cuerpo']         ?>',
                                                        '<?=    $fila['Categoria']      ?>',
                                                        '<?=    $fila['Foto']           ?>',
                                                        '<?=    $fila['fk_id_usuario']  ?>'
                                                        )" 
                                    id      = "btnEdit">
                                    <input  id  = "editar<?=   $fila['Id_noticia']     ?>"  
                                            name= "editar<?=   $fila['Id_noticia']     ?>" 
                                            type= "hidden" 
                                            value="<?= $fila['Id_noticia'] ?>" />
                                    <i class="fa fa-edit"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
    <?php 
                } // FIN del WHILE
            }else{
     ?>
            Noticia no encontrada
     <?php 
            } // FIN del if($nfilas)

            // Cierre base de datos.
            // La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
            mysqli_close($conexion);
    ?>

    </tbody>
</table>

<script>

    // Proceso edicion
    function edicion(id, tit, cuerp, cat, img, id_usser){

        // Carga variales desde el onclick()
        $("#id_noticia-edit")   .val(id);
        $("#titulo-edit")       .val(tit);
        $("#cuerpo-edit")       .val(cuerp);
        $("#categoria-edit")    .val(cat);
        $("#id_usuario-edit")   .val(id_usser);
        // Carga imagen y ruta
        $("#dummyimage")        .attr("src","img/"+img);

        // Llamada a Modal Editar
        $("#edicion").modal();
    }

</script>