CREATE DATABASE prueba_actotal;
USE prueba_actotal;

CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
email           varchar(100) not null,
telefono        varchar(255) not null,
fecha           date not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id)
)ENGINE=InnoDb;