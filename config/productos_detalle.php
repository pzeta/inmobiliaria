<?php 
	session_start();
	$id_carpeta = $_POST["id_carpeta"];
	$nombre_carpeta = $_POST["nombre_carpeta"];
	$tipo_carpeta = $_POST["tipo_carpeta"];
?>
<!DOCTYPE html>
<html>
<body>
	<input type="hidden" name="id_carpeta" id="id_carpeta" value="<?php echo $id_carpeta; ?>">
	<input type="hidden" name="tipo_carpeta" id="tipo_carpeta" value="<?php echo $tipo_carpeta; ?>">
	<div class="container-fluid">
		<h3><?php echo $nombre_carpeta ?></h3>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<form class="form-group" id="frm_producto_det">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<input type="text" name="txt_nombre_producto" id="txt_nombre_producto" class="form-control" placeholder="Nombre del Producto" disabled>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12">
							<textarea id="txt_descripcion_producto" class="form-control" placeholder="Descripción del Producto" disabled></textarea>
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<input type="button" class="btn btn-primary form-control disabled" value="Guardar" id="btn_guardar_det" name="btn_guardar_det">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12">
							<input type="button" class="btn btn-danger form-control disabled" value="Cancelar" id="btn_cancelar_det" name="btn_cancelar_det">
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="alert alert-success hidden" id="alert_pdctos_det_success">
	        <strong id="strong_pdctos_det_success"></strong>
	    </div>
	    <div class="alert alert-danger hidden" id="alert_pdctos_det_danger">
	        <strong id="strong_pdctos_det_danger"></strong>
	    </div>

        <br>
        <table id="grid_productos_det" class="table table-striped table-bordered nowrap" width="100%">
            <thead>
                <tr>
                    <th width="10%">Identificador</th>
                    <th width="20%">Nombre de la Imagen</th>
                    <th width="15%">Nombre del Producto</th>
                    <th width="45%">Descripción del Producto</th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th width="10%">Identificador</th>
                    <th width="20%">Nombre de la Imagen</th>
                    <th width="15%">Nombre del Producto</th>
                    <th width="45%">Descripción del Producto</th>
                    <th width="10%"></th>
                </tr>
            </tfoot>
        </table> 
    </div>
    <script type="text/javascript" src="js/productos_detalle.js"></script>   
</body>
</html>