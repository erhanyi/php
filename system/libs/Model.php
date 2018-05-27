<?php

class Model {

    protected $db = array();

    public function __construct() {

        $dsn = 'mysql:dbname=phpproje;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';

        $this->db = new Database($dsn, $user, $password);
    }
    
    public function loadClazz($fileName) {
        include_once ('app/models/classes/' . $fileName . '.php');
        return new $fileName();
    }

}
