<?php
	$host ="localhost";
	$banco ="tech";
	$usuario="root";
	$senha='';
	
	function abrirConexao(){
		global $mysqli,$host,$usuario,$senha,$banco;
		$mysqli= new mysqli("localhost","root","","tech");
		
		if($mysqli -> connect_errno){
			//printf("Conexão Falhou!<br>");
			exit();
		}else{
			//print("Conectado!<br>");
		}
	}
	
	function fecharConexao(){
		global $mysqli;
		$mysqli->close();
	}
?>