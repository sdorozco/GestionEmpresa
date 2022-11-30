<?php
  class TipoPago{
      private $codigo_pago;
      private $nombre;
      private $descripcion;

      public function __construct(){}

      public function getCodigo_pago(){
          return $this->codigo_pago;
      }
      public function setCodigo_pago($codigo_pago){
          $this->codigo_pago = $codigo_pago;
      }
      public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getDescripcion(){
        return $this->codigo_pago;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
  }
?>