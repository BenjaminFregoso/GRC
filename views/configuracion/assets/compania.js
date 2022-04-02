

function editar(id){


var params = {
    "method" : "detalles",
    "codigo" : id,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/configuracion/classes/lib_compania.php',
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
      url:  '/views/configuracion/classes/lib_compania.php',
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
    url:  '/views/configuracion/classes/lib_compania.php',
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
  var nombre_form= $("#nombre_form").val();
  var giro_form= $("#select_giro").val();

  var params = {
    "method" : "guardar_edicion",
    "codigo" : codigo,
    "nombre_form" : nombre_form,
    "giro" : giro_form,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/configuracion/classes/lib_compania.php',
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
  var nombre_form= $("#nombre_form").val();
  var giro_form= $("#select_giro").val();
  var madurez = $("#select_madurez").val();

  var params = {
    "method" : "guardar_nuevo",
    "nombre_form" : nombre_form,
    "giro" : giro_form,
    "madurez": madurez,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/configuracion/classes/lib_compania.php',
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
        url:  '/views/configuracion/classes/lib_compania.php',
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