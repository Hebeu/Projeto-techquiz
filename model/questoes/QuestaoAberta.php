<?php
	class QuestaoAberta{
		public $id;
		public $nome;
		public $texto;
		public $questoesID;
		public $rubrica;
		
		function __construct($id,$nome,$texto,$questoesID,$rubrica){
			$this->id = $id;
			$this->nome= $nome;
			$this->texto= $texto;
			$this->questoesID=$questoesID;
			$this->rubrica=$rubrica;
		}
	}
?>