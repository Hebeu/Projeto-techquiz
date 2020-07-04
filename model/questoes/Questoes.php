<?php 
	class Questoes{
		public $id;
		public $nome;
		public $texto;
		
		function __construct($id,$nome,$texto){
			$this->id = $id;
			$this->nome= $nome;
			$this->texto= $texto;
		}
	}
?>