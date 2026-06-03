# Guía de Instalación - Base de Datos GRC

## 📋 Requisitos

- MySQL 5.7+ o MariaDB 10.1+
- PHP 5.6+ con extensión MySQLi
- Acceso a phpMyAdmin o cliente de MySQL en línea de comandos
- Usuario de MySQL con permisos para crear bases de datos y tablas

## 📥 Pasos para la Instalación

### Opción 1: Usando phpMyAdmin

1. **Acceder a phpMyAdmin**
   - Abrir el navegador y acceder a `http://localhost/phpmyadmin`
   - Ingresar con tus credenciales de MySQL

2. **Crear nueva base de datos**
   - En el panel izquierdo, hacer clic en "Nueva"
   - Nombre de base de datos: `grc`
   - Cotejamiento: `utf8mb4_unicode_ci`
   - Hacer clic en "Crear"

3. **Importar el esquema**
   - Seleccionar la base de datos `grc`
   - Ir a la pestaña "Importar"
   - Seleccionar el archivo `schema.sql`
   - Hacer clic en "Ejecutar"

### Opción 2: Usando MySQL en Línea de Comandos

```bash
# Conectarse a MySQL
mysql -u root -p

# Crear la base de datos
CREATE DATABASE grc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Usar la base de datos
USE grc;

# Importar el esquema
SOURCE /ruta/a/schema.sql;

# Verificar la instalación
SHOW TABLES;
```

### Opción 3: Usando MySQL Workbench

1. Abrir MySQL Workbench
2. Conectarse al servidor MySQL
3. Ir a File → Open SQL Script
4. Seleccionar el archivo `schema.sql`
5. Ejecutar las consultas (Ctrl + Shift + Enter)

## ⚙️ Configuración de Conexión

Editar el archivo `conexion.php` en la raíz del proyecto:

```php
$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'grc';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '';
$CFG->wwwroot    = 'https://localhost';
```

**Cambiar según tus credenciales de MySQL:**
- `dbhost`: Host del servidor MySQL
- `dbname`: Nombre de la base de datos
- `dbuser`: Usuario de MySQL
- `dbpass`: Contraseña de MySQL
- `wwwroot`: URL raíz del proyecto

## 🔐 Credenciales Iniciales

### Usuario Administrador
- **Usuario**: `admin`
- **Contraseña**: `admin123`

⚠️ **IMPORTANTE**: Cambiar esta contraseña inmediatamente después de la instalación.

## 📊 Estructura de Tablas

### Tablas Principales

#### 1. **usuarios**
Almacena la información de usuarios del sistema.

**Campos principales:**
- `id`: ID único del usuario
- `nombre_completo`: Nombre completo
- `usuario`: Nombre de usuario para login
- `password`: Contraseña (MD5 encriptado)
- `correo`: Email
- `status_usuario`: Estado (1=activo, 0=inactivo)

#### 2. **cliente**
Representa las empresas/organizaciones que usan el sistema.

**Campos principales:**
- `id`: ID único del cliente
- `nombre`: Nombre de la empresa
- `id_giro`: Referencia al giro comercial
- `id_madurez`: Nivel de madurez
- `status_empresa`: Estado

#### 3. **entidad**
Catálogo de entidades organizacionales.

**Campos principales:**
- `id_entidad`: ID único
- `codigo`: Código identificador
- `descripcion`: Descripción de la entidad
- `status_entidad`: Estado

#### 4. **proceso**
Catálogo de procesos de la empresa.

**Campos principales:**
- `id_proceso`: ID único
- `codigo`: Código del proceso
- `descripcion`: Descripción
- `ind_riesgo_*`: Indicadores de riesgo (1-10)

#### 5. **control**
Objetivos de control y controles del sistema.

**Campos principales:**
- `id_control`: ID único
- `codigo`: Código del control
- `descripcion`: Descripción detallada
- `id_entidad`: Entidad relacionada
- `id_proceso`: Proceso relacionado
- `id_tipo_riesgo`: Tipo de riesgo
- `id_tipo_control`: Tipo de control
- `documentado`, `autorizado`, `difundido`, `ejecutado`, `monitoreado`: Niveles de madurez

#### 6. **control_cliente**
Vincula controles con clientes y almacena evaluaciones.

**Campos principales:**
- `id`: ID único
- `id_cliente`: Referencia al cliente
- `id_control`: Referencia al control
- `version`: Versión de la evaluación
- `dato_*`: Campos de datos de evaluación
- `total_puntos`: Puntuación total
- `estatus_evaluacion`: Estado (Completado, Desarrollo, Nulo)

#### 7. **cliente_diagnostico**
Almacena el seguimiento de acciones correctivas.

**Campos principales:**
- `id`: ID único
- `id_control_cliente`: Referencia a evaluación
- `avance`: Porcentaje de avance
- `responsable`: Persona responsable
- `fecha_compromiso`: Fecha de compromiso
- `observaciones`: Comentarios y notas
- `archivo`: Archivo adjunto

### Tablas de Catálogos

- **nivel_madurez**: Niveles de madurez del sistema de control
- **giro**: Giros comerciales
- **tipo_riesgo**: Tipos de riesgo
- **tipo_control**: Tipos de control
- **configuracion**: Configuración de madurez

### Tabla de Auditoría

- **auditoria_log**: Registro de cambios y operaciones

## ✅ Verificación de la Instalación

Para verificar que la instalación fue exitosa:

```bash
mysql -u root -p grc -e "SHOW TABLES;"
```

Debería mostrar todas las tablas creadas.

También puedes usar phpMyAdmin para:
1. Seleccionar la base de datos `grc`
2. Verificar que todas las tablas aparezcan en el panel izquierdo
3. Hacer clic en cada tabla para ver su estructura

## 🔄 Respaldar la Base de Datos

### Usando MySQL en Línea de Comandos

```bash
mysqldump -u root -p grc > grc_backup.sql
```

### Usando phpMyAdmin

1. Seleccionar la base de datos `grc`
2. Ir a la pestaña "Exportar"
3. Seleccionar "Rápida" (o "Personalizada" para más opciones)
4. Hacer clic en "Ejecutar"

## 🔧 Mantenimiento

### Optimizar Tablas

```bash
mysql -u root -p grc -e "OPTIMIZE TABLE usuarios, cliente, control, control_cliente;"
```

### Verificar Integridad

```bash
mysql -u root -p grc -e "CHECK TABLE usuarios, cliente, control, control_cliente;"
```

### Ver Estadísticas

```bash
mysql -u root -p grc -e "ANALYZE TABLE usuarios, cliente, control, control_cliente;"
```

## 🐛 Solución de Problemas

### Error: "Base de datos no existe"
- Verificar que el archivo `schema.sql` se importó correctamente
- Verificar que la conexión en `conexion.php` es correcta
- Revisar los logs de MySQL

### Error: "Acceso denegado al usuario"
- Verificar credenciales en `conexion.php`
- Asegurar que el usuario MySQL tiene permisos en la base de datos `grc`
- Crear el usuario si es necesario:
```bash
mysql -u root -p
CREATE USER 'usuario_grc'@'localhost' IDENTIFIED BY 'contraseña';
GRANT ALL PRIVILEGES ON grc.* TO 'usuario_grc'@'localhost';
FLUSH PRIVILEGES;
```

### Error: "Tabla vacía o datos inconsistentes"
- Verificar que los datos iniciales se insertaron
- Revisar los permisos de las tablas
- Reimportar el schema si es necesario

## 📞 Soporte

Para más información sobre el uso del sistema, consultar la documentación en `README.md`.

---

**Última actualización**: Junio 2026
**Versión del Schema**: 1.0
