function contar(usuario)

{
   var l=0;
   l=usuario.length;
   if(l>10)
      {
         $('#mensaje_usu').html("Usuario máximo 10 carácteres");
      }
      else
      {
         $('#mensaje_usu').html("");
      }
}


function contarp(mensajep)

{
   var l=0;
   l=mensajep.length;
   if(l>10)
      {
         $('#mensaje_cla').html("Clave máximo 10 carácteres");
      }
      else
      {
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


function eliminar(codigo)
{
   $("#codigo").val(codigo);
   var fd = new FormData();
   fd.append('valor', codigo);
   $.ajax({
      type: 'POST',
      url: '../../controlador/candidata/dato_candidata.php',
      data:fd,
      cache:false,
      contentType:false,
      processData:false
   })
   .done(function(data){
      var datos = JSON.parse(data);
      $('#txt_cedula').val(datos.cedula);
      $('#txt_nombre').val(datos.nombre);
      $('#txt_apellido').val(datos.apellido);

   })
   .fail(function()
   {
      alert ("Error al procesar la información.");
   });
   return false;
}


function eliminarjurado(codigo)
{
   $("#codigo").val(codigo);
   var fd = new FormData();
   fd.append('valor', codigo);
   $.ajax({
      type: 'POST',
      url: '../../controlador/jurado/dato_jurado.php',
      data:fd,
      cache:false,
      contentType:false,
      processData:false
   })
   .done(function(data){
      var datos = JSON.parse(data);
      $('#txt_cedula').val(datos.cedula);
      $('#txt_nombre').val(datos.nombre);
      $('#txt_apellido').val(datos.apellido);

   })
   .fail(function()
   {
      alert ("Error al procesar la información.");
   });
   return false;
}

function eliminarnotario(codigo)
{
   $("#codigo").val(codigo);
   var fd = new FormData();
   fd.append('valor', codigo);
   $.ajax({
      type: 'POST',
      url: '../../controlador/notario/dato_notario.php',
      data:fd,
      cache:false,
      contentType:false,
      processData:false
   })
   .done(function(data){
      var datos = JSON.parse(data);
      $('#txt_cedula').val(datos.cedula);
      $('#txt_nombre').val(datos.nombre);
      $('#txt_apellido').val(datos.apellido);

   })
   .fail(function()
   {
      alert ("Error al procesar la información.");
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

/// este es para buscar los parametros en votar_candidataaa.php
function buscar_parametros(parametros) {
   var fd = new FormData();
   fd.append('parametros', parametros);
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

function enviar_notas() {
    var form_data = $("#form_notas").serialize();
    $.ajax({
        type: 'POST',
        url: '../../controlador/jurado/guardar_notas.php',
        data: form_data,
        cache: false,
        success: function(response) {
            alert(response);
        },
        error: function() {
            alert("Error al guardar las notas");
        }
    });
    return false;
}



function buscar_candidatasvotar(apellidos) {
   var fd = new FormData();
   fd.append('valor', apellidos);
   $.ajax({
       type: 'POST',
       url: '../../controlador/jurado/votar_candidatas.php',
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