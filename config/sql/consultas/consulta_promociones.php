 <?php
    require("../../conexion.php");
    define("PROMOCIONES", 2);
    define("ACTIVADA", 1);

    $tipo_carpeta = PROMOCIONES;
    $estado = ACTIVADA;

    $consulta = "SELECT id, nombre_imagen, id_carpeta FROM carpeta_imagenes_det WHERE id_carpeta = (SELECT id FROM carpeta_imagenes WHERE tipo = ? and activa = ?)";

    $st = $mysqli->prepare($consulta);
    $st->bind_param("ii", $tipo_carpeta, $estado);
    $st->execute();
    $st->store_result();

    if ($st->num_rows > 0) {
        $st->bind_result($id, $nombre_imagen, $id_carpeta);

        while ($st->fetch()) {
            $data = array(
                "id" => $id,
                "nombre_imagen" => $nombre_imagen,
                "id_carpeta" => $id_carpeta
            );
            $filas[]=$data;
        }
        echo json_encode($filas);
    } else {
        echo '{"data":[]}';
    }

    $st->close();
    $mysqli->close();
?>