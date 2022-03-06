function editar(id){


var params = {
    "method" : "detalles_g",
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
      "method" : "nuevo_g",
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
    "method" : "eliminar_control_g",
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
  var ids = $("#id_a_ligar").val();

  var params = {
    "method" : "guardar_edicion_g",
    "codigo" : codigo,
    "descripcion" : descripcion,
    "array" : ids,
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
  var ids = $("#id_a_ligar").val();

  var params = {
    "method" : "guardar_nuevo_g",
    "codigo" : codigo,
    "descripcion" : descripcion,
    "array" : ids,
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


function check_control(id_control){
  var valor_actual = $("#id_a_ligar").val();
  if($("#ligado_"+id_control).is(":checked")){
      valor_actual = valor_actual+","+id_control;
  }else{
    valor_actual = valor_actual.replace(","+id_control, "");  
  }
 // alert(valor_actual);
  $("#id_a_ligar").val(valor_actual);
}

$('#buscar_codigo').keyup(function() {
    var dato = $('#buscar_codigo').val();

    var params = {
        "method" : "obtener_datos_g",
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