<?php
class objetivos_control{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM control WHERE (id_control LIKE '%$codigo%' OR descripcion LIKE '%$codigo%') AND status_control = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id_control'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_control'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td></tr>';
               
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
                                    <th style="width: 15%;">Código</th>
                                    <th style="width: 70%;">Descripción</th>
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
        $descripcion = '';
        $referencia = '';
        $riesgo = '';
        $documentado = '';
        $autorizado = '';
        $difundido = '';
        $ejecutado = '';
        $monitoreado = '';

        $entidad = '';
        $entidad_sel = '';

        $proceso = '';
        $proceso_sel = '';

        $tipo_riesgo = '';
        $tipo_riesgo_sel = '';

        $tipo_control = '';
        $tipo_control_sel = '';

        $sql_consulta_control = "SELECT * FROM control WHERE id_control = '$codigo' AND status_control = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $descripcion = $fila['descripcion'];
            $referencia = $fila['referencia'];
            $riesgo = $fila['riesgo'];
            $documentado = $fila['documentado'];
            $autorizado = $fila['autorizado'];
            $difundido = $fila['difundido'];
            $ejecutado = $fila['ejecutado'];
            $monitoreado = $fila['monitoreado'];
            $entidad_sel = $fila['id_entidad'];
            $proceso_sel = $fila['id_proceso'];
            $tipo_riesgo_sel = $fila['id_tipo_riesgo'];
            $tipo_control_sel = $fila['id_tipo_control'];
        }
        
        $sql_consulta_entidad = "SELECT * FROM entidad WHERE status_entidad = 1";
        $query_servicio = $mysqli->query($sql_consulta_entidad);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                if($entidad_sel == $fila['id_entidad']){
                    $entidad .= '<option value="'.$fila['id_entidad'].'" selected>'.$fila['descripcion'].'</option>';
                }else{
                    $entidad .= '<option value="'.$fila['id_entidad'].'">'.$fila['descripcion'].'</option>';
                }
            }
        }

        $sql_consulta_proceso = "SELECT * FROM proceso WHERE status_proceso = 1";
        $query_servicio = $mysqli->query($sql_consulta_proceso);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                if($proceso_sel == $fila['id_proceso']){
                    $proceso .= '<option value="'.$fila['id_proceso'].'" selected>'.$fila['descripcion'].'</option>';
                }else{
                    $proceso .= '<option value="'.$fila['id_proceso'].'">'.$fila['descripcion'].'</option>';
                }
            }
        }

        $sql_consulta_riesgo = "SELECT * FROM tipo_riesgo WHERE status_riesgo = 1";
        $query_servicio = $mysqli->query($sql_consulta_riesgo);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                if($tipo_riesgo_sel  == $fila['id_tipo_riesgo']){
                    $tipo_riesgo .= '<option value="'.$fila['id_tipo_riesgo'].'" selected>'.$fila['descripcion'].'</option>';
                }else{
                    $tipo_riesgo .= '<option value="'.$fila['id_tipo_riesgo'].'">'.$fila['descripcion'].'</option>';
                }
            }
        }

        $sql_consulta_control = "SELECT * FROM tipo_control WHERE status_control = 1";
        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                if($tipo_control_sel  == $fila['id_tipo_control']){
                    $tipo_control .= '<option value="'.$fila['id_tipo_control'].'" selected>'.$fila['descripcion'].'</option>';
                }else{
                    $tipo_control .= '<option value="'.$fila['id_tipo_control'].'">'.$fila['descripcion'].'</option>';
                }
            }
        }

        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar objetivo de control: '.$codigo.'</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo.'" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción">'.$descripcion.'</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Entidad</label>
                                        <div class="col-sm-10">
                                        <select name="select_entidad" id="select_entidad" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$entidad.'
                                        </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Proceso</label>
                                        <div class="col-sm-10">
                                        <select name="select_proceso" id="select_proceso" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$proceso.'
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tipo de riesgo</label>
                                        <div class="col-sm-10">
                                        <select name="select_riesgo" id="select_riesgo" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$tipo_riesgo .'
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tipo de control</label>
                                        <div class="col-sm-10">
                                        <select name="select_control" id="select_control" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$tipo_control.'
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Referencia</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="referencia_form" name="referencia_form" placeholder="Escribe una referencia">'.$referencia.'</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Riesgo</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="riesgo_form" name="riesgo_form" placeholder="Escribe el riesgo">'.$riesgo.'</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>';
                                                if($documentado == 1){
                                                    $html .= '
                                                    <input type="checkbox" value="" id="documentado_form" name="documentado_form"  checked>';
                                                }else{
                                                    $html .= '
                                                    <input type="checkbox" value="" id="documentado_form" name="documentado_form" >';
                                                }
                                                $html .= '
                                                    <span class="text-inverse">Documentado</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>';
                                                if($autorizado == 1){
                                                    $html .= '
                                                    <input type="checkbox" value="" id="autorizado_form" name="autorizado_form" checked>';
                                                }else{
                                                    $html .= '
                                                    <input type="checkbox" value="" id="autorizado_form" name="autorizado_form">';
                                                }
                                                $html .= '
                                                    <span class="text-inverse">Autorizado</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>';
                                                if($difundido == 1){
                                                    $html .= '
                                                    <input type="checkbox" value="" id="difundido_form" name="difundido_form" checked>';
                                                }else{
                                                    $html .= '
                                                    <input type="checkbox" value="" id="difundido_form" name="difundido_form" >';
                                                }
                                                $html .= '
                                                    <span class="text-inverse">Difundido</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>';
                                                if($ejecutado == 1){
                                                    $html .= '
                                                    <input type="checkbox" value="" id="ejecutado_form" name="ejecutado_form" checked>';
                                                }else{
                                                    $html .= '
                                                    <input type="checkbox" value="" id="ejecutado_form" name="ejecutado_form">';
                                                }
                                                $html .= '
                                                    <span class="text-inverse">Ejecutado</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>';
                                                if($monitoreado == 1){
                                                    $html .= '
                                                    <input type="checkbox" value="" id="monitoreado_form" name="monitoreado_form" checked>';
                                                }else{
                                                    $html .= '
                                                    <input type="checkbox" value="" id="monitoreado_form" name="monitoreado_form">';
                                                }
                                                $html .= '
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

        $entidad = '';

        $proceso = '';

        $tipo_riesgo = '';

        $tipo_control = '';

        $sql_consulta = "SELECT id_control FROM control  
        ORDER BY control.id_control  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_control'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);

    
        
        $sql_consulta_entidad = "SELECT * FROM entidad WHERE status_entidad = 1";
        $query_servicio = $mysqli->query($sql_consulta_entidad);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                    $entidad .= '<option value="'.$fila['id_entidad'].'">'.$fila['descripcion'].'</option>';
                
            }
        }

        $sql_consulta_proceso = "SELECT * FROM proceso WHERE status_proceso = 1";
        $query_servicio = $mysqli->query($sql_consulta_proceso);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                    $proceso .= '<option value="'.$fila['id_proceso'].'">'.$fila['descripcion'].'</option>';
                
            }
        }

        $sql_consulta_riesgo = "SELECT * FROM tipo_riesgo WHERE status_riesgo = 1";
        $query_servicio = $mysqli->query($sql_consulta_riesgo);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                    $tipo_riesgo .= '<option value="'.$fila['id_tipo_riesgo'].'">'.$fila['descripcion'].'</option>';
                
            }
        }

        $sql_consulta_control = "SELECT * FROM tipo_control WHERE status_control = 1";
        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                    $tipo_control .= '<option value="'.$fila['id_tipo_control'].'">'.$fila['descripcion'].'</option>';
                
            }
        }

        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Nuevo objetivo de control</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$id_guardar.'" readOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Entidad</label>
                                        <div class="col-sm-10">
                                        <select name="select_entidad" id="select_entidad" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$entidad.'
                                        </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Proceso</label>
                                        <div class="col-sm-10">
                                        <select name="select_proceso" id="select_proceso" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$proceso.'
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tipo de riesgo</label>
                                        <div class="col-sm-10">
                                        <select name="select_riesgo" id="select_riesgo" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$tipo_riesgo .'
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tipo de control</label>
                                        <div class="col-sm-10">
                                        <select name="select_control" id="select_control" class="form-control">
                                            <option value="0">Selecciona una opción</option>
                                            '.$tipo_control.'
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Referencia</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="referencia_form" name="referencia_form" placeholder="Escribe una referencia"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Riesgo</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="riesgo_form" name="riesgo_form" placeholder="Escribe el riesgo"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>
                                                    <input type="checkbox" value="" id="documentado_form" name="documentado_form" >
                                                    <span class="text-inverse">Documentado</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>
                                                    <input type="checkbox" value="" id="autorizado_form" name="autorizado_form">
                                                
                                                    <span class="text-inverse">Autorizado</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>
                                                    <input type="checkbox" value="" id="difundido_form" name="difundido_form" >
                                                    <span class="text-inverse">Difundido</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>
                                                    <input type="checkbox" value="" id="ejecutado_form" name="ejecutado_form">
                                                    <span class="text-inverse">Ejecutado</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div>
                                                <label>
                                                    <input type="checkbox" value="" id="monitoreado_form" name="monitoreado_form">
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
                                <button class="btn btn-success waves-effect waves-light" onclick="guardar_nuevo();">Guardar</button>
                            </div>
                        </div>
                   
        ';
        return $html;
    }

    function guardar_edicion($codigo, $descripcion, $select_entidad, $select_proceso, $select_riesgo, $select_control, $referencia_form, $riesgo_form, $documentado_form, $autorizado_form,$difundido_form, $ejecutado_form, $monitoreado_form, $conexion){
        include $conexion;
        $respuesta = 0; 
        $sql_gaurdar = "UPDATE control SET descripcion='$descripcion', id_proceso='$select_proceso',id_entidad='$select_entidad',id_tipo_riesgo='$select_riesgo',id_tipo_control='$select_control',documentado=$documentado_form,autorizado=$autorizado_form,
        difundido=$difundido_form,ejecutado=$ejecutado_form,monitoreado=$monitoreado_form,referencia='$referencia_form',riesgo='$riesgo_form' WHERE id_control = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar control ".$sql_gaurdar;
		}
        return $respuesta;
    }

    function guardar_nuevo($codigo, $descripcion, $select_entidad, $select_proceso, $select_riesgo, $select_control, $referencia_form, $riesgo_form, $documentado_form, $autorizado_form,$difundido_form, $ejecutado_form, $monitoreado_form, $conexion){
        include $conexion;
        $respuesta = 0; 
        $id_actual= '';
        $sql_consulta = "SELECT id_control FROM control  
        ORDER BY control.id_control  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_control'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);
        
         $sql_gaurdar = "INSERT INTO control (id_control, descripcion, id_proceso, id_entidad, id_tipo_riesgo, id_tipo_control, documentado, autorizado,
        difundido, ejecutado, monitoreado, referencia, riesgo, status_control)
        VALUES ('$id_guardar', '$descripcion', '$select_proceso','$select_entidad','$select_riesgo','$select_control',$documentado_form,$autorizado_form,
        $difundido_form,$ejecutado_form,$monitoreado_form,'$referencia_form','$riesgo_form', 1)";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar control ".$sql_gaurdar;
		} 
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE control SET status_control = 0 WHERE id_control = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }

}

class entidad{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM entidad WHERE (id_entidad LIKE '%$codigo%' OR descripcion LIKE '%$codigo%') AND status_entidad = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id_entidad'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_entidad'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td></tr>';
               
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
                                    <th style="width: 15%;">Código</th>
                                    <th style="width: 70%;">Descripción</th>
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
        $codigo_seleccionado = '';
        $descripcion = '';

        $sql_consulta_control = "SELECT * FROM entidad WHERE id_entidad = '$codigo' AND status_entidad = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $descripcion = $fila['descripcion'];
            $codigo_seleccionado = $fila['id_entidad'];
        }
        
       

        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar entidad: '.$codigo_seleccionado.'</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo_seleccionado.'" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción">'.$descripcion.'</textarea>
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
        $sql_consulta = "SELECT id_entidad FROM entidad  
        ORDER BY entidad.id_entidad  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_entidad'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);

        $html = '';
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Nueva entidad</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$id_guardar.'" readOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción"></textarea>
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

    
    function guardar_edicion($codigo, $descripcion, $conexion){
        include $conexion;
        $respuesta = 0; 
        $sql_gaurdar = "UPDATE entidad SET descripcion='$descripcion' WHERE id_entidad = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar control ".$sql_gaurdar;
		}
        return $respuesta;
    }

    function guardar_nuevo($codigo, $descripcion, $conexion){
        include $conexion;
        $respuesta = 0; 
        $id_actual= '';
        $sql_consulta = "SELECT id_entidad FROM entidad  
        ORDER BY entidad.id_entidad  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_entidad'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);
        
         $sql_gaurdar = "INSERT INTO entidad (id_entidad, descripcion, status_entidad)
        VALUES ('$id_guardar', '$descripcion', 1)";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar control ".$sql_gaurdar;
		} 
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE entidad SET status_entidad = 0 WHERE id_entidad = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }


}


class procesos{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM proceso WHERE (id_proceso LIKE '%$codigo%' OR descripcion LIKE '%$codigo%') AND status_proceso = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id_proceso'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_proceso'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td></tr>';
               
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
                                    <th style="width: 15%;">Código</th>
                                    <th style="width: 70%;">Descripción</th>
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
        $descripcion = '';
        $ind_riesgo_uno= '';
        $ind_riesgo_dos= '';
        $ind_riesgo_tres= '';
        $ind_riesgo_cuatro= '';
        $ind_riesgo_cinco= '';
        $ind_riesgo_seis= '';
        $ind_riesgo_siete= '';
        $ind_riesgo_ocho= '';
        $ind_riesgo_nueve= '';
        $ind_riesgo_diez= '';

        $sql_consulta_control = "SELECT * FROM proceso WHERE id_proceso = '$codigo' AND status_proceso = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $descripcion = $fila['descripcion'];
            $ind_riesgo_uno= $fila['ind_riesgo_uno'];
            $ind_riesgo_dos= $fila['ind_riesgo_dos'];
            $ind_riesgo_tres= $fila['ind_riesgo_tres'];
            $ind_riesgo_cuatro= $fila['ind_riesgo_cuatro'];
            $ind_riesgo_cinco= $fila['ind_riesgo_cinco'];
            $ind_riesgo_seis= $fila['ind_riesgo_seis'];
            $ind_riesgo_siete= $fila['ind_riesgo_siete'];
            $ind_riesgo_ocho= $fila['ind_riesgo_ocho'];
            $ind_riesgo_nueve= $fila['ind_riesgo_nueve'];
            $ind_riesgo_diez= $fila['ind_riesgo_diez'];
        }
        
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar objetivo de control: '.$codigo.'</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo.'" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción">'.$descripcion.'</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-xs table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 50%;">%</th>
                                                                <th style="width: 50%;">Nivel</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_diez" name="ind_riesgo_diez" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_diez.'"></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">10</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_nueve" name="ind_riesgo_nueve" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_nueve.'"></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">9</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_ocho" name="ind_riesgo_ocho" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_ocho.'"></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">8</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_siete" name="ind_riesgo_siete" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_siete.'"></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">7</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-warning"><input type="text" id="ind_riesgo_seis" name="ind_riesgo_seis" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_seis.'"></td>
                                                                <td class="bg-warning"><p style="padding-top: 12px; text-align: center;">6</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-warning"><input type="text" id="ind_riesgo_cinco" name="ind_riesgo_cinco" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_cinco.'"></td>
                                                                <td class="bg-warning"><p style="padding-top: 12px; text-align: center;">5</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-warning"><input type="text" id="ind_riesgo_cuatro" name="ind_riesgo_cuatro" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_cuatro.'"></td>
                                                                <td class="bg-warning"><p style="padding-top: 12px; text-align: center;">4</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-success"><input type="text" id="ind_riesgo_tres" name="ind_riesgo_tres" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_tres.'"></td>
                                                                <td class="bg-success"><p style="padding-top: 12px; text-align: center;">3</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-success"><input type="text" id="ind_riesgo_dos" name="ind_riesgo_dos" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_dos.'"></td>
                                                                <td class="bg-success"><p style="padding-top: 12px; text-align: center;">2</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-success"><input type="text" id="ind_riesgo_uno" name="ind_riesgo_uno" class="form-control input-centrado" placeholder="" value="'.$ind_riesgo_uno.'"></td>
                                                                <td class="bg-success"><p style="padding-top: 12px; text-align: center;">1</p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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

        $sql_consulta = "SELECT id_proceso FROM proceso  
        ORDER BY proceso.id_proceso  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_proceso'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);

    
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar objetivo de control: '.$id_guardar.'</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$id_guardar.'" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-xs table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 50%;">%</th>
                                                                <th style="width: 50%;">Nivel</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_diez" name="ind_riesgo_diez" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">10</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_nueve" name="ind_riesgo_nueve" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">9</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_ocho" name="ind_riesgo_ocho" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">8</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-danger"><input type="text" id="ind_riesgo_siete" name="ind_riesgo_siete" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-danger"><p style="padding-top: 12px; text-align: center;">7</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-warning"><input type="text" id="ind_riesgo_seis" name="ind_riesgo_seis" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-warning"><p style="padding-top: 12px; text-align: center;">6</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-warning"><input type="text" id="ind_riesgo_cinco" name="ind_riesgo_cinco" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-warning"><p style="padding-top: 12px; text-align: center;">5</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-warning"><input type="text" id="ind_riesgo_cuatro" name="ind_riesgo_cuatro" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-warning"><p style="padding-top: 12px; text-align: center;">4</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-success"><input type="text" id="ind_riesgo_tres" name="ind_riesgo_tres" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-success"><p style="padding-top: 12px; text-align: center;">3</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-success"><input type="text" id="ind_riesgo_dos" name="ind_riesgo_dos" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-success"><p style="padding-top: 12px; text-align: center;">2</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-proceso bg-success"><input type="text" id="ind_riesgo_uno" name="ind_riesgo_uno" class="form-control input-centrado" placeholder="" value=""></td>
                                                                <td class="bg-success"><p style="padding-top: 12px; text-align: center;">1</p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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

    function guardar_edicion($codigo, $descripcion, $ind_riesgo_uno, $ind_riesgo_dos, $ind_riesgo_tres,$ind_riesgo_cuatro,$ind_riesgo_cinco,$ind_riesgo_seis, $ind_riesgo_siete,$ind_riesgo_ocho,$ind_riesgo_nueve,$ind_riesgo_diez,$conexion){
        include $conexion;
        
        $respuesta = 0; 
        $sql_gaurdar = "UPDATE proceso SET descripcion='$descripcion', ind_riesgo_uno=$ind_riesgo_uno, ind_riesgo_dos=$ind_riesgo_dos, ind_riesgo_tres=$ind_riesgo_tres, ind_riesgo_cuatro=$ind_riesgo_cuatro, 
        ind_riesgo_cinco=$ind_riesgo_cinco, ind_riesgo_seis=$ind_riesgo_seis, ind_riesgo_siete=$ind_riesgo_siete, ind_riesgo_ocho=$ind_riesgo_ocho, ind_riesgo_nueve=$ind_riesgo_nueve, ind_riesgo_diez=$ind_riesgo_diez WHERE id_proceso = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar proceso ".$sql_gaurdar;
		}
        return $respuesta;
    }

    function guardar_nuevo($codigo, $descripcion, $ind_riesgo_uno, $ind_riesgo_dos, $ind_riesgo_tres,$ind_riesgo_cuatro,$ind_riesgo_cinco,$ind_riesgo_seis, $ind_riesgo_siete,$ind_riesgo_ocho,$ind_riesgo_nueve,$ind_riesgo_diez,$conexion){
        include $conexion;
        $respuesta = 0; 
        $id_actual= '';
        $sql_consulta = "SELECT id_proceso FROM proceso  
        ORDER BY proceso.id_proceso  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_proceso'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);
        
         $sql_gaurdar = "INSERT INTO proceso (id_proceso, descripcion, ind_riesgo_uno, ind_riesgo_dos, ind_riesgo_tres,ind_riesgo_cuatro,
         ind_riesgo_cinco,ind_riesgo_seis,ind_riesgo_siete,ind_riesgo_ocho,ind_riesgo_nueve,ind_riesgo_diez, status_proceso)
        VALUES ('$id_guardar', '$descripcion', $ind_riesgo_uno, $ind_riesgo_dos, $ind_riesgo_tres,$ind_riesgo_cuatro,
        $ind_riesgo_cinco,$ind_riesgo_seis, $ind_riesgo_siete,$ind_riesgo_ocho,$ind_riesgo_nueve,$ind_riesgo_diez, 1)";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar proceso ".$sql_gaurdar;
		} 
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE proceso SET status_proceso = 0 WHERE id_proceso = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }

}

class tipo_riesgo{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM tipo_riesgo WHERE (id_tipo_riesgo LIKE '%$codigo%' OR descripcion LIKE '%$codigo%') AND status_riesgo = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id_tipo_riesgo'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_tipo_riesgo'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td></tr>';
               
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
                                    <th style="width: 15%;">Código</th>
                                    <th style="width: 70%;">Descripción</th>
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
        $codigo_seleccionado = '';
        $descripcion = '';

        $sql_consulta_control = "SELECT * FROM tipo_riesgo WHERE id_tipo_riesgo = '$codigo' AND status_riesgo = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $descripcion = $fila['descripcion'];
            $codigo_seleccionado = $fila['id_tipo_riesgo'];
        }
        
       

        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar tipo de riesgo: '.$codigo_seleccionado.'</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo_seleccionado.'" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción">'.$descripcion.'</textarea>
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
        $sql_consulta = "SELECT id_tipo_riesgo FROM tipo_riesgo  
        ORDER BY tipo_riesgo.id_tipo_riesgo  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_tipo_riesgo'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);

        $html = '';
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Nuevo tipo de riesgo</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$id_guardar.'" readOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción"></textarea>
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

    
    function guardar_edicion($codigo, $descripcion, $conexion){
        include $conexion;
        $respuesta = 0; 
        $sql_gaurdar = "UPDATE tipo_riesgo SET descripcion='$descripcion' WHERE id_tipo_riesgo = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar tipo de riesgo ".$sql_gaurdar;
		}
        return $respuesta;
    }

    function guardar_nuevo($codigo, $descripcion, $conexion){
        include $conexion;
        $respuesta = 0; 
        $id_actual= '';
        $sql_consulta = "SELECT id_tipo_riesgo FROM tipo_riesgo  
        ORDER BY tipo_riesgo.id_tipo_riesgo  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_tipo_riesgo'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);
        
         $sql_gaurdar = "INSERT INTO tipo_riesgo (id_tipo_riesgo, descripcion, status_riesgo)
        VALUES ('$id_guardar', '$descripcion', 1)";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar tipo de riesgo ".$sql_gaurdar;
		} 
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE tipo_riesgo SET status_riesgo = 0 WHERE id_tipo_riesgo = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }
}


class tipo_control{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM tipo_control WHERE (id_tipo_control LIKE '%$codigo%' OR descripcion LIKE '%$codigo%') AND status_control = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id_tipo_control'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_tipo_control'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td></tr>';
               
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
                                    <th style="width: 15%;">Código</th>
                                    <th style="width: 70%;">Descripción</th>
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
        $codigo_seleccionado = '';
        $descripcion = '';

        $sql_consulta_control = "SELECT * FROM tipo_control WHERE id_tipo_control = '$codigo' AND status_control = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $descripcion = $fila['descripcion'];
            $codigo_seleccionado = $fila['id_tipo_control'];
        }
        
       

        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar tipo de control: '.$codigo_seleccionado.'</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo_seleccionado.'" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción">'.$descripcion.'</textarea>
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
        $sql_consulta = "SELECT id_tipo_control FROM tipo_control  
        ORDER BY tipo_control.id_tipo_control  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_tipo_control'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);

        $html = '';
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Nuevo tipo de riesgo</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$id_guardar.'" readOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción"></textarea>
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

    
    function guardar_edicion($codigo, $descripcion, $conexion){
        include $conexion;
        $respuesta = 0; 
        $sql_gaurdar = "UPDATE tipo_control SET descripcion='$descripcion' WHERE id_tipo_control = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar tipo de riesgo ".$sql_gaurdar;
		}
        return $respuesta;
    }

    function guardar_nuevo($codigo, $descripcion, $conexion){
        include $conexion;
        $respuesta = 0; 
        $id_actual= '';
        $sql_consulta = "SELECT id_tipo_control FROM tipo_control  
        ORDER BY tipo_control.id_tipo_control  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_tipo_control'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);
        
         $sql_gaurdar = "INSERT INTO tipo_control (id_tipo_control, descripcion, status_control)
        VALUES ('$id_guardar', '$descripcion', 1)";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar tipo de riesgo ".$sql_gaurdar;
		} 
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE tipo_control SET status_control = 0 WHERE id_tipo_control = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }


}

class giros{

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM giros WHERE (id_giro LIKE '%$codigo%' OR nombre LIKE '%$codigo%') AND status_giro = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id_giro'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px;">'.$fila['nombre'].'</p></td></tr>';
               
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
                                    <th style="width: 70%;">Descripción</th>
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
        $codigo_seleccionado = '';
        $descripcion = '';
        $contenido = '';
        $entidades = '';
        $sql_consulta_control = "SELECT * FROM giros WHERE id_giro = '$codigo' AND status_giro = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $descripcion = $fila['nombre'];
            $codigo_seleccionado = $fila['id_giro'];
        }

        $sql_consulta = "SELECT ent.id_entidad, ent.descripcion, gix.id_giro FROM entidad AS ent 
        LEFT JOIN giros_x_entidad AS gix ON gix.id_entidad = ent.id_entidad AND gix.id_giro = {$fila['id_giro']}
        WHERE  ent.status_entidad = 1 ORDER BY ent.id_entidad";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_entidad'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td>
                <td>
                    <p style="padding-top: 12px; text-align: center;">';
                    if($fila['id_giro'] != null){
                        $entidades .= ','.$fila['id_entidad'];
                        $contenido .= '<input type="checkbox" value="" id="ligado_'.$fila['id_entidad'].'" name="ligado_'.$fila['id_entidad'].'" onchange="check_control(\''.$fila['id_entidad'].'\');" checked>';
                    }else{
                        $contenido .= '<input type="checkbox" value="" id="ligado_'.$fila['id_entidad'].'" name="ligado_'.$fila['id_entidad'].'" onchange="check_control(\''.$fila['id_entidad'].'\');">';
                    }
                    $contenido .= '</p>
                </td>
                </tr>';
            }
        }   
       

        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar giro: '.$descripcion.'</label></br></br>
                                <form class="">
                                   
                                            <input type="hidden" id="codigo_form" name="codigo_form" class="form-control" value="'.$codigo_seleccionado.'" ReadOnly>
                                            <input type="hidden" id="id_a_ligar" name="id_a_ligar" class="form-control" value="'.$entidades.'">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe un nombre">'.$descripcion.'</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ligar por entidad</label>
                                        <div class="col-sm-10">
                                            <table class="table table-xs table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 15%;">Código</th>
                                                        <th style="width: 70%;">Descripción</th>
                                                        <th style="width: 15%;">Ligado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                '.$contenido.'
                                                </tbody>
                                            </table>
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
        $contenido = '';

        $sql_consulta = "SELECT id_giro FROM giros  
        ORDER BY giros.id_giro  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_giro'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);

        $sql_consulta = "SELECT * FROM entidad WHERE  status_entidad = 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_entidad'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td>
                <td>
                    <p style="padding-top: 12px; text-align: center;">
                        <input type="checkbox" value="" id="ligado_'.$fila['id_entidad'].'" name="ligado_'.$fila['id_entidad'].'" onchange="check_control(\''.$fila['id_entidad'].'\');">
                    </p>
                </td>
                </tr>';
                
            }
            
        }   
       
       

        $html = '';
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Nuevo giro</label></br></br>
                                <form class="">
                                       
                                            <input type="hidden" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$id_guardar.'" readOnly>
                                            <input type="hidden" id="id_a_ligar" name="id_a_ligar" class="form-control" placeholder="" value="">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe un nombre"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ligar por entidad</label>
                                        <div class="col-sm-10">
                                            <table class="table table-xs table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 15%;">Código</th>
                                                        <th style="width: 70%;">Descripción</th>
                                                        <th style="width: 15%;">Ligado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                '.$contenido.'
                                                </tbody>
                                            </table>
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

    
    function guardar_edicion($codigo, $descripcion, $arreglo_ent, $conexion){
        include $conexion;
        $respuesta = 0; 
        $sql_gaurdar = "UPDATE giros SET nombre='$descripcion' WHERE id_giro = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar giro ".$sql_gaurdar;
		}

        $query_eliminar_entidad = "DELETE FROM giros_x_entidad WHERE id_giro = '$codigo'";
        if ($mysqli->query($query_eliminar_entidad) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar entidades ".$sql_gaurdar;
		}

        $ids_entidad = explode(",", $arreglo_ent);
        foreach($ids_entidad as $usr) {
            if($usr != ''){
                $query_entidad_giro = "INSERT INTO giros_x_entidad (id_giro, id_entidad, status_conexion) VALUES ('{$codigo}','{$usr}',1);";
                if ($mysqli->query($query_entidad_giro) === TRUE) {
                    $respuesta = 1; 
                }else {
                    $respuesta =  "Error: Error al ligar giro y entidad ".$query_entidad_giro;
                }  
            }
        }
        
        return $respuesta;
    }

    function guardar_nuevo($codigo, $descripcion, $arreglo_ent, $conexion){
        include $conexion;
        $respuesta = 0; 
        $id_giro = '';
         $sql_gaurdar = "INSERT INTO giros (nombre, status_giro)
        VALUES ('$descripcion', 1)";
         if ($mysqli->query($sql_gaurdar) === TRUE) {
            $id_giro = $mysqli->insert_id;
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al guardar giro ".$sql_gaurdar;
		}  

        $query_entidad_giro = "";
        $ids_entidad = explode(",", $arreglo_ent);
        foreach($ids_entidad as $usr) {
            if($usr != ''){
                $query_entidad_giro = "INSERT INTO giros_x_entidad (id_giro, id_entidad, status_conexion) VALUES ('{$id_giro}','{$usr}',1);";
                if ($mysqli->query($query_entidad_giro) === TRUE) {
                    $respuesta = 1; 
                }else {
                    $respuesta =  "Error: Error al ligar giro y entidad ".$query_entidad_giro;
                }  
            }
        }

        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE giros SET status_giro = 0 WHERE id_giro = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }


}

class nivel_madurez{
    

    function obtener_datos($codigo = null, $conexion){
        include $conexion;
        $html = '';
        $contenido = '';
        $descripcion = '';
        $sql_consulta = "SELECT * FROM nivel_madurez WHERE (id_nivel_madurez LIKE '%$codigo%' OR descripcion LIKE '%$codigo%') AND status_madurez = 1";
         $query_servicio = $mysqli->query($sql_consulta);
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr><th scope="row">
                <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon" onclick="editar(\''.$fila['id'].'\')">
                    <i class="ti-pencil-alt2" style="padding-left: 4px; padding-top: -3px;">
                    </i>
                </button>
                </th>
                <td><p style="padding-top: 12px; text-align: center;">'.$fila['id_nivel_madurez'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td></tr>';
               
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
                                    <th style="width: 15%;">Nivel</th>
                                    <th style="width: 70%;">Descripción</th>
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
        $codigo_seleccionado = '';
        $descripcion = '';
        $id_nivel_madurez = '';

        $sql_consulta_control = "SELECT * FROM nivel_madurez AS niv LEFT JOIN configuracion AS con ON con.id_madurez = niv.id WHERE niv.id = '$codigo' AND niv.status_madurez = 1";

        $query_servicio = $mysqli->query($sql_consulta_control);
		if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $descripcion = $fila['descripcion'];
            $codigo_seleccionado = $fila['id'];
            $id_nivel_madurez = $fila['id_nivel_madurez'];
            $sin_control = $fila['sin_control'];
            $documentado = $fila['documentado'];
            $autorizado = $fila['autorizado'];
            $difundido = $fila['difundido'];
            $ejecutado = $fila['ejecutado'];
            $monitoreado = $fila['monitoreado'];
            $completado = $fila['completado'];
            $desarrollo = $fila['desarrollo'];
        }
        
       

        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Modificar tipo de riesgo: '.$descripcion.'</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$codigo_seleccionado.'" ReadOnly>
                                        </div>

                                        <label class="col-sm-2 col-form-label">Nivel madurez</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="id_nivel_madurez" name="id_nivel_madurez" class="form-control" placeholder="Código" value="'.$id_nivel_madurez.'" ReadOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción" value="'.$descripcion.'">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sin control</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="sin_control" id="sin_control" name="descripcion_form" placeholder="Sin control" value="'.$sin_control.'">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Documentado</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="documentado" name="documentado" placeholder="Documentado" value="'.$documentado.'">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Autorizado</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="sin_control" id="autorizado" name="autorizado" placeholder="Autorizado" value="'.$autorizado.'">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Difundido</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="difundido" name="difundido" placeholder="Difundido" value="'.$difundido.'">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ejecutado</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="sin_control" id="ejecutado" name="ejecutado" placeholder="Ejecutado" value="'.$ejecutado.'">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Monitoreado</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="monitoreado" name="monitoreado" placeholder="Monitoreado" value="'.$monitoreado.'">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Configuración:</label>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Completado</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="completado" id="completado" name="ejecutado" placeholder="Completado" value="'.$completado.'">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Desarrollo</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="desarrollo" name="desarrollo" placeholder="Desarrollo" value="'.$desarrollo.'">
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
        $sql_consulta = "SELECT id_tipo_riesgo FROM tipo_riesgo  
        ORDER BY tipo_riesgo.id_tipo_riesgo  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_tipo_riesgo'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);

        $html = '';
        $html .= '
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <label>Nuevo tipo de riesgo</label></br></br>
                                <form class="">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="'.$id_guardar.'" readOnly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" id="descripcion_form" name="descripcion_form" placeholder="Escribe una descripción"></textarea>
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

    
    function guardar_edicion($codigo, $descripcion, $sin_control, $documentado, $autorizado, $difundido, $ejecutado, $monitoreado, $completado, $desarrollo, $conexion){
        include $conexion;
        $respuesta = 0; 
        $sql_gaurdar = "UPDATE nivel_madurez SET descripcion='{$descripcion}', sin_control = {$sin_control}, documentado = {$documentado}, autorizado = {$autorizado},
        difundido = {$difundido},  ejecutado = {$ejecutado}, monitoreado = {$monitoreado} WHERE id = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar tipo de riesgo ".$sql_gaurdar;
		}

        $sql_gaurdar = "UPDATE configuracion SET completado={$completado}, desarrollo = {$desarrollo} WHERE id_madurez = $codigo";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar tipo de riesgo ".$sql_gaurdar;
		}

        return $respuesta;
    }

    function guardar_nuevo($codigo, $descripcion, $conexion){
        include $conexion;
        $respuesta = 0; 
        $id_actual= '';
        $sql_consulta = "SELECT id_tipo_riesgo FROM tipo_riesgo  
        ORDER BY tipo_riesgo.id_tipo_riesgo  DESC LIMIT 1";
        $query_servicio = $mysqli->query($sql_consulta);
        if($query_servicio->num_rows>=1){
            $fila=$query_servicio->fetch_array(MYSQLI_ASSOC);
            $id_actual_str = $fila['id_tipo_riesgo'];
        }
        $id_num = substr($id_actual_str, 1); 
        $id_actual = intval($id_num);

        $id_nuevo = $id_actual+1;

        $id_guardar = str_replace($id_actual, $id_nuevo, $id_actual_str);
        
         $sql_gaurdar = "INSERT INTO tipo_riesgo (id_tipo_riesgo, descripcion, status_riesgo)
        VALUES ('$id_guardar', '$descripcion', 1)";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar tipo de riesgo ".$sql_gaurdar;
		} 
        return $respuesta;
    }

    function eliminar_control($codigo, $conexion){
        include $conexion;
        $respuesta = 0;
        $sql_gaurdar = "UPDATE tipo_riesgo SET status_riesgo = 0 WHERE id_tipo_riesgo = '$codigo'";
        if ($mysqli->query($sql_gaurdar) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al eliminar ".$sql_gaurdar;
		}
    }
}

?>