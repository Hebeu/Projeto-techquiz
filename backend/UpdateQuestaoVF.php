<?php
	include("../model/conexao.php");
	include("../model/questoes/QuestaoVFDAO.php");
	include("../model/questoes/QuestaoVF.php");
	
	$id = $_POST['id-questaovf-up'];
	$questoesID = $_POST['questoes-id-vf-up'];
	$vf = $_POST['select-vf-up'];
	$nome = $_POST['nm-questaovf-up'];
	$texto = $_POST['txt-questaovf-up'];
	
	$questao = new QuestaoVF($id,$nome,$texto,$questoesID,$vf);

	$questaoVFDAO = new QuestaoVFDAO($questao,$id);
	$questaoVFDAO->updateQuestaoVF();
	
?>