<?php

use Hp\Projet\models\User;

require_once "vendor/autoload.php";

$person = new User("John", 2);
echo $person->name;
