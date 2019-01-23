function setLink(ruta) {
	$("#contenido").load(ruta);
}

$(document).ready(function() {
	$("#lnk_cerrar_sesion").click(function() {
		logout();
	});
	$("#btn_index1").click(function() {
		setLink("modificar_index.php");
		$("#link1").addClass("menu_active");
		$("#link2").removeClass("menu_active");	
	});
	$("#btn_index2").click(function() {
		setLink("datos_contacto.php");
		$("#link2").addClass("menu_active");
		$("#link1").removeClass("menu_active");	
	});
});