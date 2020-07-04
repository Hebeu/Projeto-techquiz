<?xml version="1.0" encoding="UTF-8"?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="controller.js"></script>
	
	
</head>
<body>
	<form id="form-equipe" name="form-equiper" class="form" method="post">
	<h1>Cadastro de Equipe</h1>
		<div>
		<label class ="lb-form"> Nome:</label >
		<input type ="text" name="nome-equipe" id="nome" placeholder="Insira o nome da equipe" required></input>
		</div>
		<br>
		<div>
		<label class="lb-form">Login:</label>
		<input type="text" id="login" name="login-equipe" placeholder ="Insira um login para a equipe"required></input>
		</div>
		<br>
		<div>
		<label class="lb-form">Senha:</label>
		<input type="password" class="formularios" id="senha" name ="senha-equipe"placeholder="Insira uma senha para a equipe" required autocomplete></input>
		</div>
		<br>
	 <?php 
			include("../model/conexao.php"); 
			include("../model/evento/EventoDAO.php"); 
			 include("../model/evento/Evento.php"); 
			 //$evento = new Evento(1,"techquizz","2020.2");
			
			 $eventoDAO = new EventoDAO(null); 
			 $semestres = $eventoDAO->getEventos();
			
			 //echo json_encode($semestres); 
			 
			 
	 ?>	
		<div>
			<label>Selecione um evento</label>
			<select name="evento" id="evento">
				<?php foreach($semestres as $key=>$evento){
					?>
				 <option> 
				<?php echo $evento->nome," ",$evento->semestre;
					
				 ?>
				 </option>
				<?php }?>
			</select>
		</div>
		<br>
		<input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar">
	</form>
</body>
</html>