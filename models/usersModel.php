<?php
require_once '../core/mainModel.php';

session_start(['name' => 'NSW']);

class usersModel extends mainModel{

    protected function lista_usuarios_modelo(){

        $sql = "SELECT id_user, civ, nombre, rol, reg_date FROM users u
        INNER JOIN roles r ON (u.id_rol = r.id_rol)
        WHERE  id_user != 1 AND id_user != $_SESSION[id_user] AND id_status = 1";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll();
        
    }

}