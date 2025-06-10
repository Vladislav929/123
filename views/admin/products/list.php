<?php require_once __DIR__ . '/../../partials/header.php'; ?>
<h2>Управление товарами</h2>
<a href="/meubelny-salon/admin/products/add" class="btn">Добавить товар</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product) : ?>
            <tr>
                <td><?php echo $product->id; ?></td>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->price; ?> руб.</td>
                <td><?php echo $product->category; ?></td>
                <td>
                    <a href="/meubelny-salon/admin/products/edit?id=<?php echo $product->id; ?>" class="btn">Редактировать</a>
                    <form action="/meubelny-salon/admin/products/delete" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <button type="submit" class="btn danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . '/../../partials/footer.php'; ?>
