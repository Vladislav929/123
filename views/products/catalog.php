<?php require_once __DIR__ . '/../partials/header.php'; ?>
<h2>Каталог товаров</h2>
<div class="products">
    <?php foreach($products as $product) : ?>
        <div class="product">
            <img src="/meubelny-salon/assets/images/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>">
            <h3><?php echo $product->name; ?></h3>
            <p><?php echo $product->description; ?></p>
            <p class="price"><?php echo $product->price; ?> руб.</p>
        </div>
    <?php endforeach; ?>
</div>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
