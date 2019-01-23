function ocultar_alert() {
    $(".alert").addClass("hidden");
}

function enviar_correo(nombre, email, mensaje){
    var parametros = {
            "nombre" : nombre,
            "email" : email,
            "mensaje" : mensaje
    };

    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'sql/enviar_contacto.php', //archivo que recibe la peticion
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
                limpiar();
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
            contacto_footer += "<dd><span>Celular:</span><a id='a_celular'>"+a_celular+"</a><span> Telefono:</span><a id='a_telefono'>"+a_telefono+"</a></dd>";
            contacto_footer += "<dd><span>Correo electrónico:</span><a id='a_correo'>"+a_correo+"</a></dd>";
            contacto_footer += "</dl>";
            contacto_footer += "";

            $("#datos_contacto").append(contacto_footer);


            $("#a_direccion").attr("href", 'a_direccion');
            $("#a_celular").attr("href", '#');
            $("#a_telefono").attr("href", '#');
            $("#a_call_center").attr("href", a_call_center);
            $("#a_correo").attr("href", '#');
        }
    });
}

function validar_form() {
    $("#ContactForm").validate({
        debug: true,
        errorClass: "my-error-class",
        rules:  {
            nombre_completo: {
                required: true
            },
            correo_electronico: {
                required: true
            },
            mensaje: {
                required: true
            }
        },
        messages: {
            nombre_completo: {
                required: "Dato es obligatorio"
            },
            correo_electronico: {
                required: "Dato es obligatorio",
            },
            mensaje: {
                required: "Dato es obligatorio",
            }
        }
    });

    if ($("#ContactForm").valid()) {
        var nombre = $("#nombre_completo").val();
        var email = $("#correo_electronico").val();
        var mensaje = $("#mensaje").val();
        if(validateEmail($("#correo_electronico").val())){
            enviar_correo(nombre, email, mensaje);
        } else {
            $("#alerta").text('ingrese email válido');
            $(".alert").removeClass("hidden");
            setTimeout(ocultar_alert, 3000);
        }
    }
}

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if( !emailReg.test( $email ) ) {
        $("#alerta").text('ingrese email válido');
        $(".alert").removeClass("hidden");
        setTimeout(ocultar_alert, 3000);
        return false;
    } else {
        return true;
    }
}

function clearValidation(formElement){
 //Internal $.validator is exposed through $(form).validate()
 var validator = $(formElement).validate();
 //Iterate through named elements inside of the form, and mark them as error free
 $('[name]',formElement).each(function(){
   validator.successList.push(this);//mark as error free
   validator.showErrors();//remove error messages if present
 });
 validator.resetForm();//remove error class on name elements and clear history
 validator.reset();//remove all error and success data
}

function limpiar() {
    $("#ContactForm")[0].reset();
    var myForm = document.getElementById("ContactForm");
    clearValidation(myForm);
}


$(document).ready(function() {
    cargar_contacto();
    $('#correo_electronico').blur('blur', function() {
        /*/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/*/
        if (this.value.length > 0) {
            validateEmail(this.value);
        }
    });
    $("#btn_enviar").click(validar_form);
    $("#btn_limpiar").click(limpiar);
});