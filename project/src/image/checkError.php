<?php
/**
 * @param array $file
 * @return boolean
 */
function checkError(array $file) : bool
{
    $fileTmpName = $file['tmp_name'] ?? null;
    $errorCode = $file['error'] ?? null;

    if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
        // Массив с названиями ошибок
        $errorMessages = [
          UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
          UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
          UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
          UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
          UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
          UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
          UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
        ];
        // Зададим неизвестную ошибку
        $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
        // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
        $_SESSION['error'] = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

        return false;
    }
  
  return true;
}
