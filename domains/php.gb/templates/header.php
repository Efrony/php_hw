<header>
    <div class="logoSearch">
        <div class="logo">
            <span class="styleBran">BRAN</span>
            <span class="styleD">D</span>
        </div>
        <div class="search">
            <button class="browse">Browse <i class="fas fa-caret-down"></i></button>
            <input type="search" placeholder="Search for Item...">
            <button type="button" class="searchButton"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="my">
        <a class="cartButton" href="/cart/">
            <img src="/img/Forma_1.png" alt="basket">
            <div class="cartCount" id="cartCount"><?= $countCart ?></div>
        </a>
        <?php if (isAuth()) : ?>
            <a href="/my_account/" class="myAccount">
                My Account
                <i class="fas fa-caret-down"></i>
                <div class="myAccountMenu">Exit</div>
            </a>
        <?php else : ?>
            <a href="/my_account/" class="myAccount">Sign in / Registration</a>
        <?php endif ?>
    </div>
</header>