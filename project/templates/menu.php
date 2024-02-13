<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
    <a class="navbar-brand d-flex align-items-center fw-500" href="/project/users.php"><img alt="logo" class="d-inline-block align-top mr-2" src="img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/project/users.php">Главная <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php if ($_SESSION['auth'] == false) { ?>
                <a class="nav-link" href="page_login.php">Войти</a>
                <?php }?>
            </li>
            <li class="nav-item">
                <?php if ($_SESSION['auth'] == true) { ?>
                <a class="nav-link" href="?logout=yes">Выйти</a>
                <?php }?>
            </li>
        </ul>
    </div>
</nav>