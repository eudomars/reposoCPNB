<?php

if (is_file('../models/reposoModel.php')) {
    require_once '../models/reposoModel.php';
} else {
    require_once 'models/reposoModel.php';
}

class selectMedicoController extends reposoModel
{
    public function lista_selectMedicos_controller()
    {

        $selectMedico = reposoModel::lista_medicos_modelo();

        $select = "<label>Medico tratante: </label>
    <select class='custom-select' name='mediT' id='mediT'>
    <option value='0'>Seleccione...</option>
    ";


    foreach ($selectMedico as $key => $value) { 

        $select .= "<option value='$value[idmedico]'>" ."Cedula: " . $value['cdmedico'] .", ". $value['nombmedico'] ."</option>";
    
    }

    $select .= "<option value='1'>Otro</option> </select>";

    return $select;
    }
}

echo selectMedicoController::lista_selectMedicos_controller();
