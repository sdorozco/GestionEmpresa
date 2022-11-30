<?php
//incluye la clase producto y Crudproducto
	require_once('../model/crudProducto.php');
	require_once('../model/Producto.php');
	$crud= new CrudProducto();
	$producto=new Producto();
	
	// si el elemento insertar no viene nulo llama al crud e inserta un producto
	if (isset($_POST['insertar'])) {
		$producto->setCodigo_producto($_POST['codigo_producto']);
        $producto->setNombre($_POST['nombre']);
        $producto->setCategoria($_POST['categoria']);
        $producto->setPrecio($_POST['precio']);
		//llama a la función insertar definida en el crud
		$crud->insertar($producto);
		header('Location: ../pages/productos-list.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el producto
	}elseif(isset($_POST['actualizar'])){
		if($_POST['categoria_actual'] == $_POST['categoria']){
		$producto->setCodigo_producto($_POST['codigo_producto']);
        $producto->setNombre($_POST['nombre']);
        $producto->setCategoria($_POST['categoria_actual']);
        $producto->setPrecio($_POST['precio']);
		$crud->actualizar($producto);
		header('Location: ../pages/productos-list.php');
		}else{
		$producto->setCodigo_producto($_POST['codigo_producto']);
        $producto->setNombre($_POST['nombre']);
        $producto->setCategoria($_POST['categoria']);
        $producto->setPrecio($_POST['precio']);
		$crud->actualizar($producto);
		header('Location: ../pages/productos-list.php');
		}
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un producto
	}elseif($_GET != null){
	if($_GET['accion'] =='e') {
		$producto=$crud->eliminar($_GET['id']);
		header('Location: ../pages/productos-list.php');		
	}
}
?>