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

function buscar_candidatas(apellidos)
{
var fd = new FormData();
fd.append('valor1', txtn1);
fd.append('valor2', txtn1);
$.ajax({
   type : 'POST',
   url : '../../controlador/candidata/ver_candidatas.php',
   data : fd,
   cache : false,
   contentType : false,
   processData : false
})
.done(function(data){
   $("tabla_candi").html(data);
})
.fail(function()
{
   alert("Error al procesar información");
});
return false;
}