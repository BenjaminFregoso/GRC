

function editar(id){


var params = {
    "method" : "detalles",
    "codigo" : id,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/configuracion/classes/lib_usuario.php',
    type:  'post',
    success: function(response) {
      //console.log(response);
      $('#div_principal').html('');
      $('#div_principal').html(response);

      $("#cambiar_pass_form").change( function(){
        if($("#cambiar_pass_form").is(':checked')){
          $("#pass_form").prop("readonly", false);
        } else{
          $("#pass_form").prop("readonly", true);
        } 
      });

    },
    error: function(response) {
      alert('Algo anda mal!!! en el search');
    }
  });

  
}

function nuevo(id){


  var params = {
      "method" : "nuevo",
      "incluir" : "../../../conexion.php",
    };
   //console.log(params);
    $.ajax({
      data:  params,
      url:  '/views/configuracion/classes/lib_usuario.php',
      type:  'post',
      success: function(response) {
        //console.log(response);
        $('#div_principal').html('');
        $('#div_principal').html(response);
  
      },
      error: function(response) {
        alert('Algo anda mal!!! en el search');
      }
    });
  }

function eliminar_control(){
  var codigo = $("#codigo_form").val();

  var params = {
    "method" : "eliminar_control",
    "codigo" : codigo,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/configuracion/classes/lib_usuario.php',
    type:  'post',
    success: function(response) {
      location.reload();
    },
    error: function(response) {
      alert('Algo anda mal!!! en el search');
    }
  });
}

function guardar_edicion(){
  var codigo = $("#codigo_form").val();
  var estado_form= $("#estado_form").val();
  var ciudad_form= $("#ciudad_form").val();
  var colonia_form= $("#colonia_form").val();
  var exterior_form= $("#exterior_form").val();
  var interior_form= $("#interior_form").val();
  var calle_form= $("#calle_form").val();
  var fecha_form= $("#fecha_form").val();
  var celular_form= $("#celular_form").val();
  var correo_form= $("#correo_form").val();
  var pass_form= $("#pass_form").val();
  var usuario_form= $("#usuario_form").val();
  var nombre_form= $("#nombre_form").val();

  
if ($('#cambiar_pass_form').is(":checked"))
{
  var guardar_pass = 1;
}else{
  var guardar_pass = 0;
}

  var params = {
    "method" : "guardar_edicion",
    "codigo" : codigo,
    "guardar_pass" : guardar_pass,
    "estado_form" : estado_form,
    "ciudad_form" : ciudad_form,
    "colonia_form" : colonia_form,
    "exterior_form" : exterior_form,
    "interior_form" : interior_form,
    "calle_form" : calle_form,
    "fecha_form" : fecha_form,
    "celular_form" : celular_form,
    "correo_form" : correo_form,
    "pass_form" : pass_form,
    "usuario_form" : usuario_form,
    "nombre_form" : nombre_form,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/configuracion/classes/lib_usuario.php',
    type:  'post',
    success: function(response) {
    location.reload();
    },
    error: function(response) {
      alert('Algo anda mal!!! en el search');
    }
  });
}

function guardar_nuevo(){
  var codigo = $("#codigo_form").val();
  var estado_form= $("#estado_form").val();
  var ciudad_form= $("#ciudad_form").val();
  var colonia_form= $("#colonia_form").val();
  var exterior_form= $("#exterior_form").val();
  var interior_form= $("#interior_form").val();
  var calle_form= $("#calle_form").val();
  var fecha_form= $("#fecha_form").val();
  var celular_form= $("#celular_form").val();
  var correo_form= $("#correo_form").val();
  var pass_form= $("#pass_form").val();
  var usuario_form= $("#usuario_form").val();
  var nombre_form= $("#nombre_form").val();
  

  var params = {
    "method" : "guardar_nuevo",
    "codigo" : codigo,
    "estado_form" : estado_form,
    "ciudad_form" : ciudad_form,
    "colonia_form" : colonia_form,
    "exterior_form" : exterior_form,
    "interior_form" : interior_form,
    "calle_form" : calle_form,
    "fecha_form" : fecha_form,
    "celular_form" : celular_form,
    "correo_form" : correo_form,
    "pass_form" : pass_form,
    "usuario_form" : usuario_form,
    "nombre_form" : nombre_form,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/configuracion/classes/lib_usuario.php',
    type:  'post',
    success: function(response) {
      //alert(response);
      location.reload();
    },
    error: function(response) {
      alert('Algo anda mal!!! en el search');
    }
  });
}

$('#buscar_codigo').keyup(function() {
    var dato = $('#buscar_codigo').val();

    var params = {
        "method" : "obtener_datos",
        "codigo" : dato,
        "incluir" : "../../../conexion.php",
      };
     //console.log(params);
      $.ajax({
        data:  params,
        url:  '/views/configuracion/classes/lib_usuario.php',
        type:  'post',
        success: function(response) {
          //console.log(response);
          $('#contenido_control').html('');
          $('#contenido_control').html(response);

        },
        error: function(response) {
          alert('Algo anda mal!!! en el search');
        }
      });
});