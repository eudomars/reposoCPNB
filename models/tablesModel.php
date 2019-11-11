<?php
require_once '../core/mainModel.php';

class tablesModel extends mainModel{

    protected function lista_usuarios_modelo(){

        $sql = "SELECT id_user, civ, nombre, rol, reg_date FROM users u
        INNER JOIN roles r ON (u.id_rol = r.id_rol)
        WHERE id_status = 1";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll();
        
    }

}