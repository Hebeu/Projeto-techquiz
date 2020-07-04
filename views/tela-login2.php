<?php
include("../model/conexao.php");
	include("../model/usuario/LoginDAO.php");
	include("../model/usuario/Gerenciador.php");
	
	$usuario = $_POST['lgn'];
	$senha = $_POST['sna'];
	$gerenciador = new Gerenciador("",$usuario,$senha);
	
	$loginDAO = new LoginDAO($gerenciador);
	$gerenciadorBanco = $loginDAO->buscarGerenciadorByName();
	if($gerenciadorBanco == null){	
		echo '<script>alert("Usuario Não Encontrado");</script>';

		//header("Location: ../views/tela-login.php");
		
	}else{
		if($gerenciador->login==$gerenciadorBanco->login && $gerenciador->senha==$gerenciadorBanco->senha){
			header("Location: ../views/gerenciador.html");
			
		}else{
			echo '<script>alert("Usuario ou senha invalida");</script>';
		}
	}
?>
<html>
	<head>
	</head>
	<body>

		<form name="form-login" method="POST">
			
			Login: <input type="text" name="lgn" id="lgn" placeholder="Insira seu username."></input><br><br>
			Senha: <input type="password" name="sna" id="sna" placeholder="Insira sua senha."></input><br><br>
			<input type="submit" id="btn-login" value="Entrar"></input>
		</form>
	</body>
</html>