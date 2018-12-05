<?php 
	session_start();
	require("../../conexion.php");
	$tipo_carpeta = $_GET['tipo_carpeta'];
	$id_carpeta = $_GET['id_carpeta'];

    $consulta = "SELECT id,direccion,celular, telefono, call_center, correo FROM contactos WHERE id_carpeta = (SELECT id FROM propiedades WHERE tipo = ? and estado = ?) and estado = ?";

    $st = $mysqli->prepare($consulta);
    $st->bind_param("ii", $tipo_carpeta, $estado, $estado);
    $st->execute();
    $st->store_result();

    if ($st->num_rows > 0) {
        $st->bind_result($id, $direccion,$celular,$telefono,$call_center, $correo);

        while ($st->fetch()) {
            $data = array(
                "id" => $id,
                "direccion" => $direccion,
                "celular" => $celular,
                "telefono" => $telefono,
                "call_center" => $call_center,
                "correo" => $correo
            );
            $filas[]=$data;
        }



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