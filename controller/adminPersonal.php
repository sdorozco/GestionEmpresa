<?php
//incluye la clase personal y Crudpersonal
	require_once('../model/crudPersonal.php');
	require_once('../model/Personal.php');
	require_once('../model/Login.php');
	require_once('../model/Crud_login.php');
	$crud= new CrudPersonal();
	$personal=new Personal();
	$login=new Login();
	$crudlogin=new CrudLogin();
	session_start();
	if (isset($_POST['insertar'])) {
		if($_POST['userpass'] == $_POST['pass_rep']){
		$personal->setCodigo_personal($_POST['codigo_personal']);
        $personal->setNombre($_POST['nombre']);
        $personal->setApellido($_POST['apellido']);
		$personal->setTelefono($_POST['telefono']);
		$personal->setEmail($_POST['email']);
        $personal->setDireccion($_POST['direccion']);
        $personal->setRol($_POST['rol']);
		$crud->insertar($personal);
		$login->setCodigo_login($_POST['codigo_personal']);
		$login->setUserName($_POST['username']);
		$login->setUserPass($_POST['userpass']);
		$crudlogin->insertar($login);
		header('Location: ../pages/personal-list.php');
		}else{
		header('Location: ../pages/personal.php?error=error');
		}
	}elseif(isset($_POST['actualizar'])){
		if($_POST['userpass'] == null || $_POST['pass_rep'] == null){
		if($_POST['userpass'] == $_POST['pass_rep']){
		$personal->setCodigo_personal($_POST['codigo_personal']);
		$personal->setNombre($_POST['nombre']);
        $personal->setApellido($_POST['apellido']);
		$personal->setTelefono($_POST['telefono']);
		$personal->setEmail($_POST['email']);
        $personal->setDireccion($_POST['direccion']);
		$crud->actualizar($personal);
		$login->setCodigo_login($_POST['codigo_personal']);
		$login->setUserName($_POST['username']);
		$crudlogin->actualizar($login);
		header('Location: ../pages/personal-list.php');
		  }else{
			header('Location: ../pages/personal.php?error=error');
		  }
		}else{
			$personal->setCodigo_personal($_POST['codigo_personal']);
			$personal->setNombre($_POST['nombre']);
			$personal->setApellido($_POST['apellido']);
			$personal->setTelefono($_POST['telefono']);
			$personal->setEmail($_POST['email']);
			$personal->setDireccion($_POST['direccion']);
			$crud->actualizar($personal);
			$login->setCodigo_login($_POST['codigo_personal']);
			$login->setUserName($_POST['username']);
			$login->setUserPass($_POST['userpass']);
			$crudlogin->actualizar($login);
			header('Location: ../pages/personal-list.php');
		}
	}elseif(isset($_POST['actualizarDatos'])){
		    $id=$_SESSION['id'];
		    $personal->setCodigo_personal($_POST['codigo_personal']);
			$personal->setNombre($_POST['nombre']);
			$personal->setApellido($_POST['apellido']);
			$personal->setTelefono($_POST['telefono']);
			$personal->setEmail($_POST['email']);
			$personal->setDireccion($_POST['direccion']);
			$crud->actualizar($personal,$id);
			$login->setCodigo_login($_POST['codigo_personal']);
			$crudlogin->actualizarDatos($login,$id);
			$_SESSION['id'] = $_POST['codigo_personal'];
			header('Location: ../home.php');
		
	}elseif($_GET != null){
	if ($_GET['accion'] == 'e') {
		$personal=$crud->eliminar($_GET['id']);
		header('Location: ../pages/personal-list.php');		
	}
}elseif(isset($_POST['buscar'])){
    $buscar=$_POST['search'];
    header("Location: ../pages/personal-search.php?buscar=$buscar");
}
?>