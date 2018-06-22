<?php
//include("Config_BD.php");
include("Queries.php");

echo "TEST GETNAVBAR: <br><br>";
echo getnavbar("Pepito");
echo"<hr><br><br><br>";

echo "TEST GETUSER: <br><br>";
echo getuser("1234", "fulanito");
echo"<hr><br><br><br>";

echo "TEST GETLIST: <br><br>";
echo getlist("List_pv", "1");
echo"<hr><br><br><br>";

echo "TEST DELETE: <br><br>";
echo delete_reg("proveedor", "Id_proveedor", 7);
echo"<hr><br><br><br>";

echo "TEST UPDATE: <br><br>";
$tabla = "proveedor";
$form_data = array("Nombre"=>"empresa9","Direccion"=>"calle empresa9, vng","Telefono"=>"99999999","Email"=>"info@empresa9.com","NIF"=>"999999999","Poblacion"=>"vng","Provincia"=>"bcn","Codigopostal"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 
$field_id = "Id_proveedor";
$id = 9;
echo update_reg($tabla, $form_data, $field_id, $id);
echo"<hr><br><br><br>";


echo "TEST CREAR NUEVO REGISTRO: <br><br>";
$tabla = "proveedor";
$form_data = array("Nombre"=>"empresa9","Direccion"=>"calle empresa9, vng","Telefono"=>"99999999","Email"=>"info@empresa10.com","NIF"=>"999999999","Poblacion"=>"vng","Provincia"=>"bcn","Codigopostal"=>"99999","Fax"=>"9399999999","Web"=>"www.empresa9.com"); 
echo crear_reg($tabla, $form_data);
echo"<hr><br><br><br>";




?>