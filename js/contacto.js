function ocultar_alert() {
    $(".alert").addClass("hidden");
}

function enviar_correo(nombre, email, mensaje){
    var parametros = {
            "nombre" : nombre,
            "email" : email,
            "mensaje" : mensaje
    };

    console.log(parametros);

    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'enviar_contacto.php', //archivo que recibe la peticion
            type:  'post', //método de envio
            /*beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },*/
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#nombre_completo").val("");
                $("#correo_electronico").val("");
                $("#mensaje").val("");
               /* alert(response);*/
                    $("#alerta").text(response);
                    $(".alert").removeClass("hidden");
                    setTimeout(ocultar_alert, 3000);
            }
    });
}
$(document).ready(function () {
    $("#btn_enviar").click(function() {
        var nombre = $("#nombre_completo").val();
        var email = $("#correo_electronico").val();
        var mensaje = $("#mensaje").val();

        if (nombre != '' && email != '' && mensaje != '') {
            enviar_correo(nombre, email, mensaje);
        } else {
         /*   alert("Complete todos los campos");*/
                    $("#alerta").text("Complete todos los campos");
                    $(".alert").removeClass("hidden");
                    setTimeout(ocultar_alert, 3000);
        }
    });
});




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

            $("#a_direccion").attr("href", 'a_direccion');
            $("#a_celular").attr("href", '#');
            $("#a_telefono").attr("href", '#');
            $("#a_call_center").attr("href", a_call_center);
            $("#a_correo").attr("href", '#');
        }
    });
}

$(document).ready(function() {
    cargar_contacto();
});