<?php

//Sistem dosyalarını otomatik olarak include ediyoruz.
function __autoload($classaName) {
    include_once 'system/libs/'.$classaName.'.php';
}

//Config dosyasını include ediyoruz.
include_once 'app/config/config.php';


$boot = new Bootstrap();


