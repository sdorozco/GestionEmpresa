<?php
  class TipoRol{
      private $codigo_rol;
      private $nombre;
      private $descripcion;

      public function __construct(){}

      public function getCodigo_rol(){
          return $this->codigo_rol;
      }
      public function setCodigo_rol($codigo_rol){
          $this->codigo_rol = $codigo_rol;
      }
      public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
  }
?>