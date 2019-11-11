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