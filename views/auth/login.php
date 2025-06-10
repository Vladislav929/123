<?php require_once __DIR__ . '/../partials/header.php'; ?>
<h2>Вход в систему</h2>
<form action="/meubelny-salon/login" method="POST">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <?php if(isset($data['password_error'])) : ?>
            <span class="error"><?php echo $data['password_error']; ?></span>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn">Войти</button>
</form>
<p>Ещё нет аккаунта? <a href="/meubelny-salon/register">Зарегистрируйтесь</a></p>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
