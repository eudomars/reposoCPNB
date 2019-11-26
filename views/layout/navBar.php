<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= SERVERURL; ?>home/">
        <i class="icon-home"></i>
        <!-- <img src="public/img/logocpnb.png" width="40" height="40" alt=""> -->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

        


            <li class="nav-item">
                <!-- <a class="nav-link" href="<?= SERVERURL; ?>registrar/"> <i class="icon-pencil"></i> Registrar</a> -->
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= SERVERURL; ?>buscar/">
                        <i class="icon-book"></i> Buscar trabajador
                </a>
                <!-- <a class="nav-link" href="<?= SERVERURL; ?>registrar/"> <i class="icon-pencil"></i> Registrar</a> -->
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-pencil"></i> Registrar
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="<?= SERVERURL; ?>centroMedico/"> <span class="icon-office"></span> Centro medico </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="<?= SERVERURL; ?>medico/"> <span class="icon-folder-plus"></span> Medico </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="<?= SERVERURL; ?>users/"> <span class="icon-aid-kit"></span> Tipo reposo </a>
                
                </div>

            </li>

            <?php if($_SESSION['nivel'] == 1){ ?>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="icon-cogs"></i> Administración
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="<?= SERVERURL; ?>myaccount/"> <span class="icon-contacts"></span> Mi cuenta </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="<?= SERVERURL; ?>users/"> <span class="icon-contacts2"></span> Usuarios </a>
                       
                    </div>

                </li>
                <!-- <a class="nav-link" href="<?= SERVERURL; ?>buscar/">
                        <i class="icon-book"></i> Buscar trabajador
                </a> -->

            <?php }else{ ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= SERVERURL; ?>myaccount/"> <i class="icon-contacts"></i> Mi cuenta</a>
                </li>

            <?php } ?>

            <li class="nav-item">
                <a class="nav-link text-info" href="#"> <i class="icon-assignment_ind"></i>
                    <?= $_SESSION['user']; ?>
                </a>
            </li>

        </ul>

        <a class="btn btn-outline-success my-2 my-sm-0" id="closesesion" href="#" title="Cerrar sesión"> <i class="icon-settings_power"></i> </a>

    </div>
</nav>