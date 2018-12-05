<?php
	$mysqli=mysqli_connect('localhost', 'root', '', 'inmobiliariazucasa');
	$server="TESTING";

	$version_sys="4.0";

	if (mysqli_connect_error()) {
		echo 'Conexion Fallida:', mysqli_connect_error();
	}
?>