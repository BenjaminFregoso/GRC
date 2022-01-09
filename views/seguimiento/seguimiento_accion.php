
<?php include '../../header.php'; ?>
<style>
    table, td, th{
    border-bottom: 1px solid #ddd;
    border: 1px solid #ddd;
}
    </style>
                    <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">EMPRESA NOMBRE</h5>
                                          <p class="m-b-0">Captura de seguimiento</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Seguimiento a plan de acción</a>
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
                                                        <h5>Seguimiento</h5>
                                                        <span class="text-muted">Seguimiento a plan de acción</span>
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
                                                            <div class="col-xl-2 col-md-12">
                                                                <label>Versión:</label>
                                                                </br>
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
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

                                                            <div class="col-xl-5 col-md-12">
                                                            <label>Estatus:</label>
                                                                </br>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="completado_btn" name="completado_btn">Completado</button>
                                                                <button class="btn btn-inverse waves-effect waves-light" id="desarrollo_btn" name="desarrollo_btn">Desarrollo</button>
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

                                                            <div class="col-xl-2 col-md-12">
                                                            <input type="checkbox" value=""><label>&nbsp;Tipo de control:</label>
                                                                </br>
                                                                
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12">
</br>
                                                                <div class="card-block table-border-style">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-xs table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Entidad</th>
                                                                                    <th>Proceso</th>
                                                                                    <th>Tipo de riesgo</th>
                                                                                    <th>Tipo de control</th>
                                                                                    <th>Objetivos de control</th>
                                                                                    <th>Avance</th>
                                                                                    <th>Responsable</th>
                                                                                    <th>Fecha compromiso</th>
                                                                                    <th>Observaciones</th>
                                                                                    <th>Estatus</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
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