CREATE TABLE pais
(
  id_pais bigserial NOT NULL,
  abv_pais character varying(5),
  nombre_pais character varying(50),
  CONSTRAINT pais_pkey PRIMARY KEY (id_pais)
)

CREATE TABLE region
(
  id_region serial NOT NULL,
  nomb_regiones character varying(50),
  CONSTRAINT region_pkey PRIMARY KEY (id_region)
)

CREATE TABLE estado
(
  id_estado serial NOT NULL,
  nomb_estados character varying(255),
  id_region integer,
  CONSTRAINT estado_pkey PRIMARY KEY (id_estado)
)

CREATE TABLE municipio
(
  id_municipio integer,
  municipio character varying(150),
  id_estado integer
)

CREATE TABLE parroquia
(
  id_parroquia integer NOT NULL,
  parroquia character varying(150),
  id_municipio integer,
  CONSTRAINT parroquia_pkey PRIMARY KEY (id_parroquia)
)

