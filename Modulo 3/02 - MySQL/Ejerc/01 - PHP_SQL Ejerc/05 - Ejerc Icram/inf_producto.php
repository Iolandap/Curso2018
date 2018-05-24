<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<?php 
  include("conexion.php");
  include("header-nav.php");
?>

<div class="container">    
  
  <?php
    // Recogemos el IdAvion que hemos recibido con al entrar en la pagina via URL con el simbolo ? que es ID el que hemos seleccionado en fichero productos.PHP
    $id_producto = $_GET["id"];

    $sql="SELECT * FROM avion where IdAvion=$id_producto";

    $res = mysqli_query($conecion,$sql);

    $nfilas = mysqli_num_rows($res);

    if($nfilas>0){
        $fila = mysqli_fetch_assoc($res);
        // Cargamos la matricula del avion en un campo para usarlo en el Modal
        $mat  = $fila["Matricula"];
        // Mostramos la informacion de la fila
        echo $fila["Matricula"]."<br>"; 
        echo $fila["Fabricante"]."<br>";
        echo $fila["Modelo"]."<br>";
        echo $fila["Capacidad"]."<br>";
        echo $fila["AutonomiaVuelo"]."<br>";
    }else{
  ?>
        Producto no encontrado
  <?php 
    }
  ?>

<!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" id="myBtn" onclick="showModal('<?= $mat?>')">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form>
          <div class="form-group">
            <label for="matricula">MAtricula</label>
            <input type="text" class="form-control" id="matricula"/>
          </div>
          <div class="form-group">
            <label for="fabricante">Fabricante</label>
            <input type="text" class="form-control" id="fabricante"/>
          </div>
          <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo"/>
          </div>
          <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="text" class="form-control" id="capacidad"/>
          </div>
          <div class="form-group">
            <label for="autonomia_vuelo">Autonomia de Vuelo</label>
            <input type="text" class="form-control" id="autonomia_vuelo"/>
          </div>
        </form>
        </div>
         <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- al hacer onclick() vamos a la funcion que esta en el jeader-nav.php. esta funcion es para verificar que los datos entrados son validos -->
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">UPDATE</button>
            </div>
      </div>
      
    </div>
  </div>
</div><br><br>

  <?php 
    mysqli_close($conecion);
    include("footer.php");
  ?>

  <script>
    $(document).ready(function(){
      $("#productos").addClass("active");
    });

    // Si pulsamos el boton "open Modal" pasamos la variable y abrimos el modal
    function showModal(matricula){
      $("#matricula").val(matricula);
      $("#myModal").modal();
    }
  </script>
</body>
</html>