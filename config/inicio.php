<?php 
	session_start();
    $usuario = $_SESSION['usuario'];
    if (isset($_SESSION['usuario'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio KingEntretenciones</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">
  <link href="librerias/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="librerias/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="librerias/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="librerias/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
      			<a class="navbar-brand" href="#">King - Entretenciones</a>
    		</div>

	    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li class="active"><a href="#" id="btn_index" onclick="setLink('modificar_index.php')">Adm. Imágenes</a></li>
      			</ul>
      		
      			<ul class="nav navbar-nav navbar-right">
        			<li class="dropdown">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $usuario; ?><span class="caret"></span></a>
          				<ul class="dropdown-menu">
            				<li><a href="#">Clave</a></li>
            				<li role="separator" class="divider"></li>
            				<li><a href="logout.php">Cerrar sesión</a></li>
          				</ul>
        			</li>
      			</ul>
    		</div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
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