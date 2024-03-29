<?php
require_once("lib.php");
$master = new evaluacion();

if(isset($_POST['method']))
	$method =  $_POST['method'];


if($method){

	$method = trim($method);

  switch ($method) {
    case "mostrar_tabla_f":
        $tableContent = $master->mostrar_tabla($_POST['id_empresa'], $_POST['version'], $_POST['entidad'], $_POST['proceso'], $_POST['estatus'], $_POST['riesgo'], $_POST['control'], $_POST['incluir']);
		echo $tableContent;
    break;

    case "no_aplica":
      $tableContent = $master->no_aplica($_POST['id_control_cliente'], $_POST['status_na'], $_POST['incluir']);
    echo $tableContent;
    break;
    case "sin_control":
      $tableContent = $master->sin_control($_POST['id_control_cliente'], $_POST['status_na'], $_POST['incluir']);
    echo $tableContent;
    break;
    case "total":
      $tableContent = $master->total($_POST['id_control_cliente'], $_POST['total_cal'], $_POST['documentado'], $_POST['autorizado'], $_POST['difundido'], $_POST['ejecutado'], $_POST['monitoreado'], $_POST['estatus'], $_POST['incluir']);
    echo $tableContent;
    break;

    case "guarda_avance":
      $tableContent = $master->guarda_avance($_POST['id'], $_POST['avance'], $_POST['version'], $_POST['incluir']);
    echo $tableContent;
    break;

    case "guarda_responsable":
      $tableContent = $master->guarda_responsable($_POST['id'], $_POST['responsable'], $_POST['version'], $_POST['incluir']);
    echo $tableContent;
    break;

    case "guarda_fecha":
      $tableContent = $master->guarda_fecha($_POST['id'], $_POST['fecha'], $_POST['version'], $_POST['incluir']);
    echo $tableContent;
    break;

    case "guarda_observaciones":
      $tableContent = $master->guarda_observaciones($_POST['id'], $_POST['observaciones'], $_POST['version'], $_POST['incluir']);
    echo $tableContent;
    break;
  }
}
