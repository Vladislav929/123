<?php require_once __DIR__ . '/../../partials/header.php'; ?>
<h2>Добавить пользователя</h2>
<form action="/meubelny-salon/admin/users/add" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="role">Роль:</label>
        <select id="role" name="role" required>
            <option value="user">Пользователь</option>
            <option value="admin">Администратор</option>
        </select>
    </div>
    <button type="submit" class="btn">Добавить</button>
</form>
<?php require_once __DIR__ . '/../../partials/footer.php'; ?>
