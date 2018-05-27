<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->anasayfa();        
    }

    public function anasayfa() {
        $this->load->view("anasayfa");
    }

    public function isimListele() {
        $index_model = $this->load->model("index_model");
        $data["isimListesi"] = $index_model->isimListele();

        $this->load->view("isimListele", $data);
    }

    public function yeniIsim() {
        $this->load->view("yeniIsim");
    }

    public function isimKaydet() {

        $ad = $_POST["ad"];
        $soyad = $_POST["soyad"];
        $index_model = $this->load->model("index_model");

        $data = array(
            "ad" => $ad,
            "soyad" => $soyad
        );

        $result = $index_model->isimKaydet($data);

        if ($result == 1) {
            $data["mesaj"] = array(
                "mesaj" => "Kayıt işlemi başarıyla gerçekleşti. "
            );
        } else {
            $data["mesaj"] = array(
                "mesaj" => "Kayıt işlemi yapılırken bir sorun oluştu. "
            );
        }
        $this->load->view("yeniIsim", $data);
    }
    
    public function isimGuncelle() {
        $index_model = $this->load->model("index_model");
        $index_model->isimGuncelle();
    }
    
    public function isimSil() {
        $index_model = $this->load->model("index_model");
        $index_model->isimSil();
    }

}
