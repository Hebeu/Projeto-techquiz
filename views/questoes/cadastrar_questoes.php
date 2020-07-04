<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="controller.js"></script>
	
</head>
<body onload="tipoQuestao()">
	<h1>Cadastrar Questão</h1>
	<form class="form-questoes" method="post">
		
		<div>
			<label id="lb-tipo" class="lb-questoes">Selecione um tipo de questao:</label>
			<select id="select-tipo" name="select-tipo" onchange="tipoQuestao()">
				<option id="opt-abt" value="1">Aberta</option>
				<option id="opt-vf" value="2">Verdadeiro ou falso</option>
				<option id="opt-mult" value="3">Multipla Escolha</option>
				
			</select>
		</div>
		<br>
		<div>
			<label class="lb-questoes">Nome:</label>
			<input type="text" name="nm-questao" id="nm-questao" class = "corpo-questao" placeholder="Insira o nome da questão"></input>
		</div>
		<br>
		<div>
			<label id="lb-questao" class="lb-questoes">Descrição da questão:</label><br>
			<textarea rows="10" cols="40" maxlength="500" id="txt-questao" name="txt-questao" class="corpo-questao"></textarea>
		</div>
		<div id="rb">
			<label id="lb-questao" class="lb-questoes">Rubrica:</label><br>
			<textarea rows="10" cols="40" maxlength="500" id="txt-rubrica" name="txt-rubrica" class="corpo-rubrica"></textarea>
		</div>
		<div id="vf">
			<br>
			<select id="select-vf" name="select-vf" class ="select-questao" required>
				<option>Selecione uma opção</option>
				<option value="1">VERDADEIRO</option>
				<option value="0">FALSO</option>
			</select>
		</div>
		<div id="mult">
		<br>
				<div>
					<label id="lb-a" class="lb-questoes">A) </label>
					<input id="ipt-a" name="ipt-a" class="ipt-multipla" size="100px"></input>
				</div>
				</br>	
				<div>
					<label id="lb-b" class="lb-questoes">B) </label>
					<input id="ipt-b" name="ipt-b" class="ipt-multipla"size="100px"></input>
				</div>
				</br>
				<div>
					<label id="lb-c" class="lb-questoes">C) </label>
					<input id="ipt-c" name="ipt-c" class="ipt-multipla"size="100px"></input>
				</div>
				</br>
				<div>
					<label id="lb-d" class="lb-questoes">D) </label>
					<input id="ipt-d" name="ipt-d" class="ipt-multipla"size="100px"></input>
				</div>
				</br>
				<br>
				<div>
					<label class="lb-questoes">Informe a alternativa verdadeira:</label>
					<select id="select-mult" name="select-mult">
						<option>escolha uma letra</option>
						<option value ="1">a</option>
						<option value ="2">b</option>
						<option value ="3">c</option>
						<option value ="4">d</option>
					</select>
				</div>
		</div>
		<br>
		<input type="submit" id="sbt-questos" value="cadastrar">
	</form>
<body/>
</html>