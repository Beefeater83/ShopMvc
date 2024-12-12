<?php
    require 'app/util/Csrf.php';
    class User extends Controller {

        public function reg() {

            Csrf::generate();

            if(isset($_POST['name'])){
                if (!Csrf::verify($_POST['csrf_token'])) {
                    die('Помилка CSRF захисту');
                }

                $user = $this->model("UserModel");
                $user->setData($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);
                $isValid = $user->validForm();
                if($isValid == "Вірно")
                    $user->addUser();
                else
                    $_POST['data'] = $isValid;
            }
            return $this->view('user/reg', ['csrf_token' => $_SESSION['csrf_token']]);
        }

        public function dashboard() {
            $user = $this->model('UserModel');
            if(isset($_POST['exit_btn'])){
                $user->logOut();
                exit();
            }
            return $this->view('user/dashboard', $user->getUser());
        }
        public function dashboardImage() {
            $user = $this->model('UserModel');
            $validImage = $user->validateImage($_FILES['user_photo']);
            if ($validImage != "Вірно")
                $_POST['data'] = $validImage;
            else {
                $user->saveUploadedImage($_FILES['user_photo']);
                header("Location: /user/dashboard");
                exit;
            }
            return $this->view('user/dashboard', $user->getUser());
        }
        public function auth() {

            Csrf::generate();
            if(isset($_POST['email'])){
                if (!Csrf::verify($_POST['csrf_token'])) {
                    die('Помилка CSRF захисту');
                }
                $user = $this->model('UserModel');
                $_POST['data'] = $user->auth($_POST['email'], $_POST['pass']);
            }
            return $this->view('user/auth', ['csrf_token' => $_SESSION['csrf_token']]);
        }
    }

