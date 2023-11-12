<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/session.php';

try {
    $session = SessionManager::getCurrentSession();
} catch (Exception $exception) {
    header('Location: login.php');
    exit(0);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP JWT</title>
</head>

<body>

    <h4>Hello <?php echo $session->username; ?></h4>

</body>

</html>