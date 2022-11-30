<?php
 class Proveedor{
     private $codigo_proveedor;
     private $nombre;
     private $responsable;
     private $telefono;
     private $email;
     private $direccion;

     function __construct(){}

     public function getCodigo_proveedor(){
         return $this->codigo_proveedor;
     }
     public function setCodigo_proveedor($codigo_proveedor){
         $this->codigo_proveedor = $codigo_proveedor;
     }
     public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getResponsable(){
        return $this->responsable;
    }
    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
 } 
?>