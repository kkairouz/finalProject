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



}

