<?php
	session_start();
	$directory = "imagenes/";      
	$images = glob($directory . "*.*");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- <div  class="body2">
 -->
	<input type="hidden" name="oculto_id_carpeta" id="oculto_id_carpeta">
<!-- 	<div class="col-sm-12">
		<h3>Administrar carpetas de imágenes</h3>
	</div> -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
<!-- 				<form class="form-group" id="frm_crear_carpeta"> -->
				<form id="frm_crear_carpeta">
					<h3>Administrar carpetas de imágenes</h3>
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-12 pad1">
							<input type="text" name="txt_nombre_carpeta" id="txt_nombre_carpeta" class="form-control" placeholder="Nombre de carpeta">
						</div>

						<div class="col-lg-3 col-md-3 col-sm-12 pad1">
							<select class="form-control" id="cmb_tipo_carpeta" name="cmb_tipo_carpeta">
							    <option value="1">Portada</option>
							    <option value="2">Propiedades en Venta</option>
							    <option value="3">Propiedades en Renta</option>
							</select>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12">
							<a href="#" class="button" id="btn_crear_carpeta" name="btn_crear_carpeta" >Guardar</a>
							<a href="#" class="button" id="btn_limpiar" onClick="document.getElementById('ContactForm').reset()">Limpiar</a>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="container-fluid">
            <br>
            <table id="grid_carpeta" class="table table-striped table-bordered nowrap" width="100%">
                <thead>
                    <tr>
                        <th width="12%">Identificador</th>
                        <th width="15%">Nombre de la Carpeta</th>
                        <th width="13%">Tipo de Carpeta</th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th width="12%">Identificador</th>
                        <th width="15%">Nombre de la Carpeta</th>
                        <th width="13%">Tipo de Carpeta</th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                        <th width="12%"></th>
                    </tr>
                </tfoot>
            </table> 
        </div>
	</div>

	<div id="dlg_adjuntar_img" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Subir imágenes a la carpeta: </h4>
		      	</div>
		      	<div class="modal-body">
		        	<p id="prf_subttl_carpeta"></p>
		        	<div id="divContentSubirImg"></div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
		    </div>
		</div>
	</div>

	<div id="dlg_descripcion_productos" class="modal fade" role="dialog">
		<div class="modal-dialog" id="modal_tamaño">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 id="txt_nombre_dialogo" class="modal-title"></h4>
		      	</div>
		      	<div class="modal-body">
		        	<div id="divContenedorProductos"></div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
		    </div>
		</div>
	</div>

	<script type="text/javascript" src="js/modificar_index.js"></script>
<!-- </div> -->
</body>
</html>