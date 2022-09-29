<?php
$resultado='';
$archivo='basic.c';
$texto=file_get_contents($archivo);


if (isset($_GET["archivo"])){
    $archivo = $_GET['archivo'];
    if (isset($_GET['guardar'])){
		if($_GET["archivo"]=="basic.c"){
			echo '<script language="javascript">alert("Antes de guardar elija otro nombre de archivo");</script>';
		}else{	
    		file_put_contents($archivo,$_GET['texto']);
			file_put_contents("auxiliar.c",$_GET['texto']);
		}
    }
}
$texto=file_get_contents($archivo);

if(isset($_GET['cargar'])){
	$archivo=$_GET["archivo"];
	$texto=file_get_contents($archivo);
}
if(isset($_GET['compilar'])){
    shell_exec('compilar.bat auxiliar.c');
    $resultado=file_get_contents('resultado.txt');
}
if(isset($_GET['ejecutar'])){
    shell_exec('Debug.bat');
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
	<link type="text/css" media="screen,projection" rel="stylesheet" href="./sources/materialize/css/materialize.css">
	

	<div class="container section">
		<title>Laboratorio Remoto UNCa</title>
	</div>
</head>
<body class="blue darken-2">
<img class="responsive-img" src="./sources/fondo.png">
<div class="container row">
	<h1 class="col s12 flow-text center-align"> Laboratorio Remoto </h1>
</div>

<form action="" method="get" >
<!-- panel de selección de archivo--> 
<div class="input-field row section center-align blue lighten-5">
    <div class="input-field col s6 offset-s3">
		<input class="validate" type="text" name="archivo" id="ArchName" value="<?=$archivo?>"/>
		<Label for="ArchName" style="font-size:20px;">Nombre del archivo:</Label>
	</div>
</div>

 <!-- Area de programación -->
<div class="container center-align section row">
 	<pre name="texto" class="col s12" id="editor"><?=$texto?></pre>
</div>

<!-- Botones de acción -->
<div class="container center-align row">
	<div class="center-align row">
	<input type="submit" value="Guardar" name="guardar" class="btn blue lighten-2 "></input>
    <input type="submit" value="Cargar" name="cargar" class="btn blue lighten-2"></input>
    <input type="submit" value="Compilar" name="compilar" class="btn blue lighten-2"></input>
	<input type="submit" value="Ejecutar" name="ejecutar" class="btn blue lighten-2"></input>
	</div>
</div>
<a href="http://localhost/pruebas/ejec.php" class="btn waves-effect waves-light">Ver</a>
<div class="container row"><pre class="col s12 m7"><?=$resultado?></pre></div>
</form>
<!-- Compiled and minified JavaScript -->
<script type="text/javascript" src="./sources/materialize/js/materialize.js"></script>
<script src="sources/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/c_cpp");
</script>
</body>
</html>
<style type="text/css" media="screen"></style>