<?php
class User
{
    private $id;
    private $username;
    private $password;
    private $name;
    private $last_name;
    private $phone;
    private $email;
    private $address;
    private $id_rol;

    function __construct()
    {
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getUserName()
    {
        return $this->username;
    }
    public function setUserName($username)
    {
        $this->username = $username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getAdress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getIdRol()
    {
        return $this->id_rol;
    }
    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;
    }
}
