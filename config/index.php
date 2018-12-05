<?php 
	session_start();
	if (isset($_SESSION["usuario"])) {
		header('Location: inicio.php');
	} else {
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
  	<link rel="icon" href="../images/favicon.png"/>
  	<title>ZUCASA - Gestión Inmobiliaria</title>
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial_scale=1.0, minimun-scale=1.0">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="css/estilo_config.css" rel="stylesheet">
	<link href="../css/estilos.css" rel="stylesheet">
</head>
<body>
	<br>
	<div class="loginmodal-container">
		<img src="../images/logo_login.png" class="img-rounded" width="100%">
		<span><br></span>
		<form id="form_login" class="form-group">
						<div class="pad1">
                            <h3 class="maintitle"><span><i class="fa fa-user"></i> Iniciar Sesión</span></h3>
							<div  class="wrapper">
								<label for="txt_usuario">Usuario:</label>
								<input type="text" value="" class="form-control" name="user" id="txt_usuario">
							</div>
							<div  class="wrapper">
								<label for="txt_clave">Clave:</label>
								<input type="password" value="" class="form-control" name="pass" id="txt_clave">
							</div>
							<div  class="wrapper">
							<div class="alert alert-danger hidden">
				                <strong id="alerta"></strong>
				            </div>
				        	</div>
							<div  class="wrapper">
								<a href="#" class="button" name="login" id="btn_login" >Enviar</a>
								<a href="#" class="button" id="btn_limpiar" onClick="document.getElementById('form_login').reset()">Limpiar</a>
							</div>	
						</div>				

<!-- 			<h3>Iniciar Sesión</h3>
			<input type="text" name="user" id="txt_usuario" placeholder="Usuario">
			<input type="password" name="pass" id="txt_clave" placeholder="Clave"> -->
<!--			<input type="submit" name="login" class="button" value="Ingresar" id="btn_login"> -->
		</form>
	</div>
	<script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="librerias/js/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
	<script src="js/index.js" type="text/javascript"></script>
</body>
</html>
<?php 
	}
?>