<?php

/** @var \App\Data\UserDTO $data  */
/** @var array $errors  */
/** @var array $messages  */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Shelf</title>
    <link rel="stylesheet" href="public/styles/styles.css">
</head>

<body>
    <?php require_once 'App/Template/partials/_guest_header.php'; ?>

    <main>
        <h1>Login</h1>
        <p class="form-info">Don't have account?
            <a href="register.php">Register now</a> and fix that!
        </p>

        <form method="post">
            <div>
                <input type="email" name="email" value="<?= $data->getEmail(); ?>" placeholder="Email..." /><br />
            </div>
            <div>
                <input type="password" name="password" value="<?= $data->getPassword(); ?>" placeholder="Password..." /><br />
            </div>
            <div>
                <?php foreach ($errors as $error) : ?>
                    <p class="message"><?= $error; ?></p>
                <?php endforeach; ?>
                <?php foreach ($messages as $message) : ?>
                    <p class="message" style="color:green;"><?= $message; ?></p>
                <?php endforeach; ?>
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </main>

    <?php require_once 'App/Template/partials/_footer.php'; ?>
</body>

</html>