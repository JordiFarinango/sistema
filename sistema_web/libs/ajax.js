function contar(usuario) {
   var l = usuario.length;
   if (l > 10) {
       $('#mensaje_usu').html("Usuario máximo 10 caracteres");
   } else {
       $('#mensaje_usu').html("");
   }
}

function contarp(mensajep) {
   var l = mensajep.length;
   if (l > 10) {
       $('#mensaje_cla').html("Clave máximo 10 caracteres");
   } else {
       $('#mensaje_cla').html("");
   }
}

function buscar_candidatas(apellidos) {
   var fd = new FormData();
   fd.append('valor', apellidos);
   $.ajax({
       type: 'POST',
       url: '../../controlador/candidata/ver_candidatas.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       $("#tabla_candi").html(data);
   })
   .fail(function() {
       alert("Error al procesar información");
   });
   return false;
}

function buscar_jurados(apellidos) {
   var fd = new FormData();
   fd.append('valor', apellidos);
   $.ajax({
       type: 'POST',
       url: '../../controlador/jurado/ver_jurado.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       $("#tabla_jura").html(data);
   })
   .fail(function() {
       alert("Error al procesar información");
   });
   return false;
}

function buscar_notarios(apellidos) {
   var fd = new FormData();
   fd.append('valor', apellidos);
   $.ajax({
       type: 'POST',
       url: '../../controlador/notario/ver_notario.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       $("#tabla_nota").html(data);
   })
   .fail(function() {
       alert("Error al procesar información");
   });
   return false;
}

function eliminar(codigo) {
   $("#codigo").val(codigo);
   var fd = new FormData();
   fd.append('valor', codigo);
   $.ajax({
       type: 'POST',
       url: '../../controlador/candidata/dato_candidata.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       var datos = JSON.parse(data);
       $('#txt_cedula').val(datos.cedula);
       $('#txt_nombre').val(datos.nombre);
       $('#txt_apellido').val(datos.apellido);
   })
   .fail(function() {
       alert("Error al procesar la información.");
   });
   return false;
}

function eliminarjurado(codigo) {
   $("#codigo").val(codigo);
   var fd = new FormData();
   fd.append('valor', codigo);
   $.ajax({
       type: 'POST',
       url: '../../controlador/jurado/dato_jurado.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       var datos = JSON.parse(data);
       $('#txt_cedula').val(datos.cedula);
       $('#txt_nombre').val(datos.nombre);
       $('#txt_apellido').val(datos.apellido);
   })
   .fail(function() {
       alert("Error al procesar la información.");
   });
   return false;
}

function eliminarnotario(codigo) {
   $("#codigo").val(codigo);
   var fd = new FormData();
   fd.append('valor', codigo);
   $.ajax({
       type: 'POST',
       url: '../../controlador/notario/dato_notario.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       var datos = JSON.parse(data);
       $('#txt_cedula').val(datos.cedula);
       $('#txt_nombre').val(datos.nombre);
       $('#txt_apellido').val(datos.apellido);
   })
   .fail(function() {
       alert("Error al procesar la información.");
   });
   return false;
}

// Candidatas para que el jurado vote
function buscar_candidatasvotar(apellidos) {
   var fd = new FormData();
   fd.append('valor', apellidos);
   $.ajax({
       type: 'POST',
       url: '../../controlador/jurado/ver_candidata_jurado.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       $("#tabla_candire").html(data);
   })
   .fail(function() {
       alert("Error al procesar información");
   });
   return false;
}

// Buscar parámetros en votar_candidataaa.php
function buscar_parametros() {
   var id_candidata = document.getElementById('id_candidata').value;

   var fd = new FormData();
   fd.append('valor', id_candidata);
  
   $.ajax({
       type: 'POST',
       url: '../../controlador/jurado/ver_parametros.php',
       data: fd,
       cache: false,
       contentType: false,
       processData: false
   })
   .done(function(data) {
       $("#tabla_parametros_cuerpo").html(data);
   })
   .fail(function() {
       alert("Error al procesar información");
   });
   return false;
}

function guardar_nota(id_parametro, id_candidata) {
    var notaElement = document.getElementById('nota_' + id_parametro);
    var nota = notaElement ? notaElement.value : '';
 
    if (nota === "" || nota < parseInt(notaElement.min) || nota > parseInt(notaElement.max)) {
        alert("Por favor, ingrese una nota válida entre " + notaElement.min + " y " + notaElement.max);
        return;
    }
 
    var fd = new FormData();
    fd.append('id_parametro', id_parametro);
    fd.append('id_candidata', id_candidata);
    fd.append('nota', nota);
 
    $.ajax({
        type: 'POST',
        url: '../../controlador/jurado/guardar_notas.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            alert(response);
            if (response.includes("exitosamente")) {
                var buttonElement = document.getElementById('btn_guardar_' + id_parametro);
                if (notaElement && buttonElement) {
                    notaElement.disabled = true;
                    buttonElement.disabled = true;
                }
            }
        },
        error: function() {
            alert("Error al guardar la nota");
        }
    });
 }
 

function obtener_calificaciones() {
    $.ajax({
        type: 'POST',
        url: '../../controlador/notario/ver_calificaciones.php',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(data) {
        $("#contenedor_calificaciones").html(data);
    })
    .fail(function() {
        alert("Error al procesar información");
    });

    setInterval(obtener_calificaciones, 5000);

$(document).ready(function() {
    obtener_calificaciones();
});
}



function generarReporteGanadoras() {
    window.location.href = '../../controlador/notario/generar_reporte_ganadoras.php';
}

function descargarReporte() {
    window.location.href = '../../controlador/notario/generar_reporte.php';
}
