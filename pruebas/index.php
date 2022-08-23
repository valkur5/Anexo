<?php
// a partir de acá está la parte de php, donde masomenos podés guiarte de cómo se comporta el código según el boton que se presione
$resultado='';
$archivo='basic.c'; //hay un archivo en la librería local de la computadora "host" que se llama basic.c, basicamente es la estructura del código que se tiene que mostrar en el cuadro de edición
//La variable $archivo guarda el nombre del archivo que se quiere crear/guardar/cargar 
if (isset($_GET["archivo"])){
    $archivo = $_GET['archivo'];
    if ($_GET['boton']=='Guardar'){// si se intenta guardar sobre el archivo base, aparecerá la siguiente alerta, exigiendo que se cambie el nombre
		if($_GET["archivo"]=="basic.c"){
			echo '<script language="javascript">alert("Antes de guardar elija otro nombre de archivo");</script>';
		}else {
        		file_put_contents($archivo,$_GET['texto']);
			file_put_contents("auxiliar.c",$_GET['texto']);//Se crea un archivo con el nombre que se escogió y se sobreescribe el archivo auxiliar
		}
    }
$texto=file_get_contents($archivo);//La variable $texto guarda todo el código que se programó, es para cuando se desea cargar un código
if($_GET['boton']=='Compilar'){
    shell_exec('compilar.bat auxiliar.c');//Si se presiona el botón compilar, ejecuta el archivo "compilar.bat" y le pasa el parámetro del archivo a compilar
    $resultado=file_get_contents('resultado.txt');
}
if($_GET['boton']=='Ejecutar'){
    shell_exec('Debug.bat');//Si se presiona el botón ejecutar, se ejecuta este archivo bat que se encarga de mandar el código a la plaqueta
}
?>


<html>
	<head><title>PRUEBA</title></head>
<body>
<h1> Prueba de recolección de archivos </h1>
<script>
	//todo acá se encarga de cargar imagenes de la webcam, una por una de manera rápida, simulando un video
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
