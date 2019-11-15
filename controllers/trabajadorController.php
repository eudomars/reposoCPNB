<?php
if (is_file('../models/trabajadorModel.php')) {
    require_once '../models/trabajadorModel.php';
} else {
    require_once 'models/trabajadorModel.php';
}

// require_once '../models/trabModel.php';

class trabajadorController extends trabajadorModel{

    public function lista_trab_controller($ced){

        $datos = trabajadorModel::lista_personal_modelo($ced);

        return json_encode($datos);
     
    }

    
}
echo trabajadorController::lista_trab_controller($_POST['cedula']);