<?php

    class vistasModelo{

        protected function obtener_vistas_modelo($vistas){

            $listaBlanca = ["home", "users", "myaccount", "reporte", "buscar", "centroMedico"];

            if(in_array($vistas,$listaBlanca)){

                if(is_file("./views/content/" . $vistas. "-view.php")){

                    $contenido = "./views/content/" . $vistas. "-view.php";

                }else {

                    $contenido = 'login';

                }
                
            }elseif($vistas == 'login'){

                $contenido = 'login';

            }elseif($vistas == 'index'){

                $contenido = 'login';

            }else{

                $contenido = '404';

            }

            return $contenido;

        }

    }