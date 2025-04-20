<?php

namespace app\models;

//this is an example model class, feel free to delete
class User extends Model {

    public function getAllFiles() {
        $query = "select * from audio";
        return $this->query($query);
    }

    public function saveContact($inputData){
        $query = "insert into information (firstName, lastName, email) values (:firstName, :lastName, :email);";
        return $this->query($query, $inputData);
    }
}