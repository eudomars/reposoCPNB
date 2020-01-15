<!-- Modal Zoom Users -->
<div class="modal fade" id="zoom-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Datos del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <label for="usuario">Usuario:</label>
                <p id="usuario"></p>

                <label for="nombre">Nombres:</label>
                <p id="nombre"></p>

                <label for="fecha_reg">Rol:</label>
                <p id="rol"></p>

                <label for="fecha">Fecha de registro:</label>
                <p id="fecha"></p>

                <form id="frmEditUser">

                    <div class="form-group">
                        <label for="frmEditName">Editar Nombre</label>
                        <input type="text" class="form-control" name="frmEditName" id="frmEditName" placeholder="Nombre del usuario">
                    </div>

                    <div class="form-group">
                        <label for="frmEditStatus">Cambiar estatus</label>
                        <select name="frmEditStatus" id="frmEditStatus" class="custom-select">
                            <option value="1">Activo</option>
                            <option value="2">Desactivar</option>
                        </select>
                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btn-edit-user" class="btn btn-warning">Editar</button>
                <button type="button" id="btn-editsave-user" class="btn btn-primary">Guardar</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal Registrar Users -->
<div class="modal fade" id="reg-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">

                        <form id="frm-reg-user" autocomplete="off">

                            <div class="form-group">
                                <label for="frm_name">Nombres</label>
                                <input type="text" class="form-control" name="frm_name" id="frm_name">
                            </div>

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">

                                        <label for="frm_user">Usuario</label>
                                        <input type="text" class="form-control" name="frm_user" id="frm_user">

                                    </div>
                                </div>

                                <div class="col-6">

                                    <div class="form-group">

                                        <label for="frm_pass">Contraseña</label>
                                        <input type="password" class="form-control" name="frm_pass" id="frm_pass">

                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="frm_rol">Privilegios</label>
                                <select class="custom-select" name="frm_rol" id="frm_rol">
                                    <option value="">Seleccione los privilegios</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Analista</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Registrar Reposo -->
<div class="modal fade" id="reg-reposo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Reposo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">

                        <form id="frm-reg-reposo" autocomplete="off">

                            <div class="col-md-12">
                                <label for="frm_rol">Medico Tratante:</label>
                                <select class="custom-select" name="medicoT" id="medicoT">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Analista</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="frm_rol">Centro medico:</label>
                                <select class="custom-select" name="medicoT" id="medicoT">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Analista</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="frm_rol">Diagnostico:</label>
                                <select class="custom-select" name="medicoT" id="medicoT">
                                    <option value="">Seleccione...</option>
                                    <?php
                                             require './controllers/reposoController.php';
                                             $datos = reposoController::lista_diagnostico_controller();
                                             
                                             foreach ($datos as $key => $value) {?>
                                                <option value="<?php echo $value['iddiagnostico'];?>"><?php echo $value['diagnostico'];?></option>
                                            
                                             <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="frm_rol">Tipo de reposo:</label>
                                <select class="custom-select" name="medicoT" id="medicoT">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Analista</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <br>
                                <label for="frm_rol">Capture de reposo:</label>
                                <div class="form-group"> 
                                <input type="file" name="archivoRep" id="archivoRep">

                                </div>
                                
                            </div>


                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">

                                        <label for="frm_user">Desde:</label>
                                        <input type="date" class="form-control" name="centroM" id="centroM">

                                    </div>
                                </div>

                                <div class="col-6">

                                    <div class="form-group">

                                        <label for="frm_pass">Hasta: </label>
    
                                        <input type="date" class="form-control" name="diag" id="diag">

                                    </div>
                                </div>

                            </div>

                            <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Observacion</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="observ"></textarea>
</div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>