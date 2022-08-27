
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
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-2 col-md-12">
                                                            <input type="checkbox" value=""><label>&nbsp;Entidad:</label>
                                                                </br>
                                                                
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-2 col-md-12">
                                                            <input type="checkbox" value=""><label>&nbsp;Proceso:</label>
                                                                </br>
                                                                
                                                                <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option value="0">Pruebas 1</option>
                                                                    <option value="0">Pruebas 2</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-3 col-md-12">
                                                            <label>Estatus:</label>
                                                                </br>
                                                                <select id="select_status" name="select_status" class="form-control textos " onchange="filtro();">
                                                                    <option value="">Selecciona una opción</option>
                                                                    <option value="Completado">Completado</option>
                                                                    <option value="Desarrollo">Desarrollo</option>
                                                                    <option value="Nulo">Nulo</option>
                                                                    <option value="Sin control">Sin control</option>
                                                                    <option value="No aplica">No aplica</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-xl-2 col-md-12">
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
                                                                    <table style="table-layout:fixed;
                                                                        width:100%;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="letra_pequena_head">Entidad</th>
                                                                                    <th class="letra_pequena_head">Proceso</th>
                                                                                    <th class="letra_pequena_head">Tipo de riesgo</th>
                                                                                    <th class="letra_pequena_head">Tipo de control</th>
                                                                                    <th class="letra_pequena_head">Objetivos de control</th>
                                                                                    <th class="letra_pequena_head">No aplica</th>
                                                                                    <th class="letra_pequena_head">Sin control</th>
                                                                                    <th class="letra_pequena_head">Documentado</th>
                                                                                    <th class="letra_pequena_head">Autorizado</th>
                                                                                    <th class="letra_pequena_head">Difundido</th>
                                                                                    <th class="letra_pequena_head">Ejecutado</th>
                                                                                    <th class="letra_pequena_head">Monitoreado</th>
                                                                                    <th class="letra_pequena_head">Total de puntos</th>
                                                                                    <th class="letra_pequena_head">Estatus</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="letra_pequena_head">SEMINUEVOS</td>
                                                                                    <td class="letra_pequena_head">CIERRE CONTABLE</td>
                                                                                    <td class="letra_pequena_head">LEGAL</td>
                                                                                    <td class="letra_pequena_head">MEJORA DE PROCESOS</td>
                                                                                    <td class="letra_pequena_head">PRUEBAS</td>
                                                                                    <td class="letra_pequena_head"><input type="checkbox" value="" id="no_aplica_253" name="no_aplica_253" onchange="no_aplica(253);"></td>
                                                                                    <td class="letra_pequena_head"><input type="checkbox" value="" id="no_aplica_254" name="no_aplica_254" onchange="no_aplica(253);"></td>
                                                                                    <td class="letra_pequena_head"><input class="td_input" type="number" min="0" max="40" step="1" id="dato_documentado_253" name="dato_documentado_253" value="10" onchange="total(253);"></td>
                                                                                    <td class="letra_pequena_head"><input class="td_input" type="number" min="0" max="40" step="1" id="dato_documentado_253" name="dato_documentado_253" value="10" onchange="total(253);"></td>
                                                                                    <td class="letra_pequena_head"><input class="td_input" type="number" min="0" max="40" step="1" id="dato_documentado_253" name="dato_documentado_253" value="10" onchange="total(253);"></td>
                                                                                    <td class="letra_pequena_head"><input class="td_input" type="number" min="0" max="40" step="1" id="dato_documentado_253" name="dato_documentado_253" value="10" onchange="total(253);"></td>
                                                                                    <td class="letra_pequena_head"><input class="td_input" type="number" min="0" max="40" step="1" id="dato_documentado_253" name="dato_documentado_253" value="10" onchange="total(253);"></td>
                                                                                    <td class="letra_pequena_head">10</td>
                                                                                    <td class="letra_pequena_head">En desarrollo</td>
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
                                                                <table style="table-layout:fixed;
                                                                        width:100%;">
                                                                            <thead>
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
                                                                <table style="table-layout:fixed;
                                                                        width:100%;">
                                                                            <thead>
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
                                                                <table style="table-layout:fixed;
                                                                        width:100%;">
                                                                            <thead>
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