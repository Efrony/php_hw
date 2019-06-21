
<div class="newArrivalsBlock">
    <div class="newArrivals">
        <p>New Arrivals</p>
        <nav> Home / Men / <span>New Arrivals</span> </nav>
    </div>
</div>
<main>
    <div class="bcgBlock"></div>
    <div class="content">
        <div class="contentBcg"><img src="/<?= DIR_CATALOG .  $productItem['name'] ?>" alt="fotoProduct">
        <i class="fa fa-eye" aria-hidden="true"></i><span class="raring"> <?=$productItem['rating']?></span>
            <aside>
                <p class="collection">WOMEN COLLECTION</p> <img src="img/hot_deals/line-border-pink.png" alt="">
                <p class="heading">Moschino Cheap And Chic</p>
                <p class="discr"> Compellingly actualize fully researched processes before proactive
                    outsourcing.
                    Progressively syndicate collaborative architectures before cutting-edge services.
                    Completely
                    visualize parallel core competencies rather than exceptional portals. </p>
                <p class="material"> <span>MATERIAL: </span> COTTON &emsp;&emsp;&emsp; <span>DESIGNER:
                    </span>
                    BINBURHAN </p>
                <p class="price">$561</p>
                <form action="#">
                    <div class="characteristic">
                        <div class="color">
                            <p>CHOOSE COLOR</p>
                            <select required name="colors">
                                <option value="" selected>Red</option>
                                <option value="black" disabled>Black</option>
                                <option value="blue">Blue</option>
                                <option value="green">Green</option>
                                <option value="gray">Gray</option>
                            </select>
                        </div>
                        <div class="size">
                            <p>CHOOSE SIZE</p>
                            <select required name="sizes">
                                <option value="">XS</option>
                                <option value="s" disabled>S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl" selected>XXL</option>
                            </select>
                        </div>
                        <div class="quantity">
                            <p>QUANTITY</p>
                            <input type="text" value="2" name="quantitys">
                        </div>
                    </div>
                    <input type="submit" value="&emsp;Add to Cart">
                </form>
            </aside>
        </div>
        <div class="likeAlso">you may like also</div>
        <div class="product" id="product">
            <?php foreach ($productList as $itemProduct) : ?>
                <a href="/product/?id=<?= $itemProduct['id'] ?>">
                    <figure class="productItem">
                        <img src="/<?= (DIR_CATALOG . $itemProduct['name']); ?>" alt="productFoto">
                        <div class="shadowHover">
                            <button class="addToCart">&ensp;Add to Cart</button>
                        </div>
                        <figcaption><?= $itemProduct['name']; ?>
                            <p>product_price</p>
                            <i class="fa fa-eye" aria-hidden="true"></i><span class="raring"> <?=$itemProduct['rating']?></span>
                        </figcaption>
                    </figure>
                </a>
                <?php $i += 1;
                if ($i > 3) break; ?>
            <?php endforeach; ?>
        </div>
    </div>
</main>