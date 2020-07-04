//View questoes

var tipo =1;
function tipoQuestao(){
	if(document.getElementById("opt-vf").selected){
			document.getElementById("vf").style.display = "block";
			document.getElementById("mult").style.display ="none";
			tipo = 2;
	}else if(document.getElementById("opt-mult").selected){
			document.getElementById("mult").style.display="block";
			document.getElementById("vf").style.display ="none";
			tipo = 3;
	}else{
			document.getElementById("mult").style.display = "none";
			document.getElementById("vf").style.display="none";
			tipo = 1;
	}
}

$(document).ready(function(){
	
	$('.form').submit(function(e){
		var dado = new FormData(this);
		console.log('test');
		event.preventDefault();
		$.ajax({
		url:'../control/Controller.php',
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
		$('.form').trigger("reset");
	});
});