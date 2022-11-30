<?php
//incluye la clase proveedor y Crudproveedor
	require_once('../model/crudProveedor.php');
	require_once('../model/Proveedor.php');
	$crud= new CrudProveedor();
	$proveedor=new Proveedor();
	
	// si el elemento insertar no viene nulo llama al crud e inserta un proveedor
	if (isset($_POST['insertar'])) {
		$proveedor->setCodigo_proveedor($_POST['codigo_proveedor']);
        $proveedor->setNombre($_POST['nombre']);
        $proveedor->setResponsable($_POST['responsable']);
        $proveedor->setTelefono($_POST['telefono']);
        $proveedor->setEmail($_POST['email']);
        $proveedor->setDireccion($_POST['direccion']);
		//llama a la función insertar definida en el crud
		$crud->insertar($proveedor);
		header('Location: ../pages/proveedores-list.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el proveedor
	}elseif(isset($_POST['actualizar'])){
		$proveedor->setCodigo_proveedor($_POST['codigo_proveedor']);
        $proveedor->setNombre($_POST['nombre']);
        $proveedor->setResponsable($_POST['responsable']);
        $proveedor->setTelefono($_POST['telefono']);
        $proveedor->setEmail($_POST['email']);
        $proveedor->setDireccion($_POST['direccion']);
		$crud->actualizar($proveedor);
		header('Location: ../pages/proveedores-list.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un proveedor
	}elseif($_GET != null){
	if($_GET['accion'] =='e') {
		$proveedor=$crud->eliminar($_GET['id']);
		header('Location: ../pages/proveedores-list.php');		
	}
}
?>