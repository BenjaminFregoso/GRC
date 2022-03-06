function editar(id){


var params = {
    "method" : "detalles_p",
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
      "method" : "nuevo_p",
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
    "method" : "eliminar_control_p",
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
  var ind_riesgo_uno= $("#ind_riesgo_uno").val();
  var ind_riesgo_dos= $("#ind_riesgo_dos").val();
  var ind_riesgo_tres= $("#ind_riesgo_tres").val();
  var ind_riesgo_cuatro= $("#ind_riesgo_cuatro").val();
  var ind_riesgo_cinco= $("#ind_riesgo_cinco").val();
  var ind_riesgo_seis= $("#ind_riesgo_seis").val();
  var ind_riesgo_siete= $("#ind_riesgo_siete").val();
  var ind_riesgo_ocho= $("#ind_riesgo_ocho").val();
  var ind_riesgo_nueve= $("#ind_riesgo_nueve").val();
  var ind_riesgo_diez= $("#ind_riesgo_diez").val();

  var params = {
    "method" : "guardar_edicion_p",
    "codigo" : codigo,
    "descripcion" : descripcion,
    "ind_riesgo_uno": ind_riesgo_uno,
    "ind_riesgo_dos": ind_riesgo_dos,
    "ind_riesgo_tres": ind_riesgo_tres,
    "ind_riesgo_cuatro": ind_riesgo_cuatro,
    "ind_riesgo_cinco": ind_riesgo_cinco,
    "ind_riesgo_seis": ind_riesgo_seis,
    "ind_riesgo_siete": ind_riesgo_siete,
    "ind_riesgo_ocho": ind_riesgo_ocho,
    "ind_riesgo_nueve": ind_riesgo_nueve,
    "ind_riesgo_diez": ind_riesgo_diez,
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
  var ind_riesgo_uno= $("#ind_riesgo_uno").val();
  var ind_riesgo_dos= $("#ind_riesgo_dos").val();
  var ind_riesgo_tres= $("#ind_riesgo_tres").val();
  var ind_riesgo_cuatro= $("#ind_riesgo_cuatro").val();
  var ind_riesgo_cinco= $("#ind_riesgo_cinco").val();
  var ind_riesgo_seis= $("#ind_riesgo_seis").val();
  var ind_riesgo_siete= $("#ind_riesgo_siete").val();
  var ind_riesgo_ocho= $("#ind_riesgo_ocho").val();
  var ind_riesgo_nueve= $("#ind_riesgo_nueve").val();
  var ind_riesgo_diez= $("#ind_riesgo_diez").val();

 
  var params = {
    "method" : "guardar_nuevo_p",
    "codigo" : codigo,
    "descripcion" : descripcion,
    "ind_riesgo_uno": ind_riesgo_uno,
    "ind_riesgo_dos": ind_riesgo_dos,
    "ind_riesgo_tres": ind_riesgo_tres,
    "ind_riesgo_cuatro": ind_riesgo_cuatro,
    "ind_riesgo_cinco": ind_riesgo_cinco,
    "ind_riesgo_seis": ind_riesgo_seis,
    "ind_riesgo_siete": ind_riesgo_siete,
    "ind_riesgo_ocho": ind_riesgo_ocho,
    "ind_riesgo_nueve": ind_riesgo_nueve,
    "ind_riesgo_diez": ind_riesgo_diez,
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
        "method" : "obtener_datos_p",
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