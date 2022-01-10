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
    
  }
}
