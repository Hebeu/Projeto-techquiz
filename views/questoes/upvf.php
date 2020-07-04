<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="controller.js"></script>
		<?php
			include("../../model/questoes/QuestaoVF.php");
			include("../../model/questoes/QuestaoVFDAO.php");
			include("../../model/conexao.php");
			
			if(isset($_GET['atualiza_vf'])){
				$id = $_GET['atualiza_vf'];
			}
			
			$questaoVFDAO = new QuestaoVFDAO(null,$id);
			$questao = $questaoVFDAO-> buscarQuestaoById();

		?>
	</head>
	<body>
	<form class="form-up-vf" method="post">
		<div>
			<input type = "hidden" id="id-questaovf-up" name="id-questaovf-up" value= "<?php echo $questao->id?>"></input>
		</div>
		<div>
			<input type = "hidden" name="questoes-id-vf-up" value= "<?php echo $questao->questoesID?>"></input>
		</div>

		<div>
			<label class="lb-questoes">Nome:</label>
			<input type="text" name="nm-questaovf-up" id="nm-questao" class = "corpo-questao" value ="<?php echo $questao->nome;?>"placeholder="Insira o nome da questão"></input>
		</div>
		<br>
		<div>
			<label id="lb-questao" class="lb-questoes">Descrição da questão:</label><br>
			<textarea rows="10" cols="40" maxlength="500" id="txt-questao" name="txt-questaovf-up" class="corpo-questao"><?php echo $questao->texto?></textarea>
		</div>
		<div id="vf">
			<br>
			<?php
				function selected($value,$alternativa){
					return $value==$alternativa ? 'selected="selected"':''; 
				}
			?>
			<select id="select-vf-up" name="select-vf-up" class ="select-questao" required>
				<option>Selecione uma opção</option>
				<option value="1"<?php echo selected('1',$questao->alternativaCorreta);?> >VERDADEIRO</option>
				<option value="0"<?php echo selected('0',$questao->alternativaCorreta);?> >FALSO</option>
			</select>
		</div>
		<br>
		<input type="submit" value="atualizar">
	</form>
	</body>
</html>