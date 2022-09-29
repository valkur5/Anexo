<?php
$resultado='';
$archivo='basic.c';


if (isset($_GET["archivo"])){
    $archivo = $_GET['archivo'];
    if (isset($_POST['guardar'])){
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