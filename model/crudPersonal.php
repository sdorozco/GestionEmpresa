<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class CrudPersonal{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo personal
		public function insertar($personal){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO personal values(:codigo_personal,:nombre,:apellido,:telefono,:email,:direccion,:rol)');
			$insert->bindValue('codigo_personal',$personal->getCodigo_personal());
            $insert->bindValue('nombre',$personal->getNombre());
            $insert->bindValue('apellido',$personal->getApellido());
            $insert->bindValue('telefono',$personal->getTelefono());
            $insert->bindValue('email',$personal->getEmail());
            $insert->bindValue('direccion',$personal->getDireccion());
            $insert->bindValue('rol',$personal->getRol());
			$insert->execute();
		}
		public function count(){
			$db=Db::conectar();
			$listar_personal=[];
			$select=$db->query('SELECT COUNT(*) codigo_personal FROM personal');
			$fila = $select->fetchColumn();

			return $fila+1;
		}
		public function mostrarSearch($search){
			$db=Db::conectar();
			$listar_personal=[];
			$select=$db->query("SELECT * FROM personal WHERE nombre LIKE '%$search%' OR apellido LIKE '%$search%' OR codigo_personal LIKE '%$search%'");
			foreach($select->fetchAll() as $personal){
				$mypersonal= new personal();
				$mypersonal->setCodigo_personal($personal['codigo_personal']);
                $mypersonal->setNombre($personal['nombre']);
                $mypersonal->setApellido($personal['apellido']);
                $mypersonal->setTelefono($personal['telefono']);
                $mypersonal->setEmail($personal['email']);
                $mypersonal->setDireccion($personal['direccion']);
                $mypersonal->setRol($personal['rol']);
				$listar_personal[]=$mypersonal;
			}
			return $listar_personal;
		}
		// método para mostrar todos los personal
		public function mostrar(){
			$db=Db::conectar();
			$listar_personal=[];
			$select=$db->query('SELECT * FROM personal');
			foreach($select->fetchAll() as $personal){
				$mypersonal= new personal();
				$mypersonal->setCodigo_personal($personal['codigo_personal']);
                $mypersonal->setNombre($personal['nombre']);
                $mypersonal->setApellido($personal['apellido']);
                $mypersonal->setTelefono($personal['telefono']);
                $mypersonal->setEmail($personal['email']);
                $mypersonal->setDireccion($personal['direccion']);
                $mypersonal->setRol($personal['rol']);
				$listar_personal[]=$mypersonal;
			}
			return $listar_personal;
		}

		// método para eliminar un personal, recibe como parámetro el id del personal
		public function eliminar($codigo_personal){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM personal WHERE codigo_personal=:codigo_personal');
			$eliminar->bindValue('codigo_personal',$codigo_personal);
			$eliminar->execute();
		}

		// método para buscar un personal, recibe como parámetro el id del personal
		public function obtenerPersonal($codigo_personal){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM personal WHERE codigo_personal=:codigo_personal');
			$select->bindValue('codigo_personal',$codigo_personal);
			$select->execute();
			$personal=$select->fetch();
			$mypersonal= new personal();
			$mypersonal->setCodigo_personal($personal['codigo_personal']);
            $mypersonal->setNombre($personal['nombre']);
            $mypersonal->setApellido($personal['apellido']);
            $mypersonal->setTelefono($personal['telefono']);
            $mypersonal->setEmail($personal['email']);
            $mypersonal->setDireccion($personal['direccion']);
            $mypersonal->setRol($personal['rol']);
			return $mypersonal;
		}
		// método para actualizar un personal, recibe como parámetro el personal
		public function actualizar($personal,$id){
			$db=Db::conectar();
			$actualizar=$db->prepare("UPDATE personal SET codigo_personal=:codigo_personal,nombre=:nombre,apellido=:apellido,telefono=:telefono,
            email=:email,direccion=:direccion WHERE codigo_personal=$id");
			$actualizar->bindValue('codigo_personal',$personal->getCodigo_personal());
            $actualizar->bindValue('nombre',$personal->getNombre());
            $actualizar->bindValue('apellido',$personal->getApellido());
            $actualizar->bindValue('telefono',$personal->getTelefono());
            $actualizar->bindValue('email',$personal->getEmail());
            $actualizar->bindValue('direccion',$personal->getDireccion());
			$actualizar->execute();
		}
	}
?>