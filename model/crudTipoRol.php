<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class CrudTipo_rol{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo tipo_rol
		public function insertar($tipo_rol){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO tipo_rol values(:codigo_rol,:nombre,:descripcion)');
			$insert->bindValue('codigo_rol',$tipo_rol->getCodigo_rol());
            $insert->bindValue('nombre',$tipo_rol->getNombre());
            $insert->bindValue('descripcion',$tipo_rol->getDescripcion());
			$insert->execute();
		}
		public function count(){
			$db=Db::conectar();
			$listar_tipo_rol=[];
			$select=$db->query('SELECT COUNT(*) codigo_rol FROM tipo_rol');
			$fila = $select->fetchColumn();

			return $fila+1;
		}
		// método para mostrar todos los tipo_rol
		public function mostrar(){
			$db=Db::conectar();
			$listar_tipo_rol=[];
			$select=$db->query('SELECT * FROM tipo_rol');
			foreach($select->fetchAll() as $tipo_rol){
				$mytipo_rol= new TipoRol();
				$mytipo_rol->setCodigo_rol($tipo_rol['codigo_rol']);
                $mytipo_rol->setNombre($tipo_rol['nombre']);
                $mytipo_rol->setDescripcion($tipo_rol['descripcion']);
				$listar_tipo_rol[]=$mytipo_rol;
			}
			return $listar_tipo_rol;
		}

		// método para eliminar un tipo_rol, recibe como parámetro el id del tipo_rol
		public function eliminar($codigo_rol){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM tipo_rol WHERE codigo_rol=:codigo_rol');
			$eliminar->bindValue('codigo_rol',$codigo_rol);
			$eliminar->execute();
		}

		// método para buscar un tipo_rol, recibe como parámetro el id del tipo_rol
		public function obtenertipo_rol($codigo_rol){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM tipo_rol WHERE codigo_rol=:codigo_rol');
			$select->bindValue('codigo_rol',$codigo_rol);
			$select->execute();
			$tipo_rol=$select->fetch();
			$mytipo_rol= new TipoRol();
			$mytipo_rol->setcodigo_rol($tipo_rol['codigo_rol']);
            $mytipo_rol->setNombre($tipo_rol['nombre']);
            $mytipo_rol->setDescripcion($tipo_rol['descripcion']);
			return $mytipo_rol;
		}

		// método para actualizar un tipo_rol, recibe como parámetro el tipo_rol
		public function actualizar($tipo_rol){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE tipo_rol SET nombre=:nombre,descripcion=:descripcion WHERE codigo_rol=:codigo_rol');
			$actualizar->bindValue('codigo_rol',$tipo_rol->getcodigo_rol());
            $actualizar->bindValue('nombre',$tipo_rol->getNombre());
            $actualizar->bindValue('descripcion',$tipo_rol->getDescripcion());
			$actualizar->execute();
		}
	}
?>