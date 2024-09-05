<?php

require_once __DIR__ . "/../helpers.php";

ini_set('display_errors', 1);

// Получение данных из пост-запросов
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$avatar = $_FILES['avatar'] ?? null;

if (!empty($avatar['name'])) {
    $fileFormat = substr($avatar['type'], strpos($avatar['type'], '/') + 1);
    $supportedFileFormats = array('jpeg', 'png');

    if (($avatar['size'] / 1000000) > 1) {
        addValidationMessage('avatar', 'The file size must not exceed 1 MB');
    } else if (!in_array($fileFormat, $supportedFileFormats)) {
        addValidationMessage('avatar', 'The file format must be png or jpeg');
    }

    if (!getValidationMessage('avatar')) {
        $avatarPath = uploadFile($avatar);
    }
}


// Валидация
if (empty($email)) {
    addValidationMessage('email', 'Field for email empty');
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    addValidationMessage('email', 'Incorrect email format');
}

if (!empty($_SESSION['validation'])) {
    setOldValue('email', $email);
    redirect('/register.php');
}

// Загрузка готовых данных в БД, через PDO драйвер
$pdo = getPDO();

$query = 'INSERT INTO users (email, password, avatar) VALUES (:email, :password, :avatar)';
$params = [
    'email' => $email,
    'avatar' => $avatarPath,
    'password' => password_hash($password, PASSWORD_DEFAULT),
];
$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (PDOException $e) {
    die($e->getMessage());
}

redirect('/');
