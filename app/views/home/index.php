<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Головна сторінка</title>
    <meta name="description" content="Головна сторінка інтернет магазину">
    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <script src="https://kit.fontawesome.com/5b4bf168f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'public/blocks/header.php'?>

    <div class="container main">
        <h1>Популярні товари</h1>
        <div class="products">
            <?php for($i=0; $i<count($data); $i++): ?>
            <div class="product">
                <div class="image">
                    <img src="/public/img/<?=$data[$i]['img'] ?>" alt="<?=$data[$i]['title'] ?>">
                </div>
                <h3><?=$data[$i]['title'] ?></h3>
                <p><?=$data[$i]['anons'] ?></p>
                <p class="price"><b><?=$data[$i]['price']?> ₴</b></p>
                <a href="/product/<?=$data[$i]['id'] ?>"><button class="btn">Детальніше</button></a>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <?php require 'public/blocks/footer.php'?>
</body>
</html>