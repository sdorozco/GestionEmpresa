<?php
// incluye la clase Db
require_once('conexion/bd.php');

	class CrudProductoList{
		// constructor de la clase
		public function __construct(){}
		// método para insertar, recibe como parámetro un objeto de tipo producto_list
		public function insertar($producto_list){
			$db=Db::conectar();
            $insert=$db->prepare('INSERT INTO producto_list values("",:codigo_factura,"0",:nombre,:cantidad,:precio,:total,:estado)');
			$insert->bindValue('codigo_factura',$producto_list->getCodigo_factura());
            $insert->bindValue('nombre',$producto_list->getNombre());
            $insert->bindValue('cantidad',$producto_list->getCantidad());
            $insert->bindValue('precio',$producto_list->getPrecio());
            $insert->bindValue('total',$producto_list->getTotal());
            $insert->bindValue('estado',$producto_list->getEstado());
			$insert->execute();
		}
		public function insertarPedido($producto_list){
			$db=Db::conectar();
            $insert=$db->prepare('INSERT INTO producto_list values("","0",:codigo_pedido,:nombre,:cantidad,:precio,:total,:estado)');
			$insert->bindValue('codigo_pedido',$producto_list->getCodigo_pedido());
            $insert->bindValue('nombre',$producto_list->getNombre());
            $insert->bindValue('cantidad',$producto_list->getCantidad());
            $insert->bindValue('precio',$producto_list->getPrecio());
            $insert->bindValue('total',$producto_list->getTotal());
            $insert->bindValue('estado',$producto_list->getEstado());
			$insert->execute();
		}
		// método para mostrar todos los producto_list
		public function mostrar(){
			$db=Db::conectar();
			$listar_producto_list=[];
			$select=$db->query('SELECT * FROM producto_list');
			foreach($select->fetchAll() as $producto_list){
                $myproducto_list= new ProductoList();
                $myproducto_list->setCodigo_productolist($producto_list['codigo_productolist']);
				$myproducto_list->setCodigo_factura($producto_list['codigo_factura']);
				$myproducto_list->setCodigo_pedido($producto_list['codigo_pedido']);
                $myproducto_list->setNombre($producto_list['nombre']);
                $myproducto_list->setCantidad($producto_list['cantidad']);
                $myproducto_list->setPrecio($producto_list['precio']);
                $myproducto_list->setTotal($producto_list['total']);
                $myproducto_list->setEstado($producto_list['estado']);
				$listar_producto_list[]=$myproducto_list;
			}
			return $listar_producto_list;
		}
		public function mostrarPedido(){
			$db=Db::conectar();
			$listar_producto_list=[];
			$select=$db->query('SELECT * FROM producto_list');
			foreach($select->fetchAll() as $producto_list){
                $myproducto_list= new ProductoList();
                $myproducto_list->setCodigo_productolist($producto_list['codigo_productolist']);
				$myproducto_list->setCodigo_pedido($producto_list['codigo_pedido']);
                $myproducto_list->setNombre($producto_list['nombre']);
                $myproducto_list->setCantidad($producto_list['cantidad']);
                $myproducto_list->setPrecio($producto_list['precio']);
                $myproducto_list->setTotal($producto_list['total']);
                $myproducto_list->setEstado($producto_list['estado']);
				$listar_producto_list[]=$myproducto_list;
			}
			return $listar_producto_list;
		}
		public function mostrarFactura($codigo_factura){
			$db=Db::conectar();
			$listar_producto_list=[];
			$select=$db->query("SELECT * FROM producto_list WHERE codigo_factura=$codigo_factura AND estado='1'");
			foreach($select->fetchAll() as $producto_list){
                $myproducto_list= new ProductoList();
                $myproducto_list->setCodigo_productolist($producto_list['codigo_productolist']);
				$myproducto_list->setCodigo_factura($producto_list['codigo_factura']);
                $myproducto_list->setNombre($producto_list['nombre']);
                $myproducto_list->setCantidad($producto_list['cantidad']);
                $myproducto_list->setPrecio($producto_list['precio']);
                $myproducto_list->setTotal($producto_list['total']);
                $myproducto_list->setEstado($producto_list['estado']);
				$listar_producto_list[]=$myproducto_list;
			}
			return $listar_producto_list;
		}
        public function count(){
			$db=Db::conectar();
			$select=$db->query('SELECT COUNT(*) codigo_factura FROM producto_list');
			$fila = $select->fetchColumn();
			return $fila+1;
		}
		public function totalcantidad(){
			$db=Db::conectar();
			$select=$db->query("SELECT SUM(cantidad) FROM producto_list WHERE estado='0'");
			$fila = $select->fetchColumn();
			return $fila;
		}
		public function totalcantidadReporte($codigo_factura){
			$db=Db::conectar();
			$select=$db->query("SELECT SUM(cantidad) FROM producto_list WHERE estado='1' AND codigo_factura=$codigo_factura");
			$fila = $select->fetchColumn();
			return $fila;
		}
		public function total(){
			$db=Db::conectar();
			$select=$db->query("SELECT SUM(total) FROM producto_list WHERE estado='0'");
			$fila = $select->fetchColumn();
			return $fila;
		}
		public function totalReporte($codigo_factura){
			$db=Db::conectar();
			$select=$db->query("SELECT SUM(total) FROM producto_list WHERE estado='1' AND codigo_factura=$codigo_factura");
			$fila = $select->fetchColumn();
			return $fila;
		}
		public function totalFactura($codigo_factura){
			$db=Db::conectar();
			$select=$db->query("SELECT SUM(total) FROM producto_list WHERE estado='1' AND codigo_factura=$codigo_factura");
			$fila = $select->fetchColumn();
			return $fila;
		}
		public function totalPedido($codigo_pedido){
			$db=Db::conectar();
			$select=$db->query("SELECT SUM(total) FROM producto_list WHERE estado='1' AND codigo_pedido=$codigo_pedido");
			$fila = $select->fetchColumn();
			return $fila;
		}
		public function totalcantidadPedido($codigo_pedido){
			$db=Db::conectar();
			$select=$db->query("SELECT SUM(cantidad) FROM producto_list WHERE estado='1' AND codigo_pedido=$codigo_pedido");
			$fila = $select->fetchColumn();
			return $fila;
		}
		// método para eliminar un producto_list, recibe como parámetro el id del producto_list
		public function eliminar($codigo_productolist){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM producto_list WHERE codigo_productolist=:codigo_productolist');
			$eliminar->bindValue('codigo_productolist',$codigo_productolist);
			$eliminar->execute();
		}
		public function eliminarPedido($codigo_pedido){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM producto_list WHERE codigo_pedido=:codigo_pedido');
			$eliminar->bindValue('codigo_pedido',$codigo_pedido);
			$eliminar->execute();
		}
		public function eliminarFactura($codigo_factura){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM producto_list WHERE codigo_factura=:codigo_factura');
			$eliminar->bindValue('codigo_factura',$codigo_factura);
			$eliminar->execute();
		}
		// método para buscar un producto_list, recibe como parámetro el id del producto_list
		public function obtenerProductoList($codigo_productolist){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM producto_list WHERE codigo_productolist=:codigo_productolist');
			$select->bindValue('codigo_productolist',$codigo_productolist);
			$select->execute();
			$producto_list=$select->fetch();
			$myproducto_list= new ProductoList();
			$myproducto_list->setCodigo_productolist($producto_list['codigo_productolist']);
			$myproducto_list->setCodigo_factura($producto_list['codigo_factura']);
			$myproducto_list->setCodigo_pedido($producto_list['codigo_pedido']);
            $myproducto_list->setNombre($producto_list['nombre']);
            $myproducto_list->setCantidad($producto_list['cantidad']);
            $myproducto_list->setPrecio($producto_list['precio']);
            $myproducto_list->setTotal($producto_list['total']);
            $myproducto_list->setEstado($producto_list['estado']);
			return $myproducto_list;
		}
		public function actualizarEstado($producto_list){
			$db=Db::conectar();
            $actualizar=$db->prepare('UPDATE producto_list SET estado=:estado WHERE codigo_factura=:codigo_factura');
			$actualizar->bindValue('codigo_factura',$producto_list->getCodigo_factura());
            $actualizar->bindValue('estado',$producto_list->getEstado());
			$actualizar->execute();
		}
		public function actualizarEstadoPedido($producto_list){
			$db=Db::conectar();
            $actualizar=$db->prepare('UPDATE producto_list SET estado=:estado WHERE codigo_pedido=:codigo_pedido');
			$actualizar->bindValue('codigo_pedido',$producto_list->getCodigo_pedido());
            $actualizar->bindValue('estado',$producto_list->getEstado());
			$actualizar->execute();
		}
		// método para actualizar un producto_list, recibe como parámetro el producto_list
		public function actualizar($producto_list){
			$db=Db::conectar();
            $actualizar=$db->prepare('UPDATE producto_list SET nombre=:nombre, cantidad=:cantidad,precio=:precio,total=:total,estado=:estado WHERE codigo_productolist=:codigo_productolist');
            $actualizar->bindValue('codigo_productolist',$producto_list->getCodigo_productolist());
			$actualizar->bindValue('codigo_factura',$producto_list->getcodigo_factura());
			$actualizar->bindValue('codigo_pedido',$producto_list->getCodigo_pedido());
            $actualizar->bindValue('nombre',$producto_list->getNombre());
            $actualizar->bindValue('cantidad',$producto_list->getCategoria());
            $actualizar->bindValue('precio',$producto_list->getPrecio());
            $actualizar->bindValue('total',$producto_list->getTotal());
            $actualizar->bindValue('estado',$producto_list->getEstado());
			$actualizar->execute();
		}
	}
?>