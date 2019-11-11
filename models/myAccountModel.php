<?php

require_once '../core/mainModel.php';

session_start(['name' => 'NSW']);

class myAccountModel extends mainModel{

    protected function myaccount_model(){

        $sql = "SELECT civ, nombre, reg_date, rol, status FROM users u
        INNER JOIN roles r ON (u.id_rol = r.id_rol)
        INNER JOIN estatus e ON (u.id_status = e.id_status)
        WHERE id_user = :user";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){
            
            $datos = $result->fetch();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

}