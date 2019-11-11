<?php
    require_once './core/configGeneral.php';
    require_once './controllers/vistasControlador.php';

    $plantilla = new vistasControlador();
    $plantilla->obtener_plantilla_controlador();