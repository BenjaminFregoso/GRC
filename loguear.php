<?php
require 'conexion.php';
//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT'].'/tmp')));
//ini_set('session.gc_probability', 1);
session_start();
$usuario = $_POST['username'];
$clave = $_POST['password'];
$clave = md5($clave);

try {
    $q = "SELECT COUNT(*) as contar FROM usuarios where usuario = '$usuario' and password = '$clave' and status_usuario = 1";
    echo $q;
    $consultaBD=$mysqli->query($q);
    $array = mysqli_fetch_array($consultaBD);

if($array['contar']>0){
    $_SESSION['username']=$usuario;


    $sql = "SELECT * FROM usuarios where usuario = '$usuario' ";
    $consultaBD=$mysqli->query($sql);
    $currenUser = mysqli_fetch_array($consultaBD);
    $_SESSION['id']=$currenUser['id'];
    
    if (!headers_sent()) {
        header('Location: '.$CFG->wwwroot.'/empresa.php?m=0&o=0');
        exit;
    }else{//si se han enviado haremos redirect desde javascript
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$CFG->wwwroot.'/empresa.php?m=01&o=0";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$CFG->wwwroot.'/empresa.php?m=0&o=0" />';
        echo '</noscript>';
    }
}else{
    $error="";
    $sql = "SELECT * FROM usuarios where usuario = '$usuario' ";
    $consultaBD=$mysqli->query($sql);
    $currenUser = mysqli_fetch_array($consultaBD);
    if($currenUser['usuario']!=""){
        if($currenUser['password']!=$clave){
            $error="Contraseña incorrecta";
        }else if($currenUser['status']!="0"){
            $error="Ya no eres empleado de esta empresa";
        }else if($currenUser['acceso']!="1"){
            $error="No tienes permisos para acceder a esta plataforma";
        }
    }else{
        $error="El usuario no existe";
    }    
    ?>
    
    <form id="myForm" action="index.php" method="post">
    <input type="text" id="e" name="e" class="form-control" value="<?php echo $error?>" hidden></input>
</form>

<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>

    <?php
}
} catch (\Throwable $th) {
    echo $th;
}
?>
