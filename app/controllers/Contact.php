<?php
    require 'app/util/Csrf.php';
    class Contact extends Controller {
        public function index() {

            Csrf::generate();

            if(isset($_POST['name'])){

                if (!Csrf::verify($_POST['csrf_token'])) {
                    die('Помилка CSRF захисту');
                }

                $mail = $this->model("ContactModel");
                $mail->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);

                $isValid = $mail->validForm();
                if($isValid == "Вірно")
                    $_POST['data'] = $mail->mail();
                else
                    $_POST['data'] = $isValid;
            }
            $this->view("contact/index", ['csrf_token' => $_SESSION['csrf_token']]);

        }

        public function about() {
            $this->view("contact/about");
        }
    }