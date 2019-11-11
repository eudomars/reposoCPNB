<div class="full-box login-container cover">

    <form method="post" autocomplete="off" class="logInForm">

        <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
        <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>

        <div class="form-group label-floating">
            <label class="control-label" for="UserName">Usuario</label>
            <input class="form-control" id="UserName" name="user" type="text" autofocus required>
            <p class="help-block">Escribe tú nombre de usuario</p>
        </div>

        <div class="form-group label-floating">
            <label class="control-label" for="UserPass">Contraseña</label>
            <input class="form-control" id="UserPass" name="pass" type="password" required>
            <p class="help-block">Escribe tú contraseña</p>
        </div>

        <div class="form-group text-center">
            <input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
        </div>

    </form>

</div>

<?php
if (isset($_POST['user']) && isset($_POST['pass'])){

    include './controllers/loginController.php';
    $login = new loginController();
    echo $login->login_controlador();

}
?>