<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/session.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (SessionManager::login($_POST['username'], $_POST['password'])) {
        header('Location: index.php');
        exit(0);
    } else {
        $message .= "Gagal Login";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php if (isset($message)) { ?>
        <h3><?php echo $message; ?></h3>
    <?php } ?>

    <h3>Login!</h3>
    <form method="post">

        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </li>

            <br />

            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </li>

            <br />

            <li>
                <button type="submit" name="kirim">Kirim!</button>
            </li>
        </ul>

    </form>
</body>

</html>