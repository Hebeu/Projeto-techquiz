<?php
	include("../conexao.php");
	 include("Evento.php");
	 include("EventoDAO.php");
	

		$eventoDAO = new EventoDAO(null);
		$semestres = $eventoDAO->getEventoSemestre();
		echo json_encode($semestres);
	
?>