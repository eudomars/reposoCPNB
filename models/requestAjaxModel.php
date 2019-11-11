<?php
require_once '../core/mainModel.php';

class requestAjaxModel extends mainModel{

    protected function detalles_user_model($id_usuario){

        $sql = "SELECT id_user, civ, nombre, rol, reg_date FROM users u
        INNER JOIN roles r ON (u.id_rol = r.id_rol)
        WHERE id_user = :user";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $id_usuario);

        $result->execute();
        
        return $result->fetch();

    }
    
}