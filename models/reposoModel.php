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

}