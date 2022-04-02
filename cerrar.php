<?php
  try {

    if (isset($_COOKIE['hdrtydfnghfjdfgh'])) {
        unset($_COOKIE['hdrtydfnghfjdfgh']); 
        setcookie('hdrtydfnghfjdfgh', null, -1, '/'); 
        //return true;
    } else {
        //return false;
    }

    if (isset($_COOKIE['ergdfsggvbvc'])) {
        unset($_COOKIE['ergdfsggvbvc']); 
        setcookie('ergdfsggvbvc', null, -1, '/'); 
        //return true;
    } else {
        //return false;
    }

} catch (\Throwable $th) {
    echo $th;
}
require 'conexion.php';
echo '<script type="text/javascript">';
echo 'window.location.href="'.$CFG->wwwroot.'";';
echo '</script>';
echo '<noscript>';
echo '<meta http-equiv="refresh" content="0;url='.$CFG->wwwroot.'" />';
echo '</noscript>';
?>