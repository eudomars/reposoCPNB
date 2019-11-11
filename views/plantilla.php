<?php
require_once './controllers/vistasControlador.php';
$vt = new vistasControlador();
$vistasR = $vt->obtener_vistas_controlador();
if ($vistasR == "./views/content/reporte-view.php"){
    
    require_once './views/content/reporte-view.php';
    
}else{
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title> <?= COMPANY; ?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <!--====== Links -->
    <?php include 'views/layout/links.php'; ?>
    <!--====== Scripts -->
    <?php include 'views/layout/scripts.php'; ?>
</head>

<body>
    <?php
        if($vistasR == "login" || $vistasR == "404"):

            if ($vistasR == "login") {

                require_once './views/content/login-view.php';

            }else{

                require_once './views/content/404-view.php';

            }
            
        else:

            session_start(['name' => 'NSW']);
            // Comprobar inicio de sesión
            require_once './controllers/loginController.php';
            $lc = new loginController();
            if (!isset($_SESSION['user'])) {
                $lc->cerrar_sesion();
            }
            ///////////////////////////////

    ?>

    <!-- Content page-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="banner">
                <h1 class="display-4">Sistema</h1>
                <p class="lead"> Nombre de la empresa. </p>
            </div>
        
            <?php
                require_once './views/layout/navBar.php'; // Barra de navegación
                require_once $vistasR; // Vista
                require_once 'layout/footer.php'; // Pie de página
                require_once 'content/modals.php'; // Ventanas modal
            ?>

        </div>
    </div>
    
    <?php endif; } ?>

</body>

</html>