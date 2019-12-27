reposo


CREATE TABLE  reposo (
  idreposo serial,
  trabajador_idtrabajador integer,
  cedula integer,
  medico_tratante_idmedico_tratante integer,
  centro_asistencial_idcentro_asistencial integer,
  diagnostico_iddiagnostico integer,
  tipo_reposo_idtipo_reposo integer,
  desde DATE,
  hasta DATE,
  dias_repos integer,
  observacion varying,
  usuario_registro integer,
  fecha_registro timestamp,
  usuario_modifico integer,
  fecha_modifico timestamp,
  PRIMARY KEY (idreposo),
  INDEX fk_reposo_diagnostico_idx (diagnostico_iddiagnostico ASC),
  INDEX fk_reposo_tipo_reposo1_idx (tipo_reposo_idtipo_reposo ASC),
  INDEX fk_reposo_trabajador1_idx (trabajador_idtrabajador ASC),
  INDEX fk_reposo_medico_tratante1_idx (medico_tratante_idmedico_tratante ASC),
  INDEX fk_reposo_centro_asistencial1_idx (centro_asistencial_idcentro_asistencial ASC),
  UNIQUE INDEX cedula_UNIQUE (cedula ASC),
  CONSTRAINT fk_reposo_diagnostico
    FOREIGN KEY (diagnostico_iddiagnostico)
    REFERENCES reposo.diagnostico (iddiagnostico)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_reposo_tipo_reposo1
    FOREIGN KEY (tipo_reposo_idtipo_reposo)
    REFERENCES reposo.tipo_reposo (idtipo_reposo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_reposo_trabajador1
    FOREIGN KEY (trabajador_idtrabajador)
    REFERENCES reposo.trabajador (idtrabajador)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_reposo_medico_tratante1
    FOREIGN KEY (medico_tratante_idmedico_tratante)
    REFERENCES reposo.medico_tratante (idmedico_tratante)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_reposo_centro_asistencial1
    FOREIGN KEY (centro_asistencial_idcentro_asistencial)
    REFERENCES reposo.centro_asistencial (idcentro_asistencial)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB




diagnostico


CREATE TABLE IF NOT EXISTS reposo.diagnostico (
  iddiagnostico INT NOT,
  diagnostico VARCHAR(45),
  fech_reg DATE,
  usuario_reg INT,
  PRIMARY KEY (iddiagnostico))
ENGINE = InnoDB