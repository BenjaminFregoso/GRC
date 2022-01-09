
<?php include '../../header.php'; ?>
<style>
    table, td, th{
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
                                          <p class="m-b-0">Resumen de evaluación por entidad</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Resumen por entidad</a>
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
                                                        <h5>Resumen por entidad</h5>
                                                        <span class="text-muted">Resumen de evaluación por entidad</span>
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
                                                            <div class="col-xl-12 col-md-12">
                                                                <label>Versión:</label>
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
                                                                                    <th>% Cuantitativo</th>
                                                                                    <th>Evaluados</th>
                                                                                    <th>Completados</th>
                                                                                    <th>En desarrollo</th>
                                                                                    <th>Sin control</th>
                                                                                    <th>No aplica</th>
                                                                                    <th>Nulos</th>
                                                                                    <th>Puntos requeridos</th>
                                                                                    <th>Puntos obtenidos</th>
                                                                                    <th>% Cualitativo</th>
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
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
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

                                                            <div class="col-xl-10 col-md-12 " style="text-align: center;">
                                                                
                                                            <div class="card-block table-border-style">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-xs table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>% Cuantitativo</th>
                                                                                    <th>Evaluados</th>
                                                                                    <th>Completados</th>
                                                                                    <th>En desarrollo</th>
                                                                                    <th>Sin control</th>
                                                                                    <th>No aplica</th>
                                                                                    <th>Nulos</th>
                                                                                    <th>Puntos requeridos</th>
                                                                                    <th>Puntos obtenidos</th>
                                                                                    <th>% Cualitativo</th>
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