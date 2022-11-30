<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class CrudEmpresa{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo empresa
		public function insertar($empresa){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO empresa values(:codigo_empresa,:nombre,:telefono,:email,:direccion)');
			$insert->bindValue('codigo_empresa',$empresa->getCodigo_empresa());
			$insert->bindValue('nombre',$empresa->getNombre());
			$insert->bindValue('telefono',$empresa->getTelefono());
			$insert->bindValue('email',$empresa->getEmail());
			$insert->bindValue('direccion',$empresa->getDireccion());
			$insert->execute();

		}
		public function mostrarSearch($search){
			$db=Db::conectar();
			$listar_empresas=[];
			$select=$db->query("SELECT * FROM empresa WHERE nombre LIKE '%$search%'");
			foreach($select->fetchAll() as $empresa){
				$myempresa= new Empresa();
				$myempresa->setCodigo_empresa($empresa['codigo_empresa']);
				$myempresa->setNombre($empresa['nombre']);
				$myempresa->setTelefono($empresa['telefono']);
				$myempresa->setEmail($empresa['email']);
				$myempresa->setDireccion($empresa['direccion']);
				$listar_empresas[]=$myempresa;
			}
			return $listar_empresas;
		}
		public function count(){
			$db=Db::conectar();
			$listar_empresas=[];
			$select=$db->query('SELECT COUNT(*) codigo_empresa FROM empresa');
			$fila = $select->fetchColumn();
			return $fila;
		}
		// método para mostrar todos los empresas
		public function mostrar(){
			$db=Db::conectar();
			$listaempresas=[];
			$select=$db->query('SELECT * FROM empresa');

			foreach($select->fetchAll() as $empresa){
				$myempresa= new Empresa();
				$myempresa->setCodigo_empresa($empresa['codigo_empresa']);
				$myempresa->setNombre($empresa['nombre']);
				$myempresa->setTelefono($empresa['telefono']);
				$myempresa->setEmail($empresa['email']);
				$myempresa->setDireccion($empresa['direccion']);
				$listaempresas[]=$myempresa;
			}
			return $listaempresas;
		}
		// método para eliminar un empresa, recibe como parámetro el id del empresa
		public function eliminar($codigo_empresa){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM empresa WHERE codigo_empresa=:codigo_empresa');
			$eliminar->bindValue('codigo_empresa',$codigo_empresa);
			$eliminar->execute();
		}
		// método para buscar un empresa, recibe como parámetro el id del empresa
		public function obtenerEmpresa($codigo_empresa){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM empresa WHERE codigo_empresa=:codigo_empresa');
			$select->bindValue('codigo_empresa',$codigo_empresa);
			$select->execute();
			$empresa=$select->fetch();
			$myempresa= new Empresa();
			$myempresa->setCodigo_empresa($empresa['codigo_empresa']);
            $myempresa->setNombre($empresa['nombre']);
            $myempresa->setTelefono($empresa['telefono']);
            $myempresa->setEmail($empresa['email']);
            $myempresa->setDireccion($empresa['direccion']);
			return $myempresa;
		}

		// método para actualizar un empresa, recibe como parámetro el empresa
		public function actualizar($empresa){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE empresa SET nombre=:nombre, telefono=:telefono,email=:email, direccion=:direccion WHERE codigo_empresa=:codigo_empresa');
			$actualizar->bindValue('codigo_empresa',$empresa->getCodigo_empresa());
			$actualizar->bindValue('nombre',$empresa->getNombre());
			$actualizar->bindValue('telefono',$empresa->getTelefono());
			$actualizar->bindValue('email',$empresa->getEmail());
			$actualizar->bindValue('direccion',$empresa->getDireccion());
			$actualizar->execute();
		}
	}
?>