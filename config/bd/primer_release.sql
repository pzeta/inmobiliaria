create table usuarios (
    usuario varchar (50)   NOT NULL,
    clave varchar (8)   NOT NULL,
    PRIMARY KEY (usuario)
)

create table carpeta_imagenes (
    id int (10)   NOT NULL AUTO_INCREMENT,
    glosa varchar (250)   NOT NULL,
    tipo int (1) NOT NULL,
    activa int(1) NOT NULL,
    PRIMARY KEY (id)
)

create table carpeta_imagenes_det ( 
	id int (10) NOT NULL AUTO_INCREMENT, 
	id_carpeta int (10) NOT NULL, 
	nombre_imagen varchar(100) NOT NULL,
    nombre_producto varchar(100),
    descripcion_producto varchar(2000),
    celular varchar(20),
    correo varchar(100),
	PRIMARY KEY (id) 
)