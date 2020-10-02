<?php
    class App{

        static $db = null;

        static function getDatabase(){
            if(!self::$db)
            {
                self::$db = new Database('root', '', 'boutique');
            }
            return self::$db;
        }

        static function redirect($page){
           header("Location: $page");
        }
    }
?>