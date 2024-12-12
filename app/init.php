<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    require_once 'core/App.php';
    require_once 'core/Controller.php';

