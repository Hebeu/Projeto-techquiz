<?php
	if(isset($_GET['delete'])){
			$mysqli = new mysqli("localhost","root","","tech");
			//abrirConexao();
			//$mysqli;
			//abrirConexao();
			$id = $_GET['delete'];
			$sql ="DELETE FROM questaoaberta WHERE Questoes_id =$id";
			$mysqli->query($sql);
			
			$sql = "DELETE FROM questoes WHERE id = $id";
			$mysqli->query($sql);
			$mysqli->close();
			//fecharConexao();
	}	

	class QuestoesDAO{
	public $questao;
	public $id;
		function __construct($questao,$id){
			$this->questao = $questao;
			$this->id = $id;
		}
		
		private function inserirQuestao(){
			
			global $mysqli;
			
			$sql = 'INSERT INTO questoes(id,nome,texto)VALUES(null,"'.$this->questao->nome.'","'.$this->questao->texto.'")';
			
			$resultado = $mysqli->query($sql);
		
			return $resultado;
		}
		
		public function inserirQuestaoAberta(){
			global $mysqli;
			abrirConexao();
			
			$this->inserirQuestao();

			$sql='INSERT INTO questaoaberta(Questoes_id,rubrica) VALUES (@@IDENTITY,"'.$this->questao->rubrica.'")';
			echo 'inserido com sucesso';
			$resultado = $mysqli->query($sql);
			fecharConexao();
			return $resultado;
		}
		
		public function listarQuestoes(){
			global $mysqli;
			
			abrirConexao();
			
			$sql = 'SELECT *FROM questoes ORDER BY nome';
			$resultado = $mysqli->query($sql);
			$linha = $resultado->fetch_all(MYSQLI_ASSOC);
			$listaDeQuestoes = array();
			
				for($i=0;$i<count($linha);$i++){
					 $q = new Questoes($linha[$i]["id"],$linha[$i]["nome"],$linha[$i]["texto"]);
					 array_push($listaDeQuestoes,$q);
					// array_push(listaDeQuestoes,$linha[i]);
				}
			
			
			fecharConexao();
			return $listaDeQuestoes;
		}
		
		public function listarQuestoesAbertas(){
			global $mysqli;
			
			abrirConexao();
			
			$sql = 'SELECT * FROM `questaoaberta` INNER JOIN questoes on questoes.id = questaoaberta.Questoes_id';
			$resultado = $mysqli->query($sql);
			$linha = $resultado->fetch_all(MYSQLI_ASSOC);
			$listaDeQuestoesAberta = array();

				for($i=0;$i<count($linha);$i++){
					 $qa= new QuestaoAberta($linha[$i]["id"],$linha[$i]["nome"],$linha[$i]["texto"],$linha[$i]["Questoes_id"],$linha[$i]["rubrica"]);
					 
					 array_push($listaDeQuestoesAberta,$qa);
				}
			
			
			fecharConexao();
			
			return $listaDeQuestoesAberta;
		}
		
		public function buscarQuestaoById(){
			global $mysqli;
			abrirConexao();
			//$sql = 'SELECT * FROM `questoes` INNER JOIN questaoaberta on questoes.id = questaoaberta.Questoes_id where questoes.id = "'.$this->questao->id.'"';
			$sql = 'SELECT * FROM `questoes` INNER JOIN questaoaberta on questoes.id = questaoaberta.Questoes_id where questoes.id = "'.$this->id.'"';
			$resultado =$mysqli->query($sql);
			$linha = $resultado->fetch_all(MYSQLI_ASSOC);
			fecharConexao();
			$qa = new QuestaoAberta($linha[0]["id"],$linha[0]["nome"],$linha[0]["texto"],$linha[0]["Questoes_id"],$linha[0]["rubrica"]);
			return $qa;
		}
		
		public function updateQuestaoAberta(){
			global $mysqli;
			abrirConexao();
			$sql = 'UPDATE `questoes` INNER JOIN `questaoaberta` on questoes.id = questaoaberta.Questoes_id AND questoes.id = "'.$this->questao->id.'" 
			SET `nome` = "'.$this->questao->nome.'", `texto` = "'.$this->questao->texto.'", `rubrica` ="'.$this->questao->rubrica.'"';
			$resultado = $mysqli->query($sql);
			fecharConexao();
			return $resultado;
		}
		// public function deletaQuestao(){
			// global $mysqli;
			// abrirConexao();
			// $sql = 'DELETE FROM questao WHERE id = "'.$this->questao->id.'"';
			// $resultado = $mysqli->query($sql);

			// fecharConexao();
			// return $resultado;
		// }



		
	}
		
?>