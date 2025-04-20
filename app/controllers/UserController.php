<?php

namespace app\controllers;
use app\models\User;

//this is an example controller class, feel free to delete
class UserController extends Controller {
    public function getAllFiles() {
        $filesModel = new User();
        $files = $filesModel->getAllFiles();
        $this->returnJSON($files);
    }

    public function contactsView() {
        $this->returnView('./assets/views/main/form-success.html');
    }

    public function filesView() {
        $this->returnView('./assets/views/main/addingFile.html');
    }

    public function validateContact($inputData) {
        $errors = [];
        $firstName = $inputData['firstName'];
        $lastName = $inputData['lastName'];
        $email = $inputData['email'];
     

        if ($firstName) {
            $firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($firstName) < 2) {
                $errors['firstNameShort'] = 'first name is too short';
            }
        } else {
            $errors['requiredFirstName'] = 'first name is required';
        }

        if ($lastName) {
            $lastName = htmlspecialchars($lastName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($lastName) < 2) {
                $errors['lastNameShort'] = 'last name is too short';
            }
        } else {
            $errors['requiredLastName'] = 'last name is required';
        }

        if ($email) {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['invalidEmail'] = 'email is invalid.';
            }
        } else {
            $errors['requiredEmail'] = 'email is required';
        }

        

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            
        ];
    }

    public function saveContact() {
        $inputData = [
            'firstName' => $_POST['firstName'] ?: null,
            'lastName' => $_POST['lastName'] ?: null,
            'email' => $_POST['email'] ?: null,
            
        ];

        $contactData = $this->validateContact($inputData);

        $contact = new User();
        $contact->saveContact(
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

}