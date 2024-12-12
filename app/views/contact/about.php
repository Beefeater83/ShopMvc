<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сторінка про компанію</title>
    <meta name="description" content="Сторінка про компанію">
    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/about.css" charset="utf-8">
    <script src="https://kit.fontawesome.com/5b4bf168f0.js" crossorigin="anonymous"></script>
</head>
<body>
   <?php require 'public/blocks/header.php'?>

   <div class="container main">

       <div class="content">
           <div class="map">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2497.0430534153534!2d35.04805398239243!3d48.46564414302065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbe2c2c60241bd%3A0x999c964048051b3e!2z0JzQntCh0KItQ9C40YLQuA!5e0!3m2!1sru!2sua!4v1733734536062!5m2!1sru!2sua"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>

           <div class="contacts">
               <div class="contacts-head">
                   <h1>Наши контакти</h1>
               </div>

               <div class="contacts-list">
                   <div>
                       <h3>АДРЕСА</h3>
                       <p class="contacts-data">49000, м.Дніпро</p>
                       <p class="contacts-data">вул.Королеви Єлизавети</p>
                   </div>
                   <div>
                       <h3>КОНТАКТИ</h3>
                       <p class="contacts-data">Phone: +380672625599</p>
                       <p class="contacts-data">Email: sergey@gmail.com</p>
                   </div>
                   <div>
                       <h3>ЧАСИ РОБОТИ</h3>
                       <p class="contacts-data">MON-FRI 9:00-19:00</p>
                       <p class="contacts-data">SAT-SUN 10:00-14:00</p>
                   </div>
                   <div>
                       <h3>СОЦ МЕРЕЖИ</h3>
                       <div class="networks">
                           <div><i class="fa-brands fa-youtube"></i></div>
                           <div><i class="fa-brands fa-facebook-f"></i></div>
                           <div><i class="fa-brands fa-twitter"></i></div>
                           <div><i class="fa-brands fa-google"></i></div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>

   <?php require 'public/blocks/footer.php'?>
</body>
</html>