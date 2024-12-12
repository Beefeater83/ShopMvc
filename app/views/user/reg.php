<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Реєстрація</title>
    <meta name="description" content="Реєстрація">
    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
    <script src="https://kit.fontawesome.com/5b4bf168f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'public/blocks/header.php'?>

    <div class="container main">
        <h1>Реєстрація</h1>
        <p>Заповніть форму</p>
        <form action="/user/reg" method="post" class="form-control">
            <input type="hidden" name="csrf_token" value="<?= $data['csrf_token']; ?>">
            <input type="text" name="name" placeholder="Введіть ім'я" value="<?= isset($_POST['name']) ? $_POST['name'] : ""?>"><br>
            <input type="email" name="email" placeholder="Введіть email" value="<?= isset($_POST['email']) ? $_POST['email'] : ""?>"><br>
            <input type="password" name="pass" placeholder="Введіть пароль" value="<?= isset($_POST['pass']) ? $_POST['pass'] : ""?>"><br>
            <input type="password" name="re_pass" placeholder="Повторіть пароль" value="<?= isset($_POST['re_pass']) ? $_POST['re_pass'] : ""?>"><br>
            <div class="error"><?= isset($_POST['data']) ? $_POST['data'] : ""?></div>
            <button class="btn" id="send">Готово</button>
        </form>
    </div>


    <?php require 'public/blocks/footer.php'?>
</body>
</html>