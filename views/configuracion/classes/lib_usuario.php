<?php
require_once("lib.php");
$usuarios = new usuarios();

if(isset($_POST['method']))
	$method =  $_POST['method'];


if($method){

	$method = trim($method);

  switch ($method) {
    case "obtener_datos":
        $tableContent = $usuarios->obtener_datos($_POST['codigo'], $_POST['incluir']);
		echo $tableContent;
    break;
    case "detalles":
        $tableContent = $usuarios->detalles($_POST['codigo'], $_POST['incluir']);
		echo $tableContent;
    break;
    case "guardar_edicion":
      $tableContent = $usuarios->guardar_edicion($_POST['codigo'],
      $_POST['guardar_pass'],
      $_POST['estado_form'],
      $_POST['ciudad_form'],
      $_POST['colonia_form'],
      $_POST['exterior_form'],
      $_POST['interior_form'],
      $_POST['calle_form'],
      $_POST['fecha_form'],
      $_POST['celular_form'],
      $_POST['correo_form'],
      $_POST['pass_form'],
      $_POST['usuario_form'],
      $_POST['nombre_form'],
      $_POST['incluir']);
    echo $tableContent;
    break;
    case "guardar_nuevo":
      $tableContent = $usuarios->guardar_nuevo(
      $_POST['estado_form'],
      $_POST['ciudad_form'],
      $_POST['colonia_form'],
      $_POST['exterior_form'],
      $_POST['interior_form'],
      $_POST['calle_form'],
      $_POST['fecha_form'],
      $_POST['celular_form'],
      $_POST['correo_form'],
      $_POST['pass_form'],
      $_POST['usuario_form'],
      $_POST['nombre_form'],
      $_POST['incluir']);
    echo $tableContent;
    break;
    case "eliminar_control":
      $tableContent = $usuarios->eliminar_control($_POST['codigo'], $_POST['incluir']);
  echo $tableContent;
  break;
  case "nuevo":
    $tableContent = $usuarios->nuevo($_POST['incluir']);
  echo $tableContent;
  break;


  }
}
