<head>
    <link href="css/Galeria_tiendas.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<?php
   include("tienda.php");
?>

<div class="container">
  <h2>Nuestras Tiendas</h2>
  <?php
      // Conexion servidor y conexion base de datos
      include("Config_BD.php");

      // SQL a mostrar
      $sql =  "SELECT * 
            FROM tiendas";

      // Generamos objeto sql
      $consulta = mysqli_query($conexion, $sql)
            or die ("Fallo en la consulta".mysqli_error($conexion));
      // Hallamos la longitud del objeto obtenido
      $nfilas = mysqli_num_rows($consulta);

      // Verificamos que tenemos datos dentro de la busqueda
      if($nfilas>0){
  ?>
        <div class="row">
  <?php          
          // Visulizacion data
          while ($fila = mysqli_fetch_assoc($consulta)){
  ?>
            <div class="col-md-4">
              <div class="thumbnail">

                <a href="<?= "img/Tiendas/".$fila['Foto'] ?>" target="_blank">

                  <!-- Nombre del producto -->
                  <form method="post">
                    <div class="caption0">
                      <a  class   = "btn nav-link" 
                          href    = "#" 
                          onclick = "edicion  ('<?=   $fila['Id_tienda']?>',
                                        '<?=   $fila['Nombre']?>',
                                        '<?=   $fila['Ciudad']?>',
                                        '<?=   $fila['Direccion']?>',
                                        '<?=   $fila['Foto']?>'
                                    )" 
                          id      = "btnEdit">
                      <input  id  = "borrar" 
                              name= "borrar" 
                              type= "hidden"/>
                        <h4> <?= $fila['Nombre']    ?>  </h4>
                      </a>
                    </div>
                  </form>
                  <!-- Imagen del producto -->
                  <img 
                      src="<?= "img/Tiendas/".$fila['Foto'] ?>" 
                      alt="<?= $fila['Nombre']?>" 
                      width="200" height="160">

                  <!-- Descripcion del producto -->
                  <div class="caption2">
                    <p><?= $fila['Ciudad']?> </p>
                    <p><?= $fila['Direccion']?> </p>
                  </div>
                </a>
              </div>
            </div>

  <?php 
        } // FIN del WHILE
  ?>
        </div>  <!-- FIN  class="row" -->
  <?php
      }else{
  ?>
          No hemos encontrado tiendas
  <?php 
        } // FIN del if($nfilas)

      // Cierre base de datos.
      // La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
      mysqli_close($conexion);
  ?>
</div> <!-- FIN class="container" -->

<script>

  // Proceso borrado
    function edicion(id, nom, ciud, direcc, foto){

        // Definicion variable con posicion fila a borrar
        $("#id_tienda") .val(id);
        $("#Nombre")    .val(nom);
        $("#ciudad")    .val(ciud);
        $("#Direccion") .val(direcc);
        $("#Foto")      .val(foto);

        // Llamada a Modal Borrar
        $("#tienda").modal();
    }

</script>