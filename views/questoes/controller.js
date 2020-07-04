//@tipo: define se a questão é aberta,vf, ou mult.
var tipo =1;

function tipoQuestao(){
	if(document.getElementById("opt-vf").selected){
			document.getElementById("vf").style.display = "block";
			document.getElementById("mult").style.display ="none";
			document.getElementById("rb").style.display ="none";
			tipo = 2;
	}else if(document.getElementById("opt-mult").selected){
			document.getElementById("mult").style.display="block";
			document.getElementById("vf").style.display ="none";
			document.getElementById("rb").style.display ="none";
			tipo = 3;
	}else{
			document.getElementById("rb").style.display ="block";
			document.getElementById("mult").style.display = "none";
			document.getElementById("vf").style.display="none";
			tipo = 1;
	}
}

function tipoTabela(){
	if(document.getElementById("ta").selected){
		document.getElementById("abt").style.display ="block";
		document.getElementById("vf").style.display="none";
		document.getElementById("mult").style.display="none"
	}else if(document.getElementById("tv").selected){
		document.getElementById("abt").style.display ="none";
		document.getElementById("vf").style.display="block";
		document.getElementById("mult").style.display ="none"
	}else{
		document.getElementById("abt").style.display ="none";
		document.getElementById("vf").style.display="none";
		document.getElementById("mult").style.display="block";
	}

}

function vfSelecionado(){
	var id = $("#id-questaovf-up");	
	$("#select-vf-up").val(id);
}


$(document).ready(function(){

	//this.getElementById("vf").style.display ="none";
	//this.getElementById("mult").style.display ="none";
	
	var vf = $("#select-vf");
	
	var nomeQuestao = $("#nm-questao");
	var txtQuestao = $("#txt-questao");
	
	var a =$("#ipt-a");
	var b =$("#ipt-b");
	var c =$("#ipt-c");
	var d =$("#ipt-d");
	var letraE =$("#ipt-e");
	
	var selectMult = $("#select-mult");
	
	$('.form-update-qmult').submit(function(e){
		
		var daa = new FormData(this);	
		event.preventDefault();
		$.ajax({
			url:'../../backend/UpdateQuestaoMult.php',
			data:daa,
			type:"post",
		//	dataType:"json",
			contentType:false,
			processData:false
			})
			.done(function(data){		
				alert("Questao Cadastrada!");	
			//	window.location.href = "questoes.php";	
				console.log("update aqui");
				window.location.reload(true);
				console.log(data);
			}).fail (function(data){	
				console.log(data);
				console.log("erro");
			});
			$('.form-up-vf').trigger("reset");
	//	window.location.reload(true);
		
	});
	
	$('.form-up-vf').submit(function(e){
		
		var daa = new FormData(this);	
		event.preventDefault();
		$.ajax({
			url:'../../backend/UpdateQuestaoVF.php',
			data:daa,
			type:"post",
		//	dataType:"json",
			contentType:false,
			processData:false
			})
			.done(function(data){		
				alert("Questao Cadastrada!");	
			//	window.location.href = "questoes.php";	
				console.log("update aqui");
				window.location.reload(true);
				console.log(data);
			}).fail (function(data){	
				console.log(data);
				console.log("erro");
			});
			$('.form-up-vf').trigger("reset");
	//	window.location.reload(true);
		
	});
	
	
	$('.form-update-qaberta').submit(function(e){
		
		var dat = new FormData(this);	
		event.preventDefault();
		$.ajax({
			url:'../../backend/UpdateQuestaoAberta.php',
			data:dat,
			type:"post",
			dataType:"json",
			contentType:false,
			processData:false
			})
			.done (function(data){		
				alert("Questao Cadastrada!");	
				//window.location.href = "questoes.php";	
				console.log("deu bom");
				console.log(data);
			}).fail (function(data){	
				console.log("deu ruim");
				console.log(data);
			});
			$('.form-update-qaberta').trigger("reset");
	//		window.location.reload(true);
		
	});
	
	$('.form-questoes').submit(function(e){
		
		var dado = new FormData(this);
		event.preventDefault();
		function ajx(){
			$.ajax({
			url:'../../backend/CadastroQuestoes.php',
			data:dado,
			type:"post",
			//dataType:"json",
			contentType:false,
			processData:false
			})
			.done (function(data){		
				alert("Questao Cadastrada!");			
				console.log(data);
			}).fail (function(data){				
				console.log(data);
			});
			
			$('.form-questoes').trigger("reset");
		}
		
		if(nomeQuestao.val()==""){
			alert("Nomeie a questão")
		}else if(txtQuestao.val()==""){
			alert("Preencha a descrição da questão");
		}
		else{	
			if(tipo==2){
				if(vf.val()=="Selecione uma opção"){
					alert("Defina como VERDADEIRO ou FALSO");
				}else{
					ajx();
					//Impede que o tipo seja resetado na tela
					$("#select-tipo").val(tipo);
				}
			}else if(tipo==3){
				if(a.val()==""){
					alert("Preencha a letra 'A)'");
				}else if(b.val()==""){
					alert("Preencha a letra 'B)'");
				}else if(c.val()==""){
					alert("Preencha a letra 'C)'");
				}else if(d.val()==""){
					alert("Preencha a letra 'D)'");
				}else if(selectMult.val()=="escolha uma letra"){
					alert("Escolha uma das PROPOSIÇÕES como VERDADEIRA");	
				}else{
					ajx();
					
					$("#select-tipo").val(tipo);
				}
			}else{
				ajx();
			}
		}
	});
});