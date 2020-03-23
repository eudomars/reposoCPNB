<?php
if (is_file('../models/ajaxModel.php')) {
    require_once '../models/ajaxModel.php';
} else {
    require_once './models/ajaxModel.php';
}

class ajaxController extends ajaxModel
{

    // Zoom users
    public function zoom_user_controlador($id_usuario)
    {

        $id_usuario = mainModel::limpiar_cadena($id_usuario);

        return ajaxModel::zoom_user_model($id_usuario);
    }

    // Delete users
    public function eliminar_user_controller($id_user)
    {

        return ajaxModel::eliminar_user_model($id_user);
    }

    // Registrar users
    public function registrar_usuarios_controlador($user, $pass, $name, $rol)
    {

        $user = mainModel::limpiar_cadena($user);
        $pass = mainModel::limpiar_cadena($pass);
        $pass = mainModel::encriptar($pass);
        $name = mainModel::limpiar_cadena($name);
        $rol  = mainModel::limpiar_cadena($rol);

        $datos = array("user" => $user, "pass" => $pass, "names" => $name, "rol" => $rol);

        return ajaxModel::registrar_usuarios_modelo($datos);
    }

    // Registrar medico
    public function registrar_medico_controlador($cdMed, $nombMed, $credMed, $telfMed, $espec)
    {

        $cdMed = mainModel::limpiar_cadena($cdMed);
        $nombMed = mainModel::limpiar_cadena($nombMed);
        $credMed = mainModel::limpiar_cadena($credMed);
        $telfMed = mainModel::limpiar_cadena($telfMed);
        $espec = mainModel::limpiar_cadena($espec);

        $medico = array("cdMedico" => $cdMed, "nomApeMedic" => $nombMed, "credencialMed" => $credMed, "telefMed" => $telfMed, "especialidad" => $espec);

        return ajaxModel::registrar_medico_modelo($medico);
    }

    // Registrar medico modal
    public function registrar_medico_modal_controlador($cdModMedic, $nomMediMod, $credMod, $telMod, $espMod)
    {

        $cdModMedic = mainModel::limpiar_cadena($cdModMedic);
        $nomMediMod = mainModel::limpiar_cadena($nomMediMod);
        $credMod = mainModel::limpiar_cadena($credMod);
        $telMod = mainModel::limpiar_cadena($telMod);
        $espMod = mainModel::limpiar_cadena($espMod);

        


        $cdModMedic = isset($cdModMedic) ? $cdModMedic : false;
        $nomMediMod = isset($nomMediMod) ? $nomMediMod : false;
        $credMod = isset($credMod) ? $credMod : false;
        $telMod = isset($telMod) ? $telMod : false;
        $espMod = isset($espMod) ? $espMod : false;

        // $datos = array($cdModMedic, $nomMediMod, $credMod, $telMod, $espMod);
        // print_r($datos);

        if ($cdModMedic && $nomMediMod && $credMod && $telMod && $espMod) {
            $datos = array($cdModMedic, $nomMediMod, $credMod, $telMod, $espMod);
            return parent::registrar_medico_modal_modelo($datos);
        }else{
            return 3;
        }

        
    }

    // Registrar centro medico
    public function registrar_centroMedico_controlador($estado, $municipio, $nombreCentro, $telf, $rif, $ubicacion)
    {

        $estado = mainModel::limpiar_cadena($estado);
        $municipio = mainModel::limpiar_cadena($municipio);
        $nombreCentro = mainModel::limpiar_cadena($nombreCentro);
        $telf = mainModel::limpiar_cadena($telf);
        $rif = mainModel::limpiar_cadena($rif);
        $ubicacion = mainModel::limpiar_cadena($ubicacion);

        $centroMedico = array("estado" => $estado, "municipio" => $municipio, "nombCentro" => $nombreCentro, "telf" => $telf, "rif" => $rif, "ubicacion" => $ubicacion);

        return ajaxModel::registrar_centroMedico_modelo($centroMedico);
    }


 


    // Actualizar contraseña
    public function actualizar_user_pass_controller($old_pass, $new_pass)
    {

        $old_pass = mainModel::limpiar_cadena($old_pass);
        $old_pass = mainModel::encriptar($old_pass);
        $new_pass = mainModel::limpiar_cadena($new_pass);
        $new_pass = mainModel::encriptar($new_pass);

        return ajaxModel::actualizar_user_pass_model($old_pass, $new_pass);
    }

    // Editar usuario en vista users
    public function update_user_controller($usuario, $nombre, $estatus)
    {

        $user = mainModel::limpiar_cadena($usuario);
        $name = mainModel::limpiar_cadena($nombre);
        $status = mainModel::limpiar_cadena($estatus);

        $datos = array("user" => $user, "name" => $name, "estatus" => $status);

        return ajaxModel::update_user_model($datos);
    }

    // Editar nombre en vista myaccount
    public function updateuseraccountcontroller($nombre)
    {

        $nombre = mainModel::limpiar_cadena($nombre);

        return ajaxModel::updateuseraccountmodel($nombre);
    }

    // Contar usuarios
    public function count_users1_controller()
    {

        return ajaxModel::count_users1_model();
    }

    // Contar usuarios
    public function count_users2_controller()
    {

        return ajaxModel::count_users2_model();
    }

    // Grafica del home
    public function grafica_controller()
    {

        return ajaxModel::grafica_model();
    }

    // Reporte PDF
    public function reportepdf_controller()
    {

        return ajaxModel::reportepdf_model();
    }
}

// Zoom users
if (isset($_GET['zoom_user'])) {
    echo json_encode(ajaxController::zoom_user_controlador($_GET['zoom_user']));
}

// Delete users
if (isset($_GET['d_user'])) {
    echo ajaxController::eliminar_user_controller($_GET['d_user']);
}

// Create users
if (isset($_POST['frm_user']) && isset($_POST['frm_pass']) && isset($_POST['frm_name']) && isset($_POST['frm_rol'])) {

    if (empty($_POST['frm_user']) || empty($_POST['frm_pass']) || empty($_POST['frm_name']) || empty($_POST['frm_rol'])) {

        echo 2; // Formulario incompleto

    } else {

        echo ajaxController::registrar_usuarios_controlador($_POST['frm_user'], $_POST['frm_pass'], $_POST['frm_name'], $_POST['frm_rol']);
    }
}


// Captura los datos del formulario del  medico para registrarlos
if (isset($_POST['cdMedico']) && isset($_POST['nomApeMedic']) && isset($_POST['credencialMed']) && isset($_POST['telefMed']) && isset($_POST['especialidad'])) {

    if (empty($_POST['cdMedico']) || empty($_POST['nomApeMedic']) || empty($_POST['credencialMed']) || empty($_POST['telefMed']) || empty($_POST['especialidad'])) {

        echo 2; // Formulario incompleto

    } else {

        echo ajaxController::registrar_medico_controlador($_POST['cdMedico'], $_POST['nomApeMedic'], $_POST['credencialMed'], $_POST['telefMed'], $_POST['especialidad']);
    }
}
// Captura los datos del formulario del  medico de un modal para registrarlos 
if (
    isset($_POST['cdMedicoModal']) && 
    isset($_POST['nomApeMedicModal']) &&
    isset($_POST['credencialMedModal']) && 
    isset($_POST['telefMedModal']) &&
    isset($_POST['especialidadModal'])) {
        echo ajaxController::registrar_medico_modal_controlador($_POST['cdMedicoModal'], $_POST['nomApeMedicModal'], $_POST['credencialMedModal'], $_POST['telefMedModal'], $_POST['especialidadModal']);
}

// Captura los datos del formulario del centro medico para registrarlos
if (isset($_POST['estadoC']) && isset($_POST['municipioC']) && isset($_POST['centroM']) && isset($_POST['telefCent']) && isset($_POST['rifCentroM']) && isset($_POST['direcCM'])) {

    if (empty($_POST['estadoC']) || empty($_POST['municipioC']) || empty($_POST['centroM']) || empty($_POST['telefCent']) || empty($_POST['rifCentroM']) || empty($_POST['direcCM'])) {

        echo 2; // Formulario incompleto

    } else {

        echo ajaxController::registrar_centroMedico_controlador($_POST['estadoC'], $_POST['municipioC'], $_POST['centroM'], $_POST['telefCent'], $_POST['rifCentroM'], $_POST['direcCM']);
    }
}

// Actualizar contraseña
if (isset($_POST['current_pass']) && isset($_POST['new_pass'])) {

    echo ajaxController::actualizar_user_pass_controller($_POST['current_pass'], $_POST['new_pass']);
}

// Editar usuario en vista users
if (isset($_POST['usuario']) && isset($_POST['name']) && isset($_POST['status'])) {

    echo ajaxController::update_user_controller($_POST['usuario'], $_POST['name'], $_POST['status']);
}

// Editar nombre en vista myaccount
if (isset($_POST['my_a_name'])) {

    echo ajaxController::updateuseraccountcontroller($_POST['my_a_name']);
}
