<?php
include 'partials/header.php';
require __DIR__ . '/users/users.php';

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

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
        $user = createUser($_POST);
        uploadImage($_FILES['picture'], $user);
        header("Location: index.php");
        exit;
    }
}
?>

<?php include '_form.php' ?>