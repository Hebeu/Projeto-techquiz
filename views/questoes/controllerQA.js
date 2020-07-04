$(document).ready(function(){
$('.form-update-qaberta').submit(function(e){
		
		var dat = new FormData(this);
	event.preventDefault();		
		$.ajax({
			url:'../../backend/UpdateQuestaoAberta.php',
			data:dat,
			type:"post",
			//dataType:"json",
			contentType:false,
			processData:false
			})
			.done (function(data){		
				alert("Questao Cadastrada!");	
				//window.location.href = "questoes.php";	
				console.log("deu bom");
				window.location.reload(true);
				console.log(data);
			}).fail (function(data){	
				console.log("deu ruim");
				console.log(data);
			});
			$('.form-update-qaberta').trigger("reset");
	//		window.location.reload(true);
		
	});
});		