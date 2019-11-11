<?php
include 'models/loginModel.php';

class loginController extends loginModel{

    public function login_controlador(){

        $user = mainModel::limpiar_cadena($_POST['user']);
        $pass = mainModel::limpiar_cadena($_POST['pass']);
        
        $pass = mainModel::encriptar($pass);

        return loginModel::login_modelo($user,$pass);

    }

}