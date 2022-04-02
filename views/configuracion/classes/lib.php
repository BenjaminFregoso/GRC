<?php
class usuarios{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM usuarios WHERE (id LIKE '%$codigo%' OR nombre_completo LIKE '%$codigo%') AND status_usuario = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px;">'.$fila['nombre_completo'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['correo'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['celular'].'</p></td></tr>';
               
            }
            
        }   
        
        $html .= '
            <div class="col-xl-12 col-md-12">
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-xs table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">Acción</th>
                                    <th style="width: 30%;">Nombre</th>
                                    <th style="width: 30%;">Correo</th>
                                    <th style="width: 25%;">Celular</th>
                                </tr>
                            </thead>
                            <tbody>
                            '.$contenido.'
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';

        return $html;
    }

    function detalles($codigo = null, $conexion){
        include $conexion;
        $html = '';
        
        $nombre_completo = '';
        $usuario  = '';
        $correo = '';
        $celular = '';
        $fecha_nac = '';
        $dom_calle = '';
        $dom_interior = '';
        $dom_exterior = '';
        $dom_colonia = '';
        $dom_ciudad = '';
        $dom_estado = '';

        $sql_consulta_control = "SELECT * FROM usuarios WHERE id = '$codigo' AND status_usuario = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);

            $nombre_completo = $fila['nombre_completo'];
            $usuario = $fila['usuario'];
            $correo= $fila['correo'];
            $celular = $fila['celular'];
            $fecha_nac= $fila['fecha_nacimiento'];
            $dom_calle = $fila['dom_calle'];
            $dom_interior = $fila['dom_interior'];
            $dom_exterior= $fila['dom_exterior'];
            $dom_colonia= $fila['dom_colonia'];
            $dom_ciudad = $fila['dom_ciudad'];
            $dom_estado = $fila['dom_estado'];
            
        }
        
        
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar usuario: '.$nombre_completo.'</label></br></br>
                                <form class="">
                                    <input type="hidden" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo.'" ReadOnly>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nombre completo</label>
                                        <div class="col-sm-10">
                                        <input type="text" id="nombre_form" name="nombre_form" class="form-control" placeholder="Nombre completo" value="'.$nombre_completo.'">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cuenta</label>
                                        <div class="col-sm-4">
                                        <input type="text" id="usuario_form" name="usuario_form" class="form-control" placeholder="Usuario" value="'.$usuario.'">
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label style="padding-top: 10px;">
                                                    <input type="checkbox" value="" id="cambiar_pass_form" name="cambiar_pass_form" >
                                                    <span class="text-inverse">Cambiar contraseña</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <input type="password" id="pass_form" name="pass_form" class="form-control" placeholder="Contraseña" value="" ReadOnly>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Correo electrónico</label>
                                       
                                        <div class="col-sm-4">
                                        <input type="email" id="correo_form" name="correo_form" class="form-control" placeholder="Correo" value="'.$correo.'">
                                        </div>

                                        <label class="col-sm-2 col-form-label">Número celular</label>
                                        <div class="col-sm-4">
                                        <input type="tel" id="celular_form" name="celular_form_form" class="form-control" placeholder="Celular" value="'.$celular.'">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                                        <div class="col-sm-4">
                                        <input type="date" id="fecha_form" name="fecha_form" class="form-control" placeholder="Fecha de nacimiento" value="'.$fecha_nac.'">
                                        </div>
                                    </div>

                                    <label>Domicilio</label></br></br>

                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Calle</label>
                                        <div class="col-sm-4">
                                        <input type="text" id="calle_form" name="calle_form" class="form-control" placeholder="Calle" value="'.$dom_calle.'">
                                        </div>

                                        <label class="col-sm-1 col-form-label">Interior</label>
                                        <div class="col-sm-2">
                                        <input type="text" id="interior_form" name="interior_form" class="form-control" placeholder="Interior" value="'.$dom_interior.'">
                                        </div>

                                        <label class="col-sm-1 col-form-label">Exterior</label>
                                        <div class="col-sm-2">
                                        <input type="text" id="exterior_form" name="exterior_form" class="form-control" placeholder="Exterior" value="'.$dom_exterior.'">
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Colonia</label>
                                        <div class="col-sm-4">
                                        <input type="text" id="colonia_form" name="colonia_form" class="form-control" placeholder="Colonia" value="'.$dom_colonia.'">
                                        </div>

                                        <label class="col-sm-1 col-form-label">Ciudad</label>
                                        <div class="col-sm-2">
                                        <input type="text" id="ciudad_form" name="ciudad_form" class="form-control" placeholder="Ciudad" value="'.$dom_ciudad.'">
                                        </div>

                                        <label class="col-sm-1 col-form-label">Estado</label>
                                        <div class="col-sm-2">
                                        <input type="text" id="estado_form" name="estado_form" class="form-control" placeholder="Estado" value="'.$dom_estado.'">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-md-12 " style="text-align: center;">
                                <button class="btn btn-success waves-effect waves-light" onclick="guardar_edicion();">Guardar</button>
                                <button class="btn btn-danger waves-effect waves-light" onclick="eliminar_control();">Eliminar</button>
                                <button class="btn btn-warning waves-effect waves-light" onclick="location.reload();">Cancelar</button>
                            </div>
                        </div>
                   
        ';
        return $html;
    }

    function nuevo($conexion){
        include $conexion;
        $html = '';
        $html .= '
                        
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <label>Nuevo usuario</label></br></br>
                    <form class="">
                        <input type="hidden" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="" ReadOnly>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombre completo</label>
                            <div class="col-sm-10">
                            <input type="text" id="nombre_form" name="nombre_form" class="form-control" placeholder="Nombre completo" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Usuario</label>
                            <div class="col-sm-4">
                            <input type="text" id="usuario_form" name="usuario_form" class="form-control" placeholder="Usuario" value="">
                            </div>

                            <label class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-4">
                            <input type="password" id="pass_form" name="pass_form" class="form-control" placeholder="Contraseña" value="">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Correo electrónico</label>
                        
                            <div class="col-sm-4">
                            <input type="email" id="correo_form" name="correo_form" class="form-control" placeholder="Correo" value="">
                            </div>

                            <label class="col-sm-2 col-form-label">Número celular</label>
                            <div class="col-sm-4">
                            <input type="tel" id="celular_form" name="celular_form_form" class="form-control" placeholder="Celular" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                            <div class="col-sm-4">
                            <input type="date" id="fecha_form" name="fecha_form" class="form-control" placeholder="Fecha de nacimiento" value="">
                            </div>
                        </div>

                        <label>Domicilio</label></br></br>

                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Calle</label>
                            <div class="col-sm-4">
                            <input type="text" id="calle_form" name="calle_form" class="form-control" placeholder="Calle" value="">
                            </div>

                            <label class="col-sm-1 col-form-label">Interior</label>
                            <div class="col-sm-2">
                            <input type="text" id="interior_form" name="interior_form" class="form-control" placeholder="Interior" value="">
                            </div>

                            <label class="col-sm-1 col-form-label">Exterior</label>
                            <div class="col-sm-2">
                            <input type="text" id="exterior_form" name="exterior_form" class="form-control" placeholder="Exterior" value="">
                            </div>
                        </div>

                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Colonia</label>
                            <div class="col-sm-4">
                            <input type="text" id="colonia_form" name="colonia_form" class="form-control" placeholder="Colonia" value="">
                            </div>

                            <label class="col-sm-1 col-form-label">Ciudad</label>
                            <div class="col-sm-2">
                            <input type="text" id="ciudad_form" name="ciudad_form" class="form-control" placeholder="Ciudad" value="">
                            </div>

                            <label class="col-sm-1 col-form-label">Estado</label>
                            <div class="col-sm-2">
                            <input type="text" id="estado_form" name="estado_form" class="form-control" placeholder="Estado" value="">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-md-12 " style="text-align: center;">
                    <button class="btn btn-success waves-effect waves-light" onclick="guardar_nuevo();">Guardar</button>
                </div>
            </div>
                   
        ';
        return $html;
    }

    function guardar_edicion($codigo, $guardar_pass,
    $estado_form,
    $ciudad_form,
    $colonia_form,
    $exterior_form,
    $interior_form,
    $calle_form,
    $fecha_form,
    $celular_form,
    $correo_form,
    $pass_form,
    $usuario_form,
    $nombre_form, $conexion){
        include $conexion;
        if($guardar_pass == 1){
            $pass_form = md5($pass_form);
            $contrasenia = ", password='$pass_form'";
        }else{
            $contrasenia = '';
        }
        date_default_timezone_set('America/Mexico_City');
        $hoy = new DateTime();
    	$hoy_u = $hoy->getTimestamp();

        $respuesta = 0; 
        $sql_gaurdar = "UPDATE usuarios SET nombre_completo='$nombre_form', usuario='$usuario_form',  correo='$correo_form', celular='$celular_form',
        fecha_nacimiento='$fecha_form', dom_calle='$calle_form', dom_interior='$interior_form', dom_exterior='$exterior_form', dom_colonia='$colonia_form', 
        dom_ciudad='$ciudad_form', dom_estado='$estado_form', datemodified= '$hoy_u' ".$contrasenia."
         WHERE id = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar control ".$sql_gaurdar;
		}
        return $respuesta;
    }

    function guardar_nuevo($estado_form,
    $ciudad_form,
    $colonia_form,
    $exterior_form,
    $interior_form,
    $calle_form,
    $fecha_form,
    $celular_form,
    $correo_form,
    $pass_form,
    $usuario_form,
    $nombre_form, $conexion){

        date_default_timezone_set('America/Mexico_City');
        $hoy = new DateTime();
    	$hoy_u = $hoy->getTimestamp();

        include $conexion;
        $respuesta = 0;
        $pass_form = md5($pass_form);
        
         $sql_gaurdar = "INSERT INTO usuarios(nombre_completo, usuario, password, correo, celular, fecha_nacimiento, dom_calle, 
         dom_interior, dom_exterior, dom_colonia, dom_ciudad, dom_estado, status_usuario, datecreated, datemodified) 
         VALUES('{$nombre_form}','{$usuario_form}','{$pass_form}','{$correo_form}','{$celular_form}','{$fecha_form}','{$calle_form}',
         '{$interior_form}','{$exterior_form}','{$colonia_form}','{$ciudad_form}','{$estado_form}', 1,'{$hoy_u}', '{$hoy_u}')";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al guardar nuevo ".$sql_gaurdar;
		} 
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE usuarios SET status_usuario = 0 WHERE id = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }

}

class companias{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT cli.id, cli.nombre, gi.nombre AS nombre_giro FROM cliente AS cli
        LEFT JOIN giros AS gi ON gi.id_giro = cli.id_giro WHERE (cli.id LIKE '%$codigo%' OR cli.nombre LIKE '%$codigo%') AND cli.status_empresa = 1";
        //echo $sql_consulta;
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px;">'.$fila['nombre'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['nombre_giro'].'</p></td>';
               
            }
            
        }   
        
        $html .= '
            <div class="col-xl-12 col-md-12">
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-xs table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">Acción</th>
                                    <th style="width: 30%;">Nombre</th>
                                    <th style="width: 30%;">Giro</th>
                                </tr>
                            </thead>
                            <tbody>
                            '.$contenido.'
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';

        return $html;
    }

    function detalles($codigo = null, $conexion){
        include $conexion;
        $html = '';
        
        $nombre_completo = '';
        $giro_option = '';

        $sql_consulta_control = "SELECT * FROM cliente WHERE id = '$codigo' AND status_empresa = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);

            $nombre_completo = $fila['nombre'];
            $giro = $fila['id_giro'];
            
        }
        
        $sql_consulta_giro = "SELECT * FROM giros WHERE status_giro = 1";
        $query_servicio = $mysqli->query($sql_consulta_giro);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                if($giro == $fila['id_giro']){
                    $giro_option .= '<option value="'.$fila['id_giro'].'" selected>'.$fila['nombre'].'</option>';
                }else{
                    $giro_option .= '<option value="'.$fila['id_giro'].'">'.$fila['nombre'].'</option>';
                }
            }
        }
        
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar companía: '.$nombre_completo.'</label></br></br>
                                <form class="">
                                    <input type="hidden" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo.'" ReadOnly>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                        <input type="text" id="nombre_form" name="nombre_form" class="form-control" placeholder="Nombre completo" value="'.$nombre_completo.'">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giro</label>
                                        <div class="col-sm-10">
                                        <select name="select_giro" id="select_giro" class="form-control">
                                            '.$giro_option.'
                                        </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-md-12 " style="text-align: center;">
                                <button class="btn btn-success waves-effect waves-light" onclick="guardar_edicion();">Guardar</button>
                                <button class="btn btn-danger waves-effect waves-light" onclick="eliminar_control();">Eliminar</button>
                                <button class="btn btn-warning waves-effect waves-light" onclick="location.reload();">Cancelar</button>
                            </div>
                        </div>
                   
        ';
        return $html;
    }

    function nuevo($conexion){
        include $conexion;
        $html = '';
        $giro_option = '';
        $madurez_option = '';
        $sql_consulta_giro = "SELECT * FROM giros WHERE status_giro = 1";
        $query_servicio = $mysqli->query($sql_consulta_giro);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
              
                    $giro_option .= '<option value="'.$fila['id_giro'].'">'.$fila['nombre'].'</option>';
                
            }
        }

        $sql_consulta_madurez = "SELECT * FROM nivel_madurez WHERE status_madurez = 1";
        $query_servicio = $mysqli->query($sql_consulta_madurez);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
              
                    $madurez_option .= '<option value="'.$fila['id'].'">'.$fila['descripcion'].'</option>';
                
            }
        }
        
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Nueva companía</label></br></br>
                                <form class="">
                                    <input type="hidden" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="" ReadOnly>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                        <input type="text" id="nombre_form" name="nombre_form" class="form-control" placeholder="Nombre" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giro</label>
                                        <div class="col-sm-4">
                                        <select name="select_giro" id="select_giro" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$giro_option.'
                                        </select>
                                        </div>

                                        <label class="col-sm-2 col-form-label">Nivel de madurez</label>
                                        <div class="col-sm-4">
                                        <select name="select_madurez" id="select_madurez" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$madurez_option.'
                                        </select>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-xl-12 col-md-12 " style="text-align: center;">
                            <button class="btn btn-success waves-effect waves-light" onclick="guardar_nuevo();">Guardar</button>
                        </div>
                    </div>
                   
        ';
        return $html;
    }

    function guardar_edicion($codigo, $nombre, $giro, $conexion){
        include $conexion;
      
        date_default_timezone_set('America/Mexico_City');
        $hoy = new DateTime();
    	$hoy_u = $hoy->getTimestamp();

        $respuesta = 0; 
        $sql_gaurdar = "UPDATE cliente SET nombre='$nombre', id_giro='$giro', datemodified= '$hoy_u'
         WHERE id = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar compania ".$sql_gaurdar;
		}
        return $respuesta;
    }

    function guardar_nuevo($nombre, $giro, $madurez, $conexion){

        date_default_timezone_set('America/Mexico_City');
        $hoy = new DateTime();
    	$hoy_u = $hoy->getTimestamp();
        $id_cliente = '';
        include $conexion;
        $respuesta = 0;
        
         $sql_gaurdar = "INSERT INTO cliente (nombre, id_giro, id_madurez, status_empresa, datecreated, datemodified) 
         VALUES('{$nombre}',{$giro},{$madurez}, 1,'{$hoy_u}', '{$hoy_u}')";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
            $id_cliente = $mysqli->insert_id;
		}else {
			$respuesta =  "Error: Error al guardar nuevo ".$sql_gaurdar;
		} 

        $sql_select_entidades = "SELECT con.id_control FROM giros_x_entidad AS gix
        LEFT JOIN control AS con ON con.id_entidad = gix.id_entidad
        WHERE gix.id_giro =  {$giro}";
         $query_servicio = $mysqli->query($sql_select_entidades);
        if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
              if($fila['id_control'] != ''){
                $sql_gaurdar = "INSERT INTO control_cliente (id_control, id_cliente, status_conexion, version, version_descripcion) 
                VALUES('{$fila['id_control']}','{$id_cliente}', 1, 1, 'VERSIÓN 1')";

                if ($mysqli->query($sql_gaurdar) === TRUE) {
                   // echo "Control ligado con exito";
                   $respuesta = 1; 

                    //Crear plan de acción
                    $id_control = $mysqli->insert_id;
                    $sql_gaurdar = "INSERT INTO cliente_diagnostico (id_version_diag, descripcion_version, id_control_cliente) 
                    VALUES(1, 'VERSIÓN 1' ,'{$id_control}')";
                    if ($mysqli->query($sql_gaurdar) === TRUE) {
                        //Seguir
                    }else{
                        //Parar 
                        echo "No se creó la plantilla de plan de acción";
                    }

                }else{
                    echo "No ligaron los objetivos de control";
                }
              }
            }
        }
        
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE cliente SET status_empresa = 0 WHERE id = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }

}
