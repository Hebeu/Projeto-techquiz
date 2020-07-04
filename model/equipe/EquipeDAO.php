<?php 
	class EquipeDAO{
	public $equipe;
	 function __construct($e){
		 $this->equipe = $e;
	 }
	 
	 function inserirEquipe(){
		 abrirConexao();
		 
		 global $mysqli;
		 
		 $sql ='INSERT INTO EQUIPE(id,nome,evento_id,login,senha) 
		 VALUES (null,"'.$this->equipe->nome.'","'.$this->equipe->eventoID.'",
		 "'.$this->equipe->login.'","'.$this->equipe->senha.'")';
		 
		 $resultado = $mysqli->query($sql);
		 
		 fecharConexao();
		 
		 return $resultado;
	 }
	
	//fecharConexao();
	}
?>