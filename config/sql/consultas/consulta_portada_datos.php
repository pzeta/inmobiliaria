 <?php
    require("../../conexion.php");
    define("CONTACTO", 6);
    define("ACTIVADA", 1);

    $tipo_carpeta = CONTACTO;
    $estado = ACTIVADA;

    $consulta = "SELECT id, celular, correo FROM carpeta_imagenes_det WHERE id_carpeta = (SELECT id FROM carpeta_imagenes WHERE tipo = ? and activa = ?)";

    $st = $mysqli->prepare($consulta);
    $st->bind_param("ii", $tipo_carpeta, $estado);
    $st->execute();
    $st->store_result();

    if ($st->num_rows > 0) {
        $st->bind_result($id, $celular, $correo);

        while ($st->fetch()) {
            $data = array(
                "id" => $id,
                "celular" => $celular,
                "correo" => $correo
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