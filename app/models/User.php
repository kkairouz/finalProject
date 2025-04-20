<?php

namespace app\models;

//this is an example model class, feel free to delete
class User extends Model
{
public function saveUser($inputData)
{
	$query = "insert into information(firstName, lastName, email) values(:firstName,:lastName,:email);  ";  
	return $this->query($query, $inputData); 
}	
// public function getUserByID($id){
// 	$query = "select * from information where id = :id";
// 	return $this->query($query, ['id' => $id]);
// }

// public function saveContact($inputData){
// 	$query = "insert into information (firstName, lastName, email ) values (:firstName, :lastName, :email);";
// 	return $this->query($query, $inputData);
// }

public function getAllfileNames() {
	$query = "select * from audio";
	return $this->query($query);
}

}

