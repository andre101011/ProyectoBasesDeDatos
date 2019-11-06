
CREATE DATABASE proyectoBD;

use proyectoBD;

CREATE TABLE Auxiliar
  ( nombre VARCHAR (60) NOT NULL , id DOUBLE NOT NULL
  ) ;
ALTER TABLE Auxiliar ADD CONSTRAINT Auxiliar_PK PRIMARY KEY ( id ) ;


CREATE TABLE Cable_red
  (
    categoria VARCHAR (50) ,
    codigo    VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Cable_red ADD CONSTRAINT Cable_red_PK PRIMARY KEY ( codigo ) ;


CREATE TABLE Clase
  (
    periodo_academico VARCHAR (20) NOT NULL ,
    dia_semana        VARCHAR (20) NOT NULL ,
    hora_inicio       DATETIME NOT NULL ,
    hora_fin          DATETIME NOT NULL ,
    codigo            DOUBLE NOT NULL ,
    Profesor_cedula   VARCHAR (30) NOT NULL ,
    Materia_codigo    VARCHAR (30) NOT NULL ,
    Sala_codigo       VARCHAR (20) NOT NULL
  ) ;
ALTER TABLE Clase ADD CONSTRAINT Clase_PK PRIMARY KEY ( codigo ) ;


CREATE TABLE Computador
  (
    sistema_operativo VARCHAR (30) ,
    gpu               VARCHAR (50) ,
    cpu               VARCHAR (50) ,
    marca             VARCHAR (50) ,
    codigo            VARCHAR (30) NOT NULL ,
    Sala_codigo       VARCHAR (20) NOT NULL
  ) ;
ALTER TABLE Computador ADD CONSTRAINT Computador_PK PRIMARY KEY ( codigo ) ;


CREATE TABLE Entrada_minuta
  (
    Fecha_entrada DATETIME(6) NOT NULL ,
    fecha_salida  DATETIME(6) NOT NULL ,
    id            DOUBLE NOT NULL ,
    observacion   VARCHAR (500) ,
    Auxiliar_id   DOUBLE NOT NULL
  ) ;
ALTER TABLE Entrada_minuta ADD CONSTRAINT Entrada_minuta_PK PRIMARY KEY ( id ) ;


CREATE TABLE Estudiante
  (
    programa VARCHAR (100) NOT NULL ,
    estado   VARCHAR (30) NOT NULL ,
    cedula   VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Estudiante ADD CONSTRAINT Estudiante_PK PRIMARY KEY ( cedula ) ;


CREATE TABLE Implemento
  (
    observacion VARCHAR (500) ,
    codigo      VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Implemento ADD CONSTRAINT Implemento_PK PRIMARY KEY ( codigo ) ;


CREATE TABLE Mac
  (
    Modelo      VARCHAR (50) ,
    codigo      VARCHAR (30) NOT NULL ,
    Sala_codigo VARCHAR (20) NOT NULL
  ) ;
ALTER TABLE Mac ADD CONSTRAINT Mac_PK PRIMARY KEY ( codigo ) ;


CREATE TABLE Materia
  (
    nombre VARCHAR (100) NOT NULL ,
    codigo VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Materia ADD CONSTRAINT Materia_PK PRIMARY KEY ( codigo ) ;


CREATE TABLE Materia_Profesor
  (
    Profesor_cedula VARCHAR (30) NOT NULL ,
    Materia_codigo  VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Materia_Profesor ADD CONSTRAINT Materia_Profesor_PK PRIMARY KEY ( Profesor_cedula, Materia_codigo ) ;


CREATE TABLE Persona
  (
    cedula    VARCHAR (30) NOT NULL ,
    nombres   VARCHAR (100) NOT NULL ,
    apellidos VARCHAR (100) NOT NULL
  ) ;
ALTER TABLE Persona ADD CONSTRAINT Persona_PK PRIMARY KEY ( cedula ) ;


CREATE TABLE Prestamo
  (
    fecha_devolucion DATETIME(6) ,
    fecha_prestamo   DATETIME(6) ,
    id               DOUBLE NOT NULL ,
    observacion      VARCHAR (500) ,
    Auxiliar_id      DOUBLE NOT NULL ,
    Persona_cedula   VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Prestamo ADD CONSTRAINT Prestamo_PK PRIMARY KEY ( id ) ;


CREATE TABLE Prestamo_Implemento
  (
    Prestamo_id       DOUBLE NOT NULL ,
    Implemento_codigo VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Prestamo_Implemento ADD CONSTRAINT Prestamo_Implemento_PK PRIMARY KEY ( Prestamo_id, Implemento_codigo ) ;


CREATE TABLE Profesor
  ( cedula VARCHAR (30) NOT NULL
  ) ;
ALTER TABLE Profesor ADD CONSTRAINT Profesor_PK PRIMARY KEY ( cedula ) ;


CREATE TABLE Sala
  ( codigo VARCHAR (20) NOT NULL
  ) ;
ALTER TABLE Sala ADD CONSTRAINT Sala_PK PRIMARY KEY ( codigo ) ;


CREATE TABLE Turno
  (
    id                DOUBLE NOT NULL ,
    hora_inicio       DATETIME NOT NULL ,
    hora_fin          DATETIME NOT NULL ,
    periodo_academico VARCHAR (30) NOT NULL ,
    dia               VARCHAR (20) NOT NULL ,
    Auxiliar_id       DOUBLE NOT NULL
  ) ;
ALTER TABLE Turno ADD CONSTRAINT Turno_PK PRIMARY KEY ( id ) ;


ALTER TABLE Cable_red ADD CONSTRAINT Cable_red_Implemento_FK FOREIGN KEY ( codigo ) REFERENCES Implemento ( codigo ) ON DELETE CASCADE ;

ALTER TABLE Clase ADD CONSTRAINT Clase_Materia_Profesor_FK FOREIGN KEY ( Profesor_cedula, Materia_codigo ) REFERENCES Materia_Profesor ( Profesor_cedula, Materia_codigo ) ON DELETE CASCADE ;

ALTER TABLE Clase ADD CONSTRAINT Clase_Sala_FK FOREIGN KEY ( Sala_codigo ) REFERENCES Sala ( codigo ) ;

ALTER TABLE Computador ADD CONSTRAINT Computador_Implemento_FK FOREIGN KEY ( codigo ) REFERENCES Implemento ( codigo ) ON DELETE CASCADE ;

ALTER TABLE Computador ADD CONSTRAINT Computador_Sala_FK FOREIGN KEY ( Sala_codigo ) REFERENCES Sala ( codigo ) ;

ALTER TABLE Entrada_minuta ADD CONSTRAINT Entrada_minuta_Auxiliar_FK FOREIGN KEY ( Auxiliar_id ) REFERENCES Auxiliar ( id ) ;

ALTER TABLE Estudiante ADD CONSTRAINT Estudiante_Persona_FK FOREIGN KEY ( cedula ) REFERENCES Persona ( cedula ) ON DELETE CASCADE ;

ALTER TABLE Prestamo_Implemento ADD CONSTRAINT Implemento_FK FOREIGN KEY ( Implemento_codigo ) REFERENCES Implemento ( codigo ) ;

ALTER TABLE Mac ADD CONSTRAINT Mac_Implemento_FK FOREIGN KEY ( codigo ) REFERENCES Implemento ( codigo ) ON DELETE CASCADE ;

ALTER TABLE Mac ADD CONSTRAINT Mac_Sala_FK FOREIGN KEY ( Sala_codigo ) REFERENCES Sala ( codigo ) ;

ALTER TABLE Materia_Profesor ADD CONSTRAINT Materia_FK FOREIGN KEY ( Materia_codigo ) REFERENCES Materia ( codigo ) ON DELETE CASCADE ;

ALTER TABLE Prestamo ADD CONSTRAINT Prestamo_Auxiliar_FK FOREIGN KEY ( Auxiliar_id ) REFERENCES Auxiliar ( id ) ;

ALTER TABLE Prestamo_Implemento ADD CONSTRAINT Prestamo_FK FOREIGN KEY ( Prestamo_id ) REFERENCES Prestamo ( id ) ;

ALTER TABLE Prestamo ADD CONSTRAINT Prestamo_Persona_FK FOREIGN KEY ( Persona_cedula ) REFERENCES Persona ( cedula ) ;

ALTER TABLE Materia_Profesor ADD CONSTRAINT Profesor_FK FOREIGN KEY ( Profesor_cedula ) REFERENCES Profesor ( cedula ) ON DELETE CASCADE ;

ALTER TABLE Profesor ADD CONSTRAINT Profesor_Persona_FK FOREIGN KEY ( cedula ) REFERENCES Persona ( cedula ) ON DELETE CASCADE ;

ALTER TABLE Turno ADD CONSTRAINT Turno_Auxiliar_FK FOREIGN KEY ( Auxiliar_id ) REFERENCES Auxiliar ( id ) ;

