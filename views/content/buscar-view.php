<div class="card">
    <div class="card-header font-weight-bold">
        Usuario: <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">
        <div id="buscartrab">

            <h5 class="card-title">Consulta</h5>
            <input type="text" placeholder="Número de cedula" id="trab">
            <button type="button" class="btn btn-light" onclick="trabBusc()">buscar</button>

        </div>

        <br>
        <br>

        <div id="datosTrab">

            <div class="row">

                <div class="col-12">
                    <p class="bg-info text-center fondo-bg"><strong>Datos Personales</strong></p>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>cedula</label>
                        <p id="cd"></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <p id="nomb"></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jererquia ò Cargo</label>
                        <p id="jer"></p>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label>Estatus</label>
                        <p id="sta"></p>
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-group">
                        <label>Dependencia</label>
                        <p id="dep"></p>
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-group">
                        <label>Nomina</label>
                        <p id="nomina"></p>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label>Telefono</label>
                        <p id="tel"></p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Correo</label>
                        <p id="correo"></p>
                    </div>
                </div>

                <div class="col-12">

                    <p class="bg-info text-center fondo-bg"><strong>Historial de Reposo</strong></p>

                </div>
                <br>

                <div class="col-sm-2">
                    <p type="button" class="btn btn-secondary" data-toggle="modal" data-target="#reg-reposo-modal">Registrar Reposo</p>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Medico Tratante</th>
                            <th scope="col">Centro Medico</th>
                            <th scope="col">Tipo Reposo</th>
                            <th scope="col">Diagnostico</th>
                            <th scope="col">Dias de Reposo</th>
                            <th scope="col">Desde</th>
                            <th scope="col">Hasta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>the Bird</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>the Bird</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>




    </div>