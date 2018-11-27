<?php 
	session_start();
	require("../../conexion.php");
	define("NO", 0);

	$celular = $_POST["celular"];
	$correo = $_POST["correo"];
	$id = $_POST["id"];

	$update = "UPDATE carpeta_imagenes_det set celular = ?, correo = ? where id = ?";

	$st=$mysqli->prepare($update);
	$st->bind_param("ssi", $celular, $correo, $id);

	if ($st->execute()) {
		echo 1;
	} else {
		echo "Ocurrió un error al modificar los datos.";
	}
	
	$st->close();
	$mysqli->close();
?>