<?php
	class QuestaoVF{
		public $id;
		public $nome;
		public $texto;
		public $questoesId;
		public $alternativaCorreta;
		
		function __construct($id,$nome,$texto,$questoesId,$alternativaCorreta){
			$this->id = $id;
			$this->nome= $nome;
			$this->texto= $texto;
			$this->questoesId = $questoesId;
			$this->alternativaCorreta = $alternativaCorreta;
		}
	}
?>