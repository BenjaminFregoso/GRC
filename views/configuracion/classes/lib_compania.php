<?php
require_once("lib.php");
$companias = new companias();

if(isset($_POST['method']))
	$method =  $_POST['method'];


if($method){

	$method = trim($method);

  switch ($method) {
    case "obtener_datos":
        $tableContent = $companias->obtener_datos($_POST['codigo'], $_POST['incluir']);
		echo $tableContent;
    break;
    case "detalles":
        $tableContent = $companias->detalles($_POST['codigo'], $_POST['incluir']);
		echo $tableContent;
    break;
    case "guardar_edicion":
      $tableContent = $companias->guardar_edicion($_POST['codigo'],$_POST['nombre_form'],$_POST['giro'], $_POST['incluir']);
    echo $tableContent;
    break;
    case "guardar_nuevo":
      $tableContent = $companias->guardar_nuevo(
      $_POST['nombre_form'],
      $_POST['giro'],
      $_POST['incluir']);
    echo $tableContent;
    break;
    case "eliminar_control":
      $tableContent = $companias->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo":
    $tableContent = $companias->nuevo($_POST['incluir']);
  echo $tableContent;
  break;


  }
}
