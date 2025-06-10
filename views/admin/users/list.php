<?php require_once __DIR__ . '/../../partials/header.php'; ?>
<h2>Управление пользователями</h2>
<a href="/meubelny-salon/admin/users/add" class="btn">Добавить пользователя</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Имя пользователя</th>
            <th>Email</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) : ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->role; ?></td>
                <td>
                    <a href="/meubelny-salon/admin/users/edit?id=<?php echo $user->id; ?>" class="btn">Редактировать</a>
                    <a href="/meubelny-salon/admin/users/delete?id=<?php echo $user->id; ?>" class="btn danger">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . '/../../partials/footer.php'; ?>
