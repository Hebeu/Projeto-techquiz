<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="controller.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="tipoTabela()">
		<a href="cadastrar_questoes.php">Cadastrar questões</a><br>
		<?php 
			include("../../model/conexao.php");
			include("../../model/questoes/QuestoesDAO.php");
			include("../../model/questoes/Questoes.php");
			include("../../model/questoes/QuestaoAberta.php");
			include("../../model/questoes/QuestaoVF.php");
			include("../../model/questoes/QuestaoVFDAO.php");
			include("../../model/questoes/QuestaoMult.php");
			include("../../model/questoes/QuestaoMultDAO.php");
			
			$questoesDAO = new QuestoesDAO(null,null);
			$listaQuestoesAbertas = $questoesDAO->listarQuestoesAbertas();
			
			$questoesVF = new QuestaoVFDAO(null,null);
			$listaQuestoesVF = $questoesVF->listarQuestaoVF();
			
			$questaoMultDAO = new QuestaoMultDAO(null,null);
			$listaQuestoesMult = $questaoMultDAO->listarQuestaoMult();
				
		?>
		<form id="form-tabelas" method="post">
		<br>
		<div>
			<select id="select-tabelas" onchange="tipoTabela()">
				<option id="ta" >Questões Abertas</option>
				<option id="tv">Questões V ou F</option>	
				<option id="tm">Questões Multipla Escolha</option>
			</select>
		</div>
		<br>	
		<div id="abt">
		<h2>Questões Abertas<h2>
			<table class ="tabela-questao">
				<thead>
					<tr>
						<th>nome</th>
						<th>texto</th>
						<th>rubrica</th>
						<th>acao</th>
					</tr>
					<?php 
						foreach($listaQuestoesAbertas as $key=>$questao){
					?>
					<tr>
						<td><?php echo $questao->nome?></td>
						<td><?php echo $questao->texto?></td>
						<td><?php echo $questao->rubrica?></td>
						<td><a href="../../model/questoes/QuestoesDAO.php?delete=<?php echo $questao->id;?>" >Deletar</a>
							<a href="upaberta.php?atualizar=<?php echo $questao->id;?>">Atualizar</a>
						</td>
					</tr>
					<?php }?>
				</thead>
			</table>
			</div>	
		<div id="vf">
			<h2>Questões Verdadeiro ou Falso</h2>
			<table class="tabela-questao">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Texto</th>
						<th>Alternativa</th>
						<th>acao</th>
					</tr>
					<?php foreach($listaQuestoesVF as $key=>$qvf){?>
					<tr>
						<td><?php echo $qvf->nome ?></td>
						<td><?php echo $qvf->texto ?></td>
						<td><?php 
							if($qvf->alternativaCorreta == 1){
								echo "Verdadeiro";
							}else{
								echo "Falso";
							}
						
						?></td>
						<td><a href="../../model/questoes/QuestaoVFDAO.php?delete_vf=<?php echo $qvf->id; ?>">Deletar</a>
							<a href="upvf.php?atualiza_vf=<?php echo $qvf->id; ?>">Atualizar</a>
						</td>
					</tr>
					
					<?php }?>
				</thead>
			</table>
		</div>
		<div id="mult">
			<h2>Questões Multipla Escolha</h2>
			<table class ="tabela-questao">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Texto</th>
						<th>Alternativa  A</th>
						<th>Alternativa  B</th>
						<th>Alternativa  C</th>
						<th>Alternativa  D</th>
						<th>Alternativa Correta</th>
						<th>acao</th>
					</tr>
					<?php foreach($listaQuestoesMult as $key=>$qm){?>
					<tr>
						<th><?php echo $qm->nome ?></th>
						<th><?php echo $qm->texto ?></th>
						<th><?php echo $qm->lta ?></th>
						<th><?php echo $qm->ltb ?></th>
						<th><?php echo $qm->ltc ?></th>
						<th><?php echo $qm->ltd?></th>
						<th>
						<?php 
							if($qm->alternativaCorreta == 1){
								echo "A)"; 
							}else if($qm->alternativaCorreta == 2){
								echo "B)"; 
							}else if($qm->alternativaCorreta == 3){
								echo "C)"; 
							}else if($qm->alternativaCorreta == 4){
								echo "D)"; 
							}
							
						?>
						</th>
						<th><a href="../../model/questoes/QuestaoMultDAO.php?delete=<?php echo $qm->id?>">Deletar</a>
							<a href="upmult.php?atualiza_mult=<?php echo $qm->id?>">Atualizar</a>
						</th>
						
					</tr>
					<?php }?>
				</thead>
			</table>
		</div>
		
	</form>
</body>