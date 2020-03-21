<div class="card">
    <div class="card-header font-weight-bold">
        Usuario: <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">

    <form id="formMedico">
        <div class="row">
            

            <div class="col-12">
                <p class="bg-info text-center fondo-bg"><strong>Datos del Medico</strong></p>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-lg-12">
                        <label>Cedula del medico:</label><br>
                        <input type="text" name="cdMedico" id="cdMedico"  class="form-control" maxlength="8">
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group">
                    <div class="col-lg-12">
                        <label>Nombre y Apellido:</label><br>
                        <input type="text" name="nomApeMedic" id="nomApeMedic" class="form-control"  placeholder="Ingrese el nombre y apellido del Medico">
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group">
                    <div class="col-lg-12">
                        <label>Credencial:</label><br>
                        <input type="text" name="credencialMed" id="credencialMed" class="form-control" placeholder="Ingrese la credencial del Medico">
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-lg-12">
                        <label>Telefono:</label><br>
                        <input type="text" name="telefMed" id="telefMed" maxlength="11" class="form-control">
                    </div>
                </div>
            </div>
            

            <div class="col-sm-4">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="frm_rol">Especialidad:</label>
                        <select class="custom-select" name="especialidad" id="especialidad">
                        <option value="">Seleccione...</option>
                        <?php
                            require_once './controllers/localidadController.php';

                           $especialidad = localidadController::lista_especialidad_controller();

                            foreach ($especialidad as $key => $value) {?>
                               
                               
                               <option value="<?php echo $value['idespecialidad'];?>"><?php echo $value['especialidad'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

        </div>

        <hr>
        <center>
         <button  type="submit" class="btn btn-info">Guardar</button>
        </center>
        </form>
    </div>
</div>