<div class="card">
    <div class="card-header font-weight-bold">
        Usuario: <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">

        <form id="frm-reg-centroMedico" autocomplete="off">
            <div class="row">

                <div class="col-12">
                    <p class="bg-info text-center fondo-bg"><strong>Datos del Centro Medico</strong></p>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="frm_rol">Estado:</label>
                            <select class="custom-select" name="estadoC" id="estadoC">
                                <option value="">Seleccione...</option>
                                <?php

                                require './controllers/localidadController.php';
                                $datos = localidadController::lista_estado_controller();


                                foreach ($datos as $key => $value) { ?>


                                    <option value="<?php echo $value['id_estado']; ?>"><?php echo $value['estado']; ?></option>

                                <?php    }
                                ?>

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
            <center>
                <button type="submit" class="btn btn-info">Guardar</button>
            </center>

        </form>
    </div>
</div>