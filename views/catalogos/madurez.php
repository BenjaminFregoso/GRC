
<?php 
 require_once('../../header.php'); 


$lib = new datos_global();
//Nombre empresa
$id_empresa = $lib->get_global_empresa();
$nombre_usuario = $lib->get_global_usuario();
$empresa_sess='';
  $sql = "SELECT * FROM cliente where id = $id_empresa AND status_empresa = 1 ";
    if($consultaBD=$mysqli->query($sql)){
        $fila = mysqli_fetch_array($consultaBD);
        $empresa_sess .= $fila['nombre'];
    } 

require_once('classes/lib.php'); 
$lib_control = new nivel_madurez();
$tabla = $lib_control->obtener_datos('', "../../conexion.php");  
?>
                    <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10"><?php echo $empresa_sess;?></h5>
                                          <p class="m-b-0">Nivel de madurez</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Catálogos</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                           
    
                                            <!--  sale analytics start -->
                                            <div class="col-xl-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Catálogo</h5>
                                                        <span class="text-muted">Descripción corta de funcionalidad</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block" id="div_principal" name="div_principal">
                                                        <!--info dentro-->
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12">
                                                                <label>Localizar por código o descripción:</label>
                                                                </br>
                                                                <input type="text" class="form-control" id="buscar_codigo" name="buscar_codigo" placeholder="Introduce el código o descripción">
                                                            </div>
                                                        </div>
                                                        <div class="row" id="contenido_control" name="contenido_control">
                                                            <?php echo $tabla; ?>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12 " style="text-align: center;">
                                                                <button class="btn btn-primary waves-effect waves-light " onclick="nuevo();">Nuevo</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                           
                       <?php include '../../footer.php'; ?>
                       <script type="text/javascript" src="assets/madurez.js"></script>