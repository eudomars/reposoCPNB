<div class="card">
    <div class="card-header font-weight-bold">
        Usuario: <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">
        <!-- *********************** BOTON DE BUSCAR TRABAJADOR ****************************************************************** -->
        <div id="buscartrab">

            <h5 class="card-title">Consulta</h5>
            <input type="text" placeholder="Número de cedula" id="trab">
            <button type="button" class="btn btn-light" onclick="trabBusc()">buscar</button>

        </div>
        <!-- *********************** FIN DE BUSCAR TRABAJADOR ****************************************************************** -->


        <br>
        <br>
        <!-- *********************** RESULTADO DE BUSCAR TRABAJADOR ****************************************************************** -->

        <div id="datosTrab">

            <div class="row">

                <div class="col-12">
                    <p class="bg-info text-center fondo-bg"><strong>Datos Personales</strong></p>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>idtrabajador</label>
                        <p id="idt"></p>
                    </div>
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
                
                <div id="historia" class="col-12">

                    <p class="bg-info text-center fondo-bg"><strong>Historial de Reposo</strong></p>

                </div>
                <br>

                <div id="tableR" class="col-sm-2">
                    <p type="button" class="btn btn-secondary"  id="reg-reposo-modal">Registrar Reposo</p>
                </div>
            
                <table id="tableRe" class="table table-striped">
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
        <!-- *********************** RESULTADO DE BUSCAR TRABAJADOR ****************************************************************** -->

        <!-- *********************** REGISTRAR REPOSO ****************************************************************** -->

        <div id="form-reposo">


            <form id="frm-reg-repos" method="POST" enctype="multipart/form-data" autocomplete="off">

                <div class="row">
                    <div class="col-12">
                        <p class="bg-info text-center fondo-bg"><strong>Registrar Nuevo Reposo</strong></p>
                    </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-md-12" id="midicos">
                                    
                                   
                                </div>
                            </div>
                        </div>

                        <p id="rep"></p>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-md-12" id="Cenmedi">
                                  
                                </div>
                            </div>
                        </div>


                    <div class="col-sm-6">
                    <div class="form-group">
                                <div class="col-md-12">
                                <label for="frm_rol">Diagnostico:</label>
                                    <select class="custom-select" name="repoDiag" id="repoDiag">
                                        <option value="">Seleccione...</option>
                                        <?php

                                require './controllers/reposoController.php';
                                $datos = reposoController::lista_diagnostico_controller();


                                foreach ($datos as $key => $value) { ?>


                                    <option value="<?php echo $value['iddiagnostico']; ?>"><?php echo $value['diagnostico']; ?></option>

                                <?php    }
                                ?>
                                        <option value="1">Otro</option>
                                    </select>
                                </div>
                            </div>
                        

                        
                        
                       
                    </div>

                    <div class="col-sm-6">


                        <div class="row">
                            <div class="col-md-6">
                                <label for="frm_user">Desde:</label>
                                <input type="date" class="form-control" name="desdeRep" id="desdeRep">
                            </div>

                            <div class="col-md-6">
                                <label for="frm_pass">Hasta: </label>

                                <input type="date" class="form-control" name="hastaRep" id="hastaRep">
                            </div>
                        </div>
                    </div>

                    <div class="input-group col-sm-6">
                        
                        <div class="input-group-prepend">
                            <span class="input-group-text">Observacion</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea" name="repObserva" id="repObserva"></textarea>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="frm_rol">Capture de reposo:</label>
                        <div class="form-group">
                            <input type="file" name="archivoRep" id="archivoRepo">

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
        <!-- *********************** REGISTRAR REPOSO  ****************************************************************** -->

     


    </div>
</div>