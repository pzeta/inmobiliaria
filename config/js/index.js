function ocultar_alert() {
	$(".alert").addClass("hidden");
}

function login() {
	$("#frm_login").validate({
 		debug: true,
 		errorClass: "my-error-class",
		rules:  {
			txt_usuario: {
				required: true
			},
			txt_clave: {
				required: true
			}
		},
		messages: {
			txt_usuario: {
				required: "Campo usuario es obligatorio"
			},
			txt_clave: {
				required: "campo clave es obligatorio",
			}
		}
 	});

 	if ($("#frm_login").valid()) {
 		var usuario=$("#txt_usuario").val();
		var clave=$("#txt_clave").val();

 		$.ajax({
	 		url: "sql/consultas/login.php",
	 		data: {
	 			usuario:usuario,
	 			clave:clave 
	 		},
	 		type: "POST",
	 		success: function(data) {
	 			if (data==1) {
	            	location='inicio.php';
	            } else {
	            	$("#alerta").text(data);
	            	$(".alert").removeClass("hidden");
	            	setTimeout(ocultar_alert, 3000);
	            }
	 		}
	 	});
 	}
}

$(document).ready(function() {
	$("#txt_clave").keypress(function(event) {
		if(event.keyCode==13){
            login();
        }
	});

	$("#btn_login").click(login);
});