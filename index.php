<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . "/src/components/head.php" ?>
<body>
    <form action="">
        <h2>Вход</h2>


            <label for="email">
                <input 
                    type="text"
                    name="email"
                    id="email"
                    placeholder="Email"
                >
                <small>
                    <img src="images/inwork/warning.svg" alt="">
                    Неверная почта
                </small>
            </label>

            <label for="password">
                <input 
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                >
                <small>
                    <img src="images/inwork/warning.svg" alt="">
                    Неверный пароль
                </small>
            </label>

            <button>Войти</button>
    </form>

    <p>Нету <a href="register.php">аккаунта?</a></a></p>
</body>
</html>