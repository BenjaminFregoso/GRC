# Diagrama de Relaciones - Base de Datos GRC

## 📊 Diagrama Entidad-Relación

```mermaid
erDiagram
    USUARIOS ||--o{ CLIENTE : administra
    USUARIOS ||--o{ AUDITORIA_LOG : genera
    
    CLIENTE ||--o{ CONTROL_CLIENTE : evalua
    CLIENTE ||--o{ CLIENTE_DIAGNOSTICO : seguimiento
    CLIENTE }o--|| GIRO : pertenece
    CLIENTE }o--|| NIVEL_MADUREZ : tiene
    
    NIVEL_MADUREZ ||--o{ CONFIGURACION : define
    
    CONTROL ||--o{ CONTROL_CLIENTE : se_evalua
    CONTROL }o--|| ENTIDAD : pertenece
    CONTROL }o--|| PROCESO : relacionado
    CONTROL }o--|| TIPO_RIESGO : contiene
    CONTROL }o--|| TIPO_CONTROL : es_tipo
    
    CONTROL_CLIENTE ||--o{ CLIENTE_DIAGNOSTICO : genera
    
    GIRO : Catálogo
    ENTIDAD : Catálogo
    PROCESO : Catálogo
    TIPO_RIESGO : Catálogo
    TIPO_CONTROL : Catálogo
    NIVEL_MADUREZ : Catálogo
```

## 📋 Descripción de Relaciones

### 1. USUARIOS → CLIENTE
- Relación: **Uno a Muchos (1:N)**
- Un usuario puede administrar múltiples clientes
- Clave foránea: No directa en tabla (control a nivel aplicativo)

### 2. CLIENTE → CONTROL_CLIENTE
- Relación: **Uno a Muchos (1:N)**
- Un cliente tiene múltiples evaluaciones de controles
- Clave foránea: `control_cliente.id_cliente` → `cliente.id`

### 3. CONTROL → CONTROL_CLIENTE
- Relación: **Uno a Muchos (1:N)**
- Un control puede ser evaluado por múltiples clientes
- Clave foránea: `control_cliente.id_control` → `control.id_control`

### 4. CONTROL_CLIENTE → CLIENTE_DIAGNOSTICO
- Relación: **Uno a Muchos (1:N)**
- Una evaluación puede tener múltiples registros de seguimiento
- Clave foránea: `cliente_diagnostico.id_control_cliente` → `control_cliente.id`

### 5. CLIENTE → GIRO
- Relación: **Muchos a Uno (N:1)**
- Múltiples clientes pueden pertenecer al mismo giro
- Clave foránea: `cliente.id_giro` → `giro.id_giro`

### 6. CLIENTE → NIVEL_MADUREZ
- Relación: **Muchos a Uno (N:1)**
- Múltiples clientes pueden tener el mismo nivel de madurez
- Clave foránea: `cliente.id_madurez` → `nivel_madurez.id`

### 7. CONTROL → ENTIDAD
- Relación: **Muchos a Uno (N:1)**
- Múltiples controles pueden pertenecer a una entidad
- Clave foránea: `control.id_entidad` → `entidad.id_entidad`

### 8. CONTROL → PROCESO
- Relación: **Muchos a Uno (N:1)**
- Múltiples controles pueden estar relacionados con un proceso
- Clave foránea: `control.id_proceso` → `proceso.id_proceso`

### 9. CONTROL → TIPO_RIESGO
- Relación: **Muchos a Uno (N:1)**
- Múltiples controles pueden estar asociados a un tipo de riesgo
- Clave foránea: `control.id_tipo_riesgo` → `tipo_riesgo.id_tipo_riesgo`

### 10. CONTROL → TIPO_CONTROL
- Relación: **Muchos a Uno (N:1)**
- Múltiples controles pueden ser del mismo tipo
- Clave foránea: `control.id_tipo_control` → `tipo_control.id_tipo_control`

### 11. NIVEL_MADUREZ → CONFIGURACION
- Relación: **Uno a Muchos (1:N)**
- Un nivel de madurez puede tener múltiples configuraciones
- Clave foránea: `configuracion.id_madurez` → `nivel_madurez.id`

## 🔀 Flujo de Datos Principal

```
┌─────────────┐
│   USUARIOS  │  (Login/Autenticación)
└──────┬──────┘
       │
       ├──→ ┌──────────┐
       │    │ CLIENTE  │  (Empresa)
       │    └────┬─────┘
       │         │
       │    ┌────▼──────────────────┐
       │    │ CONTROL_CLIENTE       │  (Evaluación)
       │    │ (Vincula Cliente      │
       │    │  con Control)         │
       │    └────┬──────────────────┘
       │         │
       └────────┬▼──────────────────────┐
                │ CLIENTE_DIAGNOSTICO   │  (Seguimiento)
                │ (Acciones correctivas)│
                └──────────────────────┘

┌──────────────┐
│  CATÁLOGOS   │  (ENTIDAD, PROCESO, TIPO_RIESGO, TIPO_CONTROL, GIRO)
└────────┬─────┘
         │
    ┌────▼─────┐
    │ CONTROL   │  (Objetivo de Control)
    └────┬─────┘
         │
    (Vinculado con CONTROL_CLIENTE)
         │
    (Evaluado por CLIENTE)
```

## 📈 Ciclo de Vida de un Control

1. **Creación**
   - Se crea un `CONTROL` vinculado con `ENTIDAD`, `PROCESO`, `TIPO_RIESGO`, `TIPO_CONTROL`

2. **Asignación**
   - Se vincula el control a un `CLIENTE` creando registro en `CONTROL_CLIENTE`

3. **Evaluación**
   - Se registran datos de evaluación en `CONTROL_CLIENTE`:
     - Información de madurez (documentado, autorizado, difundido, ejecutado, monitoreado)
     - Puntuación total
     - Estado de evaluación

4. **Seguimiento**
   - Se crean registros en `CLIENTE_DIAGNOSTICO` para:
     - Acciones correctivas
     - Avance de implementación
     - Responsables y fechas de compromiso

5. **Auditoría**
   - Todos los cambios se registran en `AUDITORIA_LOG`

## 🔑 Claves Únicas y Restricciones

### Claves Primarias
- Todas las tablas tienen una clave primaria con `AUTO_INCREMENT`

### Claves Únicas
- `usuarios.usuario` - Nombre de usuario único
- `control.codigo` - Código de control único
- `entidad.codigo` - Código de entidad único
- `proceso.codigo` - Código de proceso único
- `tipo_riesgo.codigo` - Código de tipo de riesgo único
- `tipo_control.codigo` - Código de tipo de control único
- `giro.codigo` - Código de giro único
- `nivel_madurez.codigo` - Código de madurez único

### Claves Compuestas Únicas
- `control_cliente(id_cliente, id_control, version)` - Asegura que no haya duplicados de evaluación

## 🔐 Integridad Referencial

Todas las relaciones externas se validan mediante:
- Foreign Key Constraints
- Cascade Delete configurado donde sea apropiado
- Validación a nivel aplicativo

## 📊 Índices para Optimización

### Índices Creados
```
usuarios: idx_usuario (usuario), idx_status (status_usuario)
cliente: idx_status (status_empresa)
control: idx_status, idx_entidad, idx_proceso
control_cliente: idx_cliente, idx_control, idx_version, idx_status, unique_cliente_control_version
cliente_diagnostico: idx_control_cliente
auditoria_log: idx_usuario, idx_cliente, idx_fecha
```

## 🧪 Ejemplos de Consultas Comunes

### 1. Obtener todos los controles de una entidad
```sql
SELECT c.* 
FROM control c
WHERE c.id_entidad = 1
AND c.status_control = 1;
```

### 2. Evaluación de un cliente por entidad
```sql
SELECT 
    cc.id,
    c.descripcion as control,
    e.descripcion as entidad,
    p.descripcion as proceso,
    cc.estatus_evaluacion,
    cc.total_puntos
FROM control_cliente cc
LEFT JOIN control c ON cc.id_control = c.id_control
LEFT JOIN entidad e ON c.id_entidad = e.id_entidad
LEFT JOIN proceso p ON c.id_proceso = p.id_proceso
WHERE cc.id_cliente = 1
AND cc.version = 1;
```

### 3. Seguimiento de acciones correctivas
```sql
SELECT 
    cd.id,
    c.descripcion as control,
    cd.avance,
    cd.responsable,
    cd.fecha_compromiso,
    cd.estado
FROM cliente_diagnostico cd
LEFT JOIN control_cliente cc ON cd.id_control_cliente = cc.id
LEFT JOIN control c ON cc.id_control = c.id_control
WHERE cc.id_cliente = 1
AND cd.estado = 'En Progreso';
```

### 4. Matriz de riesgos por cliente
```sql
SELECT 
    tr.descripcion as tipo_riesgo,
    COUNT(cc.id) as total_controles,
    SUM(CASE WHEN cc.estatus_evaluacion = 'Completado' THEN 1 ELSE 0 END) as completados,
    ROUND(AVG(cc.total_puntos), 2) as promedio_puntos
FROM control_cliente cc
LEFT JOIN control c ON cc.id_control = c.id_control
LEFT JOIN tipo_riesgo tr ON c.id_tipo_riesgo = tr.id_tipo_riesgo
WHERE cc.id_cliente = 1
GROUP BY tr.descripcion;
```

## 📐 Cardinalidad

| Tabla 1 | Relación | Tabla 2 | Tipo |
|---------|----------|---------|------|
| CLIENTE | 1 : N | CONTROL_CLIENTE | Uno a Muchos |
| CONTROL | 1 : N | CONTROL_CLIENTE | Uno a Muchos |
| CONTROL_CLIENTE | 1 : N | CLIENTE_DIAGNOSTICO | Uno a Muchos |
| CLIENTE | N : 1 | GIRO | Muchos a Uno |
| CLIENTE | N : 1 | NIVEL_MADUREZ | Muchos a Uno |
| CONTROL | N : 1 | ENTIDAD | Muchos a Uno |
| CONTROL | N : 1 | PROCESO | Muchos a Uno |
| CONTROL | N : 1 | TIPO_RIESGO | Muchos a Uno |
| CONTROL | N : 1 | TIPO_CONTROL | Muchos a Uno |
| NIVEL_MADUREZ | 1 : N | CONFIGURACION | Uno a Muchos |

---

**Última actualización**: Junio 2026
**Versión**: 1.0
