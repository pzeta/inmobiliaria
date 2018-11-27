var id_carpeta = $("#id_carpeta").val();
var tipo_carpeta = $("#tipo_carpeta").val();
var id_producto = null;

function limpiar_data(valor) {
    if (valor == null) {
        return "";
    } else {
        return valor;
    }
}

function guardar_det() {
    $("#frm_producto_det").validate({
        debug: true,
        errorClass: "my-error-class",
        rules:  {
            txt_nombre_producto: {
                required: true
            },
            txt_descripcion_producto: {
                required: true
            }
        },
        messages: {
            txt_nombre_producto: {
                required: "Campo nombre es obligatorio"
            },
            txt_descripcion_producto: {
                required: "campo descripcion es obligatorio",
            }
        }
    });

    if ($("#frm_producto_det").valid()) {
        var nombre_producto = $("#txt_nombre_producto").val();
        var descripcion_producto = $("#txt_descripcion_producto").val();

        $.ajax({
            url: "sql/insert/producto_det_add.php",
            data: {
                id_producto:id_producto,
                nombre_producto:nombre_producto,
                descripcion_producto:descripcion_producto 
            },
            type: "POST",
            success: function(respuesta) {
                const OK = "1";
                if (respuesta == OK) {
                    $("#grid_productos_det").dataTable().fnReloadAjax();
                    $("#strong_pdctos_det_success").text("Detalle del producto fue ingresado con éxito.");
                    $("#alert_pdctos_det_success").removeClass("hidden");
                    $('#frm_producto_det')[0].reset();
                    cancelar_add();
                    window.setTimeout(ocultar_alert,3000,"alert-success");
                } else {
                    $("#strong_pdctos_det_danger").text(data);
                    $("#alert_pdctos_det_danger").removeClass("hidden");
                    window.setTimeout(ocultar_alert,3000,".alert-danger");
                }
            }
        });
    }
}

function cancelar_add() {
    $("#txt_nombre_producto").attr("disabled",true);
    $("#txt_descripcion_producto").attr("disabled",true);
    $("#txt_descripcion_producto").text("");

    $("#btn_guardar_det").addClass("disabled");
    $("#btn_cancelar_det").addClass("disabled");
}

$(document).ready(function() {
    var QUIENES_SOMOS = 5;

    $("#btn_guardar_det").click(guardar_det);
    $("#btn_guardar_det").click(cancelar_add);

    console.log("tipo_carpeta: " + tipo_carpeta);
    if (tipo_carpeta == QUIENES_SOMOS) {

        $("#txt_nombre_producto").attr("placeholder", "Nombre Encargado");
        $("#txt_descripcion_producto").attr("placeholder", "Descripción de la empresa");
    }

	var grid_productos_det = $('#grid_productos_det').DataTable({
		"responsive": true,
        "ajax": "sql/consultas/datagrid_productos_det.php?id_carpeta=" + id_carpeta,
        "columns": [
            { "data": "id" },
            { "data": "nombre_imagen" },
            { "data": "nombre_producto" },
            { "data": "descripcion_producto" },
            { "defaultContent": "<button type='button' class='descripcion btn btn-default' title='Descripción de productos'><i class='material-icons' style='font-size:25px;'>create</i></button>" }
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

	$("#grid_productos_det tbody").on("click", "button.descripcion", function () {
        var data = grid_productos_det.row( $(this).parents("tr") ).data();
        id_producto = data["id"];
        var nombre_producto = data["nombre_producto"];
        var descripcion_producto = data["descripcion_producto"];

        nombre_producto = limpiar_data(nombre_producto);
        descripcion_producto = limpiar_data(descripcion_producto);

        $("#txt_nombre_producto").val(nombre_producto);
        $("#txt_descripcion_producto").text(descripcion_producto);
        $("#txt_nombre_producto").attr("disabled",false);
        $("#txt_descripcion_producto").attr("disabled",false);

        $("#btn_guardar_det").removeClass("disabled");
        $("#btn_cancelar_det").removeClass("disabled");

        $("#txt_nombre_producto").focus();
    });
});