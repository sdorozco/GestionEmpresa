<?php
class Producto{
    private $codigo_producto;
    private $nombre;
    private $categoria;
    private $precio;

    public function __construct(){}

    public function getCodigo_producto(){
        return $this->codigo_producto;
    }
    public function setCodigo_producto($codigo_producto){
        $this->codigo_producto = $codigo_producto;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
}
?>