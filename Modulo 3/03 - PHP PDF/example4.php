<?php

$html = "   
         <h1 style='color:red'>Información sobre el producto</h1>
            <form method=\"post\" action=http://daw.iesjoaquimmir.cat/sarti.php enctype=\"multipart/form-data\">
                <!-- Primer bloque -->
                    <fieldset> 
                        <legend style='color:red'><b>Datos básicos</b></legend> 
                        <!-- nombre -->
                            <label for=\"lnombre\">Nombre</label><br /> 
                            <input id=\"lnombre\" type=\"text\" name=\"nombre\" />
                            <br /><br />
                        <!-- textarea -->
                            <label for='ltextarea'>Descripcion</label><br /> 
                            <textarea name=\"textarea\" rows=\"3\" cols=\"40\"></textarea> <br /> <br />
                        <!-- foto -->
                            <label for=\"lfoto\">Foto</label>
                            <br /> <br />  
                        <!-- checkbox -->
                            <input type=\"checkbox\" name=\"Novedades\" value=\"novedades\"/>Añadir contador de visitas<br />
                    </fieldset><br /> 
                <!-- Segundo bloque -->
                    <fieldset> 
                        <legend style='color:red'><b>Datos económicos</b></legend> 
                        <!-- precio -->
                            <label for=\"lprecio\">Precio</label>
                            <input id=\"lprecio\" type=\"number\" name=\"precio\" />Eur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <!-- impuestos -->
                            <label>Impuestos</label>
                            <select name=\"impuestos\" size=\"1\"> 
                                <optgroup> 
                                    <option>0%</option> 
                                    <option>3%</option> 
                                    <option>6%</option> 
                                    <option>12%</option> 
                                    <option>21%</option>          
                                </optgroup> 
                            </select> 
                            <br /> <br /> 
                        <!-- promocion -->
                            <label for=\"lpromocion\">Promoción</label><br /> 
                            <input type=\"radio\" name=\"promocion\" value=\"\" checked=\"checked\"/>Ninguno<br />
                            <input type=\"radio\" name=\"promocion\" value=\"tr_free\" />Transporte gratuito<br />
                            <input type=\"radio\" name=\"promocion\" value=\"descuento\" />Descuento 5%<br />
                    </fieldset> <br /> 
            </form>
    ";
$filename = "newpdffile";

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser. 
// ABRE LA PANTALLA CON EL PDF, HACE UN PREVIEW
$dompdf->stream($filename,array("Attachment"=>0));

