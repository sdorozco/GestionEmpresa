<?php
//incluye la clase categoria y Crudcategoria
	require_once('../model/crudCategoria.php');
	require_once('../model/Categoria.php');
	$crud= new CrudCategoria();
	$categoria=new Categoria();
	
	// si el elemento insertar no viene nulo llama al crud e inserta un categoria
	if (isset($_POST['insertar'])) {
		$categoria->setCodigo_categoria($_POST['codigo_categoria']);
		$categoria->setNombre($_POST['nombre']);
		//llama a la función insertar definida en el crud
		$crud->insertar($categoria);
		header('Location: ../pages/categoria-list.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el categoria
	}elseif(isset($_POST['actualizar'])){
		$categoria->setCodigo_categoria($_POST['codigo_categoria']);
		$categoria->setNombre($_POST['nombre']);
		$crud->actualizar($categoria);
		header('Location: ../pages/categoria-list.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un categoria
	}elseif($_GET != null){
	if($_GET['accion'] =='e') {
		$categoria=$crud->eliminar($_GET['id']);
		header('Location: ../pages/categoria-list.php');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}
}
?>