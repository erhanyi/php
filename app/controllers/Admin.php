<?php

class Admin extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->girisKontrol();
    }

    public function girisKontrol() {
        Session::init();
        if (Session::get("giris") == true) {
            header("Location:" . SITE_URL . "/panelAnaSayfa");
        }
        $this->load->view("admin/adminGiris");
    }

    public function giris() {
        $data = array(
            ":ad" => $_POST["username"],
            //":parola" => md5($_POST["password"])
            ":parola" => $_POST["password"]
        );

        $admin_model = $this->load->model('admin_model');
        $result = $admin_model->kullaniciKontrol($data);

        if ($result == false) {

            //Hatalı kullanıcı adı veya şifre
            header("Location:" . SITE_URL . "/admin");
        } else {
            Session::init();
            Session::set("giris", "true");
            Session::set("username", $result[0]["ad"]);
            Session::set("id", $result[0]["id"]);

            header("Location:" . SITE_URL . "/panelAnaSayfa");
        }
    }

    public function cikis() {
        Session::init();
        Session::destroy();
        header("Location:" . SITE_URL . "/admin");
    }

}
