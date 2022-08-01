<?php
$resultado='';
$archivo='basic.c';
if (isset($_GET["archivo"])){
    $archivo = $_GET['archivo'];
    if ($_GET['boton']=='Guardar'){
		if($_GET["archivo"]=="basic.c"){
			echo '<script language="javascript">alert("Antes de guardar elija otro nombre de archivo");</script>';
		}
        file_put_contents($archivo,$_GET['texto']);
		file_put_contents("auxiliar.c",$_GET['texto']);
    }
}
$texto=file_get_contents($archivo);
if($_GET['boton']=='Compilar'){
    shell_exec('compilar.bat auxiliar.c');
    $resultado=file_get_contents('resultado.txt');
}
if($_GET['boton']=='Ejecutar'){
    shell_exec('Debug.bat');
}
?>
<html>
	<head><title>PRUEBA</title></head>
<body>
<h1> Prueba de recolección de archivos </h1>
<script>
var newImage = "http://localhost/pruebas/webcam/image.jpg"; 
function updateImage() { 
	if(newImage.complete) { 
		document.getElementById("video").src = "http://localhost/pruebas/webcam/image.jpg";
		//newImage = new Image(); 
		number++; 
	} 
	setTimeout(updateImage, 5); 
}

</script>
<form>
    <Label>Nombre del archivo:</Label>
    <div class="contenedor">
        <div class="titulo">Cámara</div>
        <img src="http://localhost/pruebas/webcam/image.jpg" id="video" align="center" seamless="seamless" scrolling="no" align="center"></img>
    </div>
	<input type="text" name="archivo" value="<?=$archivo?>"/>
    </br>
    <textarea name="texto" style="width: 976px; height: 511px;"><?=$texto?></textarea></br>
    <input type="submit" value="Guardar" name="boton"/>
    <input type="submit" value="Cargar" name="boton"/>
    <input type="submit" value="Compilar" name="boton"/>
	<input type="submit" value="Ejecutar" name="boton"/>
    <text id="salida"><pre><?=$resultado?></pre></text>	
</form>
</body>
</html>
<style type="text/css">
        .contenedor{ 
		position: relative;
		right: 50px; 
		top: 2px;
		width: 640px;
		height: 480px;
		float: right;
		overflow-x: visible;
		}
        .titulo{ font-size: 12pt; font-weight: bold;}
        #video{
            width: 660px;
            min-height: 600px;
			overflow-y : visible;
			overflow-x : visible;
			border: 1px solid #008000;
        }
    </style>