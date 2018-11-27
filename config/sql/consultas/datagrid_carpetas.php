<?php
	session_start();
	require("../../conexion.php");
	$tipo_carpeta = $_GET["tipo_carpeta"];

	$consulta = "SELECT id, glosa as carpeta, IFNULL(ELT(FIELD(tipo, 1, 2, 3, 4, 5, 6),'Eventos','Promociones','Productos', 'Portada', 'Quienes Somos', 'Datos Contacto'), 'Sin categoría') as tipo, tipo as id_tipo, activa FROM carpeta_imagenes where tipo = ? order by id asc";
	$st = $mysqli->prepare($consulta);
	$st->bind_param("i", $tipo_carpeta);
	$st->execute();
	$st->store_result();

	if ($st->num_rows>0) {
		$st->bind_result($id, $carpeta, $tipo, $id_tipo, $activa);

		while ($st->fetch()) {
			$data = array(
                'id' => $id,
                'carpeta' => $carpeta,
                'tipo' => $tipo,
                'id_tipo' => $id_tipo,
                'activa' => $activa
            );
            $filas[] = $data;
		}
        echo '{"data":'.json_encode($filas).'}';
	} else {
        echo '{"data":[]}';
	}

	$st->close();
    $mysqli->close();
?>