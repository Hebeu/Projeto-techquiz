<?php
	include("../model/conexao.php");
	include("../model/questoes/QuestaoMult.php");
	include("../model/questoes/QuestaoMultDAO.php");
	
	$id = $_POST['id-questao'];
	$questoesID = $_POST['id-questao-mult'];
	$nome = $_POST['nm-questao-mult'];
	$texto = $_POST['txt-questaomult-up'];
	
	$lta = $_POST["ipt-a"];
	$ltb = $_POST["ipt-b"];
	$ltc = $_POST["ipt-c"];
	$ltd = $_POST["ipt-d"];
	$alternativaCorreta = $_POST["select-mult"];
	
	$questao = new QuestaoMult($id,$nome,$texto,$questoesID,$lta,$ltb,$ltc,$ltd,$alternativaCorreta);

	$questaoMultDAO= new QuestaoMultDAO($questao,$id);
	$questaoMultDAO->updateQuestaoMult();
	
?>