<?php
  class Personal{
      private $codigo_personal;
      private $nombre;
      private $apellido;
      private $telefono;
      private $email;
      private $direccion;
      private $rol;

      public function __construct(){}

      public function getCodigo_personal(){
          return $this->codigo_personal;
      }
      public function setCodigo_personal($codigo_personal){
          $this->codigo_personal = $codigo_personal;
      }
      public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
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
    public function getRol(){
        return $this->rol;
    }
    public function setRol($rol){
        $this->rol = $rol;
    }
  }
?>