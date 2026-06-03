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

##  Contribuciones

Para contribuir al proyecto:
1. Hacer un fork del repositorio
2. Crear una rama para la nueva funcionalidad
3. Realizar los cambios y pruebas
4. Enviar un pull request


**Última actualización**: Junio 2026
