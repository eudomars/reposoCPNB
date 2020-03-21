<!-- Modal Zoom Users -->
<div class="modal fade" id="zoom-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
<div class="modal fade" id="reg-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Modal Registrar medico -->
<div class="modal fade" id="reg-medico-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo medico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">

                        <form id="frm-reg-medico-modal" autocomplete="off">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Cedula del medico:</label><br>
                                            <input type="text" name="cdMedicoModal" id="cdMedicoModal" class="form-control" maxlength="8">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Nombre y Apellido:</label><br>
                                            <input type="text" name="nomApeMedicModal" id="nomApeMedicModal" class="form-control" placeholder="Ingrese el nombre y apellido del Medico">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Credencial:</label><br>
                                            <input type="text" name="credencialMedModal" id="credencialMedModal" class="form-control" placeholder="Ingrese la credencial del Medico">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Telefono:</label><br>
                                            <input type="text" name="telefMedModal" id="telefMedModal" maxlength="11" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="frm_rol">Especialidad:</label>
                                            <select class="custom-select" name="especialidadModal" id="especialidadModal">
                                                <option value="">Seleccione...</option>
                                                <?php
                                                require_once './controllers/localidadController.php';

                                                $especialidad = localidadController::lista_especialidad_controller();

                                                foreach ($especialidad as $key => $value) { ?>


                                                    <option value="<?php echo $value['idespecialidad']; ?>"><?php echo $value['especialidad']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>





                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Registrar centro medico -->
<div class="modal fade" id="reg-CentroMedico-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo centro medico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">

                        <form id="frm-reg-centroMedico" autocomplete="off">
                                <div class="row">

                                    <!-- <div class="col-12">
                                        <p class="bg-info text-center fondo-bg"><strong>Datos del Centro Medico</strong></p>
                                    </div> -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="frm_rol">Estado:</label>
                                                <select class="custom-select" name="estadoC" id="estadoC">
                                                    <option value="">Seleccione...</option>
                                                   

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="col-md-12" id="municipio">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>Centro Medico:</label><br>
                                                <input type="text" name="centroM" id="centroM" class="form-control" placeholder="Ingrese el nombre del Centro Medico">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>Telefono:</label><br>
                                                <input type="text" name="telefCent" id="telefCent" maxlength="11" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>Rif:</label><br>
                                                <input type="text" name="rifCentroM" id="rifCentroM" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>Direccion:</label><br>
                                                <textarea name="direcCM" id="direcCM" cols="40" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                                
                            <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                </center>
                            </div>
                            
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>