<?php require_once __DIR__ . '/../../partials/header.php'; ?>
<h2>Добавить товар</h2>
<form action="/meubelny-salon/admin/products/add" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Описание:</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена:</label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="category">Категория:</label>
        <input type="text" id="category" name="category" required>
    </div>
    <div class="form-group">
        <label for="image">Изображение:</label>
        <input type="file" id="image" name="image" required>
    </div>
    <button type="submit" class="btn">Добавить</button>
</form>
<?php require_once __DIR__ . '/../../partials/footer.php'; ?>
