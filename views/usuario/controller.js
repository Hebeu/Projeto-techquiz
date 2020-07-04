$(document).ready(function(){
	
	$('.form-gerenciador').submit(function(e){
		var dado = new FormData(this);
		console.log('test');
		event.preventDefault();
		$.ajax({
		url:'../../backend/CadastroGerenciador.php',
		data:dado,
		type:"post",
		//dataType:"json",
		contentType:false,
		processData:false
		})
		.done (function(data){		
			alert("Usuário cadastrado!");			
			console.log(data);
		}).fail (function(data){				
			console.log(data);
		});
		$('.form-gerenciador').trigger("reset");
	});
});