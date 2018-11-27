<?php 
	session_start();
	require("../../conexion.php");
	define("NO", 0);

	$nombre_carpeta = $_POST['nombre_carpeta'];
	$id = $_POST['id'];

	$update = "UPDATE carpeta_imagenes set glosa = ? where id = ?";

	$st=$mysqli->prepare($update);
	$st->bind_param("si", $nombre_carpeta, $id);

	if ($st->execute()) {
		echo 1;
	} else {
		echo "Ocurrió un error al modificar la carpeta.";
	}
	
	$st->close();
	$mysqli->close();
?>