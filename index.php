<?php
$texto=file_get_contents('basic.c');
if(isset($_POST['subir'])){
	$dir_subida = './sources/archivos/';
	$fichero_subido = $dir_subida . basename($_FILES['cargar']['name']);
	move_uploaded_file($_FILES['cargar']['tmp_name'],'./sources/archivos/auxiliar.c');
	$texto=file_get_contents('./sources/archivos/auxiliar.c');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link type="text/css" media="screen,projection" rel="stylesheet" href="./src/styles/index.css">
	
	<title>Laboratorio Remoto UNCa</title>

</head>
<body id="contenido" class="animate__animated animate__fadeIn">
<img class="responsive-img" src="./src/assets/fondo.png">
<div class="container row blue">
	<h1 class="col s12 flow-text center-align"> Laboratorio Remoto </h1>
</div>

<form action="" method="post" >
 <!-- Area de programación -->
<div class="container center-align section row">
 	<textarea name="texto" class="col s12" id="editor"><?=$texto?></textarea>
</div>


<!-- Botones de acción -->
<div class="container center-align row">
	<div class="center-align row">
	<button onclick="descargar()" type="button"  name="guardar" class="btn blue lighten-2 ">
		<i class="material-icons left">file_download</i>
		Descargar código
	</button>

	<button id="compilar" type="button" name="compilar" class="btn blue lighten-2">
		<i class="material-icons left">assignment_turned_in</i>
		Compilar
	</button>

	<a href="./ejec.php" id="ejecutar" class="btn waves-effect waves-light">Ejecutar</a>
	</div>
</div>
</form>
	<div class="hide" id="compilando">
		<div class="indeterminate"></div>
	</div>
<form action="" enctype="multipart/form-data" method="POST" class="container section center-align">
    	<label for="fu" class="cfu btn blue lighten-2 center-align">Seleccionar código</label>
		<input id="fu" type="file" name="cargar" class="btn blue lighten-2">
		<button type="submit" value="Cargar Archivo" name="subir" class="btn blue lighten-2">
			<i class="material-icons left">file_upload</i>
			subir
		</button>	
</form>

<div id="resul"class="hide">
	<textarea id="resultado" class="col s12" readonly></textarea>
</div>


<!-- Compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./src/components/code/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="./src/components/FileSaver/src/FileSaver.js"></script>
<script type="text/javascript" src="./src/jquery-3.6.1.min.js"></script>
<script>

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/c_cpp");
	editor.setFontSize('14px');

	function descargar(){
		var code = editor.getValue();
		var blob = new Blob([code], {type: "text/plain;charset=utf-8"});
		saveAs(blob,"codigo.c");
	}
	$('#compilar').click(function(){
		var code = editor.getValue();
		var ruta ="texto=" + code;
		document.getElementById("compilando").className="progress center-align container";
		$.ajax({
			url:'./Compilar.php',
			type: 'POST',
			data: ruta,
		})
		.done(function(res){
			document.getElementById("resultado").innerHTML=res;
			document.getElementById("resul").className="container row animate__animated animate__fadeInUp";
			document.getElementById("compilando").className="hide";
			window.scrollTo(0, document.body.scrollHeight);
		})
		.fail(function(){
			console.log("error");
		})
		.always(function(){
			console.log("complete");
		})
	});
	$("#ejecutar").click(function(){
		$.ajax({
			url:'./Debugging.php',
			type: 'POST',
		})
		.done(function(){
			console.log("todo correcto");
		})
		.fail(function(){
			console.log("error");
		})
		.always(function(){
			console.log("complete");
		})
	})
</script>
</body>
</html>
