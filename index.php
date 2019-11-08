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
//ini_set('display_errors', 'On');

require_once 'simple-html-dom-master/simple_html_dom.php';

$destino = file_get_html("https://www.dominicanatours.com/asp/detalle.asp?destino=12736&r=TI&noches=7&hotel=32&origen=6396&campania=99&habitacion=2&top=&Cal_Mes=11&Cal_Anio=2019&#acal");

// nombre del hotel
$title = $destino->find('title',0);
$titleContent = $title->innertext;
$nombreHotel = substr($titleContent, 0, strpos($titleContent, ","));
echo "<h2>hotel: $nombreHotel</h2>";

$precioPagina = $destino->find('span[class=ficha-oferta-precio]', 0);
echo "<h2>El precio para la fecha actual es $precioPagina </h2>";

// itinerario
$itinerario = $destino->find('div[id=panel3]', 0)->children();
foreach ($itinerario as $element) {
    echo "<p>$element->innertext</p>\n";
}

// Datos del vuelo
$datosVuelo = $destino->find('div[id=vuelo-ida]', 0)->children();
$i = 1;
foreach ($datosVuelo as $element) {
    echo $i++;
    echo "<p>$element->plaintext</p>\n";
}

// otra forma de obtener los datos del vuelo
$datosVuelo = $destino->find('table', 1)->children();
$i = 1;
//var_dump($datosVuelo);
/*
foreach ($datosVuelo as $element) {
    $i++;
    $texto = (string) trim($element->plaintext);
    echo substr($texto, 0, 10)."<br>";
    //echo $texto ."<br>";
    //var_dump($texto);
}
*/



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
        echo "El precio: $precio, para el dia: $dia <br>";
        echo "hola<br>";
    }
    
    //var_dump($tasa);
    if($tasaOrigen = $html->find('input[name=STasas]', 0)){
        echo "tasasOrigen = ". $tasaOrigen->attr['value'];
    }
    
    if($tasaDestino = $html->find('input[name=SBusiness]', 0)){
        echo "<br>tasasDestino = ". $tasaDestino->attr['value'];
    }
    
}
?>
    </body>
</html>