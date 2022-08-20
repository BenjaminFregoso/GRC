<?php
require 'conexion.php';

        //session_start();

            if(isset($_COOKIE['hdrtydfnghfjdfgh'])){
              if($_COOKIE['hdrtydfnghfjdfgh']==""){

                 // Si no se han enviado encabezados, enviar
    if (!headers_sent()) {
        //header('Location: https://ops-alpha.we-know.net/');
        header('Location: '.$CFG->wwwroot.'');
        exit;
    }else{//si se han enviado haremos redirect desde javascript
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$CFG->wwwroot.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$CFG->wwwroot.'"/>';
        echo '</noscript>';
    }
              }else{
                  $usuarioactual=$_COOKIE['hdrtydfnghfjdfgh'];
              }
            }else{
                if (!headers_sent()) {
                    header('Location: '.$CFG->wwwroot.'/');
                    exit;
                }else{//si se han enviado haremos redirect desde javascript
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="'.$CFG->wwwroot.'/";';
                    echo '</script>';
                    echo '<noscript>';
                    echo '<meta http-equiv="refresh" content="0;url='.$CFG->wwwroot.'/>';
                    echo '</noscript>';
                }
            }
           
            class datos_global{
                function get_global_usuario(){
                    $usuario_sess = $_COOKIE['hdrtydfnghfjdfgh'];
                    return $usuario_sess;
                }
                function get_global_empresa(){
                    $empresa_sess = $_COOKIE['ergdfsggvbvc'];
                    return $empresa_sess;
                }
               
            }
            $nombre_sess='';
            $sql = "SELECT nombre_completo FROM usuarios where id = {$_COOKIE['hdrtydfnghfjdfgh']} AND status_usuario = 1";
            //echo $sql;
            if($consultaBD=$mysqli->query($sql)){
                $fila = mysqli_fetch_array($consultaBD);
                $nombre_sess = $fila['nombre_completo'];
            } 
	

		?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>GRC | Sistema de auditoria</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Lleva el registro de tus cuentas de manera digital, fácil y gratis." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="/assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="/assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="index.php">
                          <img class="img-fluid" src="/assets/images/logo.png" alt="Theme-Logo"/> <!-- imagen de usuario  DB-->
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <i class="ti-bell"></i>
                                  <span class="badge bg-c-red"></span>
                              </a>
                              <ul class="show-notification">
                                  <li>
                                      <h6>Notificaciones</h6>
                                      <label class="label label-danger">Nuevas</label>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/avatar.png" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">Sello rojo</h5>
                                              <p class="notification-msg">Tienes una visita el 15/10/2021.</p>
                                              <span class="notification-time">Hace 1 día</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/avatar.png" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">SuKarne</h5>
                                              <p class="notification-msg">Tienes una visita el 18/10/2021.</p>
                                              <span class="notification-time">Hace 1 día</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/avatar.png" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">Gasera Ríos</h5>
                                              <p class="notification-msg">Tienes una visita el 26/11/2021.</p>
                                              <span class="notification-time">Hace 1 día</span>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="/assets/images/avatar.png" class="img-radius" alt="User-Profile-Image">
                                  <span><?php echo $nombre_sess; ?></span> <!-- NOMBRE APELLIDO DB-->
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="#!">
                                          <i class="ti-settings"></i> Configuración
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="user-profile.html">
                                          <i class="ti-user"></i> Mi perfil
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="email-inbox.html">
                                          <i class="ti-email"></i> Mis notificaciones
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="<?php echo $CFG->wwwroot;?>?c=1">
                                          <i class="ti-layout-sidebar-left"></i> Cerrar sesión
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/avatar.png" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details"><?php echo $nombre_sess; ?><i class="fa fa-caret-down"></i></span> <!-- NOMBRE APELLIDO DB-->
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="user-profile.html"><i class="ti-user"></i>Ver Perfil</a>
                                          <a href="#!"><i class="ti-settings"></i>Configuración</a>
                                          <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Salir</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">General</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="/index.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              
                          </ul>

                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Evaluación</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="/views/evaluacion/evaluacion.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-write"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Evaluación</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="/views/evaluacion/evaluacion_por_entidad.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Resumen de evaluación por entidad</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>

                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Seguimiento</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="/views/seguimiento/seguimiento_accion.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-clipboard"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Seguimiento al plan de acción</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="/views/seguimiento/resultado_accion.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Resultado del plan de acción</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>

                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Auditoría</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="/views/auditoria/cedula.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-check"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Cédulas de auditoría</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="form-elements-component.html" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-pie-chart"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Resultado de auditoría</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>
        
                          <div class="pcoded-navigation-label" data-i18n="nav.category.other">Configuración</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="pcoded-hasmenu ">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-book"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Catálogos</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  
                                    <li class="">
                                          <a href="/views/catalogos/objetivos_control.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Objetivos de control</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/views/catalogos/entidades.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Entidad</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/views/catalogos/procesos.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Procesos</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                          
                                      </li>
                                      <li class="">
                                          <a href="/views/catalogos/tipo_riesgo.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Tipo de riesgo</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/views/catalogos/tipo_control.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Tipo de control</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/views/catalogos/giros.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Giro</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/views/catalogos/madurez.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Nivel de madurez</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>

                              <!--<li>
                                  <a href="form-elements-component.html" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Diagnóstico</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="form-elements-component.html" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Plan de acción</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="form-elements-component.html" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Auditoría</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>-->
                              
                              <li class="pcoded-hasmenu ">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-settings"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Configuración</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  
                                    <li class="">
                                          <a href="/views/configuracion/usuarios.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Usuarios</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                    </li>

                                    <li class="">
                                          <a href="/views/configuracion/compania.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Compañías</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                    </li>

                                  </ul>
                              </li>
                              
                              <li>
                                  <a href="form-elements-component.html" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-help"></i><b>OC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Ayuda</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </nav>
                  
                            