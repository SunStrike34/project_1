<?php
/**
 * @param array $image
 * @return void
 */
function deleteImage(array $image): void
{
    if (unlink($_SERVER['DOCUMENT_ROOT'] . $image['href'] . $image['name'] . '.' . $image['format'])) {
        if (!deleteImageInBD($image['id'])) { $_SESSION['error'] = 'Ошибка при удалении из БД';}
    } else {
        $_SESSION['error'] = 'Ошибка при удалении из папки';
    }

    unset($_GET['image']);
    header('Location: http://localhost/20_tasks/17/');
    die();
}
