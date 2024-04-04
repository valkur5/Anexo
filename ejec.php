<?php
header("Cache-control: no-cache, must-revalidate");
if (isset($_GET['tec1'])){
shell_exec("./src/app/switch.bat 1");
}
if (isset($_GET['tec2'])){
shell_exec("./src/app/switch.bat 2");
}
if (isset($_GET['tec3'])){
shell_exec("./src/app/switch.bat 3");
}
if (isset($_GET['tec4'])){
shell_exec("./src/app/switch.bat 4");
}
?>

<html>
<head>
	<meta http-equiv='cache-control'  content='no-cache'>
	<meta http-equiv='expires'  content='0'>
	<meta http-equiv='pragma'  content='no-cache'>
</head>
<div class=" section blue lighten-5"><h2 class="teal-text text-lighten-2 center-align">Ejecución</h2></div>
	<!-- Compiled and minified CSS -->
	<link type="text/css" media="screen,projection" rel="stylesheet" href="./sources/materialize/css/materialize.css">

	<!-- Compiled and minified JavaScript -->
	<script type="text/javascript" src="./sources/materialize/js/materialize.js"></script>
	
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body onload="webCam()" class="blue darken-2">
	<div class="container section center-align">
		<img id="webcam" src="" style="height: 480px; width:640;">
		</img>
	</div>
	<div class="container center-align">
		<form>
	    <input type="submit" value="tec1" name="tec1" class="btn blue lighten-2"/>
	    <input type="submit" value="tec2" name="tec2" class="btn blue lighten-2"/>
		<input type="submit" value="tec3" name="tec3" class="btn blue lighten-2"/>
	    <input type="submit" value="tec4" name="tec4" class="btn blue lighten-2"/>
		</form>
	</div>
	<a href="http://localhost/pruebas">
	<input type="button" value="Volver" id="volver" class="btn blue lighten-2"/>
	</a>
	<script type="text/javascript">
		var newImage = new Image();
		newImage.src= "http://localhost/pruebas/sources/webcam/image0.jpg"
		function webCam(){
		if(newImage.complete){
			document.getElementById("webcam").src= newImage.src;
			newImage.src="http://localhost/pruebas/sources/webcam/image0.jpg?" + new Date().getTime();
		}
		setInterval(webCam, 300);
		}
		
		
	</script>
</body>
</html>