<?php 
	session_start();
	if (isset($_SESSION["usuario"])) {
		header('Location: inicio.php');
	} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema KingEntretenciones</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">
</head>
<body>
	<br>
	<div class="loginmodal-container">
		<img src="../images/user-image.png" class="img-rounded" width="100%">
		<h1>Iniciar Sesión</h1><br>
		<form id="frm_login" class="form-group">
			<input type="text" name="user" id="txt_usuario" placeholder="Usuario">
			<input type="password" name="pass" id="txt_clave" placeholder="Clave">
			<div class="alert hidden">
                <strong id="alerta"></strong>
            </div>
			<input type="submit" name="login" class="login loginmodal-submit" value="Iniciar Sesión" id="btn_login">
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