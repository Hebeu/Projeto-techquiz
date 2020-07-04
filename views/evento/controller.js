$(document).ready(function(){
$('.form-evento').submit(function(e){
		
		var dat = new FormData(this);
	event.preventDefault();		
		$.ajax({
			url:'../../backend/CadastroEvento.php',
			data:dat,
			type:"post",
			//dataType:"json",
			contentType:false,
			processData:false
			})
			.done (function(data){		
				alert("Evento Cadastrado!");	
				//window.location.href = "questoes.php";	
				console.log("deu bom");
				window.location.reload(true);
				console.log(data);
			}).fail (function(data){	
				console.log("deu ruim");
				console.log(data);
			});
			$('.form-evento').trigger("reset");
	//		window.location.reload(true);
		
	});
});		