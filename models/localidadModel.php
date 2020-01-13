<?php
if (is_file('../core/mainModel.php')) {
    require_once '../core/mainModel.php';
} else {
    require_once './models/localidadModel.php';
}

//require_once '../core/mainModel.php';

class localidadModel extends mainModel{

    protected function lista_estado_modelo(){

        $sql = "SELECT id_estado, nombre AS estado FROM estado ORDER BY id_estado";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }

    protected function lista_municipio_modelo($id_estado){

        $sql = "SELECT id_municipio, nombre AS municipio, id_estado FROM municipio WHERE  id_estado = $id_estado";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }

    protected function lista_especialidad_modelo(){

        $sql = "SELECT idespecialidad, descripcion AS especialidad FROM especialidad";

        $query = mainModel::conectar()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }

}