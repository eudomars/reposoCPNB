<?php

if (is_file('../models/reposoModel.php')) {
    require_once '../models/reposoModel.php';
} else {
    require_once 'models/reposoModel.php';
}

class selectCMedicoController extends reposoModel
{
    public function lista_selectCMedicos_controller()
    {

        $selectMedico = reposoModel::lista_Cmedicos_modelo();

        $select = "<label>Centro Medico : </label>
    <select class='custom-select' name='CenmediT' id='CenmediT'>
    <option value='0'>Seleccione...</option>
    ";

    // <label for="frm_rol">Centro Medico : </label>
    // <select class="custom-select" name="CenmediT" id="CenmediT">
       
    // </select>

    foreach ($selectMedico as $key => $value) { 

        $select .= "<option value='$value[idcentro_medico]'>" . $value['centro_medico'] ."</option>";
    
    }

    $select .= "<option value='1'>Otro</option> </select>";

    return $select;
    }
}

echo selectCMedicoController::lista_selectCMedicos_controller();


