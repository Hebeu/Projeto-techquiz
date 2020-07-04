<?php
	class QuestaoMult{
		public $id;
		public $nome;
		public $texto;
		public $questoesId;
		public $lta;
		public $ltb;
		public $ltc;
		public $ltd;
		public $alternativaCorreta;
		
		function __construct($id,$nome,$texto,$questoesId,$lta,$ltb,$ltc,$ltd,$alternativaCorreta){
			$this->id = $id;
			$this->nome= $nome;
			$this->texto= $texto;
			$this->questoesId = $questoesId;
			$this->lta = $lta;
			$this->ltb = $ltb;
			$this->ltc = $ltc;
			$this->ltd = $ltd;
			$this->alternativaCorreta = $alternativaCorreta;
		}
	}
?>