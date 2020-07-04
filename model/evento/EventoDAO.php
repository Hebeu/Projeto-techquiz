<?php 
	class EventoDAO{
		public $evento;
		
		function __construct($e){
			$this->evento = $e;
		}
		
		function getEventos(){
			abrirConexao();
			global $mysqli;

			$sql = 'SELECT *FROM evento';
			
			$resultado = $mysqli->query($sql);
			$row = $resultado->fetch_all(MYSQLI_ASSOC);
			$semestreArray = array();
			
			for($i=0;$i<count($row);$i++){
				array_push($semestreArray,new Evento($row[$i]["id"],$row[$i]["nome"],$row[$i]["semestre"]));
			}
			fecharConexao();
			
			return $semestreArray;
			
		}
		
		function getEventoSemestre(){
			abrirConexao();
			global $mysqli;
			$sql ='SELECT semestre FROM evento';
			$resultado = $mysqli->query($sql);
			$row = $resultado->fetch_all();
			$semestreArray = array();

			for($i=0;$i<count($row); $i++){
				array_push($semestreArray,$row[$i]);
			}
			fecharConexao();
			return $semestreArray;
		}
		
		function insertEvento(){
			abrirConexao();
			global $mysqli;
			$sql = 'INSERT INTO `evento`(`id`, `nome`, `semestre`) VALUES (null,"'.$this->evento->nome.'","'.$this->evento->semestre.'")';
			$resultado = $mysqli->query($sql);
			fecharConexao();

			return $resultado;
		}
	}
?>