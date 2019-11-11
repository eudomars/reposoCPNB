<?php
require_once 'core/mainModel.php';

class loginModel extends mainModel{
    
    protected function login_modelo($user,$pass){
        
        $sql = "SELECT * FROM users WHERE civ = :user AND pass = :pass AND id_status = 1";
        
        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $user, PDO::PARAM_STR);
        $result->bindValue(":pass", $pass, PDO::PARAM_STR);
        
        $result->execute();

        if ($result->rowCount()>0){

            $row = $result->fetch();
            session_start(['name' => 'NSW']);
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['user'] = $row['nombre'];
            $_SESSION['nivel'] = $row['id_rol'];

            unset($result);
            unset($conexion);

            return header('Location: '.SERVERURL.'home/');

        } else {
            
            return "<script> alertify.error('Error de usuario o contraseña'); </script>";

        }

    }

}