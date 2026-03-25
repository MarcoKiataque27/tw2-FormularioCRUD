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
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Ver Usuario: <b><?= $user['name'] ?></b></h3>
        </div>

        <div class="card-body">
            <a class="btn btn-outline-secondary" href="update.php?id=<?= $user['id'] ?>">Editar</a>

            <form style="display:inline;" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <button class="btn btn-outline-danger">Eliminar</button>
            </form>
        </div>

        <table class="table">
            <tr><th>Nombre</th><td><?= $user['name'] ?></td></tr>
            <tr><th>Usuario</th><td><?= $user['username'] ?></td></tr>
            <tr><th>Email</th><td><?= $user['email'] ?></td></tr>
            <tr><th>Celular</th><td><?= $user['phone'] ?></td></tr>
            <tr>
                <th>Web</th>
                <td>
                    <a target="_blank" href="http://<?= $user['website'] ?>">
                        <?= $user['website'] ?>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php include 'partials/footer.php' ?>