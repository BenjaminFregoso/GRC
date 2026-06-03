# Diccionario de Datos - Base de Datos GRC

## 📖 Descripción General

Este diccionario contiene la documentación detallada de todas las tablas y campos de la base de datos GRC.

---

## 1️⃣ TABLA: usuarios

**Descripción**: Almacena la información de todos los usuarios del sistema GRC.

**Prioridad**: Alta  
**Tipo**: Tabla de Referencia  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id | INT | No | PK | Identificador único del usuario |
| nombre_completo | VARCHAR(255) | No | | Nombre y apellidos del usuario |
| usuario | VARCHAR(100) | No | UQ | Nombre de usuario para login (único) |
| password | VARCHAR(255) | No | | Contraseña encriptada (MD5) |
| correo | VARCHAR(255) | No | | Correo electrónico del usuario |
| celular | VARCHAR(20) | Sí | | Número de celular |
| fecha_nacimiento | DATE | Sí | | Fecha de nacimiento |
| dom_calle | VARCHAR(255) | Sí | | Nombre de la calle |
| dom_interior | VARCHAR(50) | Sí | | Número interior |
| dom_exterior | VARCHAR(50) | Sí | | Número exterior |
| dom_colonia | VARCHAR(255) | Sí | | Nombre de la colonia |
| dom_ciudad | VARCHAR(255) | Sí | | Ciudad de residencia |
| dom_estado | VARCHAR(255) | Sí | | Estado/Provincia |
| status_usuario | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |
| fecha_actualizacion | TIMESTAMP | No | | Fecha y hora de última actualización |

**Índices**: usuario, status_usuario  
**Claves Foráneas**: Ninguna

---

## 2️⃣ TABLA: cliente

**Descripción**: Representa las empresas/organizaciones clientes que utilizan el sistema.

**Prioridad**: Alta  
**Tipo**: Tabla de Negocio  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id | INT | No | PK | Identificador único del cliente |
| nombre | VARCHAR(255) | No | | Nombre o razón social de la empresa |
| id_giro | INT | Sí | FK | Referencia al giro comercial |
| id_madurez | INT | Sí | FK | Referencia al nivel de madurez inicial |
| status_empresa | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |
| fecha_actualizacion | TIMESTAMP | No | | Fecha y hora de última actualización |

**Índices**: status_empresa  
**Claves Foráneas**: 
- id_giro → giro.id_giro
- id_madurez → nivel_madurez.id

---

## 3️⃣ TABLA: giro

**Descripción**: Catálogo de giros comerciales o sectores industriales.

**Prioridad**: Media  
**Tipo**: Catálogo  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id_giro | INT | No | PK | Identificador único del giro |
| codigo | VARCHAR(50) | Sí | UQ | Código identificador del giro |
| descripcion | VARCHAR(255) | No | | Descripción del giro comercial |
| status_giro | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |

**Índices**: status_giro  
**Claves Foráneas**: Ninguna

**Ejemplos**:
- Banca y Finanzas
- Seguros
- Manufactura
- Tecnología
- Salud

---

## 4️⃣ TABLA: entidad

**Descripción**: Catálogo de entidades organizacionales dentro de las empresas.

**Prioridad**: Media  
**Tipo**: Catálogo  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id_entidad | INT | No | PK | Identificador único de la entidad |
| codigo | VARCHAR(50) | Sí | UQ | Código identificador |
| descripcion | VARCHAR(255) | No | | Nombre/descripción de la entidad |
| status_entidad | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |

**Índices**: status_entidad  
**Claves Foráneas**: Ninguna

**Ejemplos**:
- Dirección General
- Finanzas
- Operaciones
- Recursos Humanos
- Cumplimiento
- Auditoría Interna

---

## 5️⃣ TABLA: proceso

**Descripción**: Catálogo de procesos empresariales que requieren control.

**Prioridad**: Media  
**Tipo**: Catálogo  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id_proceso | INT | No | PK | Identificador único del proceso |
| codigo | VARCHAR(50) | Sí | UQ | Código identificador del proceso |
| descripcion | VARCHAR(255) | No | | Descripción del proceso |
| ind_riesgo_uno hasta ind_riesgo_diez | INT | No | | Indicadores de riesgo (1-10) |
| status_proceso | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |

**Índices**: status_proceso  
**Claves Foráneas**: Ninguna

**Nota**: Los campos `ind_riesgo_*` permiten tener hasta 10 indicadores de riesgo por proceso.

---

## 6️⃣ TABLA: tipo_riesgo

**Descripción**: Catálogo de categorías o tipos de riesgo identificados en la organización.

**Prioridad**: Media  
**Tipo**: Catálogo  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id_tipo_riesgo | INT | No | PK | Identificador único del tipo de riesgo |
| codigo | VARCHAR(50) | Sí | UQ | Código identificador |
| descripcion | VARCHAR(255) | No | | Descripción del tipo de riesgo |
| status_tipo_riesgo | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |

**Índices**: status_tipo_riesgo  
**Claves Foráneas**: Ninguna

**Ejemplos**:
- Riesgo Estratégico
- Riesgo Operacional
- Riesgo Financiero
- Riesgo Legal y Regulatorio
- Riesgo de Cumplimiento
- Riesgo Tecnológico

---

## 7️⃣ TABLA: tipo_control

**Descripción**: Catálogo de categorías o tipos de control implementados en la organización.

**Prioridad**: Media  
**Tipo**: Catálogo  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id_tipo_control | INT | No | PK | Identificador único del tipo de control |
| codigo | VARCHAR(50) | Sí | UQ | Código identificador |
| descripcion | VARCHAR(255) | No | | Descripción del tipo de control |
| status_tipo_control | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |

**Índices**: status_tipo_control  
**Claves Foráneas**: Ninguna

**Ejemplos**:
- Control Preventivo
- Control Detectivo
- Control Correctivo
- Control Manual
- Control Automatizado

---

## 8️⃣ TABLA: nivel_madurez

**Descripción**: Define los niveles de madurez del sistema de control interno.

**Prioridad**: Alta  
**Tipo**: Catálogo  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id | INT | No | PK | Identificador único |
| codigo | VARCHAR(50) | Sí | UQ | Código del nivel |
| descripcion | VARCHAR(255) | No | | Descripción del nivel de madurez |
| documentado | INT | No | | Puntuación para nivel documentado (0-100) |
| autorizado | INT | No | | Puntuación para nivel autorizado (0-100) |
| difundido | INT | No | | Puntuación para nivel difundido (0-100) |
| ejecutado | INT | No | | Puntuación para nivel ejecutado (0-100) |
| monitoreado | INT | No | | Puntuación para nivel monitoreado (0-100) |
| status | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |

**Índices**: status  
**Claves Foráneas**: Ninguna

**Notas**: Los campos documentado hasta monitoreado representan umbrales de puntuación para cada nivel de madurez.

---

## 9️⃣ TABLA: configuracion

**Descripción**: Almacena la configuración específica de madurez para clientes.

**Prioridad**: Media  
**Tipo**: Tabla de Referencia  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id | INT | No | PK | Identificador único |
| id_madurez | INT | Sí | FK | Referencia al nivel de madurez |
| completado | INT | No | | Meta de completado |
| desarrollo | INT | No | | Meta de desarrollo |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |

**Índices**: Ninguno adicional  
**Claves Foráneas**: 
- id_madurez → nivel_madurez.id

---

## 🔟 TABLA: control

**Descripción**: Define los objetivos de control y controles de la organización.

**Prioridad**: Alta  
**Tipo**: Tabla de Negocio  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id_control | INT | No | PK | Identificador único del control |
| codigo | VARCHAR(50) | Sí | UQ | Código identificador único del control |
| descripcion | VARCHAR(500) | No | | Descripción detallada del objetivo de control |
| referencia | VARCHAR(255) | Sí | | Referencia normativa o regulatoria |
| riesgo | VARCHAR(255) | Sí | | Descripción del riesgo que mitiga |
| id_entidad | INT | Sí | FK | Referencia a la entidad responsable |
| id_proceso | INT | Sí | FK | Referencia al proceso asociado |
| id_tipo_riesgo | INT | Sí | FK | Referencia al tipo de riesgo |
| id_tipo_control | INT | Sí | FK | Referencia al tipo de control |
| documentado | INT | No | | Indicador si está documentado (0-100) |
| autorizado | INT | No | | Indicador si está autorizado (0-100) |
| difundido | INT | No | | Indicador si está difundido (0-100) |
| ejecutado | INT | No | | Indicador si está ejecutado (0-100) |
| monitoreado | INT | No | | Indicador si está monitoreado (0-100) |
| status_control | TINYINT | No | IDX | Estado (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |
| fecha_actualizacion | TIMESTAMP | No | | Fecha y hora de última actualización |

**Índices**: status_control, id_entidad, id_proceso  
**Claves Foráneas**:
- id_entidad → entidad.id_entidad
- id_proceso → proceso.id_proceso
- id_tipo_riesgo → tipo_riesgo.id_tipo_riesgo
- id_tipo_control → tipo_control.id_tipo_control

---

## 1️⃣1️⃣ TABLA: control_cliente

**Descripción**: Vincula controles con clientes y almacena las evaluaciones de cumplimiento.

**Prioridad**: Alta  
**Tipo**: Tabla de Transacciones  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id | INT | No | PK | Identificador único del registro |
| id_cliente | INT | No | FK | Referencia al cliente |
| id_control | INT | No | FK | Referencia al control |
| version | INT | No | IDX | Número de versión de evaluación |
| version_descripcion | VARCHAR(255) | Sí | | Descripción de la versión |
| dato_aplica | TINYINT | No | | Indicador: ¿aplica el control? (0=sí, 1=no) |
| dato_sin_control | TINYINT | No | | Indicador: sin control (0=no, 1=sí) |
| dato_documentado | INT | No | | Puntuación de documentación |
| dato_autorizado | INT | No | | Puntuación de autorización |
| dato_difundido | INT | No | | Puntuación de difusión |
| dato_ejecutado | INT | No | | Puntuación de ejecución |
| dato_monitoreado | INT | No | | Puntuación de monitoreo |
| total_puntos | DECIMAL(10,2) | No | | Puntuación total calculada |
| estatus_evaluacion | VARCHAR(50) | No | | Estado (Completado, Desarrollo, Nulo) |
| status_conexion | TINYINT | No | IDX | Estado del registro (1=activo, 0=inactivo) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |
| fecha_actualizacion | TIMESTAMP | No | | Fecha y hora de última actualización |

**Índices**: id_cliente, id_control, version, status_conexion  
**Claves Únicas Compuestas**: (id_cliente, id_control, version)  
**Claves Foráneas**:
- id_cliente → cliente.id
- id_control → control.id_control

**Estados de Evaluación**:
- `Completado`: Control completamente implementado y monitoreado
- `Desarrollo`: Control en proceso de implementación
- `Nulo`: Control no evaluado
- `Sin control`: Control no aplica o no existe
- `No aplica`: Control no es aplicable para esta empresa

---

## 1️⃣2️⃣ TABLA: cliente_diagnostico

**Descripción**: Registra el seguimiento de acciones correctivas y diagnósticos.

**Prioridad**: Alta  
**Tipo**: Tabla de Transacciones  
**Rotación**: No  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id | INT | No | PK | Identificador único |
| id_control_cliente | INT | No | FK | Referencia a evaluación de control |
| avance | DECIMAL(10,2) | No | | Porcentaje de avance (0-100) |
| responsable | VARCHAR(255) | Sí | | Persona responsable de la acción |
| fecha_compromiso | DATE | Sí | | Fecha comprometida de finalización |
| observaciones | TEXT | Sí | | Notas y comentarios adicionales |
| archivo | VARCHAR(255) | Sí | | Ruta o nombre del archivo adjunto |
| estado | VARCHAR(50) | No | | Estado (En Progreso, Completado, Atrasado) |
| fecha_creacion | TIMESTAMP | No | | Fecha y hora de creación |
| fecha_actualizacion | TIMESTAMP | No | | Fecha y hora de última actualización |

**Índices**: id_control_cliente  
**Claves Foráneas**:
- id_control_cliente → control_cliente.id

**Estados**:
- `En Progreso`: Acción en implementación
- `Completado`: Acción finalizada
- `Atrasado`: Acción vencida sin completar

---

## 1️⃣3️⃣ TABLA: auditoria_log

**Descripción**: Registra todos los cambios y operaciones en el sistema para trazabilidad.

**Prioridad**: Media  
**Tipo**: Tabla de Auditoría  
**Rotación**: Sí (por período)  
**Respaldo**: Sí  

| Campo | Tipo | Nulo | Clave | Descripción |
|-------|------|------|-------|-------------|
| id | INT | No | PK | Identificador único |
| id_usuario | INT | Sí | FK | Usuario que realizó la operación |
| id_cliente | INT | Sí | FK | Cliente afectado |
| tabla_afectada | VARCHAR(100) | No | | Nombre de la tabla modificada |
| operacion | VARCHAR(50) | No | | Tipo de operación (INSERT, UPDATE, DELETE) |
| registro_id | INT | Sí | | ID del registro afectado |
| datos_anteriores | LONGTEXT | Sí | | JSON con datos antes del cambio |
| datos_nuevos | LONGTEXT | Sí | | JSON con datos después del cambio |
| descripcion | TEXT | Sí | | Descripción libre del cambio |
| fecha | TIMESTAMP | No | IDX | Fecha y hora de la operación |

**Índices**: id_usuario, id_cliente, fecha  
**Claves Foráneas**: Ninguna (referencias débiles)

---

## 📊 Resumen de Cardinalidades

| Relación | Tipo | Descripción |
|----------|------|-------------|
| CLIENTE : CONTROL_CLIENTE | 1:N | Un cliente tiene muchas evaluaciones |
| CONTROL : CONTROL_CLIENTE | 1:N | Un control es evaluado por muchos clientes |
| CONTROL_CLIENTE : CLIENTE_DIAGNOSTICO | 1:N | Una evaluación genera muchas acciones |
| CLIENTE : GIRO | N:1 | Muchos clientes pueden ser del mismo giro |
| CLIENTE : NIVEL_MADUREZ | N:1 | Muchos clientes pueden tener el mismo nivel |
| CONTROL : ENTIDAD | N:1 | Muchos controles por entidad |
| CONTROL : PROCESO | N:1 | Muchos controles por proceso |
| CONTROL : TIPO_RIESGO | N:1 | Muchos controles por tipo de riesgo |
| CONTROL : TIPO_CONTROL | N:1 | Muchos controles por tipo de control |

---

## 🔒 Restricciones de Integridad

1. **No nulos**: Campos críticos nunca pueden ser nulos
2. **Unicidad**: Códigos y usuarios deben ser únicos
3. **Claves foráneas**: Se validan automáticamente
4. **Valores por defecto**: Status siempre inician en 1 (activo)
5. **Timestamps**: Se actualizan automáticamente

---

## 📈 Crecimiento Esperado

| Tabla | Crecimiento Estimado | Período |
|-------|----------------------|---------|
| usuarios | 1-10 por año | Lento |
| cliente | 5-20 por año | Medio |
| control | 10-50 por año | Medio |
| control_cliente | 100-1000 por año | Rápido |
| cliente_diagnostico | 100-500 por año | Rápido |
| auditoria_log | 1000-10000 por año | Muy rápido |

---

**Última actualización**: Junio 2026  
**Versión**: 1.0  
**Autor**: Sistema de Documentación GRC
