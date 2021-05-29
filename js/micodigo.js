$(document).ready(iniciar);

function iniciar() {
    $('#btn_guardar').on('click', guardar_mascota);
    $('.eliminar').off('click').on('click', eliminar_mascota);
    $('.editar').off('click').on('click', editar_mascota);
}

function guardar_mascota() {
    var id = '';
    var nom = $('#nombre').val();
    var edad = $('#edad').val();
    var propietario = $('#propietario').val();
    var nom_prop = $('#propietario option:selected').text();

    var datos_mascota = {"nombre": nom, "edad": edad, "propietario": propietario};

    jQuery.ajax({
		type:"POST",
		data: datos_mascota, //los datos que quiero enviar 
		url:"guardar.php",
		success:function(data){
            var resultado = JSON.parse(data);
            if(resultado.estado == 'ok') {
                var fila = `<tr>
                                <td class="id_mascotas">`+resultado.id+`</td>
                                <td class="td_nombre">`+nom+`</td>
                                <td class="td_edad">`+edad+`</td>
                                <td class="td_cedula">`+propietario+`</td>
                                <td>`+nom_prop+`</td>
                                <td></td>
                                <td><button class="btn btn-success editar" data-toggle="modal" data-target="#actualizarmascota">Editar</button></td>
                                <td><button class="btn btn-danger eliminar">Eliminar</button></td>
                            </tr>`;

                $('#lista_mascotas').prepend(fila);

                $('.eliminar').on('click', eliminar_mascota);
                $('.editar').off('click').on('click', editar_mascota);
            } else {
                alert(resultado.mensaje);
            }
		}
	});

    $('#nombre').val('');
    $('#edad').val('');
    $('#propietario').val('');
}

function eliminar_mascota() {
    Swal.fire({
        title: '¿Estás Seguro de Eliminar?',
        text: 'Al eliminar la mascota, no se podrá recuperar.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if(result.isConfirmed) {
            var id_mas = $(this).parents('tr').find('.id_mascota').text();
            $(this).parents('tr').attr('id', 'por_eliminar');
            var datos_id = {"id_mascota": id_mas};

            $.ajax({
                type: "POST",
                url: "eliminar_mascota.php",
                data: datos_id,
                success: function (response) {
                    var resultado = JSON.parse(response);
                    if(resultado.estado == 'ok') {
                        Swal.fire({title: resultado.mensaje, icon: 'success'});
                        // alert(resultado.mensaje);
                        $('#por_eliminar').remove();
                    } else {
                        alert(resultado.mensaje);
                    }
                }
            });
        }
    });
}

function editar_mascota() {
    var id_mascota = $(this).parents('tr').find('.id_mascota').text();
    var nombre = $(this).parents('tr').find('.td_nombre').text();
    var edad = $(this).parents('tr').find('.td_edad').text();
    var cedula = $(this).parents('tr').find('.td_cedula').text();

    // $('#id_mascotaAct').val(id_mascota);
    $(this).parents('tr').attr('id', 'por_editar');
    $('#nombreAct').val(nombre);
    $('#edadAct').val(edad);
    $('[value='+cedula+']').attr('selected', true);

    // $('#btn_editar').off('click').on('click', actualizar_mascota);
    $('#btn_editar').off('click').on('click', function () {
        actualizar_mascota(id_mascota);
    });
}

function actualizar_mascota(id_mascota) {
    // var id_mascota = $('#id_mascotaAct').val();
    var nuevo_nom = $('#nombreAct').val();
    var nuevo_edad = $('#edadAct').val();
    var nuevo_prop = $('#propietarioAct').val();
    var nuevo_nomprop = $('#propietarioAct').text();

    alert(id_mascota);

    var datos_nuevos = {
        "codigo_mascota": id_mascota,
        "nombre": nuevo_nom,
        "edad": nuevo_edad,
        "id_propietario": nuevo_prop
    };

    $.ajax({
        type: "POST",
        url: "editar_mascota.php",
        data: datos_nuevos,
        success: function (response) {
            var resultado = JSON.parse(response);
            if(resultado.estado == 'ok') {
                Swal.fire({title: resultado.mensaje, icon: 'success'});
                // alert(resultado.mensaje);

                $('#por_editar').find('.id_mascota').text(id_mascota);
                $('#por_editar').find('.td_nombre').text(nuevo_nom);
                $('#por_editar').find('.td_edad').text(nuevo_edad);
                $('#por_editar').find('.td_cedula').text(nuevo_prop);
                $('#por_editar').find('.td_propietario').text(nuevo_nomprop);

                $('#por_editar').attr('id', '');
            } else {
                alert(resultado.mensaje);
            }
        }
    });
    
}