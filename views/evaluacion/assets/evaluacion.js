$("#select_version").change(function() {
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
        url:  '/views/evaluacion/classes/lib_evaluacion.php',
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
  });