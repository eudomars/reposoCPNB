<?php
require_once '../core/mainModel.php';

class reposo extends mainModel{

    protected function lista_especialidad_modelo(){

        $sql = "SELECT idespecialidad, descripcion AS especialidad FROM especialidad";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }

}