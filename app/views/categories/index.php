<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$data['title']?></title>
    <meta name="description" content="<?=$data['title']?>">
    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <script src="https://kit.fontawesome.com/5b4bf168f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'public/blocks/header.php'?>

    <div class="container main">
        <h1><?=$data['title']?></h1>
        <div class="products">
            <?php for($i=0; $i<count($data['products']); $i++): ?> <!--$data второй параметр view($view, $data = []) в главном контроллере-->
                <div class="product">
                    <div class="image">
                        <img src="/public/img/<?=$data['products'][$i]['img'] ?>" alt="<?=$data['products'][$i]['title'] ?>">
                    </div>
                    <h3><?=$data['products'][$i]['title'] ?></h3>
                    <p><?=$data['products'][$i]['anons'] ?></p>
                    <p class="price"><b><?=$data['products'][$i]['price']?> ₴</b></p>
                    <a href="/product/<?=$data['products'][$i]['id'] ?>"><button class="btn">Детальніше</button></a>
                </div>
            <?php endfor; ?>
        </div>
        <?php if(isset($data['totalPages'])):?>
            <div class="pagination">
                <?php for($i=0; $i<$data['totalPages']; $i++): ?>
                    <?php
                       $currentPage =  "/categories/" . ($i+1);
                       $activeButton =  ($_SERVER['REQUEST_URI'] == $currentPage) ? 'activeButton' : '';
                    ?>
                    <a href="/categories/<?=$i+1?>"><button class="btn pages-btn <?=$activeButton?>"><?=$i+1?></button></a>
                <?php endfor; ?>
            </div>
        <?php endif;?>
    </div>

    <?php require 'public/blocks/footer.php'?>
</body>
</html>