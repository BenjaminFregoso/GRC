<?php
require_once("lib.php");
$master = new objetivos_control();

if(isset($_POST['method']))
	$method =  $_POST['method'];


if($method){

	$method = trim($method);

  switch ($method) {
    case "obtener_datos":
        $tableContent = $master->obtener_datos($_POST['codigo'], $_POST['incluir']);
		echo $tableContent;
    break;
    case "detalles":
        $tableContent = $master->detalles($_POST['codigo'], $_POST['incluir']);
		echo $tableContent;
    break;
    case "guardar_edicion":
      $tableContent = $master->guardar_edicion($_POST['codigo'], $_POST['descripcion'], $_POST['select_entidad'], $_POST['select_proceso'], $_POST['select_riesgo'], 
      $_POST['select_control'], $_POST['referencia_form'], $_POST['riesgo_form'], $_POST['documentado_form'], $_POST['autorizado_form'], 
      $_POST['difundido_form'], $_POST['ejecutado_form'], $_POST['monitoreado_form'], $_POST['incluir']);
    echo $tableContent;
    break;
    case "guardar_nuevo":
      $tableContent = $master->guardar_nuevo($_POST['codigo'], $_POST['descripcion'], $_POST['select_entidad'], $_POST['select_proceso'], $_POST['select_riesgo'], 
      $_POST['select_control'], $_POST['referencia_form'], $_POST['riesgo_form'], $_POST['documentado_form'], $_POST['autorizado_form'], 
      $_POST['difundido_form'], $_POST['ejecutado_form'], $_POST['monitoreado_form'], $_POST['incluir']);
    echo $tableContent;
    break;
    case "eliminar_control":
      $tableContent = $master->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo":
    $tableContent = $master->nuevo($_POST['incluir']);
  echo $tableContent;
  break;
  }
}
