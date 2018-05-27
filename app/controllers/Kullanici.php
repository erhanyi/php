<?php

class Kullanici extends Controller {

    public function __construct() {
        parent::__construct();

        //Oturum kontrolü
        Session::checkSession();
    }

    public function index() {

        $data ["kullaniciListesi"] = $this->kullaniciListesiGetir();
        $this->load->view("panel/kullanici", $data);
    }

    public function kullaniciListesiGetir() {
        $kullanici_model = $this->load->model("kullanici_model");
        return $kullanici_model->kullaniciListele();
    }

    public function yeniKullaniciEkle() {

        if (isset($_POST['kullaniciKaydet'])) {

            $form = $this->load->other("form");

            $form->post('kullaniciAdi')->isEmpty();
            $form->post('email')->isEmpty()->isMail();
            $form->post('ad')->isEmpty();
            $form->post('soyad')->isEmpty();
            $form->post('password')->isEmpty();

            if ($form->submit()) {

                $data = array(
                    'kullaniciAdi' => $form->values['kullaniciAdi'],
                    'email' => $form->values['email'],
                    'ad' => $form->values['ad'],
                    'soyad' => $form->values['soyad'],
                    'parola' => md5($form->values['password'])
                );

                $model = $this->load->model('kullanici_model');
                $model->yeniKullaniciEkle($data);

                $data ["formAddInfo"] = "Kullanıcı ekleme işlemi başarılı bir şekilde gerçekleşti.";
                $data ["kullaniciListesi"] = $model->kullaniciListele();
                $this->load->view("panel/kullanici", $data);
            } else {

                $data ["formErrors"] = $form->errors;
                $data ["kullaniciListesi"] = $this->kullaniciListesiGetir();
                $this->load->view("panel/kullanici", $data);
            }
        }
    }
    
    public function silKullanici($kullaniciAdi) {
        $kullanici_model = $this->load->model("kullanici_model");
        $kullanici_model->silKullanici($kullaniciAdi); 
        $data ["formAddInfo"] = "Kullanıcı silme işlemi başarılı bir şekilde gerçekleşti.";
        $data ["kullaniciListesi"] = $kullanici_model->kullaniciListele();
        $this->load->view("panel/kullanici", $data);
    }
}
