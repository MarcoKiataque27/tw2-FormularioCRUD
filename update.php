<?php
include 'partials/header.php';
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}

$user = getUserById($_GET['id']);

if (!$user) {
    include "partials/not_found.php";
    exit;
}

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = array_merge($user, $_POST);
    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = updateUser($_POST, $user['id']);
        uploadImage($_FILES['picture'], $user);
        header("Location: index.php");
        exit;
    }
}
?>

<?php include '_form.php' ?>