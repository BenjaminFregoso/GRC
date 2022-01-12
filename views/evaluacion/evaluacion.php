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
$tabla = $evaluac->mostrar_tabla($id_empresa, '', "../../conexion.php"); 
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
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <!--info dentro-->
                                                        <div class="row">
                                                            <div class="col-xl-1 col-md-12">
                                                                <label>Versión:</label>
                                                                </br>
                                                                <?php echo $version; ?>
                                                            </div>

                                                            <div class="col-xl-1 col-md-12">
                                                            <input type="checkbox" value=""><label>&nbsp;Entidad:</label>
                                                                </br>
                                                                
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-1 col-md-12">
                                                            <input type="checkbox" value=""><label>&nbsp;Proceso:</label>
                                                                </br>
                                                                
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-7 col-md-12">
                                                            <label>Estatus:</label>
                                                                </br>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="completado_btn" name="completado_btn">Completado</button>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="desarrollo_btn" name="desarrollo_btn">Desarrollo</button>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="sin_control_btn" name="sin_control_btn">Sin control</button>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="no_aplica_btn" name="no_aplica_btn">No aplica</button>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="nulo_btn" name="nulo_btn">Nulo</button>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="todos_btn" name="todos_btn">Todos</button>
                                                            </div>

                                                            <div class="col-xl-1 col-md-12">
                                                            <input type="checkbox" value=""><label>&nbsp;Tipo de riesgo:</label>
                                                                </br>
                                                                
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-1 col-md-12">
                                                            <input type="checkbox" value=""><label>&nbsp;Tipo de control:</label>
                                                                </br>
                                                                
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row" id="tabla_principal" name="tabla_principal">
                                                       <?php echo $tabla;?>
                                                        </div>

                                                        <div class="row">
                                                            
                                                            <div class="col-xl-2 col-md-12 " style="text-align: center;">
                                                                <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                <table class="table table-xs table-hover" >
                                                                    <thead >
                                                                        <tr>
                                                                            <th style="text-align: center;">
                                                                                <span>Nivel de riesgo</span>
                                                                            </th>
                                                                            <tr>
                                                                            </tr>
                                                                            <th class="bg-danger" style="text-align: center;">
                                                                                <span id="nivel_riesgo">33.33%</span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                                </div></div>
                                                                
                                                            </div>

                                                            <div class="col-xl-6 col-md-12 " style="text-align: center;">
                                                                
                                                                <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                <table class="table table-xs table-hover" >
                                                                    <thead >
                                                                        <tr>
                                                                            <th style="text-align: center;">
                                                                                <span>Cuantitativo</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>Evaluados</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>Completados</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>En desarrollo</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>Sin control</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>No aplica</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>Nulo</span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                            <td style="text-align: center;">
                                                                                <span>55.55%</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>23</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>43</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>54</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>6</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>23</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>99</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                </div></div>
                                                                
                                                            </div>
                                                            
                                                            <div class="col-xl-4 col-md-12 " style="text-align: center;">
                                                                
                                                                <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                <table class="table table-xs table-hover" >
                                                                    <thead >
                                                                        <tr>
                                                                            <th style="text-align: center;">
                                                                                <span>Puntos requeridos</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>Puntos obtenidos</span>
                                                                            </th>
                                                                            <th style="text-align: center;">
                                                                                <span>% Cualitativo</span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="text-align: center;">
                                                                                <span>3500</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>2130</span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <span>62.62%</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                </div></div>
                                                                
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
                       <script type="text/javascript" src="assets/evaluacion.js"></script>