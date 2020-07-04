<?php
	if(isset($_GET['delete_vf'])){
		$mysqli = new mysqli("localhost","root","","tech");
		
		$id = $_GET['delete_vf'];
		$sql ="DELETE FROM questaovf WHERE Questoes_id = $id";
		$mysqli->query($sql);
		
		$sql = "DELETE FROM questoes WHERE id = $id";
		$mysqli->query($sql);
		$mysqli->close();
		
	}

	class QuestaoVFDAO{

	public $questaoVF;
	public $id;
		function __construct($questaoVF,$id){
			
			$this->questaoVF = $questaoVF;
			$this->id = $id;
		}
		
		private function inserirQuestao(){
			
			global $mysqli;
			
			$sql = 'INSERT INTO questoes(id,nome,texto)VALUES(null,"'.$this->questaoVF->nome.'","'.$this->questaoVF->texto.'")';
			
			$resultado = $mysqli->query($sql);
		
			return $resultado;
		}
		
		public function inserirQuestaoVF(){
			global $mysqli;
			abrirConexao();
			
			$this->inserirQuestao();

			$sql='INSERT INTO questaovf(Questoes_id,alternativa_correta) VALUES (@@IDENTITY,"'.$this->questaoVF->alternativaCorreta.'")';
			
			$resultado = $mysqli->query($sql);
			fecharConexao();
			return $resultado;
		}
		
		public function listarQuestaoVF(){
			global $mysqli;
			abrirConexao();
			
			$sql="SELECT * FROM `questaovf` INNER JOIN questoes ON questoes.id = questaovf.Questoes_id";
			
			$resultado = $mysqli->query($sql);
			$linha = $resultado->fetch_all(MYSQLI_ASSOC);
			$listaVF = array();
			
			for($i=0;$i<count($linha);$i++){
				
				$q = new QuestaoVF($linha[$i]["id"],$linha[$i]["nome"],$linha[$i]["texto"],$linha[$i]["Questoes_id"],$linha[$i]["alternativa_correta"]);
				array_push($listaVF,$q);
			}
			
			fecharConexao();
			return $listaVF;
		}
		
		public function buscarQuestaoById(){
			global $mysqli;
			abrirConexao();
			
			$sql = 'SELECT * FROM `questoes` INNER JOIN questaovf on questoes.id = questaovf.Questoes_id where questoes.id = "'.$this->id.'"';
			$resultado =$mysqli->query($sql);
			$linha = $resultado->fetch_all(MYSQLI_ASSOC);

			print_r(count($this->id));
			//echo $linha[0]["id"];
			$qvf = new QuestaoVF($linha[0]["id"],$linha[0]["nome"],$linha[0]["texto"],$linha[0]["Questoes_id"],$linha[0]["alternativa_correta"]);
			fecharConexao();
			return $qvf;
		}
		public function updateQuestaoVF(){
			global $mysqli;

			abrirConexao();
			$sql = 'UPDATE `questoes` INNER JOIN `questaovf` on questoes.id = questaovf.Questoes_id AND questoes.id = "'.$this->questaoVF->id.'" 
			SET `nome` = "'.$this->questaoVF->nome.'", `texto` = "'.$this->questaoVF->texto.'", `alternativa_correta` ="'.$this->questaoVF->alternativaCorreta.'"';
			$resultado = $mysqli->query($sql);
			fecharConexao();
			return $resultado;
		}
		
		
		
	}
?>