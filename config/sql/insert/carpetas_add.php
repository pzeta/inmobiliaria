<?php 
	session_start();
	require("../../conexion.php");
	define("NO", 0);

	$nombre_carpeta = $_POST['nombre_carpeta'];
	$tipo_carpeta = $_POST['tipo_carpeta'];
	$activa = NO;

	$insert = "INSERT INTO carpeta_propiedades (glosa, tipo, estado)
			VALUES (?,?,?)";

	$st=$mysqli->prepare($insert);
	$st->bind_param("sii", $nombre_carpeta, $tipo_carpeta, $activa);

	if ($st->execute()) {
		echo 1;
	} else {
		echo "Ocurrió un error al ingresar la carpeta.";
	}
	
	$st->close();
	$mysqli->close();
?>