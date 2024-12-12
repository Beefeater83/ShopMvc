<header>
    <div class="container top-menu">
        <div class="nav">
            <a href="/">Головна</a>
            <a href="/contact">Контакти</a>
            <a href="/contact/about">Про компанію</a>
        </div>
        <div class="tel">
            <i class="fa-solid fa-phone"></i> +38 (067) 634 - 00 - 00
        </div>
    </div>
    <div class="container middle">
        <div class="logo">
            <img src="/public/img/logo.svg"  alt="Logo">
            <span>Ми знаємо що вам треба!</span>
        </div>
        <div class="auth-checkout">
            <a href="/basket">
                <?php
                    require_once 'app/models/BasketModel.php';
                    $basketModel = new BasketModel();
                ?>
                <button class="btn basket">Кошик <b>(<?=$basketModel->countItems()?>)</b></button></a><br>

            <?php if(!isset($_COOKIE['login'])): ?>

            <a href="/user/auth"><button class="btn auth">Вхід <i class="fa-solid fa-arrow-right-to-bracket"></i></button></a>
            <a href="/user/reg"><button class="btn reg">Реєстрація</button></a>
            <?php else: ?>
            <a href="/user/dashboard"><button class="btn dashboard">Кабінет користувача</button></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="container menu">
        <ul>
            <li><a href="/categories">Всі товари</a></li>
            <li><a href="/categories/shoes">Взуття</a></li>
            <li><a href="/categories/hat">Кепки</a></li>
            <li><a href="/categories/shirts">Футболки</a></li>
            <li><a href="/categories/watches">Годинники</a></li>
        </ul>
    </div>
</header>