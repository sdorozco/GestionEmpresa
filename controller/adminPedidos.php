<?php
//incluye la clase pedidos y Crudpedidos
	require_once('../model/crudPedidos.php');
	require_once('../model/Pedidos.php');
	require_once('../model/crudProductoList.php');
	require_once('../model/ProductoList.php');
	$crudProductlist= new CrudProductoList();
	$producto_list=new ProductoList();
	$crud= new Crudpedidos();
	$pedidos=new Pedidos();
	
	// si el elemento insertar no viene nulo llama al crud e inserta un pedidos
	if (isset($_POST['insertar'])) {
		if($_POST['modopago'] != "0"){
			if($_POST['total_cantidad'] != "" && $_POST['total_pedido'] != ""){
                if($_POST['proveedor'] != "@"){
		$pedidos->setCodigo_pedido($_POST['codigo_pedido']);
        $pedidos->setProveedor($_POST['name_proveedor']);
        $pedidos->setEmail($_POST['email']);
		$pedidos->setFecha($_POST['fecha']);
		$pedidos->setModopago($_POST['modopago']);
		$pedidos->setCantidad($_POST['total_cantidad']);
		$pedidos->setTotal($_POST['total_pedido']);
		//llama a la función insertar definida en el crud
		$crud->insertar($pedidos);
		$producto_list->setCodigo_pedido($_POST['codigo_pedido']);
		$producto_list->setEstado($_POST['estado_nuevo']);
		$crudProductlist->actualizarEstadoPedido($producto_list);
		header('Location: ../pages/pedidos-list.php');
            }else{
                header('Location: ../pages/pedidos.php?error=error4');
            }
        }else{
				header('Location: ../pages/pedidos.php?error=error3');
			}
		}else{
		header('Location: ../pages/pedidos.php?error=error2');
		}
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el pedidos
	}elseif(isset($_POST['actualizar'])){
			$pedidos->setCodigo_pedido($_POST['codigo_pedido']);
			$pedidos->setProveedor($_POST['proveedor']);
			$pedidos->setEmail($_POST['email']);
			$pedidos->setFecha($_POST['fecha']);
			$pedidos->setModopago($_POST['modopago']);
			$pedidos->setCantidad($_POST['total_cantidad']);
			$pedidos->setTotal($_POST['total_pedido']);
		$crud->actualizar($pedidos);
		header('Location: ../pages/pedidos-list.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un pedidos
	}elseif($_GET != null){
	if($_GET['accion'] =='e') {
		$pedidos=$crud->eliminar($_GET['id']);
		$crudProductlist->eliminarPedido($_GET['id']);
		header('Location: ../pages/pedidos-list.php');		
    }
    
}
?>