<?php
require_once("lib.php");
$master = new objetivos_control();

$entidad = new entidad();

$procesos = new procesos();

$tipo_riesgo = new tipo_riesgo();

$tipo_control = new tipo_control();

$giros = new giros();

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


  case "obtener_datos_e":
    $tableContent = $entidad->obtener_datos($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "detalles_e":
      $tableContent = $entidad->detalles($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_edicion_e":
    $tableContent = $entidad->guardar_edicion($_POST['codigo'], $_POST['descripcion'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_nuevo_e":
    $tableContent = $entidad->guardar_nuevo($_POST['codigo'], $_POST['descripcion'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "eliminar_control_e":
    $tableContent = $entidad->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo_e":
  $tableContent = $entidad->nuevo($_POST['incluir']);
  echo $tableContent;
  break;

  case "obtener_datos_p":
    $tableContent = $procesos->obtener_datos($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "detalles_p":
      $tableContent = $procesos->detalles($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_edicion_p":
    $tableContent = $procesos->guardar_edicion($_POST['codigo'], $_POST['descripcion'],$_POST['ind_riesgo_uno'], $_POST['ind_riesgo_dos'], $_POST['ind_riesgo_tres'], $_POST['ind_riesgo_cuatro'], $_POST['ind_riesgo_cinco'], $_POST['ind_riesgo_seis'], $_POST['ind_riesgo_siete'], $_POST['ind_riesgo_ocho'], $_POST['ind_riesgo_nueve'], $_POST['ind_riesgo_diez'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_nuevo_p":
    $tableContent = $procesos->guardar_nuevo($_POST['codigo'], $_POST['descripcion'],$_POST['ind_riesgo_uno'], $_POST['ind_riesgo_dos'], $_POST['ind_riesgo_tres'], $_POST['ind_riesgo_cuatro'], $_POST['ind_riesgo_cinco'], $_POST['ind_riesgo_seis'], $_POST['ind_riesgo_siete'], $_POST['ind_riesgo_ocho'], $_POST['ind_riesgo_nueve'], $_POST['ind_riesgo_diez'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "eliminar_control_p":
    $tableContent = $procesos->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo_p":
  $tableContent = $procesos->nuevo($_POST['incluir']);
  echo $tableContent;
  break;

  case "obtener_datos_tr":
    $tableContent = $tipo_riesgo->obtener_datos($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "detalles_tr":
      $tableContent = $tipo_riesgo->detalles($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_edicion_tr":
    $tableContent = $tipo_riesgo->guardar_edicion($_POST['codigo'], $_POST['descripcion'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_nuevo_tr":
    $tableContent = $tipo_riesgo->guardar_nuevo($_POST['codigo'], $_POST['descripcion'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "eliminar_control_tr":
    $tableContent = $tipo_riesgo->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo_tr":
  $tableContent = $tipo_riesgo->nuevo($_POST['incluir']);
  echo $tableContent;
  break;

  
  case "obtener_datos_tc":
    $tableContent = $tipo_control->obtener_datos($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "detalles_tc":
      $tableContent = $tipo_control->detalles($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_edicion_tc":
    $tableContent = $tipo_control->guardar_edicion($_POST['codigo'], $_POST['descripcion'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_nuevo_tc":
    $tableContent = $tipo_control->guardar_nuevo($_POST['codigo'], $_POST['descripcion'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "eliminar_control_tc":
    $tableContent = $tipo_control->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo_tc":
  $tableContent = $tipo_control->nuevo($_POST['incluir']);
  echo $tableContent;
  break;

  case "obtener_datos_g":
    $tableContent = $giros->obtener_datos($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "detalles_g":
      $tableContent = $giros->detalles($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_edicion_g":
    $tableContent = $giros->guardar_edicion($_POST['codigo'], $_POST['descripcion'], $_POST['array'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "guardar_nuevo_g":
    $tableContent = $giros->guardar_nuevo($_POST['codigo'], $_POST['descripcion'], $_POST['array'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "eliminar_control_g":
    $tableContent = $giros->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo_g":
  $tableContent = $giros->nuevo($_POST['incluir']);
  echo $tableContent;
  break;
  }
}
