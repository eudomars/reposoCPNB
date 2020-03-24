<?php

if (is_file('../core/mainModel.php')) {
    require_once '../core/mainModel.php';
} else {
    require_once 'core/mainModel.php';
}

// require_once 'core/mainModel.php';

class reposoModel extends mainModel{

     // Registrar REPOSO
     protected function registrar_reposo_modelo($reposo){

        session_start(['name' => 'NSW']);

       
        $sql = "INSERT INTO registro_reposo(idtrabajador,cedula_trabajador,idmedico,idcentro_medico,iddiagnostico,desde,hasta,dias_reposo,observacion,usuario_registro,fecha_registro)  VALUES(
           :trabajador, :cedula, :medico, :centro_medico, :diagnostico, :idtipoR, :inicio, :final, :observacion, :user, :fecha
          )";

        $result = mainModel::conectar()->prepare($sql);
        // mb_strtoupper($str)
        
        $result->bindValue(":cdMedico", $reposo['cdMedico'], PDO::PARAM_INT);
        $result->bindValue(":nomb",ucwords($reposo['nomApeMedic']), PDO::PARAM_STR);

        $result->bindValue(":telef", $reposo['telefMed'], PDO::PARAM_STR);
        $result->bindValue(":credMedico", $reposo['credencialMed'], PDO::PARAM_STR);

        $result->bindValue(":espec",($reposo['especialidad']), PDO::PARAM_INT);

        
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);
        $result->bindValue(":fecha", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }


    protected function lista_diagnostico_modelo(){

        $sql = "SELECT iddiagnostico, diagnostico FROM diagnostico";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }

    protected function lista_medicos_modelo(){

        $sql = "SELECT idmedico, cedula_medico AS cdmedico, nombre_medico AS nombMedico, es.descripcion AS especialidad FROM medico
        inner join especialidad as es on (es.idespecialidad = medico.especialidad)";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }

    protected function lista_Cmedicos_modelo(){

        $sql = "SELECT idcentro_medico, id_estado, id_municipio, centro_medico, telef_centro_medico,
         rif_centro_medico, direccion_centro_medico  FROM centro_medico";
        

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }
}