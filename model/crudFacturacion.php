<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class CrudFacturacion{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo facturacion
		public function insertar($facturacion){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO facturacion values(:codigo_factura,:cliente,:email,:direccion,:fecha,:modopago,:cantidad,:total)');
			$insert->bindValue('codigo_factura',$facturacion->getCodigo_factura());
			$insert->bindValue('cliente',$facturacion->getCliente());
			$insert->bindValue('email',$facturacion->getEmail());
			$insert->bindValue('direccion',$facturacion->getDireccion());
			$insert->bindValue('fecha',$facturacion->getFecha());
			$insert->bindValue('modopago',$facturacion->getModopago());
			$insert->bindValue('cantidad',$facturacion->getCantidad());
			$insert->bindValue('total',$facturacion->getTotal());
			$insert->execute();
		}
		public function mostrarSearch($search){
			$db=Db::conectar();
			$listar_facturacions=[];
			$select=$db->query("SELECT * FROM facturacion WHERE nombre LIKE '%$search%'");
			foreach($select->fetchAll() as $facturacion){
				$myfacturacion= new Facturacion();
				$myfacturacion->setCodigo_factura($facturacion['codigo_factura']);
				$myfacturacion->setCliente($facturacion['cliente']);
				$myfacturacion->setEmail($facturacion['email']);
				$myfacturacion->setDirecciom($facturacion['direccion']);
				$myfacturacion->setFecha($facturacion['fecha']);
				$myfacturacion->setModopago($facturacion['modopago']);
				$myfacturacion->setCantidad($facturacion['cantidad']);
				$myfacturacion->setTotal($facturacion['total']);
				$listar_facturacions[]=$myfacturacion;
			}
			return $listar_facturacions;
		}
		public function count(){
			$db=Db::conectar();
			$select=$db->query('SELECT COUNT(*) codigo_factura FROM facturacion');
			$fila = $select->fetchColumn();
			return $fila+1;
		}
		// método para mostrar todos los facturacions
		public function mostrar(){
			$db=Db::conectar();
			$listafacturacions=[];
			$select=$db->query('SELECT * FROM facturacion');

			foreach($select->fetchAll() as $facturacion){
				$myfacturacion= new Facturacion();
				$myfacturacion->setCodigo_factura($facturacion['codigo_factura']);
				$myfacturacion->setCliente($facturacion['cliente']);
				$myfacturacion->setEmail($facturacion['email']);
				$myfacturacion->setDireccion($facturacion['direccion']);
				$myfacturacion->setFecha($facturacion['fecha']);
				$myfacturacion->setModopago($facturacion['modopago']);
				$myfacturacion->setCantidad($facturacion['cantidad']);
				$myfacturacion->setTotal($facturacion['total']);
				$listafacturacions[]=$myfacturacion;
			}
			return $listafacturacions;
		}
		// método para eliminar un facturacion, recibe como parámetro el id del facturacion
		public function eliminar($codigo_factura){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM facturacion WHERE codigo_factura=:codigo_factura');
			$eliminar->bindValue('codigo_factura',$codigo_factura);
			$eliminar->execute();
		}
		// método para buscar un facturacion, recibe como parámetro el id del facturacion
		public function obtenerfacturacion($codigo_factura){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM facturacion WHERE codigo_factura=:codigo_factura');
			$select->bindValue('codigo_factura',$codigo_factura);
			$select->execute();
			$facturacion=$select->fetch();
			$myfacturacion= new Facturacion();
			$myfacturacion->setCodigo_factura($facturacion['codigo_factura']);
			$myfacturacion->setCliente($facturacion['cliente']);
			$myfacturacion->setEmail($facturacion['email']);
			$myfacturacion->setDireccion($facturacion['direccion']);
			$myfacturacion->setFecha($facturacion['fecha']);
			$myfacturacion->setModopago($facturacion['modopago']);
			$myfacturacion->setCantidad($facturacion['total']);
			$myfacturacion->setTotal($facturacion['total']);
			return $myfacturacion;
		}

		// método para actualizar un facturacion, recibe como parámetro el facturacion
		public function actualizar($facturacion){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE facturacion SET cliente=:cliente, email=:email,direccion=:direccion, fecha=:fecha,modopago=:modopago,cantidad=:cantidad,total=:total WHERE codigo_factura=:codigo_factura');
			$actualizar->bindValue('codigo_factura',$facturacion->getCodigo_factura());
			$actualizar->bindValue('cliente',$facturacion->getCliente());
			$actualizar->bindValue('email',$facturacion->getEmail());
			$actualizar->bindValue('direccion',$facturacion->getDireccion());
			$actualizar->bindValue('fecha',$facturacion->getFecha());
			$actualizar->bindValue('modopago',$facturacion->getModopago());
			$actualizar->bindValue('cantidad',$facturacion->getCantidad());
			$actualizar->bindValue('total',$facturacion->getTotal());
			$actualizar->execute();
		}
	}
?>