switch
<?php
$inicial = array("uno"=>"a", "dos"=>"b", "tres"=>"c", "cuatro"=>"d", "cinco"=>"e");
print_r($inicial);
echo "array inicial<br><br>";

// 1er numero posicion, 2nd cantidad

$salida1 = array_slice($inicial, 2,1);      // devuelve "c", "d", y "e"
print_r($salida1);
echo "devuelve c, d, y e<br><br>";

$salida2 = array_slice($inicial, -2, 1);  // devuelve "d"
print_r($salida2);
echo "devuelve d<br><br>";

$salida3 = array_slice($inicial, 0, 3);   // devuelve "a", "b", y "c"
print_r($salida3);
echo "devuelve a, b, y c<br><br>";

// observe las diferencias en las claves de los arrays
print_r(array_slice($inicial, 2, -1));
echo "<br>";

print_r(array_slice($inicial, 2, -1, true));
echo "<br>";
echo "<br>";
echo "<br>";

$final =array();
$final['proveedor']	= $salida1;
$final['contacto']	= $salida2;
$final['ventas']	= $salida3;

print_r($final);
?>