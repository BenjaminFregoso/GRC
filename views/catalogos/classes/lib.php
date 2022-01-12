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
                                            <input type="text" id="codigo_form" name="codigo_form" class="form-control" placeholder="Código" value="">
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
?>