<?php
    class ContactModel {
        private $name;
        private $email;
        private $age;
        private $message;

        public function setData($name, $email, $age, $message) {
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }
        public function validForm() {
            if(strlen($this->name) < 3)
                return "Ім'я надто коротке";
            elseif (strlen($this->email) < 3)
                return "Email надто короткий";
            else if(!is_numeric($this->age) || $this->age <= 0 || $this->age > 90)
                return "Ви ввели не вік";
            else if(strlen($this->message) < 5)
                return "Повідомлення надто коротке";
            else
                return "Вірно";
        }

        public function mail() {
            $to = "beefeater83@gmail.com";
            $message = 'Ім\'я: ' . $this->name . '. Вік: ' . $this->age . '. Повідомлення: ' . $this->message;

            $subject = "=?utf-8?B?".base64_encode("Повідомлення з сайту")."?=";
            $headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";
            $success = mail ($to, $subject, $message, $headers);

            if(!$success){
                return "Повідомлення не надіслано";
            }

            else{
                $_POST['name'] = $_POST['email'] = $_POST['age'] = $_POST['message'] = '';
                return "Повідомлення було надіслано!";
            }
        }

    }