<?php

if (is_file('../core/mainModel.php')) {
    require_once '../core/mainModel.php';
} else {
    require_once 'core/mainModel.php';
}

// require_once 'core/mainModel.php';

class reposoModel extends mainModel{

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