<?php 
	require("../../conexion.php");
	$user = $_POST['usuario'];
	$clave = $_POST['clave'];

	$consulta = "SELECT usuario,nombre_usuario from usuarios where usuario = ? and clave = ?";
	$st = $mysqli->prepare($consulta);
	$st->bind_param("ss", $user, $clave);
	$st->execute();
	$st->store_result();
	echo $st->store_result();

	if ($st->num_rows > 0) {
		$st->bind_result($usuario, $nombre_usuario);
		while ($st->fetch()) {
			$data = array(
                'usuario' => $usuario,
                'nombre_usuario' => $nombre_usuario
            );
		}
		session_start();
		$_SESSION['usuario']=$user;
		$_SESSION['nomUsuario']=$data["nombre_usuario"];
		echo 1;
	} else {
		echo "Usuario o clave inválida";
	}
?>