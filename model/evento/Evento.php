<?php 
	class Evento{
		public $id;
		public $nome;
		public $semestre;
		
		function __construct($id,$nome,$semestre){
			$this->id = $id;
			$this->nome = $nome;
			$this->semestre = $semestre;
		}
		
		 public function getSemestre(){
			return $this->semestre;
		}
		
	}
?>