<?php 
	session_start();
	$id_carpeta = $_POST["id_carpeta"];
	$nombre_carpeta = $_POST["nombre_carpeta"];
	$tipo_carpeta = $_POST["tipo_carpeta"];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="hidden" name="id_carpeta" id="id_carpeta" value="<?php echo $id_carpeta ?>">
	<input type="hidden" name="tipo_carpeta" id="tipo_carpeta" value="<?php echo $tipo_carpeta ?>">
	<input type="hidden" name="id" id="id" value="">
	<h3><?php echo $nombre_carpeta ?></h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12">
			<form class="form-group" id="frm_contacto_det">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<input type="text" name="txt_celular" id="txt_celular" class="form-control" placeholder="Ingresar Celular">
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12">
						<input type="text" name="txt_correo" id="txt_correo" class="form-control" placeholder="Ingresar Correo electrónico">
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<input type="button" class="btn btn-primary form-control" value="Guardar" id="btn_guardar_det" name="btn_guardar_det">
					</div>

					
				</div>
			</form>
		</div>
	</div>

	<div class="alert alert-success hidden" id="alert_pdctos_det_success">
        <strong id="strong_contacto_det_success"></strong>
    </div>
    <div class="alert alert-danger hidden" id="alert_pdctos_det_danger">
        <strong id="strong_contacto_det_danger"></strong>
    </div>
	<script type="text/javascript" src="js/contacto_detalle.js"></script>
</body>
</html>