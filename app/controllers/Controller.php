<?php

namespace app\controllers;
use app\models\User;


abstract class Controller {
    public function returnView($pathToView) {
        require $pathToView;
        exit();
    }

    public function returnJSON($json) {
        header("Content-Type: application/json");
        echo json_encode($json);
        exit()
    }

  public function validateUser($inputData)
{
 $errors = []; 
 $firstName = $inputData['firstName']; 
 $lastName  = $inputData['lastName']; 
 $email     = $inputData['email']; 

if($firstName)
{
	$firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);  	if(strlen($firstName) < 3) 
	{
	  $errors['firstNameShort'] = 'first name is too short'; 
	} 
     

}
else
{
	$errors['requiredFirstName'] = 'first name is required';  
}
if($lastName)
{
        $lastName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);         
        if(strlen($lastName) < 3)
        {
          $errors['lastNameShort'] = 'first name is too short';
        }
      

}
else
{
        $errors['requiredLastName'] = 'last name is required';
}
if ($email)
 {
            $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,3})$/';
            if (!preg_match($regex, $email))
	    {
                $errors['invalidEmail'] = 'email is invalid.';
            }
 }
 else
 {
            $errors['requiredEmail'] = 'email is required';
 }
if(count($errors)) 
{
	http_response_code(400); 
	echo json_encode($errors); 
	exit(); 
}
return[

'firstName' => $firstName,
'lastName' => $lastName, 
'email' => $email, 


]; 


}
}
