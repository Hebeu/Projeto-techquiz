<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="controllerQA.js"></script>
		<?php
			include("../../model/questoes/QuestaoAberta.php");
			include("../../model/questoes/QuestoesDAO.php");
			include("../../model/conexao.php");
			
			if(isset($_GET['atualizar'])){
				$id = $_GET['atualizar'];
			}
			$questaoDAO = new QuestoesDAO(null, $id);
			$questao = $questaoDAO-> buscarQuestaoById();
		?>
	</head>
	<body>
		<h1>Atualizar Questão</h1>
		<form class="form-update-qaberta" method="post">
		
		<div>
			<input type = "hidden" name="id-questao" value= "<?php echo $questao->id?>"></input>
		</div>
		<div>
			<input type = "hidden" name="id-questao-aberta" value= "<?php echo $questao->questoesID?>"></input>
		</div>

		<div>
			<label class="lb-questoes">Nome:</label>
			<input type="text" name="nm-questao-aberta" id="nm-questao" class = "corpo-questao" placeholder="Insira o nome da questão" value="<?php echo $questao->nome;?>"></input>
		</div>
		<br>
		<div>
			<label id="lb-questao" class="lb-questoes">Descrição da questão:</label><br>
			<textarea rows="10" cols="40" maxlength="500" id="txt-questao" name="txt-questao-aberta" class="corpo-questao" ><?php echo $questao->texto;?></textarea>
		</div>
		<div>
			<label id="lb-questao" class="lb-questoes">Rubrica:</label><br>
			<textarea rows="10" cols="40" maxlength="500" id="txt-rubrica" name="txt-rubrica" class="corpo-rubrica"></textarea>
		</div>
		<br>
		<input type="submit" value="atualizar">
		</form>
	</body>
</html>