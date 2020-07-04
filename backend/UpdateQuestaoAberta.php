<?php
	include("../model/conexao.php");
	include("../model/questoes/QuestoesDAO.php");
	include("../model/questoes/Questoes.php");
	include("../model/questoes/QuestaoAberta.php");
	
	$id = $_POST['id-questao'];
	$questoesID = $_POST['id-questao-aberta'];
	$rubrica = $_POST['txt-rubrica'];
	$nome = $_POST['nm-questao-aberta'];
	$texto = $_POST['txt-questao-aberta'];
	
	$questao = new QuestaoAberta($id,$nome,$texto,$questoesID,$rubrica);

	$questaoAbertaDAO = new QuestoesDAO($questao,null);
	$questaoAbertaDAO->updateQuestaoAberta();
	
?>