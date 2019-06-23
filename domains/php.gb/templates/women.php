<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }
    nav ul li:nth-child(2) a {
        border-bottom: 3px solid #ef5b70;
    }
</style>
<main>
    women
    <div class="product">
        <?php foreach ($productList as $itemProduct) : ?>
            <a href="/product/?id=<?= $itemProduct['id'] ?>">
                <figure class="productItem">
                    <img src="/<?= (DIR_CATALOG . $itemProduct['name']); ?>" alt="productFoto">
                    <div class="shadowHover">
                        <button class="addToCart">&ensp;Add to Cart</button>
                    </div>
                    <figcaption><?= $itemProduct['name']; ?>
                        <p>product_price</p>
                        <i class="fa fa-eye" aria-hidden="true"></i><span class="raring"> <?= $itemProduct['rating'] ?></span>
                    </figcaption>
                </figure>
            </a>
        <?php endforeach; ?>
    </div>
    <form method="post" enctype="multipart/form-data">
        <p><?= $messageLoad; ?><br> Загрузите файл. Он должен быть в формате JPG и не более 2мб</p>
        <input type="file" name="loadfile">
        <input type="submit" name="loadbutton" value="Загрузить">
    </form>
</main>