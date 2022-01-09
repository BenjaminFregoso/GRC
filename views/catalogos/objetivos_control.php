
<?php include '../../header.php'; ?>
                    <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">EMPRESA NOMBRE</h5>
                                          <p class="m-b-0">Matriz de diagnóstico</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Diagnóstico</a>
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
                                            <div class="col-xl-4 col-md-12">
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
                                                    <div class="card-block">
                                                        <!--info dentro-->
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12">
                                                                <label>Localizar por código o descripción:</label>
                                                                </br>
                                                                <input type="text" class="form-control" id="buscar_codigo" placeholder="Introduce el código o descripción">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12">
                                                                <div class="card-block table-border-style">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-xs table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Acción</th>
                                                                                    <th>Código</th>
                                                                                    <th>Descripción</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon"><i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;"></i></button>
                                                                                    </th>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                    <td><p style="padding-top: 12px;">Dato dato dato</p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon"><i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;"></i></button>
                                                                                    </th>
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
                                                            <div class="col-xl-12 col-md-12 " style="text-align: center;">
                                                                
                                                                <button class="btn btn-primary waves-effect waves-light ">Nuevo</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--  sale analytics start -->
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Detalles</h5>
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
                                                    <div class="card-block">
                                                        <!--info dentro-->
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12">
                                                                <form class="">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Código</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" id="codigo_form" class="form-control" placeholder="Código">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" placeholder="Escribe una descripción"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Entidad</label>
                                                                        <div class="col-sm-10">
                                                                        <select name="select" class="form-control">
                                                                            <option value="0">Selecciona una opción</option>
                                                                            <option value="1">C0001 ACCIONISTAS 123</option>
                                                                            <option value="2">C0002 ACCIONISTAS 245</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Proceso</label>
                                                                        <div class="col-sm-10">
                                                                        <select name="select" class="form-control">
                                                                            <option value="0">Selecciona una opción</option>
                                                                            <option value="1">P0001 ACTIVOS 123</option>
                                                                            <option value="2">C0002 ACTIVOS 245</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Tipo de riesgo</label>
                                                                        <div class="col-sm-10">
                                                                        <select name="select" class="form-control">
                                                                            <option value="0">Selecciona una opción</option>
                                                                            <option value="1">P0001 ACTIVOS 123</option>
                                                                            <option value="2">C0002 ACTIVOS 245</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Tipo de control</label>
                                                                        <div class="col-sm-10">
                                                                        <select name="select" class="form-control">
                                                                            <option value="0">Selecciona una opción</option>
                                                                            <option value="1">P0001 ACTIVOS 123</option>
                                                                            <option value="2">C0002 ACTIVOS 245</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Referencia</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" placeholder="Escribe una referencia"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Riesgo</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" placeholder="Escribe el riesgo"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-2"></div>

                                                                        <div class="col-sm-2">
                                                                            <div class="checkbox-fade fade-in-primary d-">
                                                                                <label>
                                                                                    <input type="checkbox" value="" id="documentado_form">
                                                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                                    <span class="text-inverse">Documentado</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-2">
                                                                            <div class="checkbox-fade fade-in-primary d-">
                                                                                <label>
                                                                                    <input type="checkbox" value="" id="autorizado_form">
                                                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                                    <span class="text-inverse">Autorizado</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-2">
                                                                            <div class="checkbox-fade fade-in-primary d-">
                                                                                <label>
                                                                                    <input type="checkbox" value="" id="difundido_form">
                                                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                                    <span class="text-inverse">Difundido</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-2">
                                                                            <div class="checkbox-fade fade-in-primary d-">
                                                                                <label>
                                                                                    <input type="checkbox" value="" id="ejecutado_form">
                                                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                                    <span class="text-inverse">Ejecutado</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-2">
                                                                            <div class="checkbox-fade fade-in-primary d-">
                                                                                <label>
                                                                                    <input type="checkbox" value="" id="monitoreado_form">
                                                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                                    <span class="text-inverse">Monitoreado</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12 " style="text-align: center;">
                                                                <button class="btn btn-success waves-effect waves-light">Guardar</button>
                                                                <button class="btn btn-danger waves-effect waves-light">Eliminar</button>
                                                                
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