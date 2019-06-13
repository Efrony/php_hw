<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <title><?=$title?></title>
</head>

<body>
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
            <a class="cartButton" href="cart.html">
                <img src="img/Forma_1.png" alt="basket">
                <count-cart-component :cart_list="cartList" :api_url="API_URL"></count-cart-component>
            </a>
            <a href="my_account.html" class="myAccount">
                My Account
                <i class="fas fa-caret-down"></i>
                <div class="myAccountMenu">Exit</div>
            </a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="/">HOME</a></li>
            <li><a href="/?page=man">MAN</a></li>
            <li><a href="/?page=women">WOMEN</a></li>
            <li><a href="#">KIDS</a></li>
            <li><a href="#">ACCOSERIESE</a></li>
            <li><a href="#">HOT DEALS</a></li>
            <li><a href="about_us.html">ABOUT US</a></li>
        </ul>
    </nav>
    <main>
        <?= $content ?>
    </main>
    <div class="subscribeBcg">
        <div class="subscribe">
            <div class="commentBlock">
                <div class="comment"> “Vestibulum quis porttitor dui! Quisque viverra nunc mi, a pulvinar purus
                    condimentum a. Aliquam condimentum mattis neque sed pretium”
                    <br>
                    <address>Bin Burhan<p>Dhaka, Bd</p>
                    </address>
                    <div class="scroll">
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="emailBlock">
                <div class="email">Subscribe
                    <p>FOR OUR NEWLETTER AND PROMOTION</p>
                    <form action="#">
                        <input type="email" placeholder="Enter Your Email">
                        <input type="submit" value="Subscribe"> </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <div class="aboutBrand">
                <div class="logo"> <span class="styleBran">BRAN</span> <span class="styleD">D</span> </div>
                <p> Objectively transition extensive data rather than cross functional solutions. Monotonectally
                    syndicate multidisciplinary materials before go forward benefits. Intrinsicly syndicate an
                    expanded
                    array of processes and cross-unit partnerships. </p>
                <br>
                <p> Efficiently plagiarize 24/365 action items and focused infomediaries. Distinctively seize
                    superior
                    initiatives for wireless technologies. Dynamically optimize. </p>
            </div>
            <div class="aboutAll">
                <div>
                    <h4>COMPANY</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4>INFORMATION</h4>
                    <ul>
                        <li><a href="#">Tearms & Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">How to Buy</a></li>
                        <li><a href="#">How to Sell</a></li>
                        <li><a href="#">Promotion</a></li>
                    </ul>
                </div>
                <div>
                    <h4>SHOP CATEGORY</h4>
                    <ul>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Apparel</a></li>
                        <li><a href="#">Brows All</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copySocialBlock">
            <div class="copySocial">
                <div class="copy">&copy; <?=date("Y")?> Brand All Rights Reserved.</div>
                <div class="social">
                    <div><i class="fab fa-facebook-f"></i></div>
                    <div><i class="fab fa-twitter"></i></div>
                    <div><i class="fab fa-linkedin-in"></i></div>
                    <div><i class="fab fa-pinterest-p"></i></div>
                    <div><i class="fab fa-google-plus-g"></i></div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>