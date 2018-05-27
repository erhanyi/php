<?php

class Index_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function isimListele() {
        $sql="select * from user";
        return $this->db->select($sql);
    }
    
    public function isimKaydet($data) {
        
        return $this->db->insert("user", $data);
    }
    
    public function isimGuncelle() {
        
        $data = array(
            "ad" => "ceren",
            "soyad" => "yilmaz"
        );
        
        return $this->db->update("user", $data,"id=3");
    }

    public function isimSil() {
           
        return $this->db->delete("user","id=3");
    }
}
