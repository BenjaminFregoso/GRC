<?php
require 'conexion.php';
//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT'].'/tmp')));
//ini_set('session.gc_probability', 1);
session_start();
$empresa = $_POST['empresa'];
$_SESSION['empresa']=$empresa;
echo '<script type="text/javascript">';
        echo 'window.location.href="'.$CFG->wwwroot.'/inicio.php?m=01&o=0";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$CFG->wwwroot.'/inicio.php?m=0&o=0" />';
        echo '</noscript>';
        
?>
