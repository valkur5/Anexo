<?php
	file_put_contents("./sources/archivos/auxiliar.c",$_POST["texto"]);
	shell_exec('compilar.bat C:\xampp\htdocs\pruebas\sources\archivos\auxiliar.c');
	$resultado=file_get_contents('.\sources\archivos\resultado.txt');
	echo $resultado
?>