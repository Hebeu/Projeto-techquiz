<?php
	class LoginDAO{
		public $gerenciador;
		
		function __construct($gerenciador){
			$this->gerenciador=$gerenciador;
		}
		
		public function buscarGerenciadorByName(){
			global $mysqli;
			abrirConexao();
			//$sql = 'SELECT * FROM `questoes` INNER JOIN questaoaberta on questoes.id = questaoaberta.Questoes_id where questoes.id = "'.$this->questao->id.'"';
			$sql = 'SELECT * FROM `gerenciador` WHERE login ="'.$this->gerenciador->login.'"';
			$resultado =$mysqli->query($sql);
			$linha = $resultado->fetch_all(MYSQLI_ASSOC);
			fecharConexao();
			if($linha == null){
				return null;
			}else{
			$gd = new Gerenciador($linha[0]["id"],$linha[0]["login"],$linha[0]["senha"]);
			}
			return $gd;
		}	
		
	}
?>