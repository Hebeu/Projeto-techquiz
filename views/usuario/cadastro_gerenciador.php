<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="controller.js"></script>
	
	
</head>
<body>
	<form id="form-gerenciador-cadastro" name="form-gerenciador" class="form-gerenciador" method="post">
	<h1>Cadastro de gerenciador </h1>
		<div>
		<label class="lb-form">Login:</label>
		<input type="text" id="login" name="login-gerenciador" placeholder ="Insira um login para a gerenciador "required></input>
		</div>
		<br>
		<div>
		<label class="lb-form">Senha:</label>
		<input type="password" class="formularios" id="senha" name ="senha-gerenciador"placeholder="Insira uma senha para a gerenciador " required autocomplete></input>
		</div>
		<br>
		<br>
		<input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar">
	</form>
</body>
</html>