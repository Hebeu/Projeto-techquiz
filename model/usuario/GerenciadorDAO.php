<?php
	class GerenciadorDAO{
		public $gerenciador;
		
		function __construct($gerenciador){
			$this->gerenciador = $gerenciador;
		}
		function insertGerenciador(){
			abrirConexao();
			global $mysqli;
			$sql = 'INSERT INTO `gerenciador`(`id`, `login`, `senha`) VALUES (null,"'.$this->gerenciador->login.'","'.$this->gerenciador->senha.'")';
			$resultado = $mysqli->query($sql);
			fecharConexao();

			return $resultado;
		}
		
		function getGerenciadores(){
			abrirConexao();
			global $mysqli;

			$sql = 'SELECT *FROM gerenciador';
			
			$resultado = $mysqli->query($sql);
			$row = $resultado->fetch_all(MYSQLI_ASSOC);
			$gerenciadorArray = array();
			
			for($i=0;$i<count($row);$i++){
				array_push($gerenciadorArray,new Gerenciador($row[$i]["id"],$row[$i]["login"],$row[$i]["senha"]));
			}
			fecharConexao();
			
			return $gerenciadorArray;
			
		}
	}
?>