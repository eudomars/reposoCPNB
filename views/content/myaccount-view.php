<?= "<script> myaccount(); </script>"; ?>

<div class="card">

    <div class="card-header">
        Mi cuenta
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-6">

                <div class="form-group">
                    <label for="my_a_user">Usuario:</label>
                    <p id="my_a_user" class="font-weight-bold"></p>
                </div>

                <div class="form-group">

                    <label for="my_a_name">Nombres:</label>
                    <input type="text" name="my_a_name" id="my_a_name" class="form-control">

                </div>

                <div class="form-group">

                    <label for="my_a_date">Fecha de registro:</label>
                    <p id="my_a_date" class="font-weight-bold"></p>

                </div>

                <div class="form-group">

                    <label for="my_a_rol">Rol:</label>
                    <p id="my_a_rol" class="font-weight-bold"></p>

                </div>

                <div class="form-group">

                    <label for="my_a_status">Estatus:</label>
                    <p id="my_a_status" class="font-weight-bold"></p>

                </div>

            </div>

            <div class="col-6">

                <div class="form-group">

                    <label for="my_a_pass">Contraseña nueva:</label>
                    <input type="password" name="my_a_pass" id="my_a_pass" class="form-control">
                    <small class="form-text text-muted">Dejar vacio si no desea cambiarla.</small>

                </div>

                <div class="form-group">

                    <label for="my_a_pass_confirm">Confirmación de contraseña nueva:</label>
                    <input type="password" name="my_a_pass_confirm" id="my_a_pass_confirm" class="form-control">
                    <small class="form-text" id="msg_pass"></small>

                </div>

                <hr>

                <div class="form-group">

                    <label for="my_a_pass_actual">Contraseña principal:</label>
                    <input type="password" name="my_a_pass_actual" id="my_a_pass_actual" class="form-control">
                    <small class="form-text text-muted">Introduzca la contraseña actual para confirmar los
                        cambios.</small>

                </div>

                <hr>

                <div class="form-group">

                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Editar cuenta
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="#" id="my_account_name">Nombres</a>
                            <a class="dropdown-item" href="#" id="my_account_pass">Contraseña</a>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success" id="my_account_save_name">Actualizar nombre</button>
                    <button type="button" class="btn btn-success" id="my_account_save_pass">Actualizar clave</button>

                </div>

            </div>

        </div>

    </div>