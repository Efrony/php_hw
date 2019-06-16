home page

<form method="post" enctype="multipart/form-data">
    <p><?= $messageLoad; ?> Загрузите файл. Он должен быть в формате JPG и не более 2мб</p>
    <input type="file" name="loadfile">
    <input type="submit" name="loadbutton" value="Загрузить">
</form>

<div class="product" id="product">
    <?php foreach ($imagesCatalog as $imageName) : ?>
        <a href="<?= (DIR_CATALOG . $imageName); ?>">
            <figure class="productItem">
                <img src="<?= (DIR_CATALOG . $imageName); ?>" alt="productFoto">
                <div class="shadowHover">
                    <button class="addToCart">&ensp;Add to Cart</button>
                </div>
                <figcaption>product_name
                    <p>product_price</p>
                </figcaption>
            </figure>
        </a>
    <?php endforeach; ?>
</div>