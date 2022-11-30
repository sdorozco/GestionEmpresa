<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class Crudproducto{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo producto
		public function insertar($producto){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO producto values(:codigo_producto,:nombre,:categoria,:precio)');
			$insert->bindValue('codigo_producto',$producto->getCodigo_producto());
            $insert->bindValue('nombre',$producto->getNombre());
            $insert->bindValue('categoria',$producto->getCategoria());
            $insert->bindValue('precio',$producto->getPrecio());
			$insert->execute();
		}
		public function count(){
			$db=Db::conectar();
			$listar_producto=[];
			$select=$db->query('SELECT COUNT(*) codigo_producto FROM producto');
			$fila = $select->fetchColumn();
			return $fila+1;
		}
		// método para mostrar todos los producto
		public function mostrar(){
			$db=Db::conectar();
			$listar_producto=[];
			$select=$db->query('SELECT * FROM producto');
			foreach($select->fetchAll() as $producto){
				$myproducto= new Producto();
				$myproducto->setCodigo_producto($producto['codigo_producto']);
                $myproducto->setNombre($producto['nombre']);
                $myproducto->setCategoria($producto['categoria']);
                $myproducto->setPrecio($producto['precio']);
				$listar_producto[]=$myproducto;
			}
			return $listar_producto;
		}
		// método para eliminar un producto, recibe como parámetro el id del producto
		public function eliminar($codigo_producto){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM producto WHERE codigo_producto=:codigo_producto');
			$eliminar->bindValue('codigo_producto',$codigo_producto);
			$eliminar->execute();
		}
		// método para buscar un producto, recibe como parámetro el id del producto
		public function obtenerProducto($codigo_producto){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM producto WHERE codigo_producto=:codigo_producto');
			$select->bindValue('codigo_producto',$codigo_producto);
			$select->execute();
			$producto=$select->fetch();
			$myproducto= new producto();
			$myproducto->setCodigo_producto($producto['codigo_producto']);
            $myproducto->setNombre($producto['nombre']);
            $myproducto->setCategoria($producto['categoria']);
            $myproducto->setPrecio($producto['precio']);
			return $myproducto;
		}
		// método para actualizar un producto, recibe como parámetro el producto
		public function actualizar($producto){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE producto SET nombre=:nombre, categoria=:categoria,precio=:precio WHERE codigo_producto=:codigo_producto');
			$actualizar->bindValue('codigo_producto',$producto->getCodigo_producto());
            $actualizar->bindValue('nombre',$producto->getNombre());
            $actualizar->bindValue('categoria',$producto->getCategoria());
            $actualizar->bindValue('precio',$producto->getPrecio());
			$actualizar->execute();
		}
	}
?>