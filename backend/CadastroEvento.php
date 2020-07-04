<?php
	include("../model/evento/EventoDAO.php");
	include("../model/evento/Evento.php");
	include("../model/conexao.php");
	
	
	$nome = $_POST['nome-evento'];
	$semestre = $_POST['semestre-evento'];
	
	$evento = new Evento("",$nome,$semestre);
	$eventoDAO = new EventoDAO($evento);
	$eventoDAO->insertEvento();
	echo 'cadastro evento';
	
	
?>