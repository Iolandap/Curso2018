<?php 
// FIN del if(isset())
  // Conexion servidor y conexion base de datos
      include("Config_BD.php");
  // Definiciones iniciales
  $Titulo   = "";
  $Cuerpo   = "";
  $Categoria= "";
  $Foto     = "";
  // FIN del if(isset())
  // ----------------------------------------
  //    Condicion pulsacion boton GUARDAR
  // ----------------------------------------
  if(isset($_POST["Guardar"])){
    // Carga valores introducidos en PHP
    $Titulo         = $_POST["titulo"];
    $Cuerpo         = $_POST["cuerpo"];
    $categoria      = $_POST["categoria"];
    $fk_id_usuario  = $_SESSION["Id_usser"];
    // Carga fichero IMG y Grabacion en SQL
    if (is_uploaded_file($_FILES['foto']['tmp_name'])){
      // Si se ha subido un fichero....
      // Definiciones generales
      $nombreDirectorio = "img/";
      $idUnico          = time();
      $nombreFichero    = $idUnico. "-" . $_FILES['foto']['name'];
      $nombreCompleto   = $nombreDirectorio. $nombreFichero;
      //  Grabacion fichero IMG en el ordenador
      move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        $nombreCompleto);
      // --------------------------------------
      //    Grabacion de los datos en SQL
      // --------------------------------------
        // SQL insertar campos
        $sql =  "INSERT INTO `noticias`
                (`Id_noticia`, 
                `Titulo`, 
                `Cuerpo`, 
                `Categoria`, 
                `Foto`, 
                `fk_id_usuario`) 
              VALUES 
                (NULL,
                '$Titulo',
                '$Cuerpo',
                '$categoria',
                '$nombreFichero',
                '$fk_id_usuario')
            ";
        // Generamos objeto sql
        mysqli_query($conexion, $sql)
              or die ("Fallo en la consulta".mysqli_error($conexion));
        // Cierre base de datos.
        mysqli_close($conexion);
      // -----------------------------
      //    FIN grabacion datos
      // -----------------------------
    }else{
      // Muestra codigo de error si se produce alguno

      print("No se ha podido subir el fichero\n");
      echo "ERROR Numero --> ".$_FILES['foto']['error'];

    }  // FIN del if(is_uploaded_file())
  } // FIN del if(isset())


  // ----------------------------------------
  //    Condicion pulsacion boton salida
  // ----------------------------------------
  if(isset($_POST["out"])){
    header('Location: Index.php');
  } 
?>

<!-- Formulario alta articulos -->
<form method="post"
      enctype = "multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="exampleFormControlInput1" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Categoria</label>
    <input type="text" class="form-control" name="categoria" id="exampleFormControlInput1" >
  </div>

  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Cuerpo</label>
    <textarea class="form-control" name="cuerpo" id="exampleFormControlTextarea1" rows="3" maxlength="200"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Foto</label>
    <input type="hidden" name="max_file_size" value='1024000'>
    <input type="file" class="form-control-file" name="foto" size="44" id="exampleFormControlFile1">
  </div>

  <!-- BOTONERA -->
  <div class="text-center form-sm mt-2">
      <button type="submit" 
              class="btn btn-info" 
              name="Guardar">
              Guardar
        <i class="fa fa-sign-in ml-1"></i>
      </button>
      <button type="submit" 
              class="btn btn-info"
              name="out"
              data-dismiss="modal">
              Close
      </button>
  </div>

</form>