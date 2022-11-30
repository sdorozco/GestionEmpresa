<?php
//incluye la clase empresa y CrudEmpresa
	require_once('../model/crudEmpresa.php');
	require_once('../model/empresa.php');
	$crud= new CrudEmpresa();
	$empresa=new Empresa();
	if (isset($_POST['insertar'])) {
		$empresa->setCodigo_empresa($_POST['codigo_empresa']);
		$empresa->setNombre($_POST['nombre']);
		$empresa->setTelefono($_POST['telefono']);
		$empresa->setEmail($_POST['email']);
		$empresa->setDireccion($_POST['direccion']);
		$crud->insertar($empresa);
		header('Location: ../pages/empresa-list.php');
	}elseif(isset($_POST['actualizar'])){
		$empresa->setCodigo_empresa($_POST['codigo_empresa']);
		$empresa->setNombre($_POST['nombre']);
		$empresa->setTelefono($_POST['telefono']);
		$empresa->setEmail($_POST['email']);
		$empresa->setDireccion($_POST['direccion']);
		$crud->actualizar($empresa);
		header('Location: ../pages/empresa-list.php');
	}elseif($_GET != null){
	if ($_GET['accion'] == 'e') {
		$empresa=$crud->eliminar($_GET['id']);
		header('Location: ../pages/empresa-list.php');		
	}
}elseif(isset($_POST['buscar'])){
    $buscar=$_POST['search'];
    header("Location: search.php?buscar=$buscar");
}
?>













