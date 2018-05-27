<?php

class Kullanici_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function yeniKullaniciEkle($data) {
       return $this->db->insert("kullanici", $data);
    }
    
//    public function kullaniciListele1() {
//        $sql="select * from kullanici order by kullaniciAdi desc";
//        return $this->db->select($sql);
//    }
    
    public function kullaniciGetirKullaniciAdinaGore($kullaniciAdi) {
        $sql="select * from kullanici where kullaniciAdi=:kullaniciAdi";
        $params=array(
            ":kullaniciAdi" => $kullaniciAdi
        );
        return $this->db->select($sql, $params);
    }
    
    public function kullaniciListele() {
        
        $kullaniciListesi = array();
        $sql = "select * from kullanici order by kullaniciAdi desc";
        $data = $this->db->select($sql);
        foreach ($data as $value) {
            $kullanici = new Kullanici();
            $kullanici->kullaniciAdi = $value['kullaniciAdi'];
            $kullanici->email = $value['email'];
            $kullanici->ad = $value['ad'];
            $kullanici->soyad = $value['soyad'];
            array_push($kullaniciListesi, $kullanici);
        }
        return $kullaniciListesi;
    }
    
    public function silKullanici($kullaniciAdi) {
        
       return $this->db->delete("kullanici", "kullaniciAdi='".$kullaniciAdi."'");
    }
}
