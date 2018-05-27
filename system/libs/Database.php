<?php

class Database extends PDO {

    public function __construct($dsn, $user, $password) {

        parent::__construct($dsn, $user, $password);
    }

    public function select($sql, $params = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($params as $key => $value) {
            $sth->bindValue($key, $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    public function insert($tableName, $data) {

        $fieldKeys = implode(",", array_keys($data));
        $fieldValues = ":" . implode(", :", array_keys($data));

        $sql = "insert into $tableName($fieldKeys) values ($fieldValues)";
        $sth = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $sth->bindValue($key, $value);
        }
        return $sth->execute();
    }

    public function update($tableName, $data, $where) {

        $updateKeys=null;
        
        foreach ($data as $key => $value) {
            $updateKeys .= "$key=:$key,";
        }
        rtrim($updateKeys, ",");

        $sql = "update $tableName set $updateKeys where $where";

        $sth = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $sth->bindValue($key, $value);
        }
        return $sth->execute();
    }
    
    public function delete($tableName, $where, $limit=1) {
        return $this->exec("delete from $tableName where $where limit $limit");
    }
    
    public function affectedRows($sql, $params = array()) {
        $sth = $this->prepare($sql);
        foreach ($params as $key => $value) {
            $sth->bindValue($key, $value);
        }
        $sth->execute();
        return $sth->rowCount();
    }

}
