<?php
// al chile no se que hace esto.
  class Conexion{

    $HOST = "192.168.100.232";
    $DB="CURSOCUC";
    $USER="unicuc";
    $PWD="1234";

    function __construct(){}
    function crearConexion(){
      $mysqli = new mysqli($this->HOST,$this->USER,$this->PWD,$this->DB);
      if($mysqli->connect_errno){
          return null;
      }
      return $mysqli;
    }
  }

  