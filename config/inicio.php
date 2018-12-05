<?php 
	session_start();
    $usuario = $_SESSION['usuario'];
    $nomUsuario = $_SESSION['nomUsuario'];
    if (isset($_SESSION['usuario'])) {
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
    <!-- 	<link href="../css/estilos.css" rel="stylesheet"> -->
      <link href="librerias/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
      <link href="librerias/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="librerias/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
      <link href="librerias/css/responsive.bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
      <div class="container-fliud">   

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>   

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" id="btn_index" onclick="setLink('modificar_index.php')">Adm. Imágenes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo utf8_encode($nomUsuario); ?></a>
                      <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="#">Cambio Clave</a>
                        <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                      </div>
                    </li>
                </ul>
            </div>
        </nav>    

    	<div class="alert alert-success hidden">
            <strong id="alerta_mensaje"></strong>
        </div>
        <div class="alert alert-danger hidden">
            <strong id="alerta_error"></strong>
        </div>    

        <div class="container-fluid">
    		    <div id="contenido" style="background-color: #fff"></div>
    	  </div>
    	   

        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="librerias/js/fileinput.min.js" type="text/javascript"></script>
      	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
    	  <script src="librerias/js/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
        <script src="librerias/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="librerias/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="librerias/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
        <script src="librerias/js/dataTables.responsive.min.js" type="text/javascript"></script>
        <script src="librerias/js/responsive.bootstrap.min.js" type="text/javascript"></script>
        <script src="librerias/js/fnReloadAjax.js" type="text/javascript"></script>
      	<script src="js/inicio.js" type="text/javascript"></script>
    </body>
</html>
<?php 
    } else {
        header('Location: index.php');
    }
?>