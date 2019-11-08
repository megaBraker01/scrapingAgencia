<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 'On');
require_once 'conexion/conexion.php';
require_once 'fileHandler.php';
/*
$conexion = new conexion;
$consulta = "select * from tblfechas";
$resultado = $conexion->Conectar()->prepare($consulta);
$resultado->execute([]);

$mostrar = "";
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    $mostrar .= "{$fila['idProducto']} {$fila['fchIda']} {$fila['fchVuelta']} {$fila['dblPrecio']}<br>";
}

echo $mostrar;
 
*/
//echo exec('whoami');

$nuevoContenido = '{"titulo":"Altitud del monte Everest","categoria":"Cultura","respuestas":{"respuesta1":8850,"respuesta2":8900,"respuesta3":8875}}';
$fileName = "fechas.json";
$fileHandler = new fileHandler($fileName);
//var_dump($fileHandler->getFile());

$fileHandler->write($nuevoContenido);
var_dump($fileHandler->getContent());
