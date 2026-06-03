# GRC - Sistema de Gobernanza, Riesgo y Cumplimiento

##  Descripción General

Sistema integral de Gobernanza, Riesgo y Cumplimiento (GRC) desarrollado para facilitar la gestión y el control de riesgos empresariales, auditoría interna y seguimiento de acciones correctivas en organizaciones.

## Características Principales

- **Autenticación Empresarial**: Sistema de login y gestión de usuarios por empresa
- **Módulo de Auditoría**: Registro y seguimiento de auditorías con análisis de cédulas y resultados
- **Catálogos Base**: Gestión de entidades, giros comerciales, procesos, tipos de control y riesgo
- **Evaluación de Riesgos**: Evaluación por entidad y análisis de madurez organizacional
- **Seguimiento de Acciones**: Tracking de acciones correctivas y resultado de implementaciones
- **Dashboard Interactivo**: Visualización de datos con gráficos y reportes
- **Interfaz Responsiva**: Diseño Bootstrap moderno y adaptable a dispositivos móviles

##  Arquitectura del Proyecto

```
GRC/
├── index.php                 # Página principal
├── inicio.php               # Dashboard
├── loguear.php              # Login de usuario
├── loguear_empresa.php      # Login empresarial
├── cerrar.php               # Cierre de sesión
├── conexion.php             # Configuración de base de datos
├── header.php               # Componente de encabezado
├── footer.php               # Componente de pie de página
│
├── assets/                  # Recursos estáticos
│   ├── css/                 # Hojas de estilo
│   ├── js/                  # Scripts JavaScript
│   ├── images/              # Imágenes del proyecto
│   └── icon/                # Conjuntos de iconos
│
└── views/                   # Vistas y módulos funcionales
    ├── auditoria/           # Módulo de auditoría
    ├── catalogos/           # Gestión de catálogos base
    ├── configuracion/       # Configuración del sistema
    ├── evaluacion/          # Evaluación de riesgos
    └── seguimiento/         # Seguimiento de acciones
```

##  Tecnologías Utilizadas

- **Backend**: PHP
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap
- **Visualización**: Chart.js, Morris.js, AMChart
- **Librería de Iconos**: Font Awesome, Themify Icons, IcoFont
- **Base de Datos**: MySQL/MariaDB
- **Componentes**: jQuery, jQuery UI, jQuery Slimscroll

##  Requisitos Previos

- PHP 5.6 o superior
- MySQL/MariaDB
- Servidor web (Apache, Nginx)
- Navegador web moderno (Chrome, Firefox, Safari, Edge)

##  Instalación y Configuración

### 1. Descarga del Proyecto
```bash
git clone <repositorio-url> GRC
cd GRC
```

### 2. Configuración de Base de Datos
- Importar el esquema SQL: [schema.sql](schema.sql)
- Editar [conexion.php](conexion.php) con los datos de conexión a MySQL
- Consultar [DATABASE_SETUP.md](DATABASE_SETUP.md) para instrucciones detalladas de instalación

**Credenciales iniciales:**
- Usuario: `admin`
- Contraseña: `admin123`

⚠️ **Cambiar inmediatamente después de la instalación**

### 3. Configuración del Servidor Web
- Colocar el proyecto en la carpeta raíz del servidor web (htdocs, www, etc.)
- Asegurar permisos de lectura/escritura en directorios necesarios
- Verificar que PHP 5.6+ está instalado con soporte a MySQLi

### 4. Acceso a la Aplicación
```
http://localhost/GRC
```

##  Módulos Principales

### Auditoría
Gestión completa de auditorías internas con:
- Registro de auditorías
- Análisis de cédulas de auditoría
- Resultados y conclusiones

### Catálogos
Administración de datos maestros:
- Entidades
- Giros comerciales
- Procesos
- Tipos de control
- Tipos de riesgo
- Niveles de madurez

### Configuración
Gestión del sistema:
- Información de la empresa
- Administración de usuarios
- Permisos y roles

### Evaluación
Evaluación de riesgos:
- Evaluación por entidad
- Análisis de madurez
- Objetivos de control

### Seguimiento
Control de acciones:
- Acciones correctivas
- Resultados de implementación
- Monitoreo de progreso

##  Seguridad

- Sistema de autenticación basado en sesiones PHP
- Gestión independiente por empresa
- Control de acceso a módulos funcionales

##  Documentación de Base de Datos

### Archivos de Documentación
- **[schema.sql](schema.sql)** - Archivo SQL con estructura completa de la base de datos
- **[DATABASE_SETUP.md](DATABASE_SETUP.md)** - Guía de instalación y configuración de la BD
- **[DATABASE_RELATIONSHIPS.md](DATABASE_RELATIONSHIPS.md)** - Diagrama ER y relaciones entre tablas
- **[DATABASE_DICTIONARY.md](DATABASE_DICTIONARY.md)** - Diccionario detallado de todas las tablas y campos

### Tablas Principales
1. **usuarios** - Información de usuarios del sistema
2. **cliente** - Empresas/clientes del sistema
3. **control** - Objetivos de control y controles
4. **control_cliente** - Evaluaciones de controles por cliente
5. **cliente_diagnostico** - Seguimiento de acciones correctivas

### Catálogos Disponibles
- **entidad** - Entidades organizacionales
- **proceso** - Procesos empresariales
- **giro** - Giros comerciales
- **tipo_riesgo** - Tipos de riesgo
- **tipo_control** - Tipos de control
- **nivel_madurez** - Niveles de madurez del control

Para más detalles técnicos sobre la estructura de datos, consultar los archivos de documentación mencionados arriba.

##  Estructura de Componentes

### Componentes de UI
- Acordeón
- Breadcrumb
- Botones
- Gráficos
- Colores
- Tablas
- Formularios
- Badges y etiquetas
- Notificaciones
- Barras de progreso
- Pestañas
- Tooltips
- Tipografía

## Proceso de Desarrollo e Implementación

### Configuración Inicial

1. **Base de Datos**
   - Asegurar que MySQL 8.0+ está instalado
   - Crear la base de datos: `CREATE DATABASE grc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`
   - Importar schema.sql: `mysql -u usuario -p grc < schema.sql`

2. **Servidor PHP**
   - PHP 8.2.12 o superior recomendado
   - Iniciar servidor de desarrollo: `php -S localhost:8000`
   - El servidor responde en: `http://localhost:8000`

3. **Credenciales**
   - **Base de Datos**: Configurar en [conexion.php](conexion.php)
   - **Usuario Admin**: admin / admin123
   - ⚠️ Cambiar contraseña inmediatamente en producción

### Solución de Problemas Comunes

#### 1. Error: "only_full_group_by" en MySQL 8.0+
**Causa**: MySQL 8.0 por defecto requiere que todos los campos sin agregación estén en la cláusula GROUP BY.

**Solución Aplicada**: 
- Usar función `ANY_VALUE()` en campos no agregados dentro de GROUP BY
- **Archivos afectados**:
  - `views/evaluacion/classes/lib.php` (Lines 21, 99)
  - `views/auditoria/classes/lib.php` (Lines 32, 115)
  - `views/seguimiento/classes/lib.php` (Line 20)
  - `views/seguimiento/classes/lib_r.php` (Lines 20, 395, 559)

**Ejemplo de corrección**:
```sql
-- ❌ Incorrecto (falla en MySQL 8.0+)
SELECT version, version_descripcion 
FROM control_cliente 
WHERE status_conexion = 1 AND id_cliente = 1 
GROUP BY version

-- ✅ Correcto (compatible con ONLY_FULL_GROUP_BY)
SELECT version, ANY_VALUE(version_descripcion) AS version_descripcion 
FROM control_cliente 
WHERE status_conexion = 1 AND id_cliente = 1 
GROUP BY version
```

#### 2. Error: URL incorrecto en conexión HTTPS
**Causa**: `conexion.php` tenía URL configurada como `https://localhost` sin puerto de escucha.

**Solución**: 
- Actualizar `wwwroot` a `http://localhost:8000` en [conexion.php](conexion.php)
- Cambiar puertos según configuración del servidor

#### 3. Tabla cliente vacía después de instalación
**Descripción**: La tabla cliente se crea vacía en schema.sql. Se necesita crear al menos una empresa para acceder al dashboard.

**Solución**: 
```sql
INSERT INTO cliente (nombre, id_giro, id_madurez, status_empresa) 
VALUES ('Empresa de Prueba', 1, 1, 1);
```

### Flujo de Acceso a la Aplicación

1. Acceder a `http://localhost:8000` o `http://localhost:8000/index.php`
2. Login con usuario: `admin` / contraseña: `admin123`
3. Seleccionar empresa en página de selección (`empresa.php`)
4. Acceso a dashboard y módulos funcionales

### Módulos Funcionales y Acceso

- **Dashboard**: `/index.php` - Vista general del sistema
- **Evaluación**: `/views/evaluacion/` - Evaluación de controles por entidad
- **Seguimiento**: `/views/seguimiento/` - Acciones correctivas y resultados
- **Auditoría**: `/views/auditoria/` - Cédulas y resultados de auditoría
- **Catálogos**: `/views/catalogos/` - Datos maestros del sistema
- **Configuración**: `/views/configuracion/` - Usuarios y compañías

### Consideraciones Técnicas

- **Charset de Base de Datos**: utf8mb4_unicode_ci para soporte multiidioma
- **Motor**: InnoDB para transaccionalidad e integridad referencial
- **Sesiones**: Cookie-based con validación de empresa activa
- **Validación**: Implementar validación adicional en lado del servidor para producción

##  Contribuciones

Para contribuir al proyecto:
1. Hacer un fork del repositorio
2. Crear una rama para la nueva funcionalidad
3. Realizar los cambios y pruebas
4. Enviar un pull request


**Última actualización**: Junio 2026
