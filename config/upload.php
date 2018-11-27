<?php
	session_start();
	$carpeta_nueva = $_GET['ruta'];
	$carpetaAdjunta="imagenes/" . $carpeta_nueva . "/";

	function guardar_imagenes($carpetaAdjunta, $carpeta_nueva) {
		require("conexion.php");
		$mysqli->autocommit(false);

		// Contar envían por el plugin
		$Imagenes =count(isset($_FILES['imagenes']['name'])?$_FILES['imagenes']['name']:0);
		$infoImagenesSubidas = array();
		for($i = 0; $i < $Imagenes; $i++) {
			// El nombre y nombre temporal del archivo que vamos para adjuntar
			$nombreArchivo=isset($_FILES['imagenes']['name'][$i])?$_FILES['imagenes']['name'][$i]:null;
			$nombreTemporal=isset($_FILES['imagenes']['tmp_name'][$i])?$_FILES['imagenes']['tmp_name'][$i]:null;
			
			$rutaArchivo=$carpetaAdjunta.$nombreArchivo;
			
			$consulta = "insert into carpeta_imagenes_det (id_carpeta, nombre_imagen) values (?, ?)";
			$st = $mysqli->prepare($consulta);
			$st->bind_param("is", $carpeta_nueva, $nombreArchivo);
			if ($st->execute()) {
				move_uploaded_file($nombreTemporal,$rutaArchivo);
				$infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","height"=>"120px","url"=>"borrar.php","key"=>$nombreArchivo);
				$ImagenesSubidas[$i]="<img  height='120px'  src='$rutaArchivo' class='file-preview-image'>";
			} else {
				$mysqli->rollback();
				$st->close();
				echo "Falló al insertar registro.";
				exit();
			}
			
			
		}
		
		$mysqli->commit();
		$st->close();
		$mysqli->close();
		$arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,
					 "initialPreview"=>$ImagenesSubidas);
		echo json_encode($arr);	
	}

	if (file_exists($carpetaAdjunta)) {
		guardar_imagenes($carpetaAdjunta, $carpeta_nueva);	
	} else {
		if (!mkdir($carpetaAdjunta, 0777, true)) {
			echo "Fallo al crear las carpetas.";
			exit();
		}

		guardar_imagenes($carpetaAdjunta, $carpeta_nueva);
	}
	
	
?>