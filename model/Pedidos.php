<?php 
 class Pedidos{

    private $codigo_pedido;
    private $proveedor;
    private $email;
    private $fecha;
    private $modopago;
    private $cantidadd;
    private $total;

    public function __construct(){}

    public function getCodigo_pedido(){
        return $this->codigo_pedido;
    }
    public function setCodigo_pedido($codigo_pedido){
        $this->codigo_pedido = $codigo_pedido;
    }
    public function getProveedor(){
        return $this->proveedor;
    }
    public function setProveedor($proveedor){
        $this->proveedor = $proveedor;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getModopago(){
        return $this->modopago;
    }
    public function setModopago($modopago){
        $this->modopago = $modopago;
    }
    public function getCantidad(){
        return $this->cantidadd;
    }
    public function setCantidad($cantidadd){
        $this->cantidadd = $cantidadd;
    }
    public function getTotal(){
        return $this->total;
    }
    public function setTotal($total){
        $this->total = $total;
    }
 }
?>