<!DOCTYPE html>
<!--
Copyright 2019 makina.

Software protegido por la propiedad intelectual.
Queda prohibido copiar, modificar, fusionar, publicar, distribuir, sublicenciar y / o vender
copias no autorizadas del software

El aviso de copyright anterior y este aviso de permiso se incluir�n en todas las copias o 
porciones sustanciales del software.
-->
<html>
    <head>
        <meta charset="iso-8859-1">
        <title>Scraping</title>
    </head>
    <body>
        <h1>Haciendo Scraping</h1>
<?php
require_once 'simple-html-dom-master/simple_html_dom.php';

$destino = file_get_html("https://www.dominicanatours.com/asp/detalle.asp?destino=12736&r=TI&noches=7&hotel=32&origen=6396&campania=99&habitacion=2&top=&Cal_Mes=11&Cal_Anio=2019&#acal");

// nombre del hotel
$title = $destino->find('title',0);
$titleContent = $title->innertext;
$nombreHotel = substr($titleContent, 0, strpos($titleContent, ","));
echo "<h2>hotel: $nombreHotel</h2>";

// itinerario
$itinerario = $destino->find('div[id=panel3]', 0)->children();
foreach ($itinerario as $element) {
    echo "<pre>$element->innertext<pre>\n";
}


// precios en el calendario de salidas
for($i = 9; $i <= 12; $i++){
  // Create DOM from URL or file
    $html = file_get_html("https://www.dominicanatours.com/asp/detalle.asp?destino=12736&r=TI&noches=7&hotel=32&origen=6396&campania=99&habitacion=2&top=&Cal_Mes=$i&Cal_Anio=2019&#acal");

    
    
    // encontrando de forma especifica
    echo "<h3>del mes $i las fechas son:</h3>";
    foreach($html->find('td[class=FechaConOferta]') as $element){
        $precio = $element->find('span[class=PrecioFecha]', 0);
        $dia = $element->find('span[class=diaCalendario]', 0);
        echo "El precio: $precio, para el dia: $dia <hr>";
    }
    echo "<h3>del mes $i la fecha seleccionada</h3>";
    foreach($html->find('td[class=FechaSeleccionada]') as $element){
        $precio = $element->find('span[class=PrecioFechaSeleccionada]', 0);
        $dia = $element->find('span[class=diaCalendario]', 0);
        echo "El precio: $precio, para el dia: $dia <hr>";
    }
}
?>
    </body>
</html>