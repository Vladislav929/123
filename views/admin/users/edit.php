<?php require_once __DIR__ . '/../../partials/header.php'; ?>
<h2>Редактировать пользователя</h2>
<form action="/meubelny-salon/admin/users/edit?id=<?php echo $product->id; ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" username="id" value="<?php echo $product->id; ?>">
    <input type="hidden" username="existing_image" value="<?php echo $product->image; ?>">
    <div class="form-group">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user->username); ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Новый пароль (оставьте пустым, чтобы не менять):</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="role">Роль:</label>
        <select id="role" name="role" required>
            <option value="user" <?php echo $user->role == 'user' ? 'selected' : ''; ?>>Пользователь</option>
            <option value="admin" <?php echo $user->role == 'admin' ? 'selected' : ''; ?>>Администратор</option>
        </select>
    </div>
    <button type="submit" class="btn">Сохранить</button>
</form>
<?php require_once __DIR__ . '/../../partials/footer.php'; ?>
