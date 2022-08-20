<?php

class cedula{

    //Evaluación por entidad
    function mostrar_tabla_cedulas($id_empresa, $id_version, $entidad, $proceso, $estatus, $riesgo, $control, $conexion){
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

       
       
        
        
        $html .= '
        <div class="col-xl-12 col-md-12">
            </br>
            <div class="card-block table-border-style">
                <div >
                    <table style="table-layout:fixed;
                    width:100%;">
                        <thead>
                            <tr>
                                <th class="letra_pequena_head" style="width: 15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Versión">Versión</th>
                                <th class="letra_pequena_head" style="width: 15%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cédula">Cédula</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Entidad">Entidad</th>
                                <th class="letra_pequena_head" data-toggle="tooltip" data-placement="top" title="" data-original-title="Proceso">Proceso</th>
                                <th class="letra_pequena_head" style="width: 10%;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Acción">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            '.$contenido .'
                            <tr>
                                <td class="letra_pequena_head"> VERSIÓN 1</td>
                                <td class="letra_pequena_head">C000006</td>
                                <td class="letra_pequena_head">CAJAS</td>
                                <td class="letra_pequena_head">INGRESO EN CAJA</td>
                                <td class="letra_pequena_head"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
}
