<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'conexion/conexion.php';

$conexion = new conexion;
$consulta = "select * from tblfechas";
$resultado = $conexion->Conectar()->prepare($consulta);
$resultado->execute([]);

$mostrar = "";
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    $mostrar .= "{$fila['idProducto']} {$fila['fchIda']} {$fila['fchVuelta']} {$fila['dblPrecio']}<br>";
}

echo $mostrar;