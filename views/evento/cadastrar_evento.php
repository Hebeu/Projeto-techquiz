	<html>
	<head>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="controller.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php
			include("../../model/evento/EventoDAO.php");
			include("../../model/evento/Evento.php");
			include("../../model/conexao.php");
			$eventoDAO = new EventoDAO(null);
			$eventos = $eventoDAO->getEventos();
		?>
	</head>
	<body>
			<h1>Tela de eventos</h1>
			<form class="form-evento" method="post">			
				<div>
					<label class="lb-evento">Nome:</label>
					<input type="text" name="nome-evento" id="nm-questao" class = "evento-input" placeholder="Insira o nome do evento"></input>
				</div>
				<br>
				<div>
					<label id="lb-evento" class="lb-evento">Semestre:</label>
					<input  id="semestre-evento" name="semestre-evento" class="evento-input" ></input>
				</div>
				<br>
				<input type="submit" value="cadastrar">
			</form>
			<div>
			<br>
			<h2>Tabela De Eventos</h2>
			<table class ="tabela-questao">
				<thead>
					<tr>
						<th>nome</th>
						<th>semestre</th>
					</tr>
					<?php foreach($eventos as $key=>$evento){?>
					<tr>
						<th><?php echo $evento->nome;?></th>
						<th><?php echo $evento->semestre;?></th>
					</tr>
					<?php }?>
				</thead>
			</table>
			</div>
		</body>
	</html>
<?php
	
?>