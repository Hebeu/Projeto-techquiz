<?php 
	 include("../model/conexao.php");
	 include("../model/equipe/Equipe.php");
	 include("../model/equipe/EquipeDAO.php");
	 include("../model/evento/Evento.php");
	 include("../model/evento/EventoDAO.php");
	
	 $eventoDAO = new EventoDAO(null);
	 $semestres = $eventoDAO->getEventos();

	 $nome = $_POST["nome-equipe"];
	 $login = $_POST["login-equipe"];
	 $senha = $_POST["senha-equipe"];
	 $eventoID;
	//Lê a lista de eventos e procura pelo o que foi selecionado na tela 
	foreach($semestres as $key=>$evento){
		$conteudo = $evento->nome." ".$evento->semestre;
		if($conteudo == $_POST["evento"]){
			$eventoID = $evento->id;
		}
	}
	 $equipe = new Equipe("",$nome,$login,$senha,$eventoID);
		
	 $equipeDAO = new EquipeDAO($equipe);
	 $equipeDAO->inserirEquipe();
	//abrirConexao();
	
	
?>