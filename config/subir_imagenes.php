<?php 
session_start();
$ruta = $_POST['id_carpeta'];
$nombre_carpeta = $_POST['nombre_carpeta'];
$tipo_carpeta = $_POST['tipo_carpeta'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
</head>
<body>
	<input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">
</body>
	<?php 	
	$directory = "imagenes/" . $ruta . "/";
	$images = glob($directory . "*.*");
	?>
	
<script>
	$("#archivos").fileinput({
		uploadUrl: "upload.php?ruta=" + <?php echo $ruta; ?>, 
	    uploadAsync: false,
	    minFileCount: 1,
	    maxFileCount: 20,
		showUpload: false, 
		showRemove: false,
		initialPreview: [
		<?php foreach($images as $image){?>
			"<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
		<?php } ?>],
	    initialPreviewConfig: [<?php foreach($images as $image){ $infoImagenes=explode("/" . $ruta . "/",$image);?>
		{caption: "<?php echo $infoImagenes[1];?>",  height: "120px", url: "borrar.php?ruta=<?php echo $ruta; ?>", key:"<?php echo $infoImagenes[1];?>"},
		<?php } ?>]
	}).on("filebatchselected", function(event, files) {
		$("#archivos").fileinput("upload");
	});
</script>
</html>