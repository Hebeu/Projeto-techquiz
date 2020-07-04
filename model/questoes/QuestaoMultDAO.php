<?php
	if(isset($_GET['delete'])){
		$mysqli = new mysqli("localhost","root","","tech");
		$id=$_GET['delete'];
		
		$sql= "DELETE FROM questaomultipla WHERE Questoes_id = $id";
		$mysqli->query($sql);
		
		$sql="DELETE FROM questoes WHERE id = $id";
		$mysqli->query($sql);
		
		$mysqli->close();
	}

	class QuestaoMultDAO{
	
	public $questaoMult;
	public $id;
		function __construct($questaoMult,$id){
			$this->id= $id;
			$this->questaoMult = $questaoMult;
		}
		
		private function inserirQuestao(){
			
			global $mysqli;
			
			$sql = 'INSERT INTO questoes(id,nome,texto)VALUES(null,"'.$this->questaoMult->nome.'","'.$this->questaoMult->texto.'")';
			
			$resultado = $mysqli->query($sql);
		
			return $resultado;
			print_r("inserirquestao");
		}
		
		public function inserirQuestaoMult(){
			
			print_r($this->questaoMult->alternativaCorreta);
			global $mysqli;
			abrirConexao();
			
			$this->inserirQuestao();
				
			$sql='INSERT INTO questaomultipla(Questoes_id,alternativa_a,alternativa_b,alternativa_c,alternativa_d,alternativa_correta) 
			VALUES (@@IDENTITY,"'.$this->questaoMult->lta.'","'.$this->questaoMult->ltb.'","'.$this->questaoMult->ltc.'","'.$this->questaoMult->ltd.'",
			"'.$this->questaoMult->alternativaCorreta.'")';
			
			$resultado = $mysqli->query($sql);
			fecharConexao();
			return $resultado;
		}
		
		public function listarQuestaoMult(){
			global $mysqli;
			abrirConexao();
			$sql ="SELECT * FROM `questaomultipla` INNER JOIN questoes on questaomultipla.Questoes_id = questoes.id";
			
			$resultado = $mysqli->query($sql);
			$row = $resultado->fetch_all(MYSQLI_ASSOC);
			$listaQuestoesMult = array();
			
			for($i=0;$i<count($row);$i++){
				$qm = new QuestaoMult($row[$i]["id"],$row[$i]["nome"],$row[$i]["texto"],$row[$i]["Questoes_id"],$row[$i]["alternativa_a"],$row[$i]["alternativa_b"],$row[$i]["alternativa_c"],$row[$i]["alternativa_d"],$row[$i]["alternativa_correta"]);
				//print_r($qm->nome);
				array_push($listaQuestoesMult,$qm);
			}
			fecharConexao();
			return $listaQuestoesMult;
		}
		
		public function buscarQuestaoById(){
			global $mysqli;
			abrirConexao();
			
			$sql = 'SELECT * FROM `questoes` INNER JOIN questaomultipla on questoes.id = questaomultipla.Questoes_id where questoes.id = "'.$this->id.'"';
			$resultado =$mysqli->query($sql);
			$linha = $resultado->fetch_all(MYSQLI_ASSOC);

			print_r(count($this->id));
			//echo $linha[0]["id"];
			$qmt = new QuestaoMult($linha[0]["id"],$linha[0]["nome"],$linha[0]["texto"],$linha[0]["Questoes_id"],$linha[0]["alternativa_a"],
			$linha[0]["alternativa_b"],$linha[0]["alternativa_c"],$linha[0]["alternativa_d"],$linha[0]["alternativa_correta"]);
			fecharConexao();
			return $qmt;
		}
		public function updateQuestaoMult(){
			global $mysqli;
						echo 'update mult entrou';
			abrirConexao();
			$sql = 'UPDATE `questoes` INNER JOIN `questaomultipla` on questoes.id = questaomultipla.Questoes_id AND questoes.id = "'.$this->questaoMult->id.'" 
			SET `nome` = "'.$this->questaoMult->nome.'", `texto` = "'.$this->questaoMult->texto.'",
			`alternativa_a` = "'.$this->questaoMult->lta.'",
			`alternativa_b` ="'.$this->questaoMult->ltb.'",
			`alternativa_c` = "'.$this->questaoMult->ltc.'",
			`alternativa_d` = "'.$this->questaoMult->ltd.'",
			`alternativa_correta` ="'.$this->questaoMult->alternativaCorreta.'"';
			$resultado = $mysqli->query($sql);
			fecharConexao();
			return $resultado;
		}
	}
?>