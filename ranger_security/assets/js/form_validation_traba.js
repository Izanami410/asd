$(document).ready(function(){
  $(function() {
 
 $("form[name='register-form']").validate({   
rules: {
     nombre: "required", 
     apellido: "required", 
      dni: {
        required: true,
        maxlength: 8
      },
  
         correo: {              
             required: true,
             email: true
         },

         telefono: {
        required: true,
        maxlength: 9
      },
 },
     
messages: {
         nombre: "Digitar nombre valido",
         apellido: "Digitar apellido valido",
         dni: "Digitar dni valido",
         correo: "Digitar correo valido",
         telefono: "Digitar telefono valido"
     },
     submitHandler: function(form) {
         form.submit();
     }
 });

  });
})