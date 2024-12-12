<?php
    class Csrf {
        public static function generate() {
            if (empty($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }
            return $_SESSION['csrf_token'];
        }

        public static function verify($token) {
            return isset($_SESSION['csrf_token']) && ($_SESSION['csrf_token'] == $token);
        }
    }