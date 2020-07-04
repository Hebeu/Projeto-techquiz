<?php
	include("../model/conexao.php");
	include("../model/usuario/LoginDAO.php");
	include("../model/usuario/Gerenciador.php");
	
	$usuario = $_POST['lgn'];
	$senha = $_POST['sna'];
	$gerenciador = new Gerenciador("",$usuario,$senha);
	
	$loginDAO = new LoginDAO($gerenciador);
	$gerenciadorBanco = $loginDAO->buscarGerenciadorByName();
	if($gerenciadorBanco == null){	
		echo '<script>alert("Usuario Não Encontrado");</script>';

		//header("Location: ../views/tela-login.php");
		
	}else{
		if($gerenciador->login==$gerenciadorBanco->login && $gerenciador->senha==$gerenciadorBanco->senha){
			header("Location: ../views/gerenciador.html");
		}else{
			echo '<script>alert("Usuario ou Senha invalida");</script>';
		}
	}
	header("Location: ../views/tela-login.php");
	
?>