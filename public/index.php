<?php

require_once "../app/models/Model.php";
require_once "../app/models/User.php";
require_once "../app/controllers/Controller.php";


$env = parse_ini_file('../.env');

##$env = parse_ini_file('../Classwork/finalProject/.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use \app\controllers\Controller;
$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'contact' && $uriArray[2] === 'info' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $Controller = new Controller();

    if ($id) {
        $Controller->getContactByID($id);
    } else {
        $query = isset($_GET['name']) ? $_GET['name'] : null;
        $Controller->getContactInfo();
        $Controller->getAllContacts();
    }
}


