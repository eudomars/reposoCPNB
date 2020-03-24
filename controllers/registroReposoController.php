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
      public function registrar_reposo_controlador($idTrab, $cedTrab, $idMedico, $idCent, $idDiag, $desde,$hasta,$dias,$observ)
      {
  
          $idTrab = mainModel::limpiar_cadena($idTrab);
          $cedTrab = mainModel::limpiar_cadena($cedTrab);
          $idMedico = mainModel::limpiar_cadena($idMedico);
          $idCent = mainModel::limpiar_cadena($idCent);
          $idDiag = mainModel::limpiar_cadena($idDiag);
          $desde = mainModel::limpiar_cadena($desde);
          $idCent = mainModel::limpiar_cadena($hasta);
          $dias = mainModel::limpiar_cadena($dias);
          $$observ = mainModel::limpiar_cadena($observ);
        //   $archiv = mainModel::limpiar_cadena($archiv);
  
          $reposo = array("idtrabajador" => $idTrab, "cedula" => $cedTrab, "medico" => $idMedico, "cemtroM" => $idCent, "diagnostico" => $idDiag, "desde" => $desde, "hasta" => $hasta, "dias" =>$dias, "ubicacion" => $observ);
  
          return reposoModel::registrar_reposo_modelo($reposo);
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

if (isset($_POST['idtrabajador']) && isset($_POST['cedula']) && isset($_POST['medico']) && isset($_POST['cemtroM']) && isset($_POST['diagnostico']) && isset($_POST['desde']) && isset($_POST['hasta']) && isset($_POST['dias']) && isset($_POST['observasion'])) {

    if (empty($_POST['idtrabajador']) || empty($_POST['cedula']) || empty($_POST['medico']) || empty($_POST['cemtroM']) || empty($_POST['diagnostico']) || empty($_POST['desde']) || empty($_POST['hasta']) || empty($_POST['dias']) || empty($_POST['observasion'])) {

        echo 2; // Formulario incompleto

    } else {

        echo registroReposoController::registrar_reposo_controlador($_POST['idtrabajador'], $_POST['cedula'], $_POST['medico'], $_POST['cemtroM'], $_POST['diagnostico'],$_POST['desde'], $_POST['hasta'], $_POST['dias'], $_POST['observasion']);
    }
}

