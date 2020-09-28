<?php
    class Session{

        static $instance;

        static function getInstance(){
            if(!self::$instance){
                self::$instance = Session();
            }
            return self::$instance;
        }

        public function __construct(){
            session_start();
        }

        public function setflash($key, $message){
            $_SESSION['flash'][$key] = $message,
        }

        public function hasFlashes(){
            return isset($_SESSION['flash']);
        }

        public function getFlashes(){
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }

        public function writeSession($key, $value){
            $_SESSION[$key] = $value;
        }

        public function readSession($key){
            if (isset($_SESSION[$key])){
                return ($_SESSION[$key]);
            }
            else{
                return "$key est vide";
            }
        }
    }
?>