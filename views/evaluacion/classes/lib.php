<?php 
class evaluacion{

    function mostrar_tabla($id_empresa, $id_version, $conexion){
        $html = '';
        $contenido = ''; 
        include $conexion;
        if($id_version == ''){
            $sql_version = "SELECT version, version_descripcion FROM control_cliente WHERE status_conexion = 1 AND id_cliente = $id_empresa  GROUP BY version ORDER BY version DESC LIMIT 1";
            $query_serv = $mysqli->query($sql_version);
            if($query_serv->num_rows>=1){
                $fila=$query_serv->fetch_array(MYSQLI_ASSOC);
                $id_version = $fila['version'];
            }
        }

        $sql_consulta = "SELECT con.id_control, con.descripcion, pro.descripcion AS desc_proceso, ent.descripcion 
        AS desc_entidad, tiri.descripcion AS desc_riesgo, tico.descripcion AS desc_control, con.documentado, 
        con.autorizado, con.difundido, con.ejecutado, con.monitoreado, con.referencia, con.riesgo, con.status_control 
        FROM control_cliente AS cli 
        LEFT JOIN control AS con ON cli.id_control = con.id_control
        LEFT JOIN entidad AS ent ON con.id_entidad = ent.id_entidad
        LEFT JOIN proceso AS pro ON pro.id_proceso = con.id_proceso
        LEFT JOIN tipo_riesgo AS tiri ON tiri.id_tipo_riesgo = con.id_tipo_riesgo
        LEFT JOIN tipo_control AS tico ON tico.id_tipo_control = con.id_tipo_control
        WHERE cli.id_cliente = $id_empresa AND cli.version = $id_version AND cli.status_conexion = 1";
         $query_servicio = $mysqli->query($sql_consulta);
         
		if($query_servicio->num_rows>=1){
            while($fila=$query_servicio->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<tr>
                <td><p style="padding-top: 12px;">'.$fila['desc_entidad'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['desc_proceso'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['desc_riesgo'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['desc_control'].'</p></td>
                <td><p style="padding-top: 12px;">'.$fila['descripcion'].'</p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
                <td><p style="padding-top: 12px;"></p></td>
            </tr>';
               
            }
            
        }   

        $html .= '
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
                                <th>No aplica</th>
                                <th style="background-color: SlateGray;">Sin control</th>
                                <th style="background-color: OrangeRed;">Documentado</th>
                                <th style="background-color: Orange;">Autorizado</th>
                                <th style="background-color: Yellow;">Difundido</th>
                                <th style="background-color: Chartreuse;">Ejecutado</th>
                                <th>Monitoreado</th>
                                <th>Total de puntos</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            '.$contenido .'
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
        $sql_version = "SELECT version, version_descripcion FROM control_cliente WHERE status_conexion = 1 AND id_cliente = $id_empresa  GROUP BY version";
        $query_serv = $mysqli->query($sql_version);
		if($query_serv->num_rows>=1){
            while($fila=$query_serv->fetch_array(MYSQLI_ASSOC)){
                $contenido .= '<option value="'.$fila['version'].'">'.$fila['version_descripcion'].'</option>';
            }
        }
        $html .= '
        <select id="select_version" name="select_version" class="form-control textos remove_disabled" required>
            '.$contenido.'
        </select>';
        return $html;
    }
}
?>