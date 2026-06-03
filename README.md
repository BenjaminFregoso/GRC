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
- Editar `conexion.php` con los datos de conexión a la base de datos
- Crear la base de datos necesaria en MySQL/MariaDB

### 3. Configuración del Servidor Web
- Colocar el proyecto en la carpeta raíz del servidor web
- Asegurar permisos de lectura/escritura en directorios necesarios

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
