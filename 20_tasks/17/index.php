<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/20_tasks/17/src/core.php';

// проверка на ошибки при загрузке +
// проверка MIME-тип +
// генерация нового имена +
// проверка на уникальность названия(БД) +
// удаление мета-данных (создание нового изображения и копирование картинки) +
// добавление картинки в папку и запись в БД(название, расположение, формат) +
// выгрузка картинок +
// удаление картинок из БД и папки +
if (isset($_FILES['image']) && checkError($_FILES['image'])) {
    for ($i=0; $i < count($_FILES['image']['name']); $i++) { 
        $image['image']['name'] = $_FILES['image']['name'][$i];
        $image['image']['full_path'] = $_FILES['image']['full_path'][$i];
        $image['image']['type'] = $_FILES['image']['type'][$i];
        $image['image']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
        $image['image']['error'] = $_FILES['image']['error'][$i];
        $image['image']['size'] = $_FILES['image']['size'][$i];
        
        if (checkType($image['image'])) {
            addImageInDirectory($image['image']); 
            $image = [];
        }
    }

    header('Location: http://localhost/20_tasks/17/');
    die();
}

$images = uploadImages();
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
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/app.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/vendors.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="/20_tasks/17/assets/css/fa-regular.css">
        <link rel="stylesheet" href="/20_tasks/17/assets/css/style.css">

    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="row">
                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Задание
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
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
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label" for="simpleinput">Image</label>
                                                <input type="file" id="simpleinput" name ="image[]" class="form-control" multiple>
                                            </div>
                                            <button class="btn btn-success mt-3">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Загруженные картинки
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-content image-gallery">
                                    <div class="row">
                                        <?php if (isset($images) && !is_null($images)) {
                                            foreach ($images as $image) {?>
                                                <div class="col-md-3 image">
                                                    <img src="<?=$image['href'] . $image['name'] . '.' . $image['format']?>">
                                                    <a class="btn btn-danger" href="?delete=yes&id=<?=$image['id']?>" onclick="confirm('Вы уверены?');">Удалить</a>
                                                </div>
                                            <?php }
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        

        <script src="/20_tasks/17/assets/js/app.bundle.js"></script>
        <script src="/20_tasks/17/assets/js/vendors.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
