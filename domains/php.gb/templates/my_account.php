<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }
</style>
<main class="register">
    <section>
        <div class="welcome">
            <p class="collection">MY ACCOUNT</p> <img src="/img/hot_deals/line-border-pink.png" alt="">
            <p class="heading">WELCOME</p>
        </div>
    </section>
    <section>
        <form name="registr" id="registr" class="data-1">
            <h5>register</h5>
            <p class="point">register and save time!</p>
            <p class="about">Register with us for future convenience</p>
            <p class="about"> >> Fast and easy checkout</p>
            <p class="about aboutLast"> >> Easy access to your order history and status</p>
            <p class="point inp"> NAME <span class="red">*</span></p>
            <input type="text" name="name">
            <p class="point inp">EMAIL ADDRESS<span class="red">*</span></p>
            <input type="email" name="email">
            <p class="point inp"> PASSWORD <span class="red">*</span></p>
            <input type="password" name="password">
            <p class="point inp">PHONE</p>
            <input type="text" name="phone">
            <div class="point">
                <p class="point inp">GENDER</p>
                <input type="radio" name='choice' id="ch-1" value="m" checked>
                <label for="ch-1">M</label><br>
                <input type="radio" name='choice' id="ch-2" value="w" checked>
                <label for="ch-2">W</label>
            </div>
            <p><span class="red">* Required Fileds</span></p>
            <p v-if="errors" id="errors">{{errors}}</p>
            <input type="submit" value="register">
        </form>
        <form id="login" class="data-2" name="loginForm">
            <h5>sign in</h5>
            <p class="point">Already registed?</p>
            <p class="about">Please log in below</p>
            <p class="point inp"> EMAIL ADDRESS <span class="red">*</span></p>
            <input type="email" name="email" required>
            <p class="point inp"> PASSWORD <span class="red">*</span></p>
            <input type="password" name="password" required>
            <p v-if="errorsLogin" id="errors">{{errorsLogin}}</p>
            <p><span class="red">* Required Fileds</span></p>
            <input type="submit" value="LOG IN">
        </form>
    </section>
</main>