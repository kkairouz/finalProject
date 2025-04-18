<?php

namespace app\controllers;
use app\models\User;


abstract class Controller {
    public function returnView($pathToView) {
        require $pathToView;
        exit();
    }

    public function getContactInfo()
    {
        $User = new User();
        $query = !empty($_GET['name']) ? $_GET['name'] : null;

        $nextUser = $this->getContactInfo($query);

        echo json_encode($nextUser);
        exit();
    }
    public function getAllContacts() 
    {
      $query = "select * from information";
      return $this->query($query);
      
    }
    public function getContactByID($id) 
    {
      $User = new User();
      $nextUser = $User->getContactById($id);
      echo json_encode($nextUser);
      exit();
    }
    public function saveContact() 
    {
      $inputData = [
          'firstName' => $_POST['firstName'] ?: null,
          'lastName' => $_POST['lastName'] ?: null,
          'email' => $_POST['email'] ?: null,
      ];
      $contactData = $this->validateContact($inputData);

      $contactData= new User();
      $contactData->saveContact(
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
  public function contactView() {
    include '../views/homepage.html';
    exit();
}

public function contactAddView() {
    include '../views/form-success.html';
    exit();
}


    public function saveFileName()
    {
      $inputData = [
          `fileName` => $_POST[`fileName`] ?: null,
      ];

      $fileNameData = $this->validateData($inputData);

      $fileName = new Model(); 
      $fileName->saveFileName(
        [
            `fileName` => $fileNameData[`fileName`],
        ]
      );

      http_response_code(200);
      echo json_encode([

          'success' => true
      ]);
      exit(); 

    }
    public function fileNameAddView()
    {
      include 'finalProject/public/assets/views/main/addingFile.html';
      exit(); 
    }
    
    public function returnJSON($json) {
        header("Content-Type: application/json");
        echo json_encode($json);
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

public function validateData($inputData)
{
  $errors = []; 
  $fileName = $inputData['fileName']; 
   
 
 if($fileName)
 {
   $fileName = htmlspecialchars($fileName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);  	
   
   if(strlen($fileName) < 3) 
   {
     $errors['fileName'] = 'file name is too short'; 
   } 
      
 
 }
 else
 {
   $errors['fileName'] = 'file name is required';  
 }
 
 if(count($errors)) 
 {
   http_response_code(400); 
   echo json_encode($errors); 
   exit(); 
 }
 return[
 
 'fileName' => $fileName,
  
 
 ];
  
}
}


