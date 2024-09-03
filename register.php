<?php
require_once __DIR__ . "/src/helpers.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . "/src/components/head.php" ?>

<body>
    <form action="src/actions/register.php" method="post" enctype="multipart/form-data">
        <h2>Sign Up</h2>


        <label for="email">
            <input
                type="text"
                name="email"
                id="email"
                placeholder="Email"
                value="<?php echo getOldValue('email') ?>">
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
                placeholder="Password">
        </label>

        <div class="files">
            <label for="avatar" class="image">
                <div id="text">Upload file</div>
                <img id="fileReload" src="images/inwork/reload.svg" alt="fileReload">
                <input
                    type="file"
                    name="avatar"
                    id="avatar">
            </label>
            <img class="avatar" id="fileUploadImg" src="">
            <small id="fileUploadInfo">
                No file upload
            </small>

            <?php if (getValidationMessage('avatar')):?>
                <small class="avatarWarning">
                    <img src="images/inwork/warning.svg" alt="">
                    <?php echo getValidationMessage('avatar') ?>
                </small>
            <?php endif; ?>

            
        </div>

        <button>Sign Up</button>
    </form>
    <p>Already have <a href="index.php">account?</a></a></p>

    <?php $_SESSION = [] ?>
    <script src="assets/app.js"></script>
</body>

</html>