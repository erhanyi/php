<?php

class Session {

    public static function init() {
        if (!isset($_SESSION)){
            session_start();
        }        
    }

    public static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    public static function get($key) {

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function destroy() {
        session_destroy();
    }
    
    public static function checkSession(){
        //Oturum kontrolü
        self::init();
        if (self::get("giris") == false) {
            self::destroy();
            header("Location:" . SITE_URL . "/admin");
        }
    }

}
