<div class="newArrivalsBlock">
    <div class="newArrivals">
        <p>the cart is empty...</p>
        <nav>add <span>product</span> to cart</nav>
    </div>
</div>
<main class="cart_page">
    <div>
        <div>
            <div class="cart">
                <div class="hat">
                    <div>Product Details </div>
                    <div>unite Price</div>
                    <div>Quantity</div>
                    <div>shipping</div>
                    <div>Subtotal</div>
                    <div>ACTION</div>
                </div>
                <div class="productCart" id="productCart">
                    <?php foreach ($cartList as $cartItem) : ?>
                        <div class="productItem" id="cart_number_<?=$cartItem['id_cart_item']?>">
                            <figure>
                                <a href="#"><img src="/<?= (DIR_CATALOG .  $cartItem['img_id']) . '.jpg'; ?>"></a>
                                <figcaption><?=$cartItem['name']?>
                                    <p><b>Color:</b><?=$cartItem['color']?>
                                        <br><b>Size:</b> Xll</p>
                                </figcaption>
                            </figure>
                            <div class="unitePrice">$ <?=$cartItem['price']?></div>
                            <div class="quantity">
                                <input type="text" value="<?=$cartItem['quantity']?>" class="countInput">
                            </div>
                            <div class="shipping">FREE</div>
                            <div class="subtotal">$ <?=$cartItem['price'] * $cartItem['quantity']?></div>
                            <div class="action"> <a href="#"><img onclick="return false" class="deleteButton" id="deleteButton" data-id="<?=$cartItem['id_cart_item']?>" src="/img/cart/delete.png" alt="del"></a></div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="buttonCart">
            <a href="#">
                <div class="clearCart">cLEAR SHOPPING CART</div>
            </a>
            <a href="man.html">
                <div class="continueCart">cONTINUE sHOPPING</div>
            </a>
        </div>
    </div>
    <div class="inputBlock">
        <div class="shippingAdress"><span>Shipping Adress</span>
            <form action="#">
                <input type="text" id="country" list="countrys" name="country" placeholder="Bangladesh">
                <datalist id="countrys">
                    <option value="Russia">Russia</option>
                    <option value="USA">USA</option>
                    <option value="Italy">Italy</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="France">France</option>
                </datalist>
                <input type="text" placeholder="City" id="state" name="state">
                <input type="text" id="zip" name="zip" placeholder="Street"> </form>
            <input type="submit" value="Map">
        </div>
        <div class="couponDiscount"><span>personal data</span>
            <p>Enter your name and phone</p>
            <form action="#">
                <input type="text" placeholder="Name" id="state1" name="state">
                <input type="text" placeholder="Phone" id="state1" name="state">
                <input type="submit" value="Apply coupon"> </form>
        </div>
        <div class="grandTotal">
            <div class="price" id="priceTotal">
                Sub total &nbsp;&nbsp;&nbsp;&nbsp; $<span id="summAllCart"> <?= $summCart ?></span>
                <p>GRAND TOTAL $
                    <span id="grandTotal">
                        &nbsp;&nbsp;&nbsp; <?= $summCart ?>
                    </span>
                </p>
            </div>
            <a href="#">SEND ORDER</a>
        </div>
    </div>
</main>