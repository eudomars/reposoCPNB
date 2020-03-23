<?php
if (is_file('../models/reposoModel.php')) {
    require_once '../models/reposoModel.php';
} else {
    require_once 'models/reposoModel.php';
}

// require_once 'models/localidadModel.php';

class registroReposoController extends reposoModel
{
      // Registrar reposo
      public function registrar_reposo_controlador($idTrab, $cedTrab, $idMedico, $idCent, $idDiag, $desde,$hasta,$observ)
      {
  
          $idTrab = mainModel::limpiar_cadena($idTrab);
          $cedTrab = mainModel::limpiar_cadena($cedTrab);
          $idMedico = mainModel::limpiar_cadena($idMedico);
          $idCent = mainModel::limpiar_cadena($idCent);
          $idDiag = mainModel::limpiar_cadena($idDiag);
          $desde = mainModel::limpiar_cadena($desde);
          $idCent = mainModel::limpiar_cadena($hasta);
          $desde = mainModel::limpiar_cadena($observ);
  
          $reposo = array("estado" => $idTrab, "municipio" => $cedTrab, "nombCentro" => $idMedico, "telf" => $idCent, "rif" => $idDiag, "ubicacion" => $desde, "telf" => $hasta, "ubicacion" => $observ);
  
          return ajaxModel::registrar_reposo_modelo($reposo);
      }

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



// Captura los datos del formulario del  medico para registrarlos
// if (isset($_POST['cdMedico']) && isset($_POST['nomApeMedic']) && isset($_POST['credencialMed']) && isset($_POST['telefMed']) && isset($_POST['especialidad'])) {

//     if (empty($_POST['cdMedico']) || empty($_POST['nomApeMedic']) || empty($_POST['credencialMed']) || empty($_POST['telefMed']) || empty($_POST['especialidad'])) {

//         echo 2; // Formulario incompleto

//     } else {

//         echo ajaxController::registrar_medico_controlador($_POST['cdMedico'], $_POST['nomApeMedic'], $_POST['credencialMed'], $_POST['telefMed'], $_POST['especialidad']);
//     }
// }

