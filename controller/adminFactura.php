<?php
//incluye la clase facturacion y Crudfacturacion
	require_once('../model/crudFacturacion.php');
	require_once('../model/Facturacion.php');
	require_once('../model/crudProductoList.php');
	require_once('../model/ProductoList.php');
	$crudProductlist= new CrudProductoList();
	$producto_list=new ProductoList();
	$crud= new CrudFacturacion();
	$facturacion=new Facturacion();
	
	// si el elemento insertar no viene nulo llama al crud e inserta un facturacion
	if (isset($_POST['insertar'])) {
		if($_POST['modopago'] != "0"){
			if($_POST['total_cantidad'] != "" && $_POST['total_factura'] != ""){
		$facturacion->setCodigo_factura($_POST['codigo_factura']);
        $facturacion->setCliente($_POST['cliente']);
        $facturacion->setEmail($_POST['email']);
		$facturacion->setDireccion($_POST['direccion']);
		$facturacion->setFecha($_POST['fecha']);
		$facturacion->setModopago($_POST['modopago']);
		$facturacion->setCantidad($_POST['total_cantidad']);
		$facturacion->setTotal($_POST['total_factura']);
		//llama a la función insertar definida en el crud
		$crud->insertar($facturacion);
		$producto_list->setCodigo_factura($_POST['codigo_factura']);
		$producto_list->setEstado($_POST['estado_nuevo']);
		$crudProductlist->actualizarEstado($producto_list);
		header('Location: ../pages/reporte.php');
			}else{
				header('Location: ../pages/facturacion.php?error=error3');
			}
		}else{
		header('Location: ../pages/facturacion.php?error=error2');
		}
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el facturacion
	}elseif(isset($_POST['actualizar'])){
			$facturacion->setCodigo_factura($_POST['codigo_factura']);
			$facturacion->setCliente($_POST['cliente']);
			$facturacion->setEmail($_POST['email']);
			$facturacion->setDireccion($_POST['direccion']);
			$facturacion->setFecha($_POST['fecha']);
			$facturacion->setModopago($_POST['modopago']);
			$facturacion->setCantidad($_POST['total_cantidad']);
			$facturacion->setTotal($_POST['total_factura']);
		$crud->actualizar($facturacion);
		header('Location: ../pages/reporte.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un facturacion
	}elseif($_GET != null){
	if($_GET['accion'] =='e') {
		$facturacion=$crud->eliminar($_GET['id']);
		$crudProductlist->eliminarFactura($_GET['id']);
		header('Location: ../pages/reporte.php');		
	}
}
?>