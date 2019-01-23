function cargar_portada_propiedades() {
	$.ajax({
 		type: "GET",
 		dataType: "json",
 		url: "config/sql/consultas/consulta_propiedades_portada.php",
 		async: false,
 		success: function(data) {

 			var portada_carousel = "<ol class='carousel-indicators'>";
 			for (var i = 0; i < data.length; i++) {
 				if (i === 0) {
 					portada_carousel += "<li data-target='#carouselPropiedades' data-slide-to='"+i+"' class='active'></li>";
 				} else {
 					portada_carousel += "<li data-target='#carouselPropiedades' data-slide-to='"+i+"'></li>";
 				}
			}
			portada_carousel += "</ol>";

			portada_carousel += "<div class='carousel-inner'>";
			for (var i = 0; i < data.length; i++) {
				if (i === 0) {
					portada_carousel += "<div class='carousel-item active'>";
	                portada_carousel += "	<img class='carousel-img' src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' alt='First slide'>";
	                portada_carousel += "	<div class='carousel-caption d-none d-md-block'>";
	    	  		portada_carousel += "		<h3>"+data[i].detalle+"</h3>";
	    	  		portada_carousel += "		<span>"+data[i].dormitorios+" Dormitorios, "+data[i].banios+" baños, "+data[i].mt2+" mts2&nbsp; &nbsp; &nbsp;Precio:"+data[i].precio+"</span>";			    					
	    	  		portada_carousel += "	</div>";
                    portada_carousel += "</div>";
				} else {
					portada_carousel += "<div class='carousel-item'>";
	                portada_carousel += "	<img class='carousel-img' src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' alt='Second slide'>";
	                portada_carousel += "	<div class='carousel-caption d-none d-md-block'>";
	    	  		portada_carousel += "		<h3>"+data[i].detalle+"</h3>";
/*	    	  		portada_carousel += "		<span>4 Dormitorios, 2 baños, 180 mts2&nbsp; &nbsp; &nbsp;Precio:"+data[i].precio+"</span>";			    					*/
	    	  		portada_carousel += "		<span>"+data[i].dormitorios+" Dormitorios, "+data[i].banios+" baños, "+data[i].mt2+" mts2&nbsp; &nbsp; &nbsp;Precio:"+data[i].precio+"</span>";			    					
	    	  		portada_carousel += "	</div>";
                    portada_carousel += "</div>";
				}
			}
			portada_carousel += "</div>";


			portada_carousel += "<a class='carousel-control-prev' href='#carouselPropiedades' role='button' data-slide='prev'>";
			portada_carousel += "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
			portada_carousel += "<span class='sr-only'>Previous</span>";
			portada_carousel += "</a>";
			portada_carousel += "<a class='carousel-control-next' href='#carouselPropiedades' role='button' data-slide='next'>";
			portada_carousel += "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
			portada_carousel += "<span class='sr-only'>Next</span>";
			portada_carousel += "</a>";
			portada_carousel += "";



/* 		// 	var portada_carousel = "<ol class='carousel-indicators'>";
 		// 	for (var i = 0; i < data.length; i++) {
 		// 		if (i === 0) {
 		// 			portada_carousel += "<li data-target='#miSlide' data-slide-to='" + i + "' ></li>";
 		// 		} else {
 		// 			portada_carousel += "<li data-target='#miSlide' data-slide-to='" + i + "'></li>";
 		// 		}
			// }

			// portada_carousel += "</ol>";
			var portada_carousel = "<div class='carousel-inner'>";

			for (var i = 0; i < data.length; i++) {
				if (i === 0) {
					portada_carousel += "<div class='item active'>";
	                portada_carousel += "<img src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' class='adaptar'>";
                    portada_carousel += "</div>";
				} else {
					portada_carousel += "<div class='item'>";
	                portada_carousel += "<img src='config/imagenes/" + data[i].id_carpeta + "/" + data[i].nombre_imagen + "' class='adaptar'>";
                    portada_carousel += "</div>";
				}
			}

			portada_carousel += "</div>";
*/			$("#carouselPropiedades").append(portada_carousel);
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


			$("#datos_contacto").empty();			
			var contacto_footer="";		
			if(a_call_center!=''){	
 				contacto_footer += "<span class='call'>Call Center: <span id='a_call_center'>"+a_call_center+"</span></span>";
 			}
 			contacto_footer += "<span class='maintitle'><i class='fa fa-map-marker'></i> Ubicación</span>";
 			contacto_footer += "<dl>";
 			contacto_footer += "<dt><span id='a_direccion'>"+a_direccion+"</span></dt>";
 			contacto_footer += "<dd><span>Celular:</span><a id='a_celular'>"+a_celular+"</a> Telefono:</span><a id='a_telefono'>"+a_telefono+"</a></dd>";
 			contacto_footer += "<dd><span>Correo electrónico:</span><a id='a_correo'>"+a_correo+"</a></dd>";
 			contacto_footer += "</dl>";
 			contacto_footer += "";

			$("#datos_contacto").append(contacto_footer);


/*            $("#a_direccion").text(a_direccion);
            $("#a_celular").text(a_celular);
            $("#a_telefono").text(a_telefono);
            $("#a_call_center").text(a_call_center);
            $("#a_correo").text(a_correo);*/

            $("#a_direccion").attr("href", 'contacto.html#');
            $("#a_celular").attr("href", 'contacto.html#');
            $("#a_telefono").attr("href", 'contacto.html#');
            $("#a_call_center").attr("href", 'contacto.html#');
            $("#a_correo").attr("href", 'contacto.html#');
        }
    });
}

function formulario_busqueda(){
	$("#form_busqueda").load(
        "busqueda.html"
        /*,
        { "id": id }*/
    );

}


$(document).ready(function() {
	var elegido_reg;
	var elegido_prov;
	cargar_portada_propiedades();
	cargar_contacto();
	formulario_busqueda();
});

jQuery(window).load(function () {
});