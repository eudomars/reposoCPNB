<?php
include 'controllers/ajaxController.php';
$user = new ajaxController();
?>
<div class="card">
    <div class="card-header font-weight-bold">
        Bienvenido <?= $_SESSION['user']; ?>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <!-- column -->
                            <div class="col-10">
                                <div id="graficaLinea"></div>
                            </div>

                            <div class="col-2">
                                <div class="row">
                                    <div class="col resumen">
                                        <div class="bg-info text-white text-center">
                                            <i class="icon-user"></i>
                                            <h5 class="m-b-0 m-t-5"> <?= $user->count_users1_controller()[0]; ?> </h5>
                                            <small class="font-light">Administradores</small>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col resumen">
                                        <div class="bg-info text-white text-center">
                                            <i class="icon-users"></i>
                                            <h5 class="m-b-0 m-t-5"> <?= $user->count_users2_controller()[0]; ?> </h5>
                                            <small class="font-light">Analistas</small>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <!-- <div class="row">
                                    <div class="col resumen">
                                        <div class="bg-info text-white text-center">
                                            <i class="icon-flag"></i>
                                            <h5 class="m-b-0 m-t-5"> <?php // echo contarCentros(); ?> </h5>
                                            <small class="font-light">Centros</small>
                                        </div>
                                    </div>
                                </div> -->

                                <br>

                                
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

    <?php 
        echo "<script>
            datosX1 = crearCadenaLineal('".$user->grafica_controller()[0]."');
            datosY1 = crearCadenaLineal('".$user->grafica_controller()[1]."');
            datosX2 = crearCadenaLineal('".$user->grafica_controller()[2]."');
            datosY2 = crearCadenaLineal('".$user->grafica_controller()[3]."');
            graficaHome(datosX1,datosY1,datosX2,datosY2);
        </script>"
    ?>