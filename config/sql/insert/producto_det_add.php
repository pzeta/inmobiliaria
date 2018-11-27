<?php 
	session_start();
	require("../../conexion.php");

	$id_producto = $_POST["id_producto"];
	$nombre_producto = $_POST["nombre_producto"];
	$descripcion_producto = $_POST["descripcion_producto"];

	$descripcion_producto = nl2br($descripcion_producto);

	$update = "UPDATE carpeta_imagenes_det set nombre_producto = ?, descripcion_producto = ?  where id = ?";

	$st = $mysqli->prepare($update);
	$st->bind_param("ssi", $nombre_producto, $descripcion_producto, $id_producto);

	if ($st->execute()) {
		echo 1;
	} else {
		echo "Ocurrió un error al actualizar el detalle.";
	}
	
	$st->close();
	$mysqli->close();
?>