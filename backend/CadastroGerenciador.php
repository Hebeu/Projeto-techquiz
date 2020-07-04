<?php
	include("../model/usuario/GerenciadorDAO.php");
	include("../model/usuario/Gerenciador.php");
	include("../model/conexao.php");
	
	$login = $_POST['login-gerenciador'];
	$senha = $_POST['senha-gerenciador'];
	
	$gerenciador  = new Gerenciador("",$login,$senha);
	$gerenciadorDAO = new GerenciadorDAO($gerenciador );
	$gerenciadorDAO->insertgerenciador();
	echo 'cadastro gerenciador ';
?>