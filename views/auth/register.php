<?php require_once __DIR__ . '/../partials/header.php'; ?>
<h2>Регистрация</h2>
<form action="/meubelny-salon/register" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" required>
        <?php if(isset($data['email_error'])) : ?>
            <span class="error"><?php echo $data['email_error']; ?></span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Подтвердите пароль:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn">Зарегистрироваться</button>
</form>
<p>Уже есть аккаунт? <a href="/meubelny-salon/login">Войдите</a></p>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
