function editar(id){


var params = {
    "method" : "detalles_ma",
    "codigo" : id,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/catalogos/classes/lib_control.php',
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

function nuevo(id){


  var params = {
      "method" : "nuevo_tr",
      "incluir" : "../../../conexion.php",
    };
   //console.log(params);
    $.ajax({
      data:  params,
      url:  '/views/catalogos/classes/lib_control.php',
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
    "method" : "eliminar_control_tr",
    "codigo" : codigo,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/catalogos/classes/lib_control.php',
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
  var descripcion_form = $("#descripcion_form").val();
  var sin_control = $("#sin_control").val();
  var documentado = $("#documentado").val();
  var autorizado = $("#autorizado").val();
  var difundido = $("#difundido").val();
  var ejecutado = $("#ejecutado").val();
  var monitoreado = $("#monitoreado").val();
  var completado = $("#completado").val();
  var desarrollo = $("#desarrollo").val();
  
  var params = {
    "method" : "guardar_edicion_ma",
    "codigo" : codigo,
    "descripcion" : descripcion_form,
    "sin_control" : sin_control,
    "documentado" : documentado,
    "autorizado" : autorizado,
    "difundido" : difundido,
    "ejecutado" : ejecutado,
    "monitoreado" : monitoreado,
    "completado" : completado,
    "desarrollo" : desarrollo,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/catalogos/classes/lib_control.php',
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
  var descripcion = $("#descripcion_form").val();


  var params = {
    "method" : "guardar_nuevo_tr",
    "codigo" : codigo,
    "descripcion" : descripcion,
    "incluir" : "../../../conexion.php",
  };
 //console.log(params);
  $.ajax({
    data:  params,
    url:  '/views/catalogos/classes/lib_control.php',
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
        "method" : "obtener_datos_tr",
        "codigo" : dato,
        "incluir" : "../../../conexion.php",
      };
     //console.log(params);
      $.ajax({
        data:  params,
        url:  '/views/catalogos/classes/lib_control.php',
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