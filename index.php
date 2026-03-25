<?php
require __DIR__ . '/users/users.php';

$users = getUsers();

include 'partials/header.php';
?>

<div class="container">

    <h2>Gestión de Usuarios</h2>

    <p>
        <a class="btn btn-success" href="create.php">+ Crear Usuario</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Web</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if (!empty($user['extension'])): ?>
                        <img width="60" src="<?= "users/images/{$user['id']}.{$user['extension']}" ?>">
                    <?php endif; ?>
                </td>

                <td><?= $user['name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>

                <td>
                    <a target="_blank" href="http://<?= $user['website'] ?>">
                        <?= $user['website'] ?>
                    </a>
                </td>

                <td>
                    <a href="view.php?id=<?= $user['id'] ?>" class="btn btn-outline-info">Ver</a>
                    <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-outline-secondary">Editar</a>

                    <form method="POST" action="delete.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php include 'partials/footer.php' ?>