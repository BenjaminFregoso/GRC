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
$evaluac = new evaluacion();
$tabla = $evaluac->mostrar_tabla_entidad($id_empresa, '', '','','','','', "../../conexion.php"); 
$version = $evaluac->mostrar_version($id_empresa, "../../conexion.php");
?>


<style>
    table, td, th{
    border-bottom: 1px solid #ddd;
    border: 1px solid #ddd;
}
    </style>
    <input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $id_empresa;?>">
                    <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10"><?php echo $empresa_sess;?></h5>
                                          <p class="m-b-0">Captura de evaluación</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Evaluación</a>
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
                                           
    
                                            <!--  Evaluación -->
                                            <div class="col-xl-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Evaluación</h5>
                                                        <span class="text-muted">Captura de evaluación</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <i class="fa fa-window-maximize full-card"></i>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <!--info dentro-->
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12">
                                                                <label>Versión:</label>
                                                                </br>
                                                                <?php echo $version; ?>
                                                            </div>
                                                        </div>

                                                        <div class="row" id="tabla_principal" name="tabla_principal">
                                                       <?php echo $tabla;?>
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
                       <script type="text/javascript" src="assets/evaluacion.js"></script>