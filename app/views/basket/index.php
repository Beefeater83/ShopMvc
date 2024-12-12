<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Кошик з товарами</title>
    <meta name="description" content="Кошик з товарами">
    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/products.css" charset="utf-8">
    <script src="https://kit.fontawesome.com/5b4bf168f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'public/blocks/header.php'?>

    <div class="container main">
        <h1>Кошик з товарами</h1>

        <?php if (isset($data['products'])): ?>
            <?php if (count($data['products']) > 0): ?>
                <form action="basket/delete_all" method="POST">                       
                       <input type="hidden" name="csrf_token" value="<?= isset($data['csrf_token']) ? $data['csrf_token'] : '' ?>">
                       <button type="submit" class="btn dlt-all">Видалити всі</button>
                </form>
                <div class="products">
                    <?php
                    $sum=0;
                     for($i=0; $i<count($data['products']); $i++):
                        $sum += $data['products'][$i]['price'];
                    ?>

                    <div class="row">
                        <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                        <h4><?=$data['products'][$i]['title']?></h4>
                        <div><?=$data['products'][$i]['price']?>₴</div>
                        <form action="basket/delete/<?=$data['products'][$i]['id']?>" method="POST">                       
                            <input type="hidden" name="csrf_token" value="<?= isset($data['csrf_token']) ? $data['csrf_token'] : '' ?>">
                            <button type="submit" class="btn dlt">Видалити <i class="fa-solid fa-circle-xmark"></i></button>
                        </form>
                    </div>
                    <?php endfor; ?>
                    <form action="basket/confirm" method="POST">
                       <input type="hidden" name="amount" value="<?=$sum?>">
                       <input type="hidden" name="csrf_token" value="<?= isset($data['csrf_token']) ? $data['csrf_token'] : '' ?>">
                        <button type="submit" class="btn">Придбати (<b><?=$sum?>₴</b>)</button>
                    </form>
                </div>
            <?php endif;?>
        <?php else:?>
            <p><?= isset($data['empty']) ? $data['empty'] : '' ?></p>
        <?php endif;?>
    </div>

    <?php require 'public/blocks/footer.php'?>
</body>
</html>