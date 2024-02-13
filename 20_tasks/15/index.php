<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/20_tasks/15/src/core.php';

$request = [];

if (!empty($_POST)) {
    $request = [
        'email' => htmlspecialchars($_POST['email']) ?? null,
        'password' => htmlspecialchars($_POST['password']) ?? null
    ];

    addUser($request);
}

includeTemplate('/header.php');
?>

<?php if (isset($_SESSION['error'])) {?>
    <div class="alert alert-danger fade show" role="alert">
        <?=$_SESSION['error']?>
        <?php unset($_SESSION['error']);?>
    </div>
<?php }?>
                                
<form action="" method="post">
    <div class="form-group">
        <label class="form-label" for="simpleinput">Email</label>
        <input type="email" name="email" id="simpleinput" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label" for="simpleinput">Password</label>
        <input type="password" name="password" id="simpleinput" class="form-control">
    </div>

    <button class="btn btn-success mt-3">Register</button>
    <a class="btn btn-success mt-3" href="http://localhost/20_tasks/15/account/"> I have an account </a>
</form>
<?php  includeTemplate('/footer.php') ?>