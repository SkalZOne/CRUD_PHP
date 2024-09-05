<?php

require_once __DIR__ . "/../helpers.php";

$email = $_POST['email'];
$password = $_POST['password'];

$user = findUser($email);

setOldValue('email', $email);

if (empty($user)) {
    addValidationMessage('email', 'Пользователь с данной почтой не найден');
    redirect('/');
}

if (!empty($user)) {
    if (!password_verify($password, $user['password'])) {
        addValidationMessage('password', 'Неверный пароль');
        var_dump(getValidationMessage('password'));
        redirect('/');
    }

    $_SESSION['user']['id'] = $user['id'];

    redirect('/home.php');
}
