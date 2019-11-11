<?php
require_once './core/mainModel.php';

class graficaModel extends mainModel{
    
    protected function grafica_model(){
    
        // Linea 1
        $sql1 = "SELECT date_part('month',reg_date) AS fecha, COUNT(reg_date) AS total FROM users WHERE id_rol = 1 GROUP BY fecha ORDER BY fecha";

        $result1 = mainModel::conectar()->prepare($sql1);

        $result1->execute();
        
        $valX1 = array(); // Fecha
        $valY1 = array(); // ID

        foreach ($result1 as $row) {
            switch ($row[0]) {
                case '1':
                    $mes = "Enero";
                    break;
                case '2':
                    $mes = "Febrero";
                    break;
                case '3':
                    $mes = "Marzo";
                    break;
                case '4':
                    $mes = "Abril";
                    break;
                case '5':
                    $mes = "Mayo";
                    break;
                case '6':
                    $mes = "Junio";
                    break;
                case '7':
                    $mes = "Julio";
                    break;
                case '8':
                    $mes = "Agosto";
                    break;
                case '9':
                    $mes = "Septiembre";
                    break;
                case '10':
                    $mes = "Octubre";
                    break;
                case '11':
                    $mes = "Noviembre";
                    break;
                case '12':
                    $mes = "Diciembre";
                    break;
                
            }
            $valX1[] = $mes; //Fecha
            $valY1[] = $row[1]; // Total
        }
    
        $datosX1 = json_encode($valX1);
        $datosY1 = json_encode($valY1);
    
        // Linea 2
        $sql2 = "SELECT date_part('month',reg_date) AS fecha, COUNT(reg_date) FROM users WHERE id_rol = 2 GROUP BY fecha ORDER BY fecha";
    
        $result2 = mainModel::conectar()->prepare($sql2);

        $result2->execute();
    
        $valX2 = array(); // Fecha
        $valY2 = array(); // ID
    
        foreach ($result2 as $row) {
            switch ($row[0]) {
                case '1':
                    $mes = "Enero";
                    break;
                case '2':
                    $mes = "Febrero";
                    break;
                case '3':
                    $mes = "Marzo";
                    break;
                case '4':
                    $mes = "Abril";
                    break;
                case '5':
                    $mes = "Mayo";
                    break;
                case '6':
                    $mes = "Junio";
                    break;
                case '7':
                    $mes = "Julio";
                    break;
                case '8':
                    $mes = "Agosto";
                    break;
                case '9':
                    $mes = "Septiembre";
                    break;
                case '10':
                    $mes = "Octubre";
                    break;
                case '11':
                    $mes = "Noviembre";
                    break;
                case '12':
                    $mes = "Diciembre";
                    break;
                
            }
            $valX2[] = $mes; //Fecha
            $valY2[] = $row[1]; // Total
        }
    
        $datosX2 = json_encode($valX2);
        $datosY2 = json_encode($valY2);

        unset($result1);
        unset($result2);
        unset($conexion);
    
        return array($datosX1, $datosY1, $datosX2, $datosY2);
    
    }

}