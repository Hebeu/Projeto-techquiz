<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="controller.js"></script>
		<?php
			include("../../model/questoes/QuestaoMult.php");
			include("../../model/questoes/QuestaoMultDAO.php");
			include("../../model/conexao.php");
			
			if(isset($_GET['atualiza_mult'])){
				$id = $_GET['atualiza_mult'];
			}
			$questaoDAO = new QuestaoMultDAO(null, $id);
			$questao = $questaoDAO-> buscarQuestaoById();
		?>
	</head>
	<body>
		<h1>Atualizar Questão</h1>
		<form class="form-update-qmult" method="post">	
			<div>
				<input type = "hidden" name="id-questao" value= "<?php echo $questao->id?>"></input>
			</div>
			<div>
				<input type = "hidden" name="id-questao-mult" value= "<?php echo $questao->questoesID?>"></input>
			</div>
			<div>
				<label class="lb-questoes">Nome:</label>
				<input type="text" name="nm-questao-mult" id="nm-questao-mult" class = "corpo-questao" placeholder="Insira o nome da questão" value="<?php echo $questao->nome;?>"></input>
			</div>
			<div>
				<label id="lb-questao" class="lb-questoes">Descrição da questão:</label><br>
				<textarea rows="10" cols="40" maxlength="500" id="txt-questao" name="txt-questaomult-up" class="corpo-questao"><?php echo $questao->texto?></textarea>
			</div>
			<br>
				<div>
					<label id="lb-a" class="lb-questoes">A) </label>
					<input id="ipt-a" name="ipt-a" class="ipt-multipla" size="100px" value="<?php echo $questao->lta;?>"></input>
				</div>
				</br>	
				<div>
					<label id="lb-b" class="lb-questoes">B) </label>
					<input id="ipt-b" name="ipt-b" class="ipt-multipla"size="100px" value="<?php echo $questao->ltb;?>"></input>
				</div>
				</br>
				<div>
					<label id="lb-c" class="lb-questoes">C) </label>
					<input id="ipt-c" name="ipt-c" class="ipt-multipla"size="100px" value="<?php echo $questao->ltc;?>"></input>
				</div>
				</br>
				<div>
					<label id="lb-d" class="lb-questoes">D) </label>
					<input id="ipt-d" name="ipt-d" class="ipt-multipla"size="100px" value="<?php echo $questao->ltd;?>"></input>
				</div>
				</br>
				<br>
				<div>
					<?php function selected($value,$alternativa){
						return $value==$alternativa ? 'selected = "selected"':'';
					}?>

					<label class="lb-questoes">Informe a alternativa verdadeira:</label>
					<select id="select-mult" name="select-mult" required>
						<option>escolha uma letra</option>
						<option value ="1"<?php echo selected('1',$questao->alternativaCorreta);?>>a</option>
						<option value ="2"<?php echo selected('2',$questao->alternativaCorreta);?>>b</option>
						<option value ="3"<?php echo selected('3',$questao->alternativaCorreta);?>>c</option>
						<option value ="4"<?php echo selected('4',$questao->alternativaCorreta);?>>d</option>
					</select>
				</div>			
			<br>
			<br>
			<input type="submit" value="atualizar">
		</form>
	</body>
</html>