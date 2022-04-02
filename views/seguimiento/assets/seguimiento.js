
$( document ).ready(function() {
  $(".page-header").addClass('d-none');
});


/* $("#select_version").change(function() {
    var id_empresa = $("#id_empresa").val();
    var version = $("#select_version").val();

    var params = {
        "method" : "mostrar_tabla",
        "id_empresa": id_empresa,
        "version" : version,
        "incluir" : "../../../conexion.php",
      };
     //console.log(params);
      $.ajax({
        data:  params,
        url:  '/views/evaluacion/classes/lib_seguimiento.php',
        type:  'post',
        success: function(response) {
          //console.log(response);
          $('#tabla_principal').html('');
          $('#tabla_principal').html(response);

        },
        error: function(response) {
          alert('Algo anda mal!!! en el search');
        }
      });
  }); */

  function filtro(){
    var id_empresa = $("#id_empresa").val();
    var version = $("#select_version").val();
    var entidad = $("#select_entidad").val();
    var proceso = $("#select_proceso").val();
    var estatus = $("#select_status").val();
    var riesgo = $("#select_riesgo").val();
    var control =$("#select_control").val();
    
    var params = {
      "method" : "mostrar_tabla_f",
      "id_empresa": id_empresa,
      "version" : version,
      "entidad" : entidad,
      "proceso" : proceso,
      "estatus" : estatus,
      "riesgo" : riesgo,
      "control" : control,
      "incluir" : "../../../conexion.php",
    };
   //console.log(params);
    $.ajax({
      data:  params,
      url:  '/views/evaluacion/classes/lib_seguimiento.php',
      type:  'post',
      success: function(response) {
        //console.log(response);
        $('#tabla_principal').html('');
        $('#tabla_principal').html(response);

      },
      error: function(response) {
        alert('Algo anda mal!!! en el search');
      }
    });

  }

  function no_aplica(id){
    if ($('#no_aplica_'+id).is(":checked"))
    {
      var no_aplica = 1;
    }else{
      var no_aplica = 0;
    }

    var params = {
      "method" : "no_aplica",
      "id_control_cliente": id,
      "status_na": no_aplica,
      "incluir" : "../../../conexion.php",
    };
   //console.log(params);
    $.ajax({
      data:  params,
      url:  '/views/evaluacion/classes/lib_seguimiento.php',
      type:  'post',
      success: function(response) {
        //console.log(response);
        filtro();
      },
      error: function(response) {
        alert('Algo anda mal!!! en el search');
      }
    });
    
  }

  function sin_control(id){
    if ($('#sin_control_'+id).is(":checked"))
    {
      var sin_control = 1;
    }else{
      var sin_control = 0;
    }

    var params = {
      "method" : "sin_control",
      "id_control_cliente": id,
      "status_na": sin_control,
      "incluir" : "../../../conexion.php",
    };
   //console.log(params);
    $.ajax({
      data:  params,
      url:  '/views/evaluacion/classes/lib_seguimiento.php',
      type:  'post',
      success: function(response) {
        //console.log(response);
        filtro();
      },
      error: function(response) {
        alert('Algo anda mal!!! en el search');
      }
    });
  }

  function total(id){
    var total = 0;
    var monitoreado_val = parseFloat($("#monitoreado_val").val());
    var documentado_val = parseFloat($("#documentado_val").val());
    var autorizado_val = parseFloat($("#autorizado_val").val());
    var difundido_val = parseFloat($("#difundido_val").val());
    var ejecutado_val = parseFloat($("#ejecutado_val").val());

    var completado = parseFloat($("#completado").val());
    var desarrollo = parseFloat($("#desarrollo").val());

    var estatus = '';
    if ($('#dato_documentado_'+id).is(":checked"))
    {
      total = total + documentado_val;
      var documentado = 1;
    }else{
      var documentado = 0;
    }

    if ($('#dato_autorizado_'+id).is(":checked"))
    {
      total = total + autorizado_val;
      var autorizado = 1;
    }else{
      var autorizado = 0;
    }

    if ($('#dato_difundido_'+id).is(":checked"))
    {
      total = total + difundido_val;
      var difundido = 1;
    }else{
      var difundido = 0;
    }

    if ($('#dato_ejecutado_'+id).is(":checked"))
    {
      total = total + ejecutado_val;
      var ejecutado = 1;
    }else{
      var ejecutado = 0;
    }

    if ($('#dato_monitoreado_'+id).is(":checked"))
    {
      total = total + monitoreado_val;
      var monitoreado = 1;
    }else{
      var monitoreado = 0;
    }

    if(total >= completado){
      estatus = 'Completado'
    }else if(total >= desarrollo){
      estatus = 'En desarrollo'
    }else{
      estatus = 'Nulo';
    }
    var params = {
      "method" : "total",
      "id_control_cliente": id,
      "total_cal": total,
      "documentado": documentado,
      "autorizado": autorizado,
      "difundido": difundido,
      "ejecutado": ejecutado,
      "monitoreado": monitoreado,
      "estatus": estatus,
      "incluir" : "../../../conexion.php",
    };
   //console.log(params);
    $.ajax({
      data:  params,
      url:  '/views/evaluacion/classes/lib_seguimiento.php',
      type:  'post',
      success: function(response) {
        //console.log(response);
        filtro();
      },
      error: function(response) {
        alert('Algo anda mal!!! en el search');
      }
    });
    
  }