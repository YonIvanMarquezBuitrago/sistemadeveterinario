-- Creación de la Tabla usuarios
CREATE TABLE `tb_usuarios`
(
    `id_usuario`        INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre_completo`   VARCHAR(255) NOT NULL,
    `email`             VARCHAR(255) NOT NULL UNIQUE KEY,
    `password`          TEXT         NOT NULL,
    `token`             VARCHAR(11) NULL,
    `cargo`             VARCHAR(50)  NOT NULL,

    `fyh_creacion`      DATETIME NULL,
    `fyh_actualizacion` DATETIME NULL,
    `estado`            VARCHAR(11)  NOT NULL

) ENGINE=InnoDB;

INSERT INTO `tb_usuarios` (`id_usuario`, `nombre_completo`, `email`, `password`, `token`, `cargo`, `fyh_creacion`, `fyh_actualizacion`, `estado`)
VALUES ('YON IVAN MARQUEZ BUITRAGO', 'admin@admin.com', '12345678', NULL, 'ADMINISTRADOR', '2024-07-30 06:56:22', NULL, '1'),
VALUES ('YENY ESPERANZA DIAZ', 'yedb@admin.com', '$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2', NULL, 'DOCTORA', '2024-07-31 09:35:10', NULL, '1');

-- Creación de la Tabla productos
CREATE TABLE `tb_productos`
(
    `id_producto`       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_usuario`        INT(11) NOT NULL,
    `codigo`            VARCHAR(50)  NOT NULL,
    `nombre_producto`   VARCHAR(255) NOT NULL,
    `descripcion`       TEXT NULL,
    `imagen`            TEXT NULL,
    `stock`             INT(50) NOT NULL,
    `stock_minimo`      INT(50) NOT NULL,
    `stock_maximo`      INT(50) NOT NULL,
    `precio_compra`     INT(50) NOT NULL,
    `precio_venta`      INT(50) NOT NULL,
    `fecha_ingreso`     DATE         NOT NULL,

    `fyh_creacion`      DATETIME NULL,
    `fyh_actualizacion` DATETIME NULL,
    `estado`            VARCHAR(11)  NOT NULL,

    FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Creación de la Tabla Reservas
CREATE TABLE `tb_reservas`
(
    `id_reserva`        INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_usuario`        INT(11) NOT NULL,
    `nombre_mascota`    VARCHAR(255) NULL,
    `tipo_servicio`     VARCHAR(255) NOT NULL,
    `fecha_cita`        DATE         NOT NULL,
    `hora_cita`         VARCHAR(100) NOT NULL,
    `title`             VARCHAR(100) NOT NULL,
    `start`             DATE         NOT NULL,
    `end`               DATE         NOT NULL,
    `color`             VARCHAR(50)  NOT NULL,

    `fyh_creacion`      DATETIME NULL,
    `fyh_actualizacion` DATETIME NULL,
    `estado`            VARCHAR(11)  NOT NULL,

    FOREIGN KEY (id_usuario) REFERENCES tb_usuarios (id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB;