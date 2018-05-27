<?php
/**
 * Bu class URL'ye göre yönlendirme yapmaktadır.
 */
class Bootstrap {

    /*
     * URL verilerini tutar
     */
    public $_url;
    
    /**
     *
     * @var type Çalıştırılacak controller adını tutar.
     */
    public $_controllerName = 'index';
    
    /**
     *
     * @var type Çalıştırlacak method adını tutar.
     */
    public $_methodName = "index";
    
    /**
     *
     * @var type Controller dosyalarının yolunu tutar.
     */
    public $_controllerPath = "app/controllers/";
    
    /**
     *
     * @var type Çalıştırılan controller nesnesini/sınıfını tutar.
     */
    public $_controller;

    /**
     * İlk çalışan method burasıdır.
     */
    public function __construct() {

        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    /**
     * URL'yi alır dizi haline getirir. $_url özelliğine atar.
     * 
     * $_url[0] => Controller ismi
     * $_url[1] => Method ismi
     * $_url[2] => Parametre
     * 
     * yada URL boş ise $_url özelliğini unset yapar.
     * 
     */
    public function getUrl() {

        $this->_url = isset($_GET["url"]) ? $_GET["url"] : null;

        if ($this->_url != null) {
            $this->_url = rtrim($this->_url, "/");
            $this->_url = explode("/", $this->_url);
        } else {
            unset($this->_url);
        }
    }

    /**
     * Controller dosyasını ve controller'ı yükler.
     * 
     * $_url[0] set edilmişse $_controllerName'e atar ve $_controllerName'i yükler.
     * $_url[0] set edilmemişse $_controllerName'in default değerini yükler.
     */
    public function loadController() {

        if (!isset($this->_url[0])) {
            include $this->_controllerPath . $this->_controllerName . '.php';
            $this->_controller = new $this->_controllerName();
        } else {

            $this->_controllerName = $this->_url[0];
            $fileName = $this->_controllerPath . $this->_controllerName . ".php";
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($this->_controllerName)) {
                    $this->_controller = new $this->_controllerName();
                } else {
                    
                }
            } else {
                
            }
        }
    }

    public function callMethod() {
        
        if (isset($this->_url[2])) {
            $this->_methodName = $this->_url[1];
            if (method_exists($this->_controller, $this->_methodName)) {
                $this->_controller->{$this->_methodName}($this->_url[2]);
            } else {
                echo "contoller içinde method bulunamadı.";
            }
        } else {
            if (isset($this->_url[1])) {
                $this->_methodName = $this->_url[1];
                if (method_exists($this->_controller, $this->_methodName)) {
                    $this->_controller->{$this->_methodName}();
                } else {
                    echo "contoller içinde method bulunamadı.";
                }
            } else {
                if (method_exists($this->_controller, $this->_methodName)) {
                    $this->_controller->{$this->_methodName}();
                } else {
                    echo "contoller içinde index methodu bulunamadı.";
                }
            }
        }
    }
}
