-- =====================================================
-- SCHEMA DE BASE DE DATOS GRC
-- Sistema de Gobernanza, Riesgo y Cumplimiento
-- =====================================================
-- Este archivo contiene la estructura de todas las tablas
-- necesarias para el funcionamiento del sistema GRC

-- =====================================================
-- 1. TABLA DE USUARIOS
-- =====================================================
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre_completo` VARCHAR(255) NOT NULL,
  `usuario` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `correo` VARCHAR(255) NOT NULL,
  `celular` VARCHAR(20),
  `fecha_nacimiento` DATE,
  `dom_calle` VARCHAR(255),
  `dom_interior` VARCHAR(50),
  `dom_exterior` VARCHAR(50),
  `dom_colonia` VARCHAR(255),
  `dom_ciudad` VARCHAR(255),
  `dom_estado` VARCHAR(255),
  `status_usuario` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_usuario` (`usuario`),
  INDEX `idx_status` (`status_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 2. TABLA DE CLIENTES/EMPRESAS
-- =====================================================
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(255) NOT NULL,
  `id_giro` INT,
  `id_madurez` INT,
  `status_empresa` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status_empresa`),
  FOREIGN KEY (`id_giro`) REFERENCES `giro`(`id_giro`),
  FOREIGN KEY (`id_madurez`) REFERENCES `nivel_madurez`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 3. TABLA DE GIROS COMERCIALES
-- =====================================================
CREATE TABLE IF NOT EXISTS `giro` (
  `id_giro` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) UNIQUE,
  `descripcion` VARCHAR(255) NOT NULL,
  `status_giro` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status_giro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 4. TABLA DE ENTIDADES
-- =====================================================
CREATE TABLE IF NOT EXISTS `entidad` (
  `id_entidad` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) UNIQUE,
  `descripcion` VARCHAR(255) NOT NULL,
  `status_entidad` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status_entidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 5. TABLA DE PROCESOS
-- =====================================================
CREATE TABLE IF NOT EXISTS `proceso` (
  `id_proceso` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) UNIQUE,
  `descripcion` VARCHAR(255) NOT NULL,
  `ind_riesgo_uno` INT DEFAULT 0,
  `ind_riesgo_dos` INT DEFAULT 0,
  `ind_riesgo_tres` INT DEFAULT 0,
  `ind_riesgo_cuatro` INT DEFAULT 0,
  `ind_riesgo_cinco` INT DEFAULT 0,
  `ind_riesgo_seis` INT DEFAULT 0,
  `ind_riesgo_siete` INT DEFAULT 0,
  `ind_riesgo_ocho` INT DEFAULT 0,
  `ind_riesgo_nueve` INT DEFAULT 0,
  `ind_riesgo_diez` INT DEFAULT 0,
  `status_proceso` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status_proceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 6. TABLA DE TIPOS DE RIESGO
-- =====================================================
CREATE TABLE IF NOT EXISTS `tipo_riesgo` (
  `id_tipo_riesgo` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) UNIQUE,
  `descripcion` VARCHAR(255) NOT NULL,
  `status_tipo_riesgo` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status_tipo_riesgo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 7. TABLA DE TIPOS DE CONTROL
-- =====================================================
CREATE TABLE IF NOT EXISTS `tipo_control` (
  `id_tipo_control` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) UNIQUE,
  `descripcion` VARCHAR(255) NOT NULL,
  `status_tipo_control` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status_tipo_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 8. TABLA DE NIVELES DE MADUREZ
-- =====================================================
CREATE TABLE IF NOT EXISTS `nivel_madurez` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) UNIQUE,
  `descripcion` VARCHAR(255) NOT NULL,
  `documentado` INT DEFAULT 0,
  `autorizado` INT DEFAULT 0,
  `difundido` INT DEFAULT 0,
  `ejecutado` INT DEFAULT 0,
  `monitoreado` INT DEFAULT 0,
  `status` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 9. TABLA DE CONFIGURACIÓN
-- =====================================================
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_madurez` INT,
  `completado` INT DEFAULT 0,
  `desarrollo` INT DEFAULT 0,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_madurez`) REFERENCES `nivel_madurez`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 10. TABLA DE CONTROLES (OBJETIVOS DE CONTROL)
-- =====================================================
CREATE TABLE IF NOT EXISTS `control` (
  `id_control` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) UNIQUE,
  `descripcion` VARCHAR(500) NOT NULL,
  `referencia` VARCHAR(255),
  `riesgo` VARCHAR(255),
  `id_entidad` INT,
  `id_proceso` INT,
  `id_tipo_riesgo` INT,
  `id_tipo_control` INT,
  `documentado` INT DEFAULT 0,
  `autorizado` INT DEFAULT 0,
  `difundido` INT DEFAULT 0,
  `ejecutado` INT DEFAULT 0,
  `monitoreado` INT DEFAULT 0,
  `status_control` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status_control`),
  INDEX `idx_entidad` (`id_entidad`),
  INDEX `idx_proceso` (`id_proceso`),
  FOREIGN KEY (`id_entidad`) REFERENCES `entidad`(`id_entidad`),
  FOREIGN KEY (`id_proceso`) REFERENCES `proceso`(`id_proceso`),
  FOREIGN KEY (`id_tipo_riesgo`) REFERENCES `tipo_riesgo`(`id_tipo_riesgo`),
  FOREIGN KEY (`id_tipo_control`) REFERENCES `tipo_control`(`id_tipo_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 11. TABLA DE CONTROL POR CLIENTE (EVALUACIÓN)
-- =====================================================
CREATE TABLE IF NOT EXISTS `control_cliente` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_cliente` INT NOT NULL,
  `id_control` INT NOT NULL,
  `version` INT DEFAULT 1,
  `version_descripcion` VARCHAR(255),
  `dato_aplica` TINYINT DEFAULT 0,
  `dato_sin_control` TINYINT DEFAULT 0,
  `dato_documentado` INT DEFAULT 0,
  `dato_autorizado` INT DEFAULT 0,
  `dato_difundido` INT DEFAULT 0,
  `dato_ejecutado` INT DEFAULT 0,
  `dato_monitoreado` INT DEFAULT 0,
  `total_puntos` DECIMAL(10, 2) DEFAULT 0,
  `estatus_evaluacion` VARCHAR(50) DEFAULT 'Nulo',
  `status_conexion` TINYINT DEFAULT 1,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_cliente` (`id_cliente`),
  INDEX `idx_control` (`id_control`),
  INDEX `idx_version` (`version`),
  INDEX `idx_status` (`status_conexion`),
  UNIQUE KEY `unique_cliente_control_version` (`id_cliente`, `id_control`, `version`),
  FOREIGN KEY (`id_cliente`) REFERENCES `cliente`(`id`),
  FOREIGN KEY (`id_control`) REFERENCES `control`(`id_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 12. TABLA DE DIAGNÓSTICO/SEGUIMIENTO DE ACCIONES
-- =====================================================
CREATE TABLE IF NOT EXISTS `cliente_diagnostico` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_control_cliente` INT NOT NULL,
  `avance` DECIMAL(10, 2) DEFAULT 0,
  `responsable` VARCHAR(255),
  `fecha_compromiso` DATE,
  `observaciones` TEXT,
  `archivo` VARCHAR(255),
  `estado` VARCHAR(50) DEFAULT 'En Progreso',
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_control_cliente` (`id_control_cliente`),
  FOREIGN KEY (`id_control_cliente`) REFERENCES `control_cliente`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 13. TABLA DE AUDITORÍA (LOG DE CAMBIOS)
-- =====================================================
CREATE TABLE IF NOT EXISTS `auditoria_log` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_usuario` INT,
  `id_cliente` INT,
  `tabla_afectada` VARCHAR(100),
  `operacion` VARCHAR(50),
  `registro_id` INT,
  `datos_anteriores` LONGTEXT,
  `datos_nuevos` LONGTEXT,
  `descripcion` TEXT,
  `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_usuario` (`id_usuario`),
  INDEX `idx_cliente` (`id_cliente`),
  INDEX `idx_fecha` (`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- DATOS INICIALES
-- =====================================================

-- Insertar niveles de madurez
INSERT INTO `nivel_madurez` (`codigo`, `descripcion`, `documentado`, `autorizado`, `difundido`, `ejecutado`, `monitoreado`, `status`)
VALUES 
  ('MAD001', 'Nivel 1 - Ad Hoc', 0, 0, 0, 0, 0, 1),
  ('MAD002', 'Nivel 2 - Documentado', 20, 0, 0, 0, 0, 1),
  ('MAD003', 'Nivel 3 - Autorizado', 40, 20, 0, 0, 0, 1),
  ('MAD004', 'Nivel 4 - Difundido', 60, 40, 20, 0, 0, 1),
  ('MAD005', 'Nivel 5 - Ejecutado', 80, 60, 40, 20, 0, 1),
  ('MAD006', 'Nivel 6 - Monitoreado', 100, 80, 60, 40, 20, 1);

-- Insertar giros comerciales de ejemplo
INSERT INTO `giro` (`codigo`, `descripcion`, `status_giro`)
VALUES 
  ('G001', 'Banca y Finanzas', 1),
  ('G002', 'Seguros', 1),
  ('G003', 'Manufactura', 1),
  ('G004', 'Tecnología', 1),
  ('G005', 'Salud', 1),
  ('G006', 'Retail', 1),
  ('G007', 'Logística', 1),
  ('G008', 'Energía', 1);

-- Insertar entidades de ejemplo
INSERT INTO `entidad` (`codigo`, `descripcion`, `status_entidad`)
VALUES 
  ('E001', 'Dirección General', 1),
  ('E002', 'Finanzas', 1),
  ('E003', 'Operaciones', 1),
  ('E004', 'Recursos Humanos', 1),
  ('E005', 'Cumplimiento', 1),
  ('E006', 'Auditoría Interna', 1);

-- Insertar procesos de ejemplo
INSERT INTO `proceso` (`codigo`, `descripcion`, `status_proceso`)
VALUES 
  ('P001', 'Gestión de Riesgos', 1),
  ('P002', 'Cumplimiento Regulatorio', 1),
  ('P003', 'Evaluación de Controles', 1),
  ('P004', 'Gestión de Cambios', 1),
  ('P005', 'Capacitación y Comunicación', 1),
  ('P006', 'Monitoreo y Seguimiento', 1);

-- Insertar tipos de riesgo de ejemplo
INSERT INTO `tipo_riesgo` (`codigo`, `descripcion`, `status_tipo_riesgo`)
VALUES 
  ('TR001', 'Riesgo Estratégico', 1),
  ('TR002', 'Riesgo Operacional', 1),
  ('TR003', 'Riesgo Financiero', 1),
  ('TR004', 'Riesgo Legal y Regulatorio', 1),
  ('TR005', 'Riesgo de Cumplimiento', 1),
  ('TR006', 'Riesgo Tecnológico', 1);

-- Insertar tipos de control de ejemplo
INSERT INTO `tipo_control` (`codigo`, `descripcion`, `status_tipo_control`)
VALUES 
  ('TC001', 'Control Preventivo', 1),
  ('TC002', 'Control Detectivo', 1),
  ('TC003', 'Control Correctivo', 1),
  ('TC004', 'Control Manual', 1),
  ('TC005', 'Control Automatizado', 1);

-- Crear usuario administrador de ejemplo (password: admin123 -> md5: 0192023a7bbd73250516f069df18b500)
INSERT INTO `usuarios` (`nombre_completo`, `usuario`, `password`, `correo`, `status_usuario`)
VALUES 
  ('Administrador Sistema', 'admin', '0192023a7bbd73250516f069df18b500', 'admin@grc.local', 1);

-- =====================================================
-- ÍNDICES ADICIONALES PARA OPTIMIZACIÓN
-- =====================================================
CREATE INDEX `idx_control_cliente_id_cliente` ON `control_cliente`(`id_cliente`);
CREATE INDEX `idx_control_cliente_version` ON `control_cliente`(`version`);
CREATE INDEX `idx_cliente_diagnostico_control` ON `cliente_diagnostico`(`id_control_cliente`);

-- =====================================================
-- FIN DEL SCHEMA
-- =====================================================
