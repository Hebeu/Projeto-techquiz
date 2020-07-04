<?php
	class Equipe{
		public $id;
		public $nome;
		public $login;
		public $senha;
		public $eventoID;
		
		function __construct($id, $nome,$login,$senha,$eventoID){
			$this->id =$id;
			$this->nome=$nome;
			$this->login=$login;
			$this->senha=$senha;
			$this->eventoID = $eventoID;
		}
		
	}
?>