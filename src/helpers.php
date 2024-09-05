<?php

session_start();

require_once __DIR__ . '/config.php';

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

    if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")) {
        die('Ошибка при загрузке файла на сервер');
    }

    return "uploads/$fileName";
}

function getPDO()
{
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($dsn, DB_USER, DB_PASS, $options);
}

function findUser($email) {
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCurrentUser($id) {
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}