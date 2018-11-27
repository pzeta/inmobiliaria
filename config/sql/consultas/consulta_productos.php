 <?php
    require("../../conexion.php");
    define("PRODUCTOS", 3);
    define("ACTIVADA", 1);

    $tipo_carpeta = PRODUCTOS;
    $estado = ACTIVADA;

    $consulta = "SELECT 
                    cid.id,
                    cid.id_carpeta,
                    cid.nombre_imagen,
                    cid.nombre_producto,
                    cid.descripcion_producto
                FROM 
                    carpeta_imagenes ci
                    INNER JOIN carpeta_imagenes_det cid on ci.id = cid.id_carpeta
                WHERE 
                    ci.tipo = ? and 
                    ci.activa = ?
                    order by cid.id asc";

    $st = $mysqli->prepare($consulta);
    $st->bind_param("ii", $tipo_carpeta, $estado);
    $st->execute();
    $st->store_result();

    if ($st->num_rows > 0) {
        $st->bind_result($id, $id_carpeta, $nombre_imagen, $nombre_producto, $descripcion_producto);

        while ($st->fetch()) {
            $data = array(
                "id" => $id,
                "id_carpeta" => $id_carpeta,
                "nombre_imagen" => $nombre_imagen,
                "nombre_producto" => $nombre_producto,
                "descripcion_producto" => $descripcion_producto
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