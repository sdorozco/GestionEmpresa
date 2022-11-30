<?php
//incluye la clase producto_list y Crudproducto_list
	require_once('../model/crudProductoList.php');
	require_once('../model/ProductoList.php');
	$crud= new CrudProductoList();
	$producto_list=new ProductoList();
	
	// si el elemento insertar no viene nulo llama al crud e inserta un producto_list
	if (isset($_POST['insertar'])) {
		if($_POST['cantidad'] != "$" && $_POST['total'] != "$"){
		$producto_list->setCodigo_factura($_POST['codigo_factura']);
        $producto_list->setNombre($_POST['producto_name']);
        $producto_list->setCantidad($_POST['cantidad']);
		$producto_list->setPrecio($_POST['precio']);
		$producto_list->setTotal($_POST['total']);
		$producto_list->setEstado($_POST['estado']);
		//llama a la función insertar definida en el crud
		$crud->insertar($producto_list);
		header('Location: ../pages/facturacion.php');
		}else{
		header('Location: ../pages/facturacion.php?error=error1');
		}
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el producto_list
	}elseif(isset($_POST['insertarUpdate'])) {
		if($_POST['cantidad'] != "$" && $_POST['total'] != "$"){
		$producto_list->setCodigo_factura($_POST['codigo_factura']);
        $producto_list->setNombre($_POST['producto_name']);
        $producto_list->setCantidad($_POST['cantidad']);
		$producto_list->setPrecio($_POST['precio']);
		$producto_list->setTotal($_POST['total']);
		$producto_list->setEstado($_POST['estado']);
		$id=$_POST['codigo_factura'];
		//llama a la función insertar definida en el crud
		$crud->insertar($producto_list);
		header("Location: ../pages/facturacion-update.php?id=$id");
		}else{
		header('Location: ../pages/facturacion.php?error=error1');
		}
	}elseif(isset($_POST['insertarPedido'])){
		if($_POST['cantidad'] != "$" && $_POST['total'] != "$"){
			$producto_list->setCodigo_pedido($_POST['codigo_pedido']);
			$producto_list->setNombre($_POST['producto_name']);
			$producto_list->setCantidad($_POST['cantidad']);
			$producto_list->setPrecio($_POST['precio']);
			$producto_list->setTotal($_POST['total']);
			$producto_list->setEstado($_POST['estado']);
			//llama a la función insertar definida en el crud
			$crud->insertarPedido($producto_list);
			header('Location: ../pages/pedidos.php');
			}else{
			header('Location: ../pages/pedidos.php?error=error1');
			}
	}elseif(isset($_POST['insertarPedidos'])){
		if($_POST['cantidad'] != "$" && $_POST['total'] != "$"){
			$id=$_POST['codigo_pedido'];
		$producto_list->setCodigo_pedido($_POST['codigo_pedido']);
		$producto_list->setNombre($_POST['producto_name']);
		$producto_list->setCantidad($_POST['cantidad']);
		$producto_list->setPrecio($_POST['precio']);
		$producto_list->setTotal($_POST['total']);
		$producto_list->setEstado($_POST['estado']);
		//llama a la función insertar definida en el crud
		$crud->insertarPedido($producto_list);
		header("Location: ../pages/pedidos-update.php?id=$id");
		}else{
		header("Location: ../pages/pedidos-update.php?id=$id&error=error1");
		}
	}elseif($_GET != null){
	if($_GET['accion'] =='e') {
		$producto_list=$crud->eliminar($_GET['id']);
		header('Location: ../pages/facturacion.php');		
	}
	elseif($_GET['accion'] =='efu') {
		$producto_list=$crud->eliminar($_GET['id']);
		$codigo = $_GET['codigo'];
		header("Location: ../pages/facturacion-update.php?id=$codigo");		
}
	elseif($_GET['accion'] =='ep') {
			$producto_list=$crud->eliminar($_GET['id']);
			header('Location: ../pages/pedidos.php');		
	}
	elseif($_GET['accion'] =='epu') {
		$producto_list=$crud->eliminar($_GET['id']);
		$codigo = $_GET['codigo'];
		header("Location: ../pages/pedidos-update.php?id=$codigo");		
}
}
?>