function cargar_eventos() {
	$.ajax({
 		type: "GET",
 		dataType: "json",
 		url: "config/sql/consultas/consulta_eventos.php",
 		async: false,
 		success: function(data) {
 		// 	var eventos = "<ol class='carousel-indicators'>";
 		// 	for (var i = 0; i < data.length; i++) {
 		// 		if (i === 0) {
 		// 			eventos += "<li data-target='#miSlide' data-slide-to='" + i + "' ></li>";
 		// 		} else {
 		// 			eventos += "<li data-target='#miSlide' data-slide-to='" + i + "'></li>";
 		// 		}
			// }

			// eventos += "</ol>";
			var eventos = "<div class='carousel-inner'>";

			for (var i = 0; i < data.length; i++) {
				if (i === 0) {
					eventos += "<div class='item active'>";
	                eventos += "<img src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' class='adaptar'>";
                    eventos += "</div>";
				} else {
					eventos += "<div class='item'>";
	                eventos += "<img src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' class='adaptar'>";
                    eventos += "</div>";
				}
			}

			eventos += "</div>";
			$("#eventos").append(eventos);
 		}
	});
}

function cargar_promociones() {
	$.ajax({
 		type: "GET",
 		dataType: "json",
 		url: "config/sql/consultas/consulta_promociones.php",
 		async: false,
 		success: function(data) {
 		// 	var promociones = "<ol class='carousel-indicators'>";
 		// 	for (var i = 0; i < data.length; i++) {
 		// 		if (i === 0) {
 		// 			promociones += "<li data-target='#miSlide2' data-slide-to='" + i + "' class='active'></li>";
 		// 		} else {
 		// 			promociones += "<li data-target='#miSlide2' data-slide-to='" + i + "'></li>";
 		// 		}
			// }

			// promociones += "</ol>";
			promociones = "<div class='carousel-inner'>";

			for (var i = 0; i < data.length; i++) {
				if (i === 0) {
					promociones += "<div class='item active'>";
	                promociones += "<img src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' class='adaptar'>";
                    promociones += "</div>";
				} else {
					promociones += "<div class='item'>";
	                promociones += "<img src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' class='adaptar'>";
                    promociones += "</div>";
				}
			}

			promociones += "</div>";
			$("#promociones").append(promociones);
 		}
	});
}

function cargar_portada() {
	$.ajax({
 		type: "GET",
 		dataType: "json",
 		url: "config/sql/consultas/consulta_portada.php",
 		async: false,
 		success: function(data) {
 			console.log("background" + "rgba(0, 0, 0, 0) url('config/" + data[0].id_carpeta + "/" + data[0].nombre_imagen + "') no-repeat scroll center top / cover");

 			var classFullImagen = { 
 				"background-color": "rgba(0, 0, 0, 0)",
 				"background-image": "url('config/imagenes/" + data[0].id_carpeta + "/" + data[0].nombre_imagen + "')",
			    "background-repeat": "no-repeat",
			    "background-position": "center top",
			    "background-size": "cover",
			    "background-attachment": "scroll",
			    "background-attachment": "fixed",
			    "height": "480px",
			    "position": "relative"
 			}

 			$("#imagen_portada").css(classFullImagen);
 		}
	});
}

function cargar_contacto() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "config/sql/consultas/consulta_portada_datos.php",
        async: false,
        success: function(data) {
            var a_direccion = data[0].direccion;
            var a_celular = data[0].celular;
            var a_telefono = data[0].telefono;
            var a_call_center = data[0].call_center;
            var a_correo = data[0].correo;

            $("#a_direccion").text(a_direccion);
            $("#a_celular").text(a_celular);
            $("#a_telefono").text(a_telefono);
            $("#a_call_center").text(a_call_center);
            $("#a_correo").text(a_correo);

            $("#a_direccion").attr("href", 'contacto.html#');
            $("#a_celular").attr("href", 'contacto.html#');
            $("#a_telefono").attr("href", 'contacto.html#');
            $("#a_call_center").attr("href", 'contacto.html#');
            $("#a_correo").attr("href", 'contacto.html#');
        }
    });
}

$(document).ready(function() {
	cargar_portada();
	cargar_eventos();
	cargar_promociones();
	cargar_contacto();
});

jQuery(window).load(function () {
    $('#preloader-container').delay(650).fadeOut('slow');
});