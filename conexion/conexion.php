<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author makina
 */

require_once 'conexionSetting.php';

class conexion {
    protected $conexion;
    
    public function __construct(){
            try{
                    $this->conexion = new PDO('mysql:host=' .HOSTNAME. '; dbname=' .DATABASE, USER, PASSWORD); // realizamos la conexion
                    $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // preparamos las excepciones
                    $this->conexion->exec('SET CHARACTER SET utf8');  // especificamos la codificacion de la conexion
                    return $this->conexion;
            } catch(Exception $e){ // validamos si hay algun error al conecar con la bbdd
                    die('Fallo en la conexion: ' .$e->GetMessage()); // avisamos del error
                    exit(); // salimos 
            } 
    }

    public function Conectar(){
            return $this->conexion;
    }
}
