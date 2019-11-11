<?php if($_SESSION['nivel'] == 1){ ?>

    <div class="card">

        <div class="card-header font-weight-bold">
            Usuarios
        </div>

        <div class="card-body">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reg-user-modal">
                Registrar usuarios
            </button>

            <a href="<?= SERVERURL; ?>reporte/" target="_blank" class="btn btn-warning">
                <i class="icon-file-pdf"></i> Reporte
            </a>
            
            <hr>

            <!-- Tabla de lista de usuarios -->
            <table id='userTable' class='table table-bordered table-responsive-sm'>

                <thead>

                    <tr>

                        <th class='text-center'> N° </th>
                        <th class='text-center'> Usuario </th>
                        <th class='text-center'> Nombres </th>
                        <th class='text-center'> Rol </th>
                        <th class='text-center'> Fecha de registro </th>
                        <th class='text-center'> Opciones </th>

                    </tr>

                </thead>

                <tfoot>

                    <tr>

                        <th class='text-center'> N° </th>
                        <th class='text-center'> Usuario </th>
                        <th class='text-center'> Nombres </th>
                        <th class='text-center'> Rol </th>
                        <th class='text-center'> Fecha de registro </th>
                        <th class='text-center'> Opciones </th>

                    </tr>

                </tfoot>

            </table>

        </div>

<?php }else{ ?>

    <div class="card">

        <div class="card-header font-weight-bold">
            Acceso prohibido!
        </div>

        <div class="card-body">
            <h5 class="card-title">No tienes privilegios suficientes para acceder a este módulo</h5>
        </div>
<?php } ?>