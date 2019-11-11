<?php

require_once './models/graficaModel.php';

class graficaController extends graficaModel{

    public function grafica_controller(){

        return graficaModel::grafica_model();

    }
    
}