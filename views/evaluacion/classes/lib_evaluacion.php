<?php
require_once("lib.php");
$master = new evaluacion();

if(isset($_POST['method']))
	$method =  $_POST['method'];


if($method){

	$method = trim($method);

  switch ($method) {
    case "mostrar_tabla":
        $tableContent = $master->mostrar_tabla($_POST['id_empresa'], $_POST['version'], $_POST['incluir']);
		echo $tableContent;
    break;
  }
}
