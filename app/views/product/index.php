<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$data['product']['title']?></title>
    <meta name="description" content="<?=$data['product']['anons']?>">
    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/product.css" charset="utf-8">
    <script src="https://kit.fontawesome.com/5b4bf168f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'public/blocks/header.php'?>

    <div class="container main">
        <a href="/categories/<?=$data['product']['category']?>"><< Повернутись</a>
        <h1 class="info-title"><?=$data['product']['title']?></h1>
        <div class="info">
            <div>
                <img src="/public/img/<?=$data['product']['img']?>" alt="<?=$data['product']['title']?>">
            </div>
            <div>
                <p><?=$data['product']['anons']?></p><br>
                <p><?=$data['product']['text']?></p>                
                <div>
                  <form action="/basket" method="POST">
                     <input type="hidden" name="item_id" value="<?=$data['product']['id']?>">
                      <input type="hidden" name="csrf_token" value="<?= isset($data['csrf_token']) ? $data['csrf_token'] : '' ?>">
                     <button class="btn">Купити за <?=$data['product']['price']?> ₴</button>                      
                  </form>
                </div>
            </div>
            
        </div>
    </div>

    <?php require 'public/blocks/footer.php'?>
</body>
</html>