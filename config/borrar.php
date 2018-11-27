<?php
	session_start();
	require("conexion.php");
	$carpeta_nueva = $_GET['ruta']."/";
	$id_carpeta = $_GET['ruta'];
	$carpetaAdjunta="imagenes/";
	$estructura = $carpetaAdjunta.$carpeta_nueva;

	if($_SERVER['REQUEST_METHOD']=="DELETE"){
		parse_str(file_get_contents("php://input"),$datosDELETE);
		$key = $datosDELETE['key'];

		$delete = "DELETE FROM carpeta_imagenes_det WHERE id = (
				    SELECT * FROM (
				        SELECT id FROM carpeta_imagenes_det WHERE nombre_imagen = ? AND id_carpeta = ?
				    ) as id 
				)";

		// echo $delete;
		$st = $mysqli->prepare($delete);
		$st->bind_param("si", $key, $id_carpeta);

		if ($st->execute()) {
			if (unlink($estructura.$key)) {
				echo 0;
			} else {
				echo "Falló al eliminar imagen";
			}
		} else {
			echo "Falló al eliminar el registro";
		}
	}
?>