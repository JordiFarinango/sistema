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