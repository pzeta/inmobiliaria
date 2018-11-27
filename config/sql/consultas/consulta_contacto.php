<?php 
	session_start();
	require("../../conexion.php");
	$tipo_carpeta = $_GET['tipo_carpeta'];
	$id_carpeta = $_GET['id_carpeta'];

	$consulta="SELECT id, celular, correo FROM carpeta_imagenes_det WHERE id_carpeta = ?";
	$st = $mysqli->prepare($consulta);
	$st->bind_param("i", $id_carpeta);
	$st->execute();	
	$st->store_result();

	if ($st->num_rows > 0) {
		$st->bind_result($id, $celular, $correo);

		while ($st->fetch()) {
			$data = array(
                'id' => $id,
                'celular' => $celular,
                'correo' => $correo
            );
            $filas[]=$data;
		}
        echo json_encode($filas);
	} else {
        echo '{[]}';
	}

	$st->close();
    $mysqli->close();
?>