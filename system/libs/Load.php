<?php

class Load {

    function __construct() {
        
    }
    
    public function view($filename, $data=false) {
        if ($data == true){
            extract($data);
        }
        
        include 'app/views/' . $filename . '_view.php';
    }
    
    public function model($fileName) {
        include 'app/models/' . $fileName . '.php';
        return new $fileName();
    }
    
    public function other($fileName) {
        include 'app/others/' . $fileName . '.php';
        return new $fileName();
    }
}

