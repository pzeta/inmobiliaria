<?php
	// $mysqli=mysqli_connect("10.8.91.42", "root", "wordpress", "db_finanzas");
	// $server="PRODUCCION";

	$mysqli=mysqli_connect('localhost', 'root', '', 'kingentretenciones');
	$server="TESTING";

	$version_sys="4.0";

	if (mysqli_connect_error()) {
		echo 'Conexion Fallida:', mysqli_connect_error();
	}
?>