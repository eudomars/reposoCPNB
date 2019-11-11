<?php
if(is_file('../models/ajaxModel.php')){
    require_once '../models/ajaxModel.php';
}else{
    require_once './models/ajaxModel.php';
}

class ajaxController extends ajaxModel{

    // Zoom users
    public function zoom_user_controlador($id_usuario){

        $id_usuario = mainModel::limpiar_cadena($id_usuario);

        return ajaxModel::zoom_user_model($id_usuario);
        
    }

    // Delete users
    public function eliminar_user_controller($id_user){

        return ajaxModel::eliminar_user_model($id_user);

    }

    // Registrar users
    public function registrar_usuarios_controlador($user,$pass,$name,$rol){

        $user = mainModel::limpiar_cadena($user);
        $pass = mainModel::limpiar_cadena($pass);
        $pass = mainModel::encriptar($pass);
        $name = mainModel::limpiar_cadena($name);
        $rol  = mainModel::limpiar_cadena($rol);

        $datos = array("user" => $user, "pass" => $pass, "names" => $name, "rol" => $rol);

        return ajaxModel::registrar_usuarios_modelo($datos);

    }

    // Actualizar contraseña
    public function actualizar_user_pass_controller($old_pass,$new_pass){

        $old_pass = mainModel::limpiar_cadena($old_pass);
        $old_pass = mainModel::encriptar($old_pass);
        $new_pass = mainModel::limpiar_cadena($new_pass);
        $new_pass = mainModel::encriptar($new_pass);

        return ajaxModel::actualizar_user_pass_model($old_pass,$new_pass);

    }

    // Editar usuario en vista users
    public function update_user_controller($usuario,$nombre,$estatus){

        $user = mainModel::limpiar_cadena($usuario);
        $name = mainModel::limpiar_cadena($nombre);
        $status = mainModel::limpiar_cadena($estatus);

        $datos = array("user" => $user, "name" => $name, "estatus" => $status);

        return ajaxModel::update_user_model($datos);
        
    }

    // Editar nombre en vista myaccount
    public function updateuseraccountcontroller($nombre){

        $nombre = mainModel::limpiar_cadena($nombre);

        return ajaxModel::updateuseraccountmodel($nombre);

    }

    // Contar usuarios
    public function count_users1_controller(){

        return ajaxModel::count_users1_model();

    }

    // Contar usuarios
    public function count_users2_controller(){

        return ajaxModel::count_users2_model();

    }

    // Grafica del home
    public function grafica_controller(){

        return ajaxModel::grafica_model();

    }

    // Reporte PDF
    public function reportepdf_controller(){

        return ajaxModel::reportepdf_model();
        
    }

}

// Zoom users
if (isset($_GET['zoom_user'])){
    echo json_encode(ajaxController::zoom_user_controlador($_GET['zoom_user']));
}

// Delete users
if (isset($_GET['d_user'])){
    echo ajaxController::eliminar_user_controller($_GET['d_user']);
}

// Create users
if (isset($_POST['frm_user']) && isset($_POST['frm_pass']) && isset($_POST['frm_name']) && isset($_POST['frm_rol'])){

    if (empty($_POST['frm_user']) || empty($_POST['frm_pass']) || empty($_POST['frm_name']) || empty($_POST['frm_rol'])){

        echo 2; // Formulario incompleto
        
    }else{
        
        echo ajaxController::registrar_usuarios_controlador($_POST['frm_user'],$_POST['frm_pass'],$_POST['frm_name'],$_POST['frm_rol']);

    }

}

// Actualizar contraseña
if (isset($_POST['current_pass']) && isset($_POST['new_pass'])){

    echo ajaxController::actualizar_user_pass_controller($_POST['current_pass'],$_POST['new_pass']);

}

// Editar usuario en vista users
if (isset($_POST['usuario']) && isset($_POST['name']) && isset($_POST['status'])) {
    
    echo ajaxController::update_user_controller($_POST['usuario'], $_POST['name'], $_POST['status']);
        
}

// Editar nombre en vista myaccount
if (isset($_POST['my_a_name'])){
    
    echo ajaxController::updateuseraccountcontroller($_POST['my_a_name']);
    
}