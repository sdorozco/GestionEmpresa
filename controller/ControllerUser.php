<?php
//incluye la clase user y Cruduser
require_once('../model/user.php');
require_once('../model/CrudUser.php');
$user = new User();
$crudlogin = new CrudUser();
session_start();
if (isset($_POST['insertar'])) {
    if ($_POST['userpass'] == $_POST['pass_rep']) {
        $user->setId($_POST['codigo_user']);
        $user->setName($_POST['nombre']);
        $user->setLastName($_POST['apellido']);
        $user->setPhone($_POST['telefono']);
        $user->setEmail($_POST['email']);
        $user->setAddress($_POST['direccion']);
        $user->setIdRol($_POST['rol']);
        $crud->insertar($user);
        $login->setCodigo_login($_POST['codigo_user']);
        $login->setUserName($_POST['username']);
        $login->setUserPass($_POST['userpass']);
        $crudlogin->insertar($login);
        header('Location: ../pages/user-list.php');
    } else {
        header('Location: ../pages/user.php?error=error');
    }
} elseif (isset($_POST['actualizar'])) {
    if ($_POST['userpass'] == null || $_POST['pass_rep'] == null) {
        if ($_POST['userpass'] == $_POST['pass_rep']) {
            $user->setCodigo_user($_POST['codigo_user']);
            $user->setNombre($_POST['nombre']);
            $user->setApellido($_POST['apellido']);
            $user->setTelefono($_POST['telefono']);
            $user->setEmail($_POST['email']);
            $user->setDireccion($_POST['direccion']);
            $crud->actualizar($user);
            $login->setCodigo_login($_POST['codigo_user']);
            $login->setUserName($_POST['username']);
            $crudlogin->actualizar($login);
            header('Location: ../pages/user-list.php');
        } else {
            header('Location: ../pages/user.php?error=error');
        }
    } else {
        $user->setCodigo_user($_POST['codigo_user']);
        $user->setNombre($_POST['nombre']);
        $user->setApellido($_POST['apellido']);
        $user->setTelefono($_POST['telefono']);
        $user->setEmail($_POST['email']);
        $user->setDireccion($_POST['direccion']);
        $crud->actualizar($user);
        $login->setCodigo_login($_POST['codigo_user']);
        $login->setUserName($_POST['username']);
        $login->setUserPass($_POST['userpass']);
        $crudlogin->actualizar($login);
        header('Location: ../pages/user-list.php');
    }
} elseif (isset($_POST['actualizarDatos'])) {
    $id = $_SESSION['id'];
    $user->setCodigo_user($_POST['codigo_user']);
    $user->setNombre($_POST['nombre']);
    $user->setApellido($_POST['apellido']);
    $user->setTelefono($_POST['telefono']);
    $user->setEmail($_POST['email']);
    $user->setDireccion($_POST['direccion']);
    $crud->actualizar($user, $id);
    $login->setCodigo_login($_POST['codigo_user']);
    $crudlogin->actualizarDatos($login, $id);
    $_SESSION['id'] = $_POST['codigo_user'];
    header('Location: ../home.php');
} elseif ($_GET != null) {
    if ($_GET['accion'] == 'e') {
        $user = $crud->eliminar($_GET['id']);
        header('Location: ../pages/user-list.php');
    }
} elseif (isset($_POST['buscar'])) {
    $buscar = $_POST['search'];
    header("Location: ../pages/user-search.php?buscar=$buscar");
}
