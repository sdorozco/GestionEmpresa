<?php
// incluye la clase Db
require_once('conexion/bd.php');
require_once('user_sesion.php');
$sesion = new userSession();

class CrudUser
{
    // constructor de la clase
    public function __construct()
    {
    }
    // método para mostrar todos los libros
    public function login($login)
    {
        $db = Db::conectar();
        $select = $db->prepare("SELECT * FROM user WHERE username=:username and password=:password");
        $select->bindValue('username', $login->getUserName());
        $select->bindValue('password', $login->getUserPass());
        $select->execute();

        if ($select->rowCount() > 0) {
            $sesion = new userSession();
            session_start();
            foreach ($select->fetchAll() as $login) {
                $id = $login['id'];
            }
            $sesion->setCurrentUser($id);
            header("Location: ../home.php");
        } else {
            header("Location: ../index.php?error=error");
        }
        return $select;
    }
    public function insertar($user)
    {
        $db = Db::conectar();
        $insert = $db->prepare('INSERT INTO user values(:id,:username,:password,:name,:last_name,:phone,:email,:addres,:id_rol)');
        $pass = md5($user->getPassword());
        $insert->bindValue('id', $user->getId());
        $insert->bindValue('username', $user->getUserName());
        $insert->bindValue('password', $pass);
        $insert->bindValue('name', $user->getName());
        $insert->bindValue('last_name', $user->getLastName());
        $insert->bindValue('phone', $user->getPhone());
        $insert->bindValue('email', $user->getEmail());
        $insert->bindValue('address', $user->getAddress());
        $insert->bindValue('id_rol', $user->getIdRol());
        $insert->execute();
    }
    public function obtenerUsuario($id)
    {
        $db = Db::conectar();
        $select = $db->prepare('SELECT * FROM user WHERE id=:id');
        $select->bindValue('id', $id);
        $select->execute();
        $usuarios = $select->fetch();
        $myUsuarios = new User();
        $myUsuarios->setId($usuarios['id']);
        $myUsuarios->setUserName($usuarios['username']);
        $myUsuarios->setPassword($usuarios['password']);
        $myUsuarios->setName($usuarios['name']);
        $myUsuarios->setLastName($usuarios['last_name']);
        $myUsuarios->setPhone($usuarios['phone']);
        $myUsuarios->setEmail($usuarios['email']);
        $myUsuarios->setAddress($usuarios['address']);
        $myUsuarios->setIdRol($usuarios['id_rol']);
        return $myUsuarios;
    }
    public function actualizar($user)
    {
        $db = Db::conectar();
        if ($user->getPassword() == null) {
            $actualizar = $db->prepare('UPDATE user SET 
            username=:username,
            name=:name,
            last_name=:last_name,
            phone=:phone,
            email=:email,
            address=:address,
            id_rol=:id_rol WHERE id=:id');
            $actualizar->bindValue('id', $user->getId());
            $actualizar->bindValue('username', $user->getUserName());
            $actualizar->bindValue('name', $user->getUserName());
            $actualizar->bindValue('last_name', $user->getUserName());
            $actualizar->bindValue('phone', $user->getUserName());
            $actualizar->bindValue('email', $user->getUserName());
            $actualizar->bindValue('address', $user->getUserName());
            $actualizar->bindValue('id_rol', $user->getUserName());
            $actualizar->execute();
        } else {
            $pass = md5($user->getPassword());
            $actualizar = $db->prepare('UPDATE user SET 
            username=:username,
            password=:password,
            name=:name,
            last_name=:last_name,
            phone=:phone,
            email=:email,
            address=:address,
             WHERE id=:id');
            $actualizar->bindValue('id', $user->getId());
            $actualizar->bindValue('username', $user->getUserName());
            $actualizar->bindValue('password', $pass);
            $actualizar->bindValue('name', $user->getUserName());
            $actualizar->bindValue('last_name', $user->getUserName());
            $actualizar->bindValue('phone', $user->getUserName());
            $actualizar->bindValue('email', $user->getUserName());
            $actualizar->bindValue('address', $user->getUserName());
            $actualizar->bindValue('id_rol', $user->getUserName());
            $actualizar->execute();
        }
    }
    public function actualizarDatos($user, $id)
    {
        $db = Db::conectar();
        $actualizar = $db->prepare("UPDATE user SET id=:id WHERE id=$id");
        $actualizar->bindValue('id', $user->getId());
        $actualizar->execute();
    }
    public function eliminar($id)
    {
        $db = Db::conectar();
        $eliminar = $db->prepare('DELETE FROM user WHERE id=:id');
        $eliminar->bindValue('id', $id);
        $eliminar->execute();
    }
}
