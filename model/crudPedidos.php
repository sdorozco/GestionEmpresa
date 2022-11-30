<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class CrudPedidos{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo pedidos
		public function insertar($pedidos){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO pedidos values(:codigo_pedido,:proveedor,:email,:fecha,:modopago,:cantidad,:total)');
			$insert->bindValue('codigo_pedido',$pedidos->getCodigo_pedido());
			$insert->bindValue('proveedor',$pedidos->getProveedor());
            $insert->bindValue('email',$pedidos->getEmail());
            $insert->bindValue('fecha',$pedidos->getFecha());
			$insert->bindValue('modopago',$pedidos->getModopago());
			$insert->bindValue('cantidad',$pedidos->getCantidad());
			$insert->bindValue('total',$pedidos->getTotal());
			$insert->execute();
		}
		public function mostrarSearch($search){
			$db=Db::conectar();
			$listar_pedidoss=[];
			$select=$db->query("SELECT * FROM pedidos WHERE nombre LIKE '%$search%'");
			foreach($select->fetchAll() as $pedidos){
				$mypedidos= new Pedidos();
				$mypedidos->setCodigo_pedido($pedidos['codigo_pedido']);
				$mypedidos->setProveedor($pedidos['proveedor']);
                $mypedidos->setEmail($pedidos['email']);
                $mypedidos->setFecha($pedidos['fecha']);
				$mypedidos->setModopago($pedidos['modopago']);
				$mypedidos->setCantidad($pedidos['cantidad']);
				$mypedidos->setTotal($pedidos['total']);
				$listar_pedidoss[]=$mypedidos;
			}
			return $listar_pedidoss;
		}
		public function count(){
			$db=Db::conectar();
			$select=$db->query('SELECT COUNT(*) codigo_pedido FROM pedidos');
			$fila = $select->fetchColumn();
			return $fila+1;
		}
		// método para mostrar todos los pedidoss
		public function mostrar(){
			$db=Db::conectar();
			$listapedidoss=[];
			$select=$db->query('SELECT * FROM pedidos');

			foreach($select->fetchAll() as $pedidos){
				$mypedidos= new Pedidos();
				$mypedidos->setCodigo_pedido($pedidos['codigo_pedido']);
				$mypedidos->setProveedor($pedidos['proveedor']);
                $mypedidos->setEmail($pedidos['email']);
                $mypedidos->setFecha($pedidos['fecha']);
				$mypedidos->setModopago($pedidos['modopago']);
				$mypedidos->setCantidad($pedidos['cantidad']);
				$mypedidos->setTotal($pedidos['total']);
				$listapedidoss[]=$mypedidos;
			}
			return $listapedidoss;
		}
		// método para eliminar un pedidos, recibe como parámetro el id del pedidos
		public function eliminar($codigo_pedido){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM pedidos WHERE codigo_pedido=:codigo_pedido');
			$eliminar->bindValue('codigo_pedido',$codigo_pedido);
			$eliminar->execute();
		}
		// método para buscar un pedidos, recibe como parámetro el id del pedidos
		public function obtenerPedidos($codigo_pedido){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM pedidos WHERE codigo_pedido=:codigo_pedido');
			$select->bindValue('codigo_pedido',$codigo_pedido);
			$select->execute();
			$pedidos=$select->fetch();
			$mypedidos= new Pedidos();
			$mypedidos->setCodigo_pedido($pedidos['codigo_pedido']);
			$mypedidos->setProveedor($pedidos['proveedor']);
            $mypedidos->setEmail($pedidos['email']);
            $mypedidos->setFecha($pedidos['fecha']);
			$mypedidos->setFecha($pedidos['fecha']);
			$mypedidos->setModopago($pedidos['modopago']);
			$mypedidos->setCantidad($pedidos['total']);
			$mypedidos->setTotal($pedidos['total']);
			return $mypedidos;
		}

		// método para actualizar un pedidos, recibe como parámetro el pedidos
		public function actualizar($pedidos){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE pedidos SET proveedor=:proveedor,email=:email,fecha=:fecha,modopago=:modopago,cantidad=:cantidad,total=:total WHERE codigo_pedido=:codigo_pedido');
			$actualizar->bindValue('codigo_pedido',$pedidos->getCodigo_pedido());
			$actualizar->bindValue('proveedor',$pedidos->getProveedor());
            $actualizar->bindValue('email',$pedidos->getEmail());
            $actualizar->bindValue('fecha',$pedidos->getFecha());
			$actualizar->bindValue('modopago',$pedidos->getModopago());
			$actualizar->bindValue('cantidad',$pedidos->getCantidad());
			$actualizar->bindValue('total',$pedidos->getTotal());
			$actualizar->execute();
		}
	}
?>