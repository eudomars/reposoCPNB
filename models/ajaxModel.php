<?php
if(is_file('../core/mainModel.php')){
    require_once '../core/mainModel.php';
}else{
    require_once './core/mainModel.php';
}

class ajaxModel extends mainModel{

    // Zoom users
    protected function zoom_user_model($id_usuario){

        $sql = "SELECT id_user, civ, nombre, rol, reg_date FROM users u
        INNER JOIN roles r ON (u.id_rol = r.id_rol)
        WHERE id_user = :user";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $id_usuario, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetch();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Delete users
    protected function eliminar_user_model($id_user){

        $sql = "UPDATE users SET id_status = 2 WHERE id_user = :id_user";
        
        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":id_user", $id_user, PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;
        
    }

    // Registrar users
    protected function registrar_usuarios_modelo($datos){

        session_start(['name' => 'NSW']);

        $sql = "INSERT INTO users (civ, nombre, id_status, reg_date, reg_user, id_rol, pass) VALUES (:username, :nombres, :estatus, :fecha, :user, :rol, :pass)";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":username", $datos['user'], PDO::PARAM_STR);
        $result->bindValue(":nombres", $datos['names'], PDO::PARAM_STR);
        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":fecha", date("Y-m-d"), PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);
        $result->bindValue(":rol", $datos['rol'], PDO::PARAM_INT);
        $result->bindValue(":pass", $datos['pass'], PDO::PARAM_STR);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }
    
     // Registrar medico
     protected function registrar_medico_modelo($datos){

        session_start(['name' => 'NSW']);

        $sql = "INSERT INTO medico(cedula_medico,nombre_medico,credencial_medico,telef_medico,especialidad,usuario_registro,fecha_registro)  VALUES(
            :cdMedico, :nomb, :credMedico, :telef, :espec, :user, :fecha
          )";

        $result = mainModel::conectar()->prepare($sql);
        // mb_strtoupper($str)
        
        $result->bindValue(":cdMedico", $datos['cdMedico'], PDO::PARAM_INT);
        $result->bindValue(":nomb",ucwords($datos['nomApeMedic']), PDO::PARAM_STR);

        $result->bindValue(":telef", $datos['telefMed'], PDO::PARAM_STR);
        $result->bindValue(":credMedico", $datos['credencialMed'], PDO::PARAM_STR);

        $result->bindValue(":espec",($datos['especialidad']), PDO::PARAM_INT);

        
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);
        $result->bindValue(":fecha", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }

// Registrar medico modal
protected function registrar_medico_modal_modelo($datosModal){

    session_start(['name' => 'NSW']);

    $sql = "INSERT INTO medico(cedula_medico,nombre_medico,credencial_medico,telef_medico,especialidad,usuario_registro,fecha_registro)  VALUES(
        :cdMedico, :nomb, :credMedico, :telef, :espec, :user, :fecha
      )";

    $result = mainModel::conectar()->prepare($sql);
    // mb_strtoupper($str)
    
    $result->bindValue(":cdMedico", $datosModal[0], PDO::PARAM_INT);
    $result->bindValue(":nomb",ucwords($datosModal[1]), PDO::PARAM_STR);

    $result->bindValue(":credMedico", $datosModal[2], PDO::PARAM_STR);
    $result->bindValue(":telef", $datosModal[3], PDO::PARAM_STR);
   

    $result->bindValue(":espec",($datosModal[4]), PDO::PARAM_INT);

    
    $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);
    $result->bindValue(":fecha", date("Y-m-d H:i:s"), PDO::PARAM_STR);
    

    $result->execute();
    

    $result_boolean = ($result->rowCount() > 0);

    unset($result);
    unset($conexion);

    return $result_boolean;

}
     // Registrar centro medico
     protected function registrar_centroMedico_modelo($datos){

        session_start(['name' => 'NSW']);

        $sql = "INSERT INTO centro_medico(id_estado,id_municipio,centro_medico,telef_centro_medico,rif_centro_medico,direccion_centro_medico,usuario_registro,fecha_registro)  VALUES(
            :estado, :municipio, :centro_medico, :telef, :rif, :direcc, :user,:fecha
          )";

        $result = mainModel::conectar()->prepare($sql);
        // mb_strtoupper($str)
        
        $result->bindValue(":estado", $datos['estado'], PDO::PARAM_INT);
        $result->bindValue(":municipio", $datos['municipio'], PDO::PARAM_INT);

        $result->bindValue(":centro_medico", mb_strtoupper($datos['nombCentro']), PDO::PARAM_STR);
        $result->bindValue(":direcc",ucfirst($datos['ubicacion']), PDO::PARAM_STR);
        $result->bindValue(":telef", $datos['telf'], PDO::PARAM_STR);
        $result->bindValue(":rif", mb_strtoupper($datos['rif']), PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);
        $result->bindValue(":fecha", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }

    // Actualizar contraseña
    protected function actualizar_user_pass_model($old_pass,$new_pass){

        $sql = "UPDATE users SET pass = :new_pass WHERE id_user = :user AND pass = :current_pass";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":new_pass", $new_pass, PDO::PARAM_STR);
        $result->bindValue(":current_pass", $old_pass, PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }

    // Editar usuario en vista users
    protected function update_user_model($datos){

        $sql = "UPDATE users SET nombre = :nombre, id_status = :estatus WHERE civ = :user AND id_status = :estatus";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $datos['user'], PDO::PARAM_STR);
        $result->bindValue(":nombre", $datos['name'], PDO::PARAM_STR);
        $result->bindValue(":estatus", $datos['estatus'], PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;
        
    }

    // Editar nombre en vista myaccount
    protected function updateuseraccountmodel($nombre){

        $sql = "UPDATE users SET nombre = :nombre WHERE id_user = :user";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":nombre", $nombre, PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }

    // Editar nombre en vista myaccount
    protected function count_users1_model(){

        $sql = "SELECT COUNT(id_user) FROM users WHERE id_rol = :rol AND id_status = :estatus";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":rol", 1, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetch();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Editar nombre en vista myaccount
    protected function count_users2_model(){

        $sql = "SELECT COUNT(id_user) FROM users WHERE id_rol = :rol AND id_status = :estatus";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":rol", 2, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetch();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Grafica del home
    protected function grafica_model(){
    
        // Linea 1
        $sql1 = "SELECT date_part('month',reg_date) AS fecha, COUNT(reg_date) AS total FROM users WHERE id_rol = 1 GROUP BY fecha ORDER BY fecha";

        $result1 = mainModel::conectar()->prepare($sql1);

        $result1->execute();
        
        $valX1 = array(); // Fecha
        $valY1 = array(); // ID

        foreach ($result1 as $row) {
            switch ($row[0]) {
                case '1':
                    $mes = "Enero";
                    break;
                case '2':
                    $mes = "Febrero";
                    break;
                case '3':
                    $mes = "Marzo";
                    break;
                case '4':
                    $mes = "Abril";
                    break;
                case '5':
                    $mes = "Mayo";
                    break;
                case '6':
                    $mes = "Junio";
                    break;
                case '7':
                    $mes = "Julio";
                    break;
                case '8':
                    $mes = "Agosto";
                    break;
                case '9':
                    $mes = "Septiembre";
                    break;
                case '10':
                    $mes = "Octubre";
                    break;
                case '11':
                    $mes = "Noviembre";
                    break;
                case '12':
                    $mes = "Diciembre";
                    break;
                
            }
            $valX1[] = $mes; //Fecha
            $valY1[] = $row[1]; // Total
        }
    
        $datosX1 = json_encode($valX1);
        $datosY1 = json_encode($valY1);
    
        // Linea 2
        $sql2 = "SELECT date_part('month',reg_date) AS fecha, COUNT(reg_date) FROM users WHERE id_rol = 2 GROUP BY fecha ORDER BY fecha";
    
        $result2 = mainModel::conectar()->prepare($sql2);

        $result2->execute();
    
        $valX2 = array(); // Fecha
        $valY2 = array(); // ID
    
        foreach ($result2 as $row) {
            switch ($row[0]) {
                case '1':
                    $mes = "Enero";
                    break;
                case '2':
                    $mes = "Febrero";
                    break;
                case '3':
                    $mes = "Marzo";
                    break;
                case '4':
                    $mes = "Abril";
                    break;
                case '5':
                    $mes = "Mayo";
                    break;
                case '6':
                    $mes = "Junio";
                    break;
                case '7':
                    $mes = "Julio";
                    break;
                case '8':
                    $mes = "Agosto";
                    break;
                case '9':
                    $mes = "Septiembre";
                    break;
                case '10':
                    $mes = "Octubre";
                    break;
                case '11':
                    $mes = "Noviembre";
                    break;
                case '12':
                    $mes = "Diciembre";
                    break;
                
            }
            $valX2[] = $mes; //Fecha
            $valY2[] = $row[1]; // Total
        }
    
        $datosX2 = json_encode($valX2);
        $datosY2 = json_encode($valY2);

        unset($result1);
        unset($result2);
        unset($conexion);
    
        return array($datosX1, $datosY1, $datosX2, $datosY2);
    
    }

    // Reporte PDF
    protected function reportepdf_model(){

        $sql = "SELECT civ, nombre, id_status, id_rol, reg_date FROM users";

        $result = mainModel::conectar()->prepare($sql);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetchAll();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

}