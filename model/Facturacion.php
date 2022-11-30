<?php 
   class Facturacion{
       private $codigo_factura;
       private $cliente;
       private $email;
       private $direccion;
       private $fecha;
       private $modoPago;
       private $cantidad;
       private $total;
   
   public function __construct(){} 

   public function getCodigo_factura(){
       return $this->codigo_factura;
   }
   public function setCodigo_factura($codigo_factura){
       $this->codigo_factura = $codigo_factura;
   }
   public function getCliente(){
    return $this->cliente;
}
public function setCliente($cliente){
    $this->cliente = $cliente;
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
public function getFecha(){
    return $this->fecha;
}
public function setFecha($fecha){
    $this->fecha = $fecha;
}
public function getModopago(){
    return $this->modoPago;
}
public function setModopago($modoPago){
    $this->modoPago = $modoPago;
}
public function getCantidad(){
    return $this->cantidad;
}
public function setCantidad($cantidad){
    $this->cantidad = $cantidad;
}
public function getTotal(){
    return $this->total;
}
public function setTotal($total){
    $this->total = $total;
}
   }
?>