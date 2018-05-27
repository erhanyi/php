<?php

class Panel_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function addNewUserRun($data) {
       return $this->db->insert("user", $data);
    }
    
    public function userList() {
        $sql="select * from user order by id desc";
        return $this->db->select($sql);
    }
    
    public function findUser() {
        $sql="select * from user where id=:id";
        $params=array(
            ":id" => "1"
        );
        return $this->db->select($sql, $params);
    }

}
