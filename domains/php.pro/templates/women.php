<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }
    nav ul li:nth-child(2) a {
        border-bottom: 3px solid #ef5b70;
    }
</style>
<main class="women_page">
    women
    <div class="product" id="catalogField">
        <?php foreach ($productList as $itemProduct) : ?>
            <a href="/product/<?=$itemProduct['id']?>/?id=<?=$itemProduct['id']?>">
                <figure class="productItem">
                    <img src="/<?= (DIR_CATALOG .  $itemProduct['img_id']) . '.jpg'; ?>" alt="productFoto">
                    <div class="shadowHover">
                        <button onclick="return false" class="addToCart" data-id="<?=$itemProduct['id']?>">&ensp;Add to Cart</button>
                    </div>
                    <figcaption><?= $itemProduct['color'] . ' ' . $itemProduct['name'] ; ?>
                        <p>$<?= $itemProduct['price']; ?></p>
                        <i class="fa fa-eye" aria-hidden="true"></i><span class="raring"> <?= $itemProduct['rating'] ?></span>
                    </figcaption>
                </figure>
            </a>
        <?php endforeach; ?>
    </div>
    <button id="showMore">SHOW MORE</button>


</main>