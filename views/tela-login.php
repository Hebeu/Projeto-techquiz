<html>
	<head>
	<?php 
		include("../model/usuario/Gerenciador.php");
		//include("../model/usuario/LoginDAO.php");
		include("../model/conexao.php");
	?>
	</head>
	<body>

		<form name="form-login" action="tela-login2.php" method="POST">
			
			Login: <input type="text" name="lgn" id="lgn" placeholder="Insira seu username."></input><br><br>
			Senha: <input type="password" name="sna" id="sna" placeholder="Insira sua senha."></input><br><br>
			<input type="submit" id="btn-login" value="Entrar"></input>
		</form>
	</body>
</html>
<?php

?>