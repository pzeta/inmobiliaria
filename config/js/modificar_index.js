function validar_form() {
	$("#frm_crear_carpeta").validate({
 		debug: true,
 		errorClass: "my-error-class",
		rules:  {
			txt_nombre_carpeta: {
				required: true
			}
		},
		messages: {
			txt_nombre_carpeta: {
				required: "Ingrese el nombre de la carpeta"
			}
		}
 	});

 	if ($("#frm_crear_carpeta").valid()) {
 		crear_carpeta();
 	}
}

function crear_carpeta() {
	var nombre_carpeta = $("#txt_nombre_carpeta").val();
	var tipo_carpeta = $("#cmb_tipo_carpeta").val();
    var id = $("#oculto_id_carpeta").val();

    if (typeof id !== 'undefined' && id != "") {
        var link = "sql/insert/carpetas_upd.php";
    } else {
        var link = "sql/insert/carpetas_add.php";
    }

	$.ajax({
 		url: link,
 		data: {
            id: id,
 			nombre_carpeta: nombre_carpeta,
 			tipo_carpeta: tipo_carpeta 
 		},
 		type: "POST",
 		success: function(data) {
 			if (data==1) {
            	filtrar_tipo_carpeta(tipo_carpeta);
                if (typeof id !== 'undefined' && id != "") {
                    $("#alerta_mensaje").text("Carpeta actualizada de forma correcta.");
                } else {
                    $("#alerta_mensaje").text("Carpeta ingresada de forma correcta.");
                }
            	$(".alert-success").removeClass("hidden");
            	$("#txt_nombre_carpeta").val("");
                $("#oculto_id_carpeta").val("");
            	window.setTimeout(ocultar_alert,3000,"alert-success");
            } else {
            	$("#alerta_error").text(data);
            	$(".alert-danger").removeClass("hidden");
				window.setTimeout(ocultar_alert,3000,".alert-danger");
            }
 		}
 	});
}

function ocultar_alert() {
	$(".alert-danger" ).addClass("hidden");
	$(".alert-success" ).addClass("hidden");
}

function activar_carpeta(id, tipo_carpeta) {
    $.ajax({
        url: "sql/insert/activar_carpeta.php",
        data: {
            id: id,
            tipo_carpeta: tipo_carpeta 
        },
        type: "POST",
        success: function(data) {
            if (data == 1) {
                filtrar_tipo_carpeta(tipo_carpeta);
                $("#alerta_mensaje").text("Activada con éxito.");
                $(".alert-success").removeClass("hidden");
                window.setTimeout(ocultar_alert,3000,"alert-success");
            } else {
                $("#alerta_error").text(data);
                $(".alert-danger").removeClass("hidden");
                window.setTimeout(ocultar_alert,3000,".alert-danger");
            }
        }
    });
}

function filtrar_tipo_carpeta(tipo_carpeta) {
    $("#grid_carpeta").dataTable().fnReloadAjax("sql/consultas/datagrid_carpetas.php?tipo_carpeta=" + tipo_carpeta);
}

function borrar_carpeta(id_carpeta, tipo_carpeta) {
    if (confirm("Borrar carpeta " + id_carpeta)) {
        $.ajax({
            url: "sql/insert/borrar_carpeta.php",
            data: {
                id_carpeta:id_carpeta,
            },
            type: "POST",
            success: function(data) {
                if (data == 1) {
                    filtrar_tipo_carpeta(tipo_carpeta);
                    $("#alerta_mensaje").text("Carpeta borrada de forma correcta.");
                    $(".alert-success").removeClass("hidden");
                    window.setTimeout(ocultar_alert,3000,"alert-success");
                } else {
                    $("#alerta_error").text(data);
                    $(".alert-danger").removeClass("hidden");
                    window.setTimeout(ocultar_alert,3000,".alert-danger");
                }
            }
        });
    }
}

function cancelar() {
    $("#txt_nombre_carpeta").val("");
    $("#oculto_id_carpeta").val("");
}

$(document).ready(function() {
    var tipo_car =  $("#cmb_tipo_carpeta").val();
	$("#btn_crear_carpeta").click(validar_form);
    $("#btn_cancelar").click(cancelar);
    $("#cmb_tipo_carpeta").on("change", function(tipo_carpeta){
        filtrar_tipo_carpeta($(this).val());
    })

	var grid_carpeta = $('#grid_carpeta').DataTable({
        "responsive": true,
        "ajax": "sql/consultas/datagrid_carpetas.php?tipo_carpeta=" + tipo_car,
        "columns": [
            { "data": "id" },
            { "data": "carpeta" },
            { "data": "tipo" },
            { 
                "data": "id_tipo",
                "render": function(data, type, row)
                {
                    const CONTACTO = 6;
                    var boton_disabled;
                    if (data == CONTACTO) {
                        boton_disabled = "...";
                    } else {
                        boton_disabled = "<button type='button' class='adjuntar btn btn-default' title='Adjuntar Imágenes'><i class='material-icons' style='font-size:25px;color:green'>attach_file</i></button>";
                    }

                    return boton_disabled;
                }
            },
            { "defaultContent": "<button type='button' class='editar btn btn-default' title='Editar Datos Carpeta'><i class='material-icons' style='font-size:25px;color:blue'>update</i></button>" },
            { "defaultContent": "<button type='button' class='eliminar btn btn-default' title='Eliminar Carpeta'><i class='material-icons' style='font-size:25px;color:red'>delete</i></button>"},
            { 
                "data": "id_tipo",
                "render": function(data, type, row)
                {
                    const PRODUCTOS = 3;
                    const QUIENES_SOMOS = 5;
                    const CONTACTO = 6;
                    var boton_disabled;
                    if (data == PRODUCTOS || data == QUIENES_SOMOS || data == CONTACTO) {
                        boton_disabled = "<button type='button' class='descripcion btn btn-default' title='Agregar Descripción a los Productos'><i class='material-icons' style='font-size:25px;'>settings</i></button>";
                    } else {
                        boton_disabled = "...";
                    }

                    return boton_disabled;
                }
            },
            { 
                "data": "activa",
                "render": function(data, type, row)
                {
                    const ACTIVADA = 1;
                    var btn_activar;
                    if (data == ACTIVADA) {
                        btn_activar = "<button type='button' class='activar btn btn-default' title='Activar Carpeta'><i class='material-icons' style='font-size:25px; color:green;'>check_circle</i></button>";
                    } else {
                        btn_activar = "<button type='button' class='activar btn btn-default' title='Activar Carpeta'><i class='material-icons' style='font-size:25px;'>check_circle</i></button>";
                    }

                    return btn_activar;
                }
            }
        ],
        "language": {
        	"decimal": "",
        	"emptyTable": "No hay información",
        	"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        	"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
        	"infoFiltered": "(Filtrado de _MAX_ total entradas)",
	        "infoPostFix": "",
	        "thousands": ",",
	        "lengthMenu": "Mostrar _MENU_ Entradas",
	        "loadingRecords": "Cargando...",
	        "processing": "Procesando...",
	        "search": "Buscar:",
	        "zeroRecords": "Sin resultados encontrados",
	        "paginate": {
	            "first": "Primero",
	            "last": "Ultimo",
	            "next": "Siguiente",
	            "previous": "Anterior"
	        }
        }
    });

    $("#grid_carpeta tbody").on("click", "button.adjuntar", function () {
        var data = grid_carpeta.row( $(this).parents("tr") ).data();

        var id = data['id'];
        var carpeta = data['carpeta'];
        var tipo = data['tipo'];

        $("#prf_subttl_carpeta").text(carpeta + ", " + tipo + ". Máximo 20 imágenes.");
        $("#divContentSubirImg").load(
            "subir_imagenes.php",
            {
                "id_carpeta": id,
                "nombre_carpeta": carpeta,
                "tipo_carpeta": tipo
            }
        );
        $('#dlg_adjuntar_img').modal('show');
    });

    $("#grid_carpeta tbody").on("click", "button.editar", function () {
        var data = grid_carpeta.row( $(this).parents("tr") ).data();
        var id = data['id'];
        var nombre_carpeta = data['carpeta'];

        $("#oculto_id_carpeta").val(id);
        $("#txt_nombre_carpeta").val(nombre_carpeta);
    });

    $("#grid_carpeta tbody").on("click", "button.eliminar", function () {
        var data = grid_carpeta.row( $(this).parents("tr") ).data();
        var id = data['id'];
        var tipo_carpeta = data['id_tipo'];

        borrar_carpeta(id, tipo_carpeta);
    });

    $("#grid_carpeta tbody").on("click", "button.descripcion", function () {
        var data = grid_carpeta.row( $(this).parents("tr") ).data();
        var id = data['id'];
        var carpeta = data['carpeta'];
        var tipo = data['id_tipo'];
        const QUIENES_SOMOS = 5;
        const CONTACTO = 6;

        if (tipo == CONTACTO) {
            $("#divContenedorProductos").load(
                "contacto_detalle.php",
                {
                    "id_carpeta": id,
                    "nombre_carpeta": carpeta,
                    "tipo_carpeta": tipo
                }
            );            
        } else {
            if (tipo == QUIENES_SOMOS) {
                $("#txt_nombre_dialogo").text("Descripción Quienes Somos");
            } else {
                $("#txt_nombre_dialogo").text("Descripción Productos");
            }

            $("#divContenedorProductos").load(
                "productos_detalle.php",
                {
                    "id_carpeta": id,
                    "nombre_carpeta": carpeta,
                    "tipo_carpeta": tipo
                }
            );
        }
        $('#dlg_descripcion_productos').modal('show');
    });

    $("#grid_carpeta tbody").on("click", "button.activar", function () {
        var data = grid_carpeta.row( $(this).parents("tr") ).data();
        var id = data['id'];
        var tipo_carpeta = data['id_tipo'];

        activar_carpeta(id, tipo_carpeta);
    });
});