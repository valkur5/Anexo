<?php
header("Cache-control: no-cache, must-revalidate");
if (isset($_GET['tec1'])) {
	shell_exec("switch.bat 1");
}
if (isset($_GET['tec2'])) {
	shell_exec("switch.bat 2");
}
if (isset($_GET['tec3'])) {
	shell_exec("switch.bat 3");
}
if (isset($_GET['tec4'])) {
	shell_exec("switch.bat 4");
}
?>

<html>

<head>
	<meta http-equiv='Cache-Control' content='no-cache, no-store, must-revalidate'>
	<meta http-equiv='Expires' content='-1'>
	<meta http-equiv='Pragma' content='no-cache'>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link type="text/css" media="screen,projection" rel="stylesheet" href="./src/styles/index.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
	<script src='./public/viewer.js'></script>  

</head>
<div id="titulo" class="section blue lighten-5">
	<h3 class="teal-text text-lighten-2 center-align">WebCam: LPC1769</h3>
</div>

<body class="blue darken-2 animate__animated animate__fadeIn" id="contenido">
	<div class="container section center-align">
	<video autoplay mute playsinline id='video'></video>
	</div>
	<div class="container center-align animate__animated animate__bounceIn" id="loader">Ejecutando... Por favor espere.
	</div>
	</br>


	<div class="center-align">
		<form>
			<input type="submit" value="tec1" name="tec1" class="btn blue lighten-2" />
			<input type="submit" value="tec2" name="tec2" class="btn blue lighten-2" />
			<input type="submit" value="tec3" name="tec3" class="btn blue lighten-2" />
			<input type="submit" value="tec4" name="tec4" class="btn blue lighten-2" />
		</form>
	</div>
	<a id="volver" href="./">
		<button type="button" class="btn waves-effect waves-light" />
		<i class="material-icons left">arrow_back</i>
		Volver
		</button>
	</a>
	<script type="text/javascript" src="./src/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		//Rotador de imágenes
		/*
		var newImage = new Image();
		newImage.src = "./sources/webcam/image.jpg";

		function webCam() {
			if (newImage.complete) {
				document.getElementById("webcam").src = newImage.src;
				newImage.src = "./sources/webcam/image.jpg?" + new Date().getTime();
			}
			setInterval(webCam, 35);
		}*/


		setTimeout(() => {
			document.getElementById("loader").innerHTML = "Todo listo!";
		}, 2000);
		setTimeout(() => {
			document.getElementById("loader").className = "container center-align animate__animated animate__bounceOut";
		}, 2000);
	</script>
</body>

</html>
<style>
	#volver {
		position: absolute;
		left: 20px;
		top: 675px;
	}

	#titulo {
		height: 100px;
	}
</style>