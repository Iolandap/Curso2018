<?php
//include("Config_BD.php");
//include("Queries.php");
include("QueriesCall.php");

echo "TEST GETNAVBAR: <br><br>";				//OK
	echo getnavbar("Pepito");
	echo"<hr><br><br><br>";      

echo "TEST GETUSER: <br><br>";				//OK			
	echo getuser("1234", "loli");
	echo"<hr><br><br><br>";



echo "TEST GETLIST UNA SOLA TABLE: <br><br>";		//OK
	echo getList("home", 0);
	echo"<hr><br><br><br>";

echo "TEST GETLIST COMPLETO (CONCONSULTA CON INNER JOINTS): <br><br>";  //OK
	echo getlistcompleto("proveedores", "1"); 
	//El primer parametro es el nombre de "case" en el "switch"
	echo"<hr><br><br><br>";



echo "TEST GETFILA DE UNA SOLA TABLA: <br><br>"; ///OK
	echo getFila("usuario", "Id_usuario", 11);
	echo"<hr><br><br><br>";

echo "TEST GETFILA COMPLETA (CON CONSULTA CON INNER JOINTS): <br><br>";		//ERROR
	echo getFilaCompleta("usuarios", 11);
	echo"<hr><br><br><br>";

echo "CONSULTAS FILAS DEVOLVER ARRAYS SEPERADAMENTE: <br><br>"; 		//OK
	echo consultaFilas("usuarios", 13);
	echo"<hr><br><br><br>";

echo "TEST DELETE: <br><br>"; 													//OK
	echo deleteRegistro("proveedor", "Id_proveedor", 7);
	echo"<hr><br><br><br>";

echo "TEST UPDATE: <br><br>";												//OK												
	$tabla = "proveedor";
	$form_data = array("Nombre"=>"empresa9","Direccion_p"=>"calle empresa9, vng","Telefono_p"=>"99999999","Email_p"=>"info@empresa9.com","NIF"=>"999999999","Poblacion_p"=>"vng","Provincia_p"=>"bcn","Codigopostal_p"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 
	$field_id = "Id_proveedor";
	$id = 2;
	echo updateRegistro($tabla, $form_data, $field_id, $id);
	echo"<hr><br><br><br>";


echo "TEST CREAR NUEVO REGISTRO: <br><br>";					//OK
	$tabla = "proveedor";
	$form_data = array("Nombre"=>"empresa9","Direccion_p"=>"calle empresa9, vng","Telefono_p"=>"99999999","Email_p"=>"info@empresa9.com","NIF"=>"999999999","Poblacion_p"=>"vng","Provincia_p"=>"bcn","Codigopostal_p"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 
	echo crearRegistro($tabla, $form_data);
	echo"<hr><br><br><br>";


echo "TEST CREAR NUEVO REGISTRO DOS TABLAS: <br><br>";   ///OK
	$tabla = "proveedor";
	$form_data1 = array("Nombre"=>"empresa9","Direccion_p"=>"calle empresa9, vng","Telefono_p"=>"99999999","Email_p"=>"info@empresa9.com","NIF"=>"999999999","Poblacion_p"=>"vng","Provincia_p"=>"bcn","Codigopostal_p"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 

	$form_data2 = array("Nombre"=>"Julia",
	"Cargo"=>"jefe","Telefono"=>"123456789","Email"=>"info@empresa10.com"); 

	echo crearRegistroDosTablas($tabla, $form_data1, $form_data2);
	echo"<hr><br><br><br>";



?>