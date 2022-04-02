<?php 
class evaluacion{

    function mostrar_tabla($id_empresa, $id_version, $entidad, $proceso, $estatus, $riesgo, $control, $conexion){
        $html = '';
        $contenido = ''; 
        $evaluados = 0;
        $completado = 0;
        $desarrollo = 0;
        $completado_meta = 0;
        $desarrollo_meta = 0;
        $no_aplica = 0;
        $sin_control = 0;
        $nulos = 0;
        $p_requeridos = 0;
        $p_obtenidos = 0;

        include $conexion;
        if($id_version == ''){
            $sql_version = "SELECT version, version_descripcion FROM control_cliente WHERE status_conexion = 1 AND id_cliente = $id_empresa  GROUP BY version ORDER BY version DESC LIMIT 1";
            $query_serv = $mysqli->query($sql_version);
            if($query_serv->num_rows>=1){
                $fila=$query_serv->fetch_array(MYSQLI_ASSOC);
                $id_version = $fila['version'];
            }
        }

        //Obtener los niveles de madurez 
        $monitoreado_val = 0;
        $documentado_val = 0;
        $autorizado_val = 0;
        $difundido_val = 0;
        $ejecutado_val = 0;
        

        $sql_madurez = "SELECT mad.documentado, mad.autorizado, mad.difundido, mad.ejecutado, mad.monitoreado, con.completado, con.desarrollo
        FROM nivel_madurez AS mad 
        LEFT JOIN cliente AS cli ON cli.id_madurez = mad.id 
        LEFT JOIN configuracion AS con ON con.id_madurez = mad.id
        WHERE cli.id = $id_empresa";
        $query_serv = $mysqli->query($sql_madurez);
        if($query_serv->num_rows>=1){
            $fila=$query_serv->fetch_array(MYSQLI_ASSOC);
            $monitoreado_val = $fila['monitoreado'];
            $documentado_val = $fila['documentado'];
            $autorizado_val = $fila['autorizado'];
            $difundido_val = $fila['difundido'];
            $ejecutado_val = $fila['ejecutado'];
            $completado_meta = intval($fila['completado']);
            $desarrollo_meta = intval($fila['desarrollo']);
        }

        $valores = "";
        $valores .= "<input type='hidden' id='monitoreado_val' name='monitoreado_val' class='form-control' placeholder='Código' value='".$monitoreado_val."' readonly>";
        $valores .= "<input type='hidden' id='documentado_val' name='documentado_val' class='form-control' placeholder='Código' value='".$documentado_val."' readonly>";
        $valores .= "<input type='hidden' id='autorizado_val' name='autorizado_val' class='form-control' placeholder='Código' value='".$autorizado_val."' readonly>";
        $valores .= "<input type='hidden' id='difundido_val' name='difundido_val' class='form-control' placeholder='Código' value='".$difundido_val."' readonly>";
        $valores .= "<input type='hidden' id='ejecutado_val' name='ejecutado_val' class='form-control' placeholder='Código' value='".$ejecutado_val."' readonly>";
        $valores .= "<input type='hidden' id='completado' name='completado' class='form-control' placeholder='Código' value='".$completado_meta."' readonly>";
        $valores .= "<input type='hidden' id='desarrollo' name='desarrollo' class='form-control' placeholder='Código' value='".$desarrollo_meta."' readonly>";

        //Crear los filtros 
        $filtros = '';
        if($entidad != ''){
            $filtros .= " AND ent.id_entidad = '{$entidad}' ";
        }
        if($proceso != ''){
            $filtros .= " AND pro.id_proceso = '{$proceso}' ";
        }
        if($estatus != ''){
            if($estatus == 'Sin control'){
                $filtros .= " AND cli.dato_aplica = 1 ";
            }else if($estatus == 'No aplica'){
                $filtros .= " AND cli.dato_sin_control = 1 ";
            }else{
                $filtros .= " AND cli.estatus_evaluacion = '{$estatus}' ";
            }
        }
        if($riesgo != ''){
            $filtros .= " AND tiri.id_tipo_riesgo = '{$riesgo}' ";
        }
        if($control != ''){
            $filtros .= " AND tico.id_tipo_control = '{$control}' ";
        }
        
        $sql_consulta = "SELECT cli.id, cli.dato_aplica, cli.dato_sin_control, cli.dato_documentado, 
        cli.dato_autorizado, cli.dato_difundido, cli.dato_ejecutado, cli.dato_monitoreado,
        cli.total_puntos, cli.estatus_evaluacion,
        con.id_control, con.descripcion, pro.descripcion AS desc_proceso, ent.descripcion 
        AS desc_entidad, tiri.descripcion AS desc_riesgo, tico.descripcion AS desc_control, con.documentado, 
        con.autorizado, con.difundido, con.ejecutado, con.monitoreado, con.referencia, con.riesgo, con.status_control 
        FROM control_cliente AS cli 
        LEFT JOIN control AS con ON cli.id_control = con.id_control
        LEFT JOIN entidad AS ent ON con.id_entidad = ent.id_entidad
        LEFT JOIN proceso AS pro ON pro.id_proceso = con.id_proceso
        LEFT JOIN tipo_riesgo AS tiri ON tiri.id_tipo_riesgo = con.id_tipo_riesgo
        LEFT JOIN tipo_control AS tico ON tico.id_tipo_control = con.id_tipo_control
        WHERE cli.id_cliente = $id_empresa AND cli.version = $id_version AND cli.status_conexion = 1 $filtros";
         $query_servicio = $mysqli->query($sql_consulta);
         
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){

                $puntos_linea = floatval($fila['total_puntos']);
                $p_obtenidos += $puntos_linea; 
                if($fila['dato_aplica'] != 0){
                    $no_aplica++;
                }else if($fila['dato_sin_control'] != 0){
                    $sin_control++;
                }else if($puntos_linea >= $completado_meta){
                    $completado++;
                    $evaluados++;
                }else if($puntos_linea >= $desarrollo_meta){
                    $desarrollo++;
                    $evaluados++;
                }else{
                    $nulos++;
                }

                if($fila['estatus_evaluacion'] != 'Nulo' AND $fila['dato_aplica'] == '0'){
                    $p_requeridos++;
                }
                
                $contenido .= '<tr id="linea_'.$fila['id'].'" name="linea_'.$fila['id'].'">
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$fila['desc_entidad'].'">'.$fila['desc_entidad'].'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$fila['desc_proceso'].'">'.$fila['desc_proceso'].'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$fila['desc_riesgo'].'">'.$fila['desc_riesgo'].'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$fila['desc_control'].'">'.$fila['desc_control'].'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$fila['descripcion'].'">'.$fila['descripcion'].'</td>';

                if($fila['dato_aplica'] == '0'){
                    $checked = "";
                }else{
                    $checked = "checked";
                }
                $contenido .= '<td class="letra_pequena" style="text-align: center;"><input type="checkbox" value="" id="no_aplica_'.$fila['id'].'" name="no_aplica_'.$fila['id'].'" '. $checked.' onChange="no_aplica('.$fila['id'].');"></td>';

                if($fila['dato_sin_control'] == '0'){
                    $checked = "";
                }else{
                    $checked = "checked";
                }
                $contenido .= '<td class="letra_pequena" style="text-align: center;"><input type="checkbox" value="" id="sin_control_'.$fila['id'].'" name="sin_control_'.$fila['id'].'" '. $checked.' onChange="sin_control('.$fila['id'].');"></td>';

                
                if($fila['documentado'] == 1){
                    if($fila['dato_documentado'] == '0'){
                        $checked = "";
                    }else{
                        $checked = "checked";
                    }
                    $disabled = "";
                    $color="";
                }else{
                    $color = "background-color: LightGray;";
                    $disabled = "disabled";
                }
                
                $contenido .= '<td class="letra_pequena" style="text-align: center; '.$color.'"><input type="checkbox" value="" id="dato_documentado_'.$fila['id'].'" name="dato_documentado_'.$fila['id'].'" '. $checked.' '.$disabled.' onChange="total('.$fila['id'].');"></td>';
                if($fila['autorizado'] == 1){
                    if($fila['dato_autorizado'] == '0'){
                        $checked = "";
                    }else{
                        $checked = "checked";
                    }
                    $disabled = "";
                    $color="";
                }else{
                    $color = "background-color: LightGray;";
                    $disabled = "disabled";
                }
                $contenido .= '<td class="letra_pequena" style="text-align: center; '.$color.'"><input type="checkbox" value="" id="dato_autorizado_'.$fila['id'].'" name="dato_autorizado_'.$fila['id'].'" '. $checked.' '.$disabled.' onChange="total('.$fila['id'].');"></td>';
                if($fila['difundido'] == 1){
                    if($fila['dato_difundido'] == '0'){
                        $checked = "";
                    }else{
                        $checked = "checked";
                    }
                    $disabled = "";
                    $color="";
                }else{
                    $color = "background-color: LightGray;";
                    $disabled = "disabled";
                }
                $contenido .= '<td class="letra_pequena" style="text-align: center; '.$color.'"><input type="checkbox" value="" id="dato_difundido_'.$fila['id'].'" name="dato_difundido_'.$fila['id'].'" '. $checked.' '.$disabled.' onChange="total('.$fila['id'].');"></td>';
                if($fila['ejecutado'] == 1){
                    if($fila['dato_ejecutado'] == '0'){
                        $checked = "";
                    }else{
                        $checked = "checked";
                    }
                    $disabled = "";
                    $color="";
                }else{
                    $color = "background-color: LightGray;";
                    $disabled = "disabled";
                }
                $contenido .= ' </tr>';
               
            }
            
        }   

        if($completado != 0 && $evaluados != 0){
            $cuantitativo = ($completado / $evaluados) *100;
        }else{
            $cuantitativo = 0;
        }
        $p_requeridos = $p_requeridos * 100;

        if($p_requeridos != 0 && $p_obtenidos != 0){
            $cualitativo = ($p_obtenidos / $p_requeridos) * 100;
        }else{
            $cualitativo = 0;
        }
        
        $html .= '
        <div class="col-xl-12 col-md-12">
            </br>
            <div class="card-block table-border-style">
                <div >
                    <table style="table-layout:fixed;
                    width:100%;">
                        <thead>
                            <tr>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Entidad">Entidad</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Proceso">Proceso</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tipo de riesgo">Tipo de</br>riesgo</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tipo de control">Tipo de control</th>
                                <th class="letra_pequena_head" style="width:15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Objetivos de control">Objetivos de control</th>
                                <th class="letra_pequena_head" style="width:5%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tipo de control">Avance</th>
                                <th class="letra_pequena_head" style="width:15%;"data-toggle="tooltip" data-placement="top" title="" data-original-title="Tipo de control">Responsable</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tipo de control">Fecha_compromiso</th>
                                <th class="letra_pequena_head" style="width:15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tipo de control">Observaciones</th>
                                <th class="letra_pequena_head" style="width:5%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tipo de control">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            '.$contenido .'
                        </tbody>
                    </table>
                </div>
            </div>
        </div>'.$valores.'';

        $html .= '<div class="col-xl-2 col-md-12 " style="text-align: center;">
        <div class="card-block table-border-style">
                <div >
                    <table style="table-layout:fixed;
                    width:100%;">
            <thead >
                <tr>
                    <th class="letra_pequena_head" style="text-align: center;" >
                        <span>Nivel de riesgo</span>
                    </th>
                    <tr>
                    </tr>
                    <th class="letra_pequena_head bg-danger" style="text-align: center;">
                        <span id="nivel_riesgo">0.0%</span>
                    </th>
                </tr>
            </thead>
        </table>
        </div></div>
        
    </div>

    <div class="col-xl-6 col-md-12 " style="text-align: center;">
        
    <div class="card-block table-border-style">
    <div >
        <table style="table-layout:fixed;
        width:100%;">
            <thead >
                <tr>
                    <th class="letra_pequena_head" style="text-align: center;">
                        <span>Cuantitativo</span>
                    </th>
                    <th class="letra_pequena_head" style="text-align: center;">
                        <span>Evaluados</span>
                    </th>
                    <th class="letra_pequena_head bg-success" style="text-align: center;">
                        <span>Completados</span>
                    </th>
                    <th class="letra_pequena_head bg-warning" style="text-align: center;">
                        <span>En desarrollo</span>
                    </th>
                    <th class="letra_pequena_head bg-danger" style="text-align: center;">
                        <span>Sin control</span>
                    </th>
                    <th class="letra_pequena_head table-active" style="text-align: center;">
                        <span>No aplica</span>
                    </th>
                    <th class="letra_pequena_head" style="text-align: center;">
                        <span>Nulo</span>
                    </th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.round($cuantitativo,2).'%</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$evaluados.'</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$completado.'</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$desarrollo.'</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$sin_control.'</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$no_aplica.'</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$nulos.'</span>
                    </td>
                </tr>
            </tbody>
        </table>
        </div></div>
        
    </div>
    
    <div class="col-xl-4 col-md-12 " style="text-align: center;">
        
    <div class="card-block table-border-style">
    <div >
        <table style="table-layout:fixed;
        width:100%;">
            <thead >
                <tr>
                    <th class="letra_pequena_head" style="text-align: center;">
                        <span>Puntos requeridos</span>
                    </th>
                    <th class="letra_pequena_head" style="text-align: center;">
                        <span>Puntos obtenidos</span>
                    </th>
                    <th class="letra_pequena_head" style="text-align: center;">
                        <span>% Cualitativo</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$p_requeridos.'</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.$p_obtenidos.'</span>
                    </td>
                    <td class="letra_pequena_head" style="text-align: center;">
                        <span>'.round($cualitativo,2).'%</span>
                    </td>
                </tr>
            </tbody>
        </table>
        </div></div>
        
    </div>';
        
        return $html;
    }

    function mostrar_version($id_empresa, $conexion){
        $html = '';
        $contenido='';
        include $conexion;
        $sql_version = "SELECT version, version_descripcion FROM control_cliente WHERE status_conexion = 1 AND id_cliente = $id_empresa  GROUP BY version ORDER BY version DESC";
        $query_serv = $mysqli->query($sql_version);
		if($query_serv->num_rows>=1){
            while($fila=$query_serv->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<option value="'.$fila['version'].'">'.$fila['version_descripcion'].'</option>';
            }
        }
        $html .= '
        <select id="select_version" name="select_version" class="form-control textos" onChange="filtro();">
            '.$contenido.'
        </select>';
        return $html;
    }

    function mostrar_entidades($conexion){
        $html = '';
        $contenido='';
        include $conexion;
        $sql_version = "SELECT id_entidad, descripcion FROM entidad WHERE status_entidad = 1";
        $query_serv = $mysqli->query($sql_version);
		if($query_serv->num_rows>=1){
            while($fila=$query_serv->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<option value="'.$fila['id_entidad'].'">'.$fila['descripcion'].'</option>';
            }
        }
        $html .= '
        <select id="select_entidad" name="select_entidad" class="form-control textos" onChange="filtro();">
        <option value="">Seleccione una opción</option>
            '.$contenido.'
        </select>';
        return $html;
    }

    function mostrar_proceso($conexion){
        $html = '';
        $contenido='';
        include $conexion;
        $sql_version = "SELECT id_proceso, descripcion FROM proceso WHERE status_proceso = 1";
        $query_serv = $mysqli->query($sql_version);
		if($query_serv->num_rows>=1){
            while($fila=$query_serv->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<option value="'.$fila['id_proceso'].'">'.$fila['descripcion'].'</option>';
            }
        }
        $html .= '
        <select id="select_proceso" name="select_proceso" class="form-control textos" onChange="filtro();">
        <option value="">Seleccione una opción</option>
            '.$contenido.'
        </select>';
        return $html;
    }

    function mostrar_riesgo($conexion){
        $html = '';
        $contenido='';
        include $conexion;
        $sql_version = "SELECT id_tipo_riesgo, descripcion FROM tipo_riesgo WHERE status_riesgo = 1";
        $query_serv = $mysqli->query($sql_version);
		if($query_serv->num_rows>=1){
            while($fila=$query_serv->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<option value="'.$fila['id_tipo_riesgo'].'">'.$fila['descripcion'].'</option>';
            }
        }
        $html .= '
        <select id="select_riesgo" name="select_riesgo" class="form-control textos" onChange="filtro();">
        <option value="">Seleccione una opción</option>
            '.$contenido.'
        </select>';
        return $html;
    }

    function mostrar_control($conexion){
        $html = '';
        $contenido='';
        include $conexion;
        $sql_version = "SELECT id_tipo_control, descripcion FROM tipo_control WHERE status_control = 1";
        $query_serv = $mysqli->query($sql_version);
		if($query_serv->num_rows>=1){
            while($fila=$query_serv->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<option value="'.$fila['id_tipo_control'].'">'.$fila['descripcion'].'</option>';
            }
        }
        $html .= '
        <select id="select_control" name="select_control" class="form-control textos" onChange="filtro();" >
        <option value="">Seleccione una opción</option>
            '.$contenido.'
        </select>';
        return $html;
    }

    function no_aplica($id_control_cliente, $status_na, $conexion){
        include $conexion;
        if($status_na == 1){
            $sql_update = "UPDATE control_cliente SET dato_aplica = $status_na, estatus_evaluacion = 'No aplica', dato_documentado = '0', dato_autorizado = '0', dato_difundido = '0', dato_ejecutado = '0', dato_monitoreado = '0', total_puntos = '0' WHERE id = $id_control_cliente";
        }else{
            $sql_update = "UPDATE control_cliente SET dato_aplica = $status_na, estatus_evaluacion = 'Nulo', dato_documentado = '0', dato_autorizado = '0', dato_difundido = '0', dato_ejecutado = '0', dato_monitoreado = '0', total_puntos = '0' WHERE id = $id_control_cliente";
        }
        
        if ($mysqli->query($sql_update) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar evaluación ".$sql_update;
		}
    }

    function sin_control($id_control_cliente, $status_na, $conexion){
        include $conexion;
        if($status_na == 1){
            $sql_update = "UPDATE control_cliente SET dato_sin_control = $status_na, estatus_evaluacion = 'Sin Control', dato_documentado = '0', dato_autorizado = '0', dato_difundido = '0', dato_ejecutado = '0', dato_monitoreado = '0', total_puntos = '0' WHERE id = $id_control_cliente";
        }else{
            $sql_update = "UPDATE control_cliente SET dato_sin_control = $status_na, estatus_evaluacion = 'Nulo', dato_documentado = '0', dato_autorizado = '0', dato_difundido = '0', dato_ejecutado = '0', dato_monitoreado = '0', total_puntos = '0' WHERE id = $id_control_cliente";
        }
        
        if ($mysqli->query($sql_update) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar evaluación ".$sql_update;
		}
    }

    function total($id_control_cliente, $total_cal, $documentado, $autorizado, $difundido, $ejecutado, $monitoreado, $estatus, $conexion){
        include $conexion;

        $sql_update = "UPDATE control_cliente SET estatus_evaluacion = '".$estatus."', dato_documentado = '".$documentado."', dato_autorizado = '".$autorizado."', dato_difundido = '".$difundido."', dato_ejecutado = '".$ejecutado."', dato_monitoreado = '".$monitoreado."', total_puntos = '".$total_cal."' WHERE id = $id_control_cliente";
        
        if ($mysqli->query($sql_update) === TRUE) {
			$respuesta = 1; 
		}else {
			$respuesta =  "Error: Error al actualizar el total ".$sql_update;
		}
    }

    //Evaluación por entidad
    function mostrar_tabla_entidad($id_empresa, $id_version, $entidad, $proceso, $estatus, $riesgo, $control, $conexion){
        $html = '';
        $contenido = ''; 
        $evaluados = 0;
        $completado = 0;
        $desarrollo = 0;
        $completado_meta = 0;
        $desarrollo_meta = 0;
        $no_aplica = 0;
        $sin_control = 0;
        $nulos = 0;
        $p_requeridos = 0;
        $p_obtenidos = 0;
        $tevaluados = 0;
        $tcompletado = 0;
        $tdesarrollo = 0;
        $tno_aplica = 0;
        $tsin_control = 0;
        $tnulos = 0;
        $tp_requeridos = 0;
        $tp_obtenidos = 0;
        $tcuantitativo = 0;
        $tcualitativo = 0;

        include $conexion;
        if($id_version == ''){
            $sql_version = "SELECT version, version_descripcion FROM control_cliente WHERE status_conexion = 1 AND id_cliente = $id_empresa  GROUP BY version ORDER BY version DESC LIMIT 1";
            $query_serv = $mysqli->query($sql_version);
            if($query_serv->num_rows>=1){
                $fila=$query_serv->fetch_array(MYSQLI_ASSOC);
                $id_version = $fila['version'];
            }
        }

        //Obtener los niveles de madurez 
        $monitoreado_val = 0;
        $documentado_val = 0;
        $autorizado_val = 0;
        $difundido_val = 0;
        $ejecutado_val = 0;
        

        $sql_madurez = "SELECT mad.documentado, mad.autorizado, mad.difundido, mad.ejecutado, mad.monitoreado, con.completado, con.desarrollo
        FROM nivel_madurez AS mad 
        LEFT JOIN cliente AS cli ON cli.id_madurez = mad.id 
        LEFT JOIN configuracion AS con ON con.id_madurez = mad.id
        WHERE cli.id = $id_empresa";
        $query_serv = $mysqli->query($sql_madurez);
        if($query_serv->num_rows>=1){
            $fila=$query_serv->fetch_array(MYSQLI_ASSOC);
            $monitoreado_val = $fila['monitoreado'];
            $documentado_val = $fila['documentado'];
            $autorizado_val = $fila['autorizado'];
            $difundido_val = $fila['difundido'];
            $ejecutado_val = $fila['ejecutado'];
            $completado_meta = intval($fila['completado']);
            $desarrollo_meta = intval($fila['desarrollo']);
        }

        $valores = "";
        $valores .= "<input type='hidden' id='monitoreado_val' name='monitoreado_val' class='form-control' placeholder='Código' value='".$monitoreado_val."' readonly>";
        $valores .= "<input type='hidden' id='documentado_val' name='documentado_val' class='form-control' placeholder='Código' value='".$documentado_val."' readonly>";
        $valores .= "<input type='hidden' id='autorizado_val' name='autorizado_val' class='form-control' placeholder='Código' value='".$autorizado_val."' readonly>";
        $valores .= "<input type='hidden' id='difundido_val' name='difundido_val' class='form-control' placeholder='Código' value='".$difundido_val."' readonly>";
        $valores .= "<input type='hidden' id='ejecutado_val' name='ejecutado_val' class='form-control' placeholder='Código' value='".$ejecutado_val."' readonly>";
        $valores .= "<input type='hidden' id='completado' name='completado' class='form-control' placeholder='Código' value='".$completado_meta."' readonly>";
        $valores .= "<input type='hidden' id='desarrollo' name='desarrollo' class='form-control' placeholder='Código' value='".$desarrollo_meta."' readonly>";

        
        $sql_consulta_entidades = "SELECT con.id_entidad, ent.descripcion  FROM control_cliente AS cli
        LEFT JOIN control AS con ON con.id_control = cli.id_control
        LEFT JOIN entidad AS ent ON ent.id_entidad = con.id_entidad
        WHERE cli.id_cliente = $id_empresa GROUP BY con.id_entidad";
        $query_entidades = $mysqli->query($sql_consulta_entidades);
         
		if($query_entidades->num_rows>=1){
            while($fila_ent=$query_entidades->fetch_array(MYSQLI_ASSOC)){
                $id_entidad = $fila_ent['id_entidad'];
                $desc_entidad = $fila_ent['descripcion'];
                
                

                //Consulta
                $sql_consulta = "SELECT cli.id, cli.dato_aplica, cli.dato_sin_control, cli.dato_documentado, 
                cli.dato_autorizado, cli.dato_difundido, cli.dato_ejecutado, cli.dato_monitoreado,
                cli.total_puntos, cli.estatus_evaluacion,
                con.id_control, con.descripcion, pro.descripcion AS desc_proceso, ent.descripcion 
                AS desc_entidad, tiri.descripcion AS desc_riesgo, tico.descripcion AS desc_control, con.documentado, 
                con.autorizado, con.difundido, con.ejecutado, con.monitoreado, con.referencia, con.riesgo, con.status_control 
                FROM control_cliente AS cli 
                LEFT JOIN control AS con ON cli.id_control = con.id_control
                LEFT JOIN entidad AS ent ON con.id_entidad = ent.id_entidad
                LEFT JOIN proceso AS pro ON pro.id_proceso = con.id_proceso
                LEFT JOIN tipo_riesgo AS tiri ON tiri.id_tipo_riesgo = con.id_tipo_riesgo
                LEFT JOIN tipo_control AS tico ON tico.id_tipo_control = con.id_tipo_control
                WHERE cli.id_cliente = $id_empresa AND cli.version = $id_version AND cli.status_conexion = 1 AND con.id_entidad = '{$id_entidad}'";
                //echo "</br>".$sql_consulta;
                 $query_servicio = $mysqli->query($sql_consulta);
                 
                if($query_servicio->num_rows>=1){
                    while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
        
                        $puntos_linea = floatval($fila['total_puntos']);
                        $p_obtenidos += $puntos_linea; 
                        if($fila['dato_aplica'] != 0){
                            $no_aplica++;
                        }else if($fila['dato_sin_control'] != 0){
                            $sin_control++;
                        }else if($puntos_linea >= $completado_meta){
                            $completado++;
                            $evaluados++;
                        }else if($puntos_linea >= $desarrollo_meta){
                            $desarrollo++;
                            $evaluados++;
                        }else{
                            $nulos++;
                        }
        
                        if($fila['estatus_evaluacion'] != 'Nulo' AND $fila['dato_aplica'] == '0'){
                            $p_requeridos++;
                        }
                    }
                    
                }   
        
                if($completado != 0 && $evaluados != 0){
                    $cuantitativo = ($completado / $evaluados) *100;
                }else{
                    $cuantitativo = 0;
                }
                $p_requeridos = $p_requeridos * 100;
        
                if($p_requeridos != 0 && $p_obtenidos != 0){
                    $cualitativo = ($p_obtenidos / $p_requeridos) * 100;
                }else{
                    $cualitativo = 0;
                }

                $contenido .= '<tr id="linea_'.$id_entidad.'" name="linea_'.$id_entidad.'">
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$desc_entidad.'">'.$desc_entidad.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.round($cuantitativo,2).'">'.round($cuantitativo,2).'%</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$evaluados.'">'.$evaluados.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$completado.'">'.$completado.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$desarrollo.'">'.$desarrollo.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$sin_control.'">'.$sin_control.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$no_aplica.'">'.$no_aplica.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$nulos.'">'.$nulos.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$p_requeridos.'">'.$p_requeridos.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$p_obtenidos.'">'.$p_obtenidos.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.round($cualitativo,2).'">'.round($cualitativo,2).'%</td>
                </tr>';

                $tevaluados += $evaluados;
                $tcompletado += $completado;
                $tdesarrollo += $desarrollo;
                $tno_aplica += $sin_control;
                $tsin_control += $no_aplica;
                $tnulos += $nulos;
                $tp_requeridos += $p_requeridos;
                $tp_obtenidos += $p_obtenidos;
                

                $evaluados = 0;
                $completado = 0;
                $desarrollo = 0;
                $no_aplica = 0;
                $sin_control = 0;
                $nulos = 0;
                $p_requeridos = 0;
                $p_obtenidos = 0;
                $cuantitativo = 0;
                $cualitativo = 0;
            }
        }
        
        if($tcompletado != 0 && $tevaluados != 0){
            $tcuantitativo = ($tcompletado / $tevaluados) *100;
        }else{
            $tcuantitativo = 0;
        }

        if($tp_requeridos != 0 && $tp_obtenidos != 0){
            $tcualitativo = ($tp_obtenidos / $tp_requeridos) * 100;
        }else{
            $tcualitativo = 0;
        }
        
        
        $html .= '
        <div class="col-xl-12 col-md-12">
            </br>
            <div class="card-block table-border-style">
                <div >
                    <table style="table-layout:fixed;
                    width:100%;">
                        <thead>
                            <tr>
                                <th class="letra_pequena_head" style="width: 20%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Entidad">Entidad</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="% Cuantitativo">%</br>Cuantitativo</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Evaluados">Evaluados</th>
                                <th class="letra_pequena_head" style="background-color: Chartreuse;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Completados">Completados</th>
                                <th class="letra_pequena_head" style="background-color: Yellow;" data-toggle="tooltip" data-placement="top" title="" data-original-title="En desarrollo">En</br>desarrollo</th>
                                <th class="letra_pequena_head" style="background-color: OrangeRed;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sin control">Sin</br>control</th>
                                <th class="letra_pequena_head table-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="No Aplica">No</br>Aplica</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nulos">Nulos</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Puntos Requeridos">Puntos</br>Requeridos</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Puntos Obtenidos">Puntos</br>Obtenidos</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="% Cualitativo">% Cualitativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            '.$contenido .'
                        </tbody>
                    </table>
                </div>
            </div>
        </div>'.$valores.'';

        $html .= '<div class="col-xl-12 col-md-12 " style="text-align: center;">
        <div class="card-block table-border-style">
                <div >
                    <table style="table-layout:fixed;
                    width:100%;">
            <thead >
                <tr>
                    <th class="letra_pequena_head" style="width: 20%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nivel de riesgo">Nivel de riesgo</th>
                    <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="% Cuantitativo">%</br>Cuantitativo</th>
                    <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Evaluados">Evaluados</th>
                    <th class="letra_pequena_head" style="background-color: Chartreuse;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Completados">Completados</th>
                    <th class="letra_pequena_head" style="background-color: Yellow;" data-toggle="tooltip" data-placement="top" title="" data-original-title="En desarrollo">En</br>desarrollo</th>
                    <th class="letra_pequena_head" style="background-color: OrangeRed;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sin control">Sin</br>control</th>
                    <th class="letra_pequena_head table-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="No Aplica">No</br>Aplica</th>
                    <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nulos">Nulos</th>
                    <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Puntos Requeridos">Puntos</br>Requeridos</th>
                    <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Puntos Obtenidos">Puntos</br>Obtenidos</th>
                    <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="% Cualitativo">% Cualitativo</th>
                    </tr>
            </thead>
            <tbody>
            <td class="letra_pequena bg-danger">0.00%</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.round($tcuantitativo,2).'">'.round($tcuantitativo,2).'%</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tevaluados.'">'.$tevaluados.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tcompletado.'">'.$tcompletado.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tdesarrollo.'">'.$tdesarrollo.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tsin_control.'">'.$tsin_control.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tno_aplica.'">'.$tno_aplica.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tnulos.'">'.$tnulos.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tp_requeridos.'">'.$tp_requeridos.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$tp_obtenidos.'">'.$tp_obtenidos.'</td>
                <td class="letra_pequena" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.round($tcualitativo,2).'">'.round($tcualitativo,2).'%</td>
            </tbody>
        </table>
        </div></div>
        
    </div>';
        
        return $html;
    }
}
?>