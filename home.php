<?php
include_once __DIR__ . "/src/helpers.php";

$user = getCurrentUser($_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . "/src/components/head.php" ?>
<body>
    <div class="container">
        <h2>Добро пожаловать, <?php echo $user['email'] ?></h2>
        <img src="<?php echo $user['avatar'] ?>" alt="">
        <form action="src/actions/logout.php" method="post">
            <button>Выйти</button>
        </form>
    </div>
</body>
</html>