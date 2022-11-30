<?php
  class ProductoList{
      private $codigo_productolist;
      private $codigo_factura;
      private $codigo_pedido;
      private $nombre;
      private $cantidad;
      private $precio;
      private $total;
      private $estado;

      public function __construct(){}

    public function getCodigo_productolist(){
        return $this->codigo_productolist;
    }
    public function setCodigo_productolist($codigo_productolist){
        $this->codigo_productolist = $codigo_productolist;
    }
      public function getCodigo_factura(){
          return $this->codigo_factura;
    }
      public function setCodigo_factura($codigo_factura){
          $this->codigo_factura = $codigo_factura;
    }
    public function getCodigo_pedido(){
        return $this->codigo_pedido;
    }
    public function setCodigo_pedido($codigo_pedido){
        $this->codigo_pedido = $codigo_pedido;
    }
      public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function getTotal(){
        return $this->total;
    }
    public function setTotal($total){
        $this->total = $total;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
  }
?>