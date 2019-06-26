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
                    <div class="productItem" :id="product_item.article">
                        <figure>
                            <a href="#"><img src="'img/product/'+ product_item.article + '.jpg'" alt="product_item.article"></a>
                            <figcaption>{{product_item.name}}
                                <p><b>Color:</b> Red
                                    <br><b>Size:</b> Xll</p>
                            </figcaption>
                        </figure>
                        <div class="unitePrice">$ {{product_item.price}}</div>
                        <div class="quantity">
                            <input type="text" value="product_item.count" class="countInput">
                        </div>
                        <div class="shipping">FREE</div>
                        <div class="subtotal">$ {{product_item.price * product_item.count}}</div>
                        <div class="action"> <a href="#"><img class="deleteButton" src="/img/cart/delete.png" alt="del"></a></div>
                    </div>
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
                <input type="text" placeholder="State" id="state" name="state">
                <input type="text" id="zip" name="zip" placeholder="Postcode / Zip"> </form>
            <input type="submit" value="get a quote">
        </div>
        <div class="couponDiscount"><span>coupon discount</span>
            <p>Enter your coupon code if you have one</p>
            <form action="#">
                <input type="text" placeholder="State" id="state1" name="state">
                <input type="submit" value="Apply coupon"> </form>
        </div>
        <div class="grandTotal">
            <div class="price" id="priceTotal">
                Sub total &nbsp;&nbsp;&nbsp;&nbsp;$ {{sumCart}}
                <p>GRAND TOTAL
                    <span id="grandTotal">
                        &nbsp;&nbsp;&nbsp;$ {{sumCart}}
                    </span>
                </p>
            </div>
            <a href="#">proceed to checkout</a>
        </div>
    </div>
</main>