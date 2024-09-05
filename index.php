<?php 
require_once __DIR__ . "/src/helpers.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . "/src/components/head.php" ?>
<body>
    <form class="custom-form" action="src/actions/login.php" method="post">
        <h2>Sign In</h2>

            <label for="email">
                <input 
                    type="text"
                    name="email"
                    id="email"
                    placeholder="Email"
                    value="<?php getOldValue('email') ?>"
                >
                <?php if (getValidationMessage('email')): ?>
                    <small>
                        <img src="images/inwork/warning.svg" alt="">
                        <?php echo getValidationMessage('email') ?>
                    </small>
                <?php endif; ?>
            </label>

            <label for="password">
                <input 
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                >
                <?php if (getValidationMessage('password')): ?>
                    <small>
                        <img src="images/inwork/warning.svg" alt="">
                        <?php echo getValidationMessage('password') ?>
                    </small>
                <?php endif; ?>
            </label>

            <button>Войти</button>
    </form>

    <p>Don't have <a href="register.php">account?</a></a></p>
    <?php $_SESSION = [] ?>

</body>
</html>