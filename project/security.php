<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/src/core.php';

redirectExited();

if ($_SESSION['role'] == true || $_SESSION['id'] == $_GET['id']) {

    $user = getUser($_GET['id']);
    
    if (!empty($_POST)) {
        
        $request = [
            'user' => $user ?? [],
            'email' => htmlspecialchars($_POST['email']) ?? null,
            'password1' => htmlspecialchars($_POST['password1']) ?? null,
            'password2' => htmlspecialchars($_POST['password2']) ?? null
        ];

        $request = validateUserSecurityRequest($request);

        if (!$request) {
            redirectАuthorized('security.php?id=' . $user['id']);
        }

        editUser($request, $_GET['id']);

        if ($_SESSION['id'] == $_GET['id']) {
            $_SESSION['email'] = $request['email'];
        }

        $_SESSION['successEdit'] = true;
        redirectАuthorized();
    }
}else {
    redirectАuthorized();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Безопаность</title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
</head>
<body>
    <?php includeTemplate('/menu.php')?>
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-lock'></i> Безопасность
            </h1>

        </div>
        <?php if (isset($_SESSION['error'])) {?>
            <div class="alert alert-danger">
                <?=$_SESSION['error']?>
                <?php unset($_SESSION['error'])?>
            </div>
        <?php } ?>
        <form action="" method="post">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Обновление эл. адреса и пароля</h2>
                            </div>
                            <div class="panel-content">
                                <!-- email -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Email</label>
                                    <input type="text" id="simpleinput" name="email" class="form-control" value="<?=$user['email']?>">
                                </div>

                                <!-- password -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Пароль</label>
                                    <input type="password" name="password1" id="simpleinput" class="form-control">
                                </div>

                                <!-- password confirmation-->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Подтверждение пароля</label>
                                    <input type="password" name="password2" id="simpleinput" class="form-control">
                                </div>

                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning">Изменить</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="js/vendors.bundle.js"></script>
    <script src="js/app.bundle.js"></script>
    <script>

        $(document).ready(function()
        {

            $('input[type=radio][name=contactview]').change(function()
                {
                    if (this.value == 'grid')
                    {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
                        $('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
                        $('#js-contacts .js-expand-btn').addClass('d-none');
                        $('#js-contacts .card-body + .card-body').addClass('show');

                    }
                    else if (this.value == 'table')
                    {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
                        $('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
                        $('#js-contacts .js-expand-btn').removeClass('d-none');
                        $('#js-contacts .card-body + .card-body').removeClass('show');
                    }

                });

                //initialize filter
                initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));
        });

    </script>
</body>
</html>