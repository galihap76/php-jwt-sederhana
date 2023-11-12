<?php
require_once __DIR__ . '/vendor/autoload.php';

setcookie('X-TESTING-SESSION', 'LOGOUT');

header('Location: login.php');
