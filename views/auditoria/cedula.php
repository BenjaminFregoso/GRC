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
$evaluac = new cedula(); 
$tabla = ''; 
$version = '';
 $tabla = $evaluac->mostrar_tabla_cedulas($id_empresa, '', '','','','','', "../../conexion.php"); 
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
                                          <p class="m-b-0">Cédulas de auditoría</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Auditoría</a>
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
                                                        <h5>Auditoría</h5>
                                                        <span class="text-muted">Cédulas de auditoría</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <i class="fa fa-window-maximize full-card"></i>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <!--info dentro-->
                                                        <div class="row">
                                                            <div class="col-xl-6 col-md-6">
                                                                <label>Cédulas de auditoría</label>
                                                                </br>
                                                                <?php echo $version; ?>
                                                           

                                                                <div class="row" id="tabla_principal" name="tabla_principal">
                                                                    <?php echo $tabla;?>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6 col-md-6">
                                                                <!-- BLOQUE SUPERIOR DERECHO -->
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-md-12">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Cédula</label>
                                                                            <div class="col-sm-8">
                                                                            
                                                                            <input type="text" id="cedula_form" name="cedula_form" class="form-control" placeholder="C000001" value="C000001" readonly="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Fecha</label>
                                                                            <div class="col-sm-8">
                                                                            
                                                                            <input type="date" id="fecha_form" name="fecha_form" class="form-control" placeholder="Fecha" value="">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Versión</label>
                                                                        <div class="col-sm-8">
                                                                        
                                                                        <select name="select_version" id="select_version" class="form-control">
                                                                            <option>Selecciona una opción</option>
                                                                        <select>
                                                                        </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Entidad</label>
                                                                        <div class="col-sm-8">
                                                                        
                                                                        <select name="select_entidad" id="select_entidad" class="form-control">
                                                                            <option>Selecciona una opción</option>
                                                                        <select>
                                                                        </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Proceso</label>
                                                                        <div class="col-sm-8">
                                                                        
                                                                        <select name="select_proceso" id="select_proceso" class="form-control">
                                                                            <option>Selecciona una opción</option>
                                                                        <select>
                                                                        </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                                <!-- TERMINA BLOQUE SUPERIOR DERECHO -->
                                                            </div>
                                                        </div>       
                                                    </div>
                                                    </div>       
                                                    </div>

                                                    <div class="col-xl-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Auditoría</h5>
                                                        <span class="text-muted">Expedientes</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <i class="fa fa-window-maximize full-card"></i>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-md-6">
                                                                <div class="card-block table-border-style">
                                                                    <div >
                                                                        <table style="table-layout:fixed;
                                                                        width:100%;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="letra_pequena_head" style="width: 15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Versión">Versión</th>
                                                                                    <th class="letra_pequena_head" style="width: 15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nombre">Nombre</th>
                                                                                    <th class="letra_pequena_head" style="width: 10%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Acción">Acción</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra_pequena_head">E000001</td>
                                                                                    <td class="letra_pequena_head">Prueba de expediente</td>
                                                                                    <td class="letra_pequena_head"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            

                                                            
                                                                <div class="col-xl-12 col-md-12">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Expediente</label>
                                                                        <div class="col-sm-8">
                                                                        
                                                                        <input type="text" id="cedula_form" name="cedula_form" class="form-control" placeholder="E000001" value="E000001" readonly="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Desde</label>
                                                                        <div class="col-sm-8">
                                                                        
                                                                        <input type="date" id="fecha_form" name="fecha_form" class="form-control" placeholder="Fecha" value="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Hasta</label>
                                                                    <div class="col-sm-8">
                                                                    
                                                                        <input type="date" id="fecha_form" name="fecha_form" class="form-control" placeholder="Fecha" value="">
                                                                    </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Nombre</label>
                                                                    <div class="col-sm-8">
                                                                    
                                                                    <input type="text" id="cedula_form" name="cedula_form" class="form-control" placeholder="Nombre" value="" >
                                                                    </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Comentario</label>
                                                                    <div class="col-sm-8">
                                                                    
                                                                    <input type="text" id="cedula_form" name="cedula_form" class="form-control" placeholder="Comentario" value="" >
                                                                    </div>
                                                                    </div>

                                                                </div>
                                                               
                                                            
                                                            </div>

                                                            <div class="col-xl-6 col-md-6">
                                                                <div class="card-block table-border-style">
                                                                    <div >
                                                                        <table style="table-layout:fixed;
                                                                        width:100%;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="letra_pequena_head" style="width: 15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Objetivo de control">Objetivo de control</th>
                                                                                    <th class="letra_pequena_head" style="width: 15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Estatus">Estatus</th>
                                                                                    <th class="letra_pequena_head" style="width: 10%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Acción">Acción</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra_pequena_head">Pruebas</td>
                                                                                    <td class="letra_pequena_head">Activo</td>
                                                                                    <td class="letra_pequena_head"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
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