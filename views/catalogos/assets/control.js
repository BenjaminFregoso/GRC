function editar(id){


var params = {
    "method" : "detalles",
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
      "method" : "nuevo",
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
    "method" : "eliminar_control",
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
  var descripcion = $("#descripcion_form").val();
  var select_entidad = $("#select_entidad").val();
  var select_proceso = $("#select_proceso").val();
  var select_riesgo = $("#select_riesgo").val();
  var select_control = $("#select_control").val();
  var referencia_form = $("#referencia_form").val();
  var riesgo_form = $("#riesgo_form").val();

  if ($('#documentado_form').is(":checked"))
{
  var documentado_form = 1;
}else{
  var documentado_form = 0;
}
if ($('#autorizado_form').is(":checked"))
{
  var autorizado_form = 1;
}else{
  var autorizado_form = 0;
}
if ($('#difundido_form').is(":checked"))
{
  var difundido_form = 1;
}else{
  var difundido_form = 0;
}
if ($('#ejecutado_form').is(":checked"))
{
  var ejecutado_form = 1;
}else{
  var ejecutado_form = 0;
}
if ($('#monitoreado_form').is(":checked"))
{
  var monitoreado_form = 1;
}else{
  var monitoreado_form = 0;
}

  var params = {
    "method" : "guardar_edicion",
    "codigo" : codigo,
    "descripcion" : descripcion,
    "select_entidad" : select_entidad,
    "select_proceso" : select_proceso,
    "select_riesgo" : select_riesgo,
    "select_control" : select_control,
    "referencia_form" : referencia_form,
    "riesgo_form" : riesgo_form,
    "documentado_form" : documentado_form,
    "autorizado_form" : autorizado_form,
    "difundido_form" : difundido_form,
    "ejecutado_form" : ejecutado_form,
    "monitoreado_form" : monitoreado_form,
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