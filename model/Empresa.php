<?php
	class Empresa{
		private $codigo_empresa;
		private $nombre;
        private $telefono;
        private $email;
        private $direccion;

		function __construct(){}

		public function getNombre(){
		return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
        }
        public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
        }
        public function getDireccion(){
			return $this->direccion;
		}
		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}
		public function getCodigo_empresa(){
			return $this->codigo_empresa;
		}
		public function setCodigo_empresa($codigo_empresa){
			$this->codigo_empresa = $codigo_empresa;
		}
    }
?> 