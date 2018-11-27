<?php 
	session_start();
	require("../../conexion.php");
	define("ACTIVADA", 1);
	define("DESACTIVADA", 0);

	$id = $_POST['id'];
	$tipo_carpeta = $_POST['tipo_carpeta'];
	$estado = DESACTIVADA;

	$mysqli->autocommit(false);

	$upd_desactiva = "UPDATE carpeta_imagenes set activa = ? where tipo = ?";

	$st = $mysqli->prepare($upd_desactiva);
	$st->bind_param("ii", $estado, $tipo_carpeta);

	if ($st->execute()) {
		$estado = ACTIVADA;
		$upd_activa_carpeta = "UPDATE carpeta_imagenes set activa = ? where id = ?";

		$st2 = $mysqli->prepare($upd_activa_carpeta);
		$st2->bind_param("ii", $estado, $id);

		if ($st2->execute()) {
			$st2->close();
			$mysqli->commit();
			echo 1;
		} else {
			$st2->close();
			$mysqli->rollback();
			echo "Falló al activar carpeta.";
		}
	} else {
		$mysqli->rollback();
		echo "Falló al activar carpeta.";
	}
	
	$st->close();
	$mysqli->close();
?>