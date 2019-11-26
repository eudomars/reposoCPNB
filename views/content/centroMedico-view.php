<div class="card">
    <div class="card-header font-weight-bold">
        Usuario: <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">
        

            <div class="row">

                <div class="col-12">
                    <p class="bg-info text-center fondo-bg"><strong>Datos del Centro Medico</strong></p>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-md-12">
                                <label for="frm_rol">Estado:</label>
                                <select class="custom-select" name="medicoT" id="medicoT">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Distrito Capital</option>
                                    <option value="2">Miranda</option>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-md-12">
                                <label for="frm_rol">Municipio:</label>
                                <select class="custom-select" name="medicoT" id="medicoT">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Libertador</option>
                                    <option value="2">Briòn</option>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                                <label>Centro Medico:</label><br>
                                <input type="text" name="centroM" id="centroM" class="form-control" 
                                placeholder="Ingrese el nombre del Centro Medico">
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
                                <input type="text" name="rifCentroM" id="rifCentroM" class="form-control" >
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

    </div>
</div>