<?php
	session_start();
	require("../../conexion.php");
	$id_carpeta = $_POST['id_carpeta'];

	$delete = "DELETE FROM carpeta_imagenes WHERE id = ?";

	// echo $delete;
	$st = $mysqli->prepare($delete);
	$st->bind_param("i", $id_carpeta);

	if ($st->execute()) {
		if (is_dir("../../imagenes/" . $id_carpeta)) {
		    rmDir_rf("../../imagenes/" . $id_carpeta);
		    echo 1;
		} else {
			echo 1;
		}
	} else {
	 	echo "Falló al eliminar carpeta";
	}

	function rmDir_rf($carpeta) {
      	foreach(glob($carpeta . "/*") as $archivos_carpeta){             
        	unlink($archivos_carpeta);
      	}
      	
      	rmdir($carpeta);
    }

	$st->close();
	$mysqli->close();
?>