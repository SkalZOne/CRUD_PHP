<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . "/src/components/head.php" ?>
<body>
    <form action="src/actions/register.php" method="post">
        <h2>Регистрация</h2>


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
            <button>Зарегистрироваться</button>
    </form>

    <p>Есть <a href="index.php">аккаунт?</a></a></p>
</body>
</html>