<?php
//include("Config_BD.php");
include("Queries.php");

echo "TEST GETNAVBAR: <br><br>";
echo getnavbar("Pepito");
echo"<hr><br><br><br>";

echo "TEST GETUSER: <br><br>";
echo getuser("1234", "loli");
echo"<hr><br><br><br>";



echo "TEST GETLIST UNA SOLA TABLE: <br><br>";
echo getList("proveedor", 5);
echo"<hr><br><br><br>";

echo "TEST GETLIST COMPLETO (CONCONSULTA CON INNER JOINTS): <br><br>";
echo getlistcompleto("proveedores", "1"); 
//El primer parametro es el nombre de "case" en el "switch"
echo"<hr><br><br><br>";



echo "TEST GETFILA DE UNA SOLA TABLA: <br><br>";
echo getFila("usuario", "Id_usuario", 11);
echo"<hr><br><br><br>";

echo "TEST GETFILA COMPLETA (CON CONSULTA CON INNER JOINTS): <br><br>";
echo getFilaCompleta("proveedores", 11);
echo"<hr><br><br><br>";



echo "TEST DELETE: <br><br>";
echo deleteRegistro("proveedor", "Id_proveedor", 7);
echo"<hr><br><br><br>";

echo "TEST UPDATE: <br><br>";
$tabla = "proveedor";
$form_data = array("Nombre"=>"empresa9","Direccion"=>"calle empresa9, vng","Telefono"=>"99999999","Email"=>"info@empresa9.com","NIF"=>"999999999","Poblacion"=>"vng","Provincia"=>"bcn","Codigopostal"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 
$field_id = "Id_proveedor";
$id = 9;
echo updateRegistro($tabla, $form_data, $field_id, $id);
echo"<hr><br><br><br>";


echo "TEST CREAR NUEVO REGISTRO: <br><br>";
$tabla = "proveedor";
$form_data = array("Nombre"=>"empresa9","Direccion"=>"calle empresa9, vng","Telefono"=>"99999999","Email"=>"info@empresa10.com","NIF"=>"999999999","Poblacion"=>"vng","Provincia"=>"bcn","Codigopostal"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 
echo crearRegistro($tabla, $form_data);
echo"<hr><br><br><br>";


echo "TEST CREAR NUEVO REGISTRO DOS TABLAS: <br><br>";
$tabla = "proveedor";
$form_data1 = array("Nombre"=>"empresa9",
"Direccion"=>"calle empresa9, vng","Telefono"=>"99999999","Email"=>"info@empresa10.com","NIF"=>"999999999","Poblacion"=>"vng","Provincia"=>"bcn","Codigopostal"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 

$form_data2 = array("Nombre"=>"Julia",
"Cargo"=>"jefe","Telefono"=>"123456789","Email"=>"info@empresa10.com"); 

echo crearRegistroDosTablas($tabla, $form_data1, $form_data2);
echo"<hr><br><br><br>";




?>