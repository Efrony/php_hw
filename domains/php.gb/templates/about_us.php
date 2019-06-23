<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }

    nav ul li:nth-child(3) a {
        border-bottom: 3px solid #ef5b70;
    }

    .messageComment {
        color: #f16d7f;
        font-size: 24px;
        font-weight: 900;
        text-transform: uppercase;
    }
</style>
<div class="newArrivalsBlock">
    <div class="newArrivals">
        <p>New Arrivals</p>
        <nav> Home / Men / <span>New Arrivals</span> </nav>
    </div>
</div>
<main>
    <section class="comments">
        <p class="collection">ABOUT US</p><img src="/img/hot_deals/line-border-pink.png" alt="">
        <p class="heading">comments</p>
        <p class="messageComment"><?= $messageComment ?></p>
        <? foreach ($commentsList as $comment) : ?>
            <div>
                <article class="comment">
                    <?= $comment['text'] ?>
                    <br>
                    <address>
                        <?= $comment['name'] ?>
                        <p><?= $comment['date'] ?></p>
                    </address>
                    <div class="buttons">
                        <a href="?action=edit&message=edit&id=<?=$comment['id']?>">Редактировать</a>
                        <a href="?action=delete&id=<?=$comment['id']?>">Удалить</a>
                    </div>
                </article>
            </div>
        <? endforeach; ?>
    </section>
    <section>
        <form action="?action=<?=$_GET['action']?>" method="post" class="data-1">
            <h5>write a comment</h5>
            <p class="point inp">NAME <span class="red">*</span></p>
            <input type="text" name="nameComment" required value="<?=$selectedComment['name']?>">
            <p class="point inp">EMAIL ADDRESS <span class="red" >*</span></p>
            <input type="email" name="emailComment" required value="<?=$selectedComment['email']?>">
            <p class="point inp">COMMENT<span class="red">*</span></p>
            <textarea class="areaComment" name="textComment" id="" cols="30" rows="10" required><?=$selectedComment['text']?></textarea>
            <p><span class="red">* Required Fileds</span></p>
            <input type="submit" name="sendComment" value="SEND COMMENT">
            <input hidden type="text" name="id" value="<?=$selectedComment['id']?>">
        </form>
    </section>

    </div>
</main>