<?php
require_once '../models/tablesModel.php';

class tablesController extends tablesModel{

    public function lista_usuarios_controller(){

        $datos = tablesModel::lista_usuarios_modelo();

        $tabla = "";

        $nro = 0;

        foreach ($datos as $value){ $nro++;

            $zoom = "<span class='zoom-user btn btn-info btn-sm' data-toggle='modal' data-target='#zoom-user-modal' onclick='zoom_user(".$value['id_user'].")'> <i class='icon-zoom-in'></i> </span>";

            $delete = "<span class='delete-usr btn btn-danger btn-sm' onclick='delete_user(".$value['id_user'].")'> <i class='icon-bin'></i> </span>";

            $tabla.= '{
                "nro": "'.$nro.'",
                "civ": "'.$value['civ'].'",
                "nombre": "'.$value['nombre'].'",
                "rol": "'.$value['rol'].'",
                "reg_date": "'.str_replace('-', '/', date('d-m-Y', strtotime($value['reg_date']))).'",
                "opciones": "'.$zoom." ".$delete.'"
            },';

        }

        $tabla = substr($tabla,0,strlen($tabla)-1);

        return '{"data":['.$tabla.']}';

    }

}

echo tablesController::lista_usuarios_controller();