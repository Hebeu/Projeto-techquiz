<?php
	include("../model/conexao.php");
	include("../model/questoes/Questoes.php");
	include("../model/questoes/QuestoesDAO.php");
	include("../model/questoes/QuestaoAberta.php");
	include("../model/questoes/QuestaoVF.php");
	include("../model/questoes/QuestaoVFDAO.php");
	include("../model/questoes/QuestaoMult.php");
	include("../model/questoes/QuestaoMultDAO.php");
	
	$nomeQuestao = $_POST["nm-questao"];
	$textoQuestao = $_POST["txt-questao"];
	$tipoSelecionado = $_POST["select-tipo"];
			
	
	if($tipoSelecionado==1){
		$rubrica = $_POST["txt-rubrica"];
		
		$questao = new QuestaoAberta("",$nomeQuestao,$textoQuestao,"",$rubrica);
		$questaoDAO =new QuestoesDAO($questao,null);
		$questaoDAO->inserirQuestaoAberta();
		
	}else if($tipoSelecionado==2){
		$verdFalso = $_POST["select-vf"];
		
		//$questaoVF = new QuestaoVF("",$verdFalso);
		$questaoVF = new QuestaoVF("",$nomeQuestao,$textoQuestao,"",$verdFalso);
		$questaoVFDAO = new QuestaoVFDAO($questaoVF,null);
		$questaoVFDAO->inserirQuestaoVF();
	
	}else if($tipoSelecionado==3){
		$lta = $_POST["ipt-a"];
		$ltb = $_POST["ipt-b"];
		$ltc = $_POST["ipt-c"];
		$ltd = $_POST["ipt-d"];
		$alternativaCorreta = $_POST["select-mult"];
		
		$questaoMult = new QuestaoMult("",$nomeQuestao,$textoQuestao,"",$lta,$ltb,$ltc,$ltd,$alternativaCorreta);
		$questaoMultDAO = new QuestaoMultDAO($questaoMult,null);
		$questaoMultDAO->inserirQuestaoMult();
	}
	//print_r($tipoSelecionado);
	// print_r($nomeQuestao);
	// print_r($textoQuestao);

?>