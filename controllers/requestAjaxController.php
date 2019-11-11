<?php
require_once '../models/requestAjaxModel.php';

class requestAjaxController extends requestAjaxModel{

    public function detalles_user_controlador($id_usuario){

        $id_usuario = mainModel::limpiar_cadena($id_usuario);

        return requestAjaxModel::detalles_user_model($id_usuario);
        
    }

}

echo json_encode(zoomUserController::detalles_user_controlador($_GET['id_user']));