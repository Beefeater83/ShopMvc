<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;
        private  $image;

        private $_db = null;

        public function __construct(){
            $this->_db = DB::getInstance();
        }

        public function setData($name, $email, $pass, $re_pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
            $this->image = "user_no_photo.jpg";
        }
        public function validForm() {
            if(strlen($this->name) < 3)
                return "Ім'я надто коротке";
            elseif (strlen($this->email) < 3)
                return "Email надто короткий";
            else if(strlen($this->pass) < 3)
                return "Пароль не менше 3 символів";
            else if($this->pass != $this->re_pass)
                return "Паролі не співпадаюсь";
            else
                return "Вірно";
        }

        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass, image) VALUES(:name, :email, :pass, :image)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass, 'image' => $this->image]);

            $this->setAuth($this->email);
        }
       
        public function getUser(){
            $email = $_COOKIE['login'];
            $sql = 'SELECT * FROM users WHERE email = :email';
            $query = $this->_db->prepare($sql);
            $query->execute(['email' => $email]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        
        public function logOut() {
            setcookie('login', $this->email, time() - 3600, "/");
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($email, $pass){
            $sql = 'SELECT * FROM users WHERE email = :email';
            $query = $this->_db->prepare($sql);
            $query->execute(['email' => $email]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if(!isset($user['email']))
              return "Такого користувача не існує";
            else if(password_verify($pass, $user['pass'])){
              $this->setAuth($email);
            }              
            else
              return "Пароль не співпадає";
        }

        public function setAuth($email){
            setcookie('login', $email, [
                'expires' => time() + 3600,
                'path' => '/',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict'
            ]);
            header('Location: /user/dashboard');
        }

        public function validateImage($image) {
            $maxFileSize = 500 * 1024;
            if ($image['error'] === UPLOAD_ERR_NO_FILE)
                return "Ви не обрали фото для завантаження";
             elseif ($image['size'] > $maxFileSize)
                return "Фото має бути до 500КБ";
             else
                return "Вірно";
        }
        public function saveUploadedImage($image){
            $user = $this->getUser();
            $tmpFilePath = $image['tmp_name'];
            $uploadDir = 'public/img/user/';
            $fileName = time().'-'.basename($image['name']);
            $destination = $uploadDir . $fileName;

            if (move_uploaded_file($tmpFilePath, $destination)) {
               if($user['image'] != "user_no_photo.jpg"){
                   $isDeleted = self::deleteImage($user['image']);
                   if($isDeleted != 'ОК'){
                       $_POST['data'] = $isDeleted;
                       return;
                   }
               }
                $sql= "UPDATE `users` SET `image` = :image WHERE `users`.`id` = :id";
                $query = $this->_db->prepare($sql);
                $query->execute(['image' => $fileName, 'id' => $user['id']]);
            } else
                $_POST['data'] = "Помилка при завантажені!!!";
        }

        public static function deleteImage($imageName){
            $filePath = 'public/img/user/'.$imageName;
            if (file_exists($filePath)) {
                if (unlink($filePath))
                    return 'ОК';
                 else
                     return "Помилка при видалені";
            } else
                return "Файл не знайдено";
        }


    }