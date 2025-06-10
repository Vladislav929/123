<?php require_once __DIR__ . '/../../partials/header.php'; ?>
<h2>Редактировать товар</h2>
<form action="/meubelny-salon/admin/products/edit?id=<?= htmlspecialchars($product->id) ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($product->id) ?>">
    <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
    <div class="form-group">
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" value="<?php echo $product->name; ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Описание:</label>
        <textarea id="description" name="description" required><?php echo $product->description; ?></textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product->price; ?>" required>
    </div>
    <div class="form-group">
        <label for="category">Категория:</label>
        <input type="text" id="category" name="category" value="<?php echo $product->category; ?>" required>
    </div>
    <div class="form-group">
        <label for="image">Изображение:</label>
        <input type="file" id="image" name="image">
        <img src="/meubelny-salon/assets/images/<?php echo $product->image; ?>" width="100">
    </div>
    <button type="submit" class="btn">Сохранить</button>
</form>
<?php require_once __DIR__ . '/../../partials/footer.php'; ?>
