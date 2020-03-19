<?php
if (is_file('../models/reposoModel.php')) {
    require_once '../models/reposoModel.php';
} else {
    require_once 'models/reposoModel.php';
}

// require_once 'models/localidadModel.php';

class reposoController extends reposoModel
{

    public function lista_diagnostico_controller()
    {

        $datos = reposoModel::lista_diagnostico_modelo();

        return $datos;
    }

    public function lista_medicos_controller()
    {

        $datos = reposoModel::lista_medicos_modelo();

        return $datos;
    }

    public function lista_municipio_controller($id_estado)
    {

        $municipio = localidadModel::lista_municipio_modelo($id_estado);

        $selectMunicipio = "<label>Municipio:</label>
        <select class='custom-select' name='municipioC' id='municipioC'>
        <option value='0'>Seleccione...</option>
        ";




        foreach ($municipio as $key => $value) {


            $selectMunicipio =  $selectMunicipio . '<option value=' . $value['id_municipio'] . '>' . $value['municipio'] . '</option>';
        }

        return $selectMunicipio . "</select>";

        //return $municipio;

    }


    public function lista_especialidad_controller()
    {

        $especialidad = localidadModel::lista_especialidad_modelo();

        return $especialidad;        

    }

    
}
// $id_estado = $_POST['estado'];

if (isset($_POST['estado'])) {
    echo localidadController::lista_municipio_controller($_POST['estado']);
}
//$m=new localidadController;
