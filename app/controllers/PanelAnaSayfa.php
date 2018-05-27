<?php

class PanelAnaSayfa extends Controller {

    public function __construct() {
        parent::__construct();

        //Oturum kontrolü
        Session::checkSession();
    }

    public function index() {
        $this->anaSayfa();
    }

    public function anaSayfa() {

        $this->load->view("panel/panelAnaSayfa");
    }

}
