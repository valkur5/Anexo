<?php

if (isset($_GET['tec1'])){
shell_exec("switch.bat 1");
}
if (isset($_GET['tec2'])){
shell_exec("switch.bat 2");
}
if (isset($_GET['tec3'])){
shell_exec("switch.bat 3");
}
if (isset($_GET['tec4'])){
shell_exec("switch.bat 4");
}
?>
<html>
<div class="container section"><h2 class="teal-text text-lighten-2 center-align">Ejecución</h2></div>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body>
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
</body>
</html>