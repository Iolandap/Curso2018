<head>
    <link href="css/galeria.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<?php
  // Modales
  include("borrado.php");
  include("Edicion.php");
?>

<div class="container">
  <h2>Galeria de Imagenes</h2>
  <?php
      // SQL a mostrar
      $sql =  "SELECT * 
            FROM productos";

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

                <a href="<?= "img/".$fila['Img_Producto'] ?>" target="_blank">

                  <!-- Nombre del producto -->
                  <div class="caption0">
                    <h4> <?= $fila['Nombre']    ?>  </h4>
                  </div>

                  <!-- Imagen del producto -->
                  <img 
                      src="<?= "img/".$fila['Img_Producto'] ?>" 
                      alt="<?= $fila['Nombre']?>" 
                      width="200" height="160">

                  <!-- Descripcion del producto -->
                  <div class="caption2">
                  <p><?= $fila['Descripcion']?> </p>
                  </div>

                  <form method="post">
                    <div class="caption1">

                      <!-- Precio del producto -->
                      <p>PVP: <?= $fila['Precio']    ?> Eur </p>

                      <!-- Boton Editar -->
                      <a  class   = "btn nav-link" 
                          href  = "#" 
                          onclick = "edicion  ('<?=   $fila['Id_producto']?>',
                                  '<?=  $fila['Nombre']   ?>',
                                  '<?=  $fila['Descripcion']?>',
                                  '<?=  $fila['Precio']   ?>',
                                  '<?=  $fila['Img_Producto']?>',
                                  '<?=  $fila['Fecha']    ?>' 
                                  )" 
                          id    = "btnEdit">
                        <input  id  = "editar"  
                            name= "editar" 
                            type= "hidden" 
                            value="<?= $fila['Id_producto'] ?>" />
                        <i class="fa fa-edit"></i>
                      </a>

                        <!-- boton Borrar -->
                      <a  class   = "btn nav-link" 
                          href  = "#" 
                          onclick = "borrar   ('<?=   $fila['Id_producto'] ?>')" 
                          id    = "btnBorrar">
                        <input  id  = "borrar" 
                            name= "borrar" 
                            type= "hidden"
                            value="<?= $fila['Id_producto'] ?>" />
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </form>
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
          Producto no encontrado
  <?php 
        } // FIN del if($nfilas)

      // Cierre base de datos.
      // La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
      mysqli_close($conexion);
  ?>
</div> <!-- FIN class="container" -->

<script>

  // Proceso borrado
    function borrar(id){
      // Definicion variable con posicion fila a borrar
        $("#id_producto").val(id);
        // Llamada a Modal Borrar
        $("#borrado").modal();
    }

    // Proceso edicion
    function edicion(id, nom, desc, pr, img, fecha){

      // Carga variales desde el onclick()
        $("#id_producto-edit")  .val(id);
        $("#nombre-edit")       .val(nom);
        $("#descripcion-edit")  .val(desc);
        $("#precio-edit")       .val(pr);
        $("#Img_Producto-edit") .val(img);
        $("#fecha-edit")        .val(fecha);
        // Carga imagen y ruta
        $("#dummyimage")        .attr("src","img/"+img);

        // Llamada a Modal Editar
        $("#edicion").modal();
    }

</script>