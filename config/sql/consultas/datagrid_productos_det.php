<?php
	session_start();
	require("../../conexion.php");
	$id_carpeta = $_GET['id_carpeta'];

	$consulta="SELECT id, nombre_imagen, nombre_producto, descripcion_producto FROM carpeta_imagenes_det WHERE id_carpeta = ? order by id asc";
	$st = $mysqli->prepare($consulta);
	$st->bind_param("i", $id_carpeta);
	$st->execute();
	$st->store_result();

	if ($st->num_rows>0) {
		$st->bind_result($id, $nombre_imagen, $nombre_producto, $descripcion_producto);

		while ($st->fetch()) {
			$data = array(
                'id' => $id,
                'nombre_imagen' => $nombre_imagen,
                'nombre_producto' => $nombre_producto,
                'descripcion_producto' => $descripcion_producto
            );
            $filas[]=$data;
		}
        echo '{"data":'.json_encode($filas).'}';
	} else {
        echo '{"data":[]}';
	}

	$st->close();
    $mysqli->close();
?>