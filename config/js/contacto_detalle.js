function cargar_datos(id_carpeta, tipo_carpeta) {
	$.ajax({
 		type: "GET",
 		dataType: "json",
 		url: "sql/consultas/consulta_contacto.php",
 		data: {
            id_carpeta: id_carpeta,
 			tipo_carpeta: tipo_carpeta
 		},
 		async: false,
 		success: function(data) {
 			var celular = data[0].celular;
 			var correo = data[0].correo;
 			var id = data[0].id;

 			$("#txt_celular").val(celular);
			$("#txt_correo").val(correo);
			$("#id").val(id);
 		}
	});
}

function validar_form() {
	$("#frm_contacto_det").validate({
 		debug: true,
 		errorClass: "my-error-class",
		rules:  {
			txt_celular: {
				required: true
			},
			txt_correo: {
				required: true
			}
		},
		messages: {
			txt_celular: {
				required: "Ingrese número celular"
			},
			txt_correo: {
				required: "Ingrese correo electrónico"
			}
		}
 	});

 	if ($("#frm_contacto_det").valid()) {
 		modificar_datos();
 	}
}

function modificar_datos() {
	var celular = $("#txt_celular").val();
	var correo = $("#txt_correo").val();
	var id = $("#id").val();

	$.ajax({
 		url: "sql/insert/modificar_datos_contacto.php",
 		data: {
            celular: celular,
 			correo: correo,
 			id: id 
 		},
 		type: "POST",
 		success: function(data) {
 			if (data == 1) {
            	$("#strong_contacto_det_success").text("Datos actualizados");
            	$("#alert_pdctos_det_success").removeClass("hidden");
            	window.setTimeout(ocultar_alert,3000,"alert-success");
            } else {
            	$("#strong_contacto_det_danger").text(data);
            	$("#alert_pdctos_det_danger").removeClass("hidden");
				window.setTimeout(ocultar_alert,3000,".alert-danger");
            }
 		}
 	});
}

$(document).ready(function() {
	var id_carpeta = $("#id_carpeta").val();
	var tipo_carpeta = $("#tipo_carpeta").val();
	cargar_datos(id_carpeta, tipo_carpeta);

	$("#btn_guardar_det").click(validar_form);
});