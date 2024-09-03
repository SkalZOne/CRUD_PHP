<?php

session_start();

function addValidationMessage(string $fieldName, string $message)
{
    $_SESSION['validation'][$fieldName] = $message;
}

function getValidationMessage(string $fieldName)
{
    return $_SESSION['validation'][$fieldName];
}

function redirect(string $link)
{
    header("Location: $link");
    die();
}

function setOldValue(string $fieldName, string $value)
{
    $_SESSION['old'][$fieldName] = $value;
}

function getOldValue(string $fieldName)
{
    return $_SESSION['old'][$fieldName];
}

function uploadFile(array $file, string $prefix = 'avatar_')
{
    $uploadPath = __DIR__ . '/../uploads';

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . time() . ".$ext";

    $path = "$uploadPath/$fileName";

    if (!move_uploaded_file($file['tmp_name'], $path)) {
        die('Ошибка при загрузке файла на сервер');
    }

    return $path;
}
