<?php 
	require("../../conexion.php");
	$user = $_POST['usuario'];
	$clave = $_POST['clave'];

	$consulta = "SELECT * from usuarios where usuario = ? and clave = ?";
	$st = $mysqli->prepare($consulta);
	$st->bind_param("ss", $user, $clave);
	$st->execute();
	$st->store_result();

	if ($st->num_rows > 0) {
		session_start();
		$_SESSION['usuario']=$user;
		echo 1;
	} else {
		echo "Usuario o clave inválida";
	}
?>