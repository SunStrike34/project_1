<?php
session_start();
function connectToBD() : PDO
{
    static $connect = null;

    if (null !== $connect) {
        return $connect;
    }

    $config = [
        'hostname' => 'localhost',
        'database' => 'test_form',
        'username' => 'root',
        'password' => ''
    ];

    $connect = new PDO(
        "mysql:host={$config['hostname']};dbname={$config['database']}",
        $config['username'],
        $config['password']
    );

    return $connect;
}

function addUser(array $user) : bool
{
    if (checkUser($user['email']) && validateUserRequest($user)) {
        $connect = connectToBD();

        $password = password_hash($user['password'], PASSWORD_DEFAULT);

        $query = $connect->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $query -> bindParam(':email', $user['email'], PDO::PARAM_STR);
        $query -> bindParam(':password', $password, PDO::PARAM_STR);

        return $query -> execute();
    } else {
        return false;
    }
}

function checkUser(string $user) : bool 
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
    $query -> bindParam(':email', $user, PDO::PARAM_STR);
    $query -> execute();

    $str = $query->fetch(PDO::FETCH_ASSOC) ?: null;

    if ($user == (is_array($str) ? $str['email'] : null)) {
        $_SESSION['error'] = 'Такой email уже существует';
        header('Location: http://localhost/20_tasks/task_12.php');
        exit;
    }

    return true;
}

function validateUserRequest(array $user) : bool 
{
    if (empty((string)$user['email']) && !is_null($user['email'])) {
        $_SESSION['error'] = 'Не задан email';
        header('Location: http://localhost/20_tasks/task_12.php');
        exit;
    }

    if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Не правильно указан email';
        header('Location: http://localhost/20_tasks/task_12.php');
        exit;
    }

    if (empty((string)$user['password']) && !is_null($user['password'])) {
        $_SESSION['error'] = 'Не задан пароль';
        header('Location: http://localhost/20_tasks/task_12.php');
        exit;
    }

    return true;
}

if (!empty($_POST)) {
    $request = [
        'email' => htmlspecialchars($_POST['email']) ?? null,
        'password' => htmlspecialchars($_POST['password']) ?? null
    ];

    addUser($request);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Подготовительные задания к курсу
    </title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
    <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
</head>
<body class="mod-bg-1 mod-nav-link ">
<main id="js-page-content" role="main" class="page-content">
    <div class="col-md-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Задание
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse"
                            data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                            data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-content">
                        <div class="form-group">
                                <?php if (isset($_SESSION['error'])) {?>
                                        <div class="alert alert-danger fade show" role="alert">
                                        <?=$_SESSION['error']?>
                                        <?php unset($_SESSION['error']);?>
                                        </div>
                                    <?php }?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Email</label>
                                    <input type="text" name="email" id="simpleinput" class="form-control">
                                </div>

                                <label class="form-label" for="simpleinput">Password</label>
                                <input type="password" name="password" id="simpleinput" class="form-control">
                                <button class="btn btn-success mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<script>
    // default list filter
    initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
    // custom response message
    initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
</script>
</body>
</html>
