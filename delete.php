<?php
require __DIR__ . '/users/users.php';

if (!isset($_POST['id'])) {
    exit('Error');
}

deleteUser($_POST['id']);

header("Location: index.php");
exit;