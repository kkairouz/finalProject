<?php

namespace app\controllers;
use app\models\User;

//this is an example controller class, feel free to delete
class UserController extends Controller {

    public function saveUser() 
    {
      $inputData = [
          'firstName' => $_POST['firstName'] ?: null,
          'lastName' => $_POST['lastName'] ?: null,
          'email' => $_POST['email'] ?: null,
      ];
      $contactData = $this->validateUser($inputData);

      $contactData= new User();
      $contactData->saveUser(
          [
              'firstName' => $contactData['firstName'],
              'lastName' => $contactData['lastName'],
              'email' => $contactData['email'],
          ]
      );

      http_response_code(200);
      echo json_encode([
          'success' => true
      ]);
      exit();
  }

    public function validateUser($inputData)
    {
     $errors = []; 
     $firstName = $inputData['firstName']; 
     $lastName  = $inputData['lastName']; 
     $email     = $inputData['email']; 
    
    if($firstName)
    {
        $firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);  	
        if(strlen($firstName) < 3) 
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
    public function getAllfileNames() {
        $filesModel = new User();
        $files = $filesModel->getAllfileNames();
        $this->returnJSON($files);
    }

    public function contactView() {
        $this->returnView('./assets/views/main/form-success.html');
    }

    public function fileNameView() {
        $this->returnView('./assets/views/main/addingFile.html');
    }
   

}