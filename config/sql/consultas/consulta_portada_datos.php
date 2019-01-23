 <?php
    require("../../conexion.php");
    define("ACTIVADA", 1);

    $estado = ACTIVADA;

    $consulta = "SELECT id,direccion,celular, telefono, call_center, correo FROM contactos WHERE estado = 1 ";

    $st = $mysqli->prepare($consulta);
/*    $st->bind_param("ii", $estado);*/
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
        session_start();
        $_SESSION['contacto']=$data["correo"];
        echo json_encode($filas);
    } else {
        echo '{"data":[]}';
    }

    $st->close();
    $mysqli->close();
?>