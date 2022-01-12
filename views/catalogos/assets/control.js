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

function guardar_edicion(){
  var codigo = $(".codigo_form").val();
  var descripcion = $(".descripcion_form").val();
  var select_entidad = $(".select_entidad").val();
  var select_proceso = $(".select_proceso").val();
  var select_riesgo = $(".select_riesgo").val();
  var select_control = $(".select_control").val();
  var referencia_form = $(".referencia_form").val();
  var riesgo_form = $(".riesgo_form").val();

  var documentado_form = $(".documentado_form").val();
  var autorizado_form = $(".autorizado_form").val();
  var difundido_form = $(".difundido_form").val();
  var ejecutado_form = $(".ejecutado_form").val();
  var monitoreado_form = $(".monitoreado_form").val();
  
  
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