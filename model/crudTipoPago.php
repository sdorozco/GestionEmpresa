<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class Crudtipo_pago{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo tipo_pago
		public function insertar($tipo_pago){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO tipo_pago values(:codigo_pago,:nombre,:descripcion)');
			$insert->bindValue('codigo_pago',$tipo_pago->getCodigo_pago());
			$insert->bindValue('cliente',$tipo_pago->getNombre());
			$insert->bindValue('email',$tipo_pago->getDescripcion());
			$insert->execute();
		}
		public function mostrarSearch($search){
			$db=Db::conectar();
			$listar_tipo_pagos=[];
			$select=$db->query("SELECT * FROM tipo_pago WHERE nombre LIKE '%$search%'");
			foreach($select->fetchAll() as $tipo_pago){
				$mytipo_pago= new TipoPago();
				$mytipo_pago->setCodigo_pago($tipo_pago['codigo_pago']);
				$mytipo_pago->setNombre($tipo_pago['nombre']);
				$mytipo_pago->setDescripcion($tipo_pago['descripcion']);
				$listar_tipo_pagos[]=$mytipo_pago;
			}
			return $listar_tipo_pagos;
		}
		public function count(){
			$db=Db::conectar();
			$select=$db->query('SELECT COUNT(*) codigo_pago FROM tipo_pago');
			$fila = $select->fetchColumn();
			return $fila+1;
		}
		// método para mostrar todos los tipo_pagos
		public function mostrar(){
			$db=Db::conectar();
			$listatipo_pagos=[];
			$select=$db->query('SELECT * FROM tipo_pago');

			foreach($select->fetchAll() as $tipo_pago){
				$mytipo_pago= new TipoPago();
				$mytipo_pago->setCodigo_pago($tipo_pago['codigo_pago']);
				$mytipo_pago->setNombre($tipo_pago['nombre']);
				$mytipo_pago->setDescripcion($tipo_pago['descripcion']);
				$listatipo_pagos[]=$mytipo_pago;
			}
			return $listatipo_pagos;
		}
		// método para eliminar un tipo_pago, recibe como parámetro el id del tipo_pago
		public function eliminar($codigo_pago){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM tipo_pago WHERE codigo_pago=:codigo_pago');
			$eliminar->bindValue('codigo_pago',$codigo_pago);
			$eliminar->execute();
		}
		// método para buscar un tipo_pago, recibe como parámetro el id del tipo_pago
		public function obtenerTipo_pago($codigo_pago){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM tipo_pago WHERE codigo_pago=:codigo_pago');
			$select->bindValue('codigo_pago',$codigo_pago);
			$select->execute();
			$tipo_pago=$select->fetch();
			$mytipo_pago= new tipo_pago();
			$mytipo_pago->setCodigo_pago($tipo_pago['codigo_pago']);
			$mytipo_pago->setNombre($tipo_pago['nombre']);
			$mytipo_pago->setDescripcion($tipo_pago['descripcion']);
			return $mytipo_pago;
		}

		// método para actualizar un tipo_pago, recibe como parámetro el tipo_pago
		public function actualizar($tipo_pago){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE tipo_pago SET nombre=:nombre, descripcion=:descripcion WHERE codigo_pago=:codigo_pago');
			$actualizar->bindValue('codigo_pago',$tipo_pago->getCodigo_pago());
			$actualizar->bindValue('nombre',$tipo_pago->getNombre());
			$actualizar->bindValue('descripcion',$tipo_pago->getDescripcion());
			$actualizar->execute();
		}
	}
?>