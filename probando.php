<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 'On');
require_once 'conexion/conexion.php';
require_once 'fileHandler/fileHandler.php';
use fileHandler\fileHandler; // nombreCarpeta/nombreClase
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
$fileName = "notas.txt";
$fileHandler = new fileHandler($fileName); // funciona con o sin nombre de archivo
// $fileHandler->newFile($fileName); // funciona
//$file = $fileHandler->getFile();
//echo nl2br(($fileHandler->read($fileName))); // funciona
//$fileHandler->write("empezamos con otra cosa"); // funciona
//$fileHandler->close();
//$fileHandler->rename('luego no.txt'); // funciona
//$fileHandler->exists() // funciona

echo nl2br($fileHandler->read()); // funciona
        
 
//$fileHandler->copy();

//echo nl2br(($fileHandler->read($fileName)));
//$fileHandler->write($nuevoContenido);
//echo ($fileHandler->read());
//$fileHandler->close();
//$fileHandler->delete("copy 4 algo.txt");
//echo (implode(" ", $fileHandler->getFileInfo()));
