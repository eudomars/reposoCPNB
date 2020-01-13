reposo

CREATE TABLE  registro_reposo (
  idreposo serial,
  idtrabajador integer,
  cedula_trabajador integer,
  idmedico integer,
  idcentro_medico integer,
  iddiagnostico integer,
  idtipo_reposo integer,
  desde DATE,
  hasta DATE,
  dias_reposo integer,
  observacion text,
  usuario_registro integer,
  fecha_registro timestamp,
  usuario_modifico integer,
  fecha_modifico timestamp,
  PRIMARY KEY (idreposo)
)



diagnostico


CREATE TABLE IF NOT EXISTS diagnostico (
  iddiagnostico serial,
  diagnostico VARCHAR(100),
  usuario_registro integer,
  fecha_registro timestamp,
  usuario_modifico integer,
  fecha_modifico timestamp,
  PRIMARY KEY (iddiagnostico))

  -- medico 

  CREATE TABLE medico (
  idmedico serial,
  cedula_medico integer,
  nombre_medico VARCHAR(100),
  credencial_medico VARCHAR(50),
  telef_medico VARCHAR(30),
  especialidad integer,
  usuario_registro integer,
  fecha_registro timestamp,
  usuario_modifico integer,
  fecha_modifico timestamp,
  PRIMARY KEY (idmedico))

  -- Registrar centro medico

INSERT INTO medico(cedula_medico,credencial_medico,telef_medico,especialidad,usuario_registro,fecha_registro)  VALUES(
  :cdMedico, :credMedico, :telef, :espec, :usuario_registro, :fecha_registro
);

  -- centro medico

  CREATE TABLE centro_medico (
  idcentro_medico serial,
  id_estado integer NOT NULL,
  id_municipio integer,
  centro_medico VARCHAR(100),
  telef_centro_medico VARCHAR(30),
  rif_centro_medico VARCHAR(50),
  direccion_centro_medico text,
  usuario_registro integer,
  fecha_registro timestamp,
  usuario_modifico integer,
  fecha_modifico timestamp,
  PRIMARY KEY (idcentro_medico))

-- Registrar centro medico

INSERT INTO centro_medico(id_estado,id_municipio,centro_medico,telef_centro_medico,rif_centro_medico,usuario_registro,fecha_registro)  VALUES(
  :estado, :municipio, :centro_medico, :telef, :rif, :usuario_registro, :fecha_registro
);


  CREATE TABLE estado
(
  id_estado integer NOT NULL,
  abreviatura character varying(3),
  cod_estado character varying(2) NOT NULL,
  nombre character varying(40) NOT NULL,
  id_pais integer NOT NULL,
  CONSTRAINT estado_pkey PRIMARY KEY (id_estado),
  CONSTRAINT "$1" FOREIGN KEY (id_pais)
      REFERENCES public.pais (id_pais) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE SET NULL
)

CREATE TABLE municipio
(
  id_municipio integer NOT NULL,
  abreviatura character varying(3),
  cod_municipio character varying(2) NOT NULL,
  id_estado integer NOT NULL,
  nombre character varying(40) NOT NULL,
  CONSTRAINT municipio_pkey PRIMARY KEY (id_municipio),
  CONSTRAINT "$1" FOREIGN KEY (id_estado)
      REFERENCES public.estado (id_estado) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE SET NULL
)

CREATE TABLE parroquia
(
  id_parroquia integer NOT NULL,
  abreviatura character varying(3),
  cod_parroquia character varying(2) NOT NULL,
  id_municipio integer NOT NULL,
  nombre character varying(40) NOT NULL,
  CONSTRAINT parroquia_pkey PRIMARY KEY (id_parroquia),
  CONSTRAINT "$1" FOREIGN KEY (id_municipio)
      REFERENCES public.municipio (id_municipio) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE SET NULL
)