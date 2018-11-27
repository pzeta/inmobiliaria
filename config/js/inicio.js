function setLink(ruta) {
	$("#contenido").load(ruta);
}

$(document).ready(function() {
	$("#lnk_cerrar_sesion").click(function() {
		logout();
	});
});