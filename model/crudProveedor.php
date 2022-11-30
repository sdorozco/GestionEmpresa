<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class CrudProveedor{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo proveedor
		public function insertar($proveedor){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO proveedor values(:codigo_proveedor,:nombre,:responsable,:telefono,:email,:direccion)');
			$insert->bindValue('codigo_proveedor',$proveedor->getCodigo_proveedor());
            $insert->bindValue('nombre',$proveedor->getNombre());
            $insert->bindValue('responsable',$proveedor->getResponsable());
			$insert->bindValue('telefono',$proveedor->getTelefono());
			$insert->bindValue('email',$proveedor->getEmail());
			$insert->bindValue('direccion',$proveedor->getDireccion());
			$insert->execute();

		}
		public function mostrarSearch($search){
			$db=Db::conectar();
			$listar_proveedors=[];
			$select=$db->query("SELECT * FROM proveedor WHERE nombre LIKE '%$search%'");
			foreach($select->fetchAll() as $proveedor){
				$myproveedor= new proveedor();
				$myproveedor->setCodigo_proveedor($proveedor['codigo_proveedor']);
                $myproveedor->setNombre($proveedor['nombre']);
                $myproveedor->setResponsable($proveedor['responsable']);
				$myproveedor->setTelefono($proveedor['telefono']);
				$myproveedor->setEmail($proveedor['email']);
				$myproveedor->setDireccion($proveedor['direccion']);
				$listar_proveedors[]=$myproveedor;
			}
			return $listar_proveedors;
		}
		public function count(){
			$db=Db::conectar();
			$listar_proveedors=[];
			$select=$db->query('SELECT COUNT(*) codigo_proveedor FROM proveedor');
			$fila = $select->fetchColumn();
			return $fila;
		}
		// método para mostrar todos los proveedors
		public function mostrar(){
			$db=Db::conectar();
			$listaproveedors=[];
			$select=$db->query('SELECT * FROM proveedor');

			foreach($select->fetchAll() as $proveedor){
				$myproveedor= new Proveedor();
				$myproveedor->setCodigo_proveedor($proveedor['codigo_proveedor']);
                $myproveedor->setNombre($proveedor['nombre']);
                $myproveedor->setResponsable($proveedor['responsable']);
				$myproveedor->setTelefono($proveedor['telefono']);
				$myproveedor->setEmail($proveedor['email']);
				$myproveedor->setDireccion($proveedor['direccion']);
				$listaproveedors[]=$myproveedor;
			}
			return $listaproveedors;
		}
		// método para eliminar un proveedor, recibe como parámetro el id del proveedor
		public function eliminar($codigo_proveedor){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM proveedor WHERE codigo_proveedor=:codigo_proveedor');
			$eliminar->bindValue('codigo_proveedor',$codigo_proveedor);
			$eliminar->execute();
		}
		// método para buscar un proveedor, recibe como parámetro el id del proveedor
		public function obtenerProveedor($codigo_proveedor){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM proveedor WHERE codigo_proveedor=:codigo_proveedor');
			$select->bindValue('codigo_proveedor',$codigo_proveedor);
			$select->execute();
			$proveedor=$select->fetch();
			$myproveedor= new proveedor();
			$myproveedor->setCodigo_proveedor($proveedor['codigo_proveedor']);
            $myproveedor->setNombre($proveedor['nombre']);
            $myproveedor->setResponsable($proveedor['responsable']);
            $myproveedor->setTelefono($proveedor['telefono']);
            $myproveedor->setEmail($proveedor['email']);
            $myproveedor->setDireccion($proveedor['direccion']);
			return $myproveedor;
		}

		// método para actualizar un proveedor, recibe como parámetro el proveedor
		public function actualizar($proveedor){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE proveedor SET codigo_proveedor=:codigo_proveedor, nombre=:nombre, responsable=:responsable, telefono=:telefono,email=:email, direccion=:direccion WHERE codigo_proveedor=:codigo_proveedor');
			$actualizar->bindValue('codigo_proveedor',$proveedor->getCodigo_proveedor());
            $actualizar->bindValue('nombre',$proveedor->getNombre());
            $actualizar->bindValue('responsable',$proveedor->getResponsable());
			$actualizar->bindValue('telefono',$proveedor->getTelefono());
			$actualizar->bindValue('email',$proveedor->getEmail());
			$actualizar->bindValue('direccion',$proveedor->getDireccion());
			$actualizar->execute();
		}
	}
?>